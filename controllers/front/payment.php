<?php
/**
 * payment.php
 *
 * Main file of the module
 *
 * @author  Geliyoo <eticaret@geliyoo.com>
 * @version 1.0.0
 * @see     PaymentModuleCore
 */

/*
 * This front controller builds the payment request and then redirects the
 * customer to the PSP website so that he can pay safely
 */

class TurkPosPaymentPaymentModuleFrontController extends ModuleFrontController
{
    public $ssl = true;

    protected $turkPosBinListService;
    protected $turkPosCommissionRateService;
    protected $turkPosPaymentService;

    protected $nameForL = 'payment';

    /**
     * Initialize common front page content
     *
     * @see    FrontControllerCore::initContent()
     * @return void
     */
    public function initContent()
    {
        $this->display_column_left = false;
        $this->display_column_right = false;
        parent::initContent();
    }

    /**
     *
     */
    public function postProcess()
    {

        $this->turkPosBinListService = new TurkPosBinListService();
        $this->turkPosCommissionRateService = new TurkPosCommissionRateService();
        $this->turkPosPaymentService = new TurkPosPaymentService();
        $template = 'payment.tpl';
        $errors = array();
        $paymentInfo = array(
            'paymentCardHolder' => null,
            'paymentCardNumber1' => null,
            'paymentCardNumber2' => null,
            'paymentCardNumber3' => null,
            'paymentCardNumber4' => null,
            'paymentCardCVC' => null,
            'paymentCardMonth' => null,
            'paymentCardYear' => null,
            'paymentInstallment' => null
        );

        try {
            $cart = $this->context->cart;
            if ($cart->id_customer == 0 || $cart->id_address_delivery == 0
                || $cart->id_address_invoice == 0 || !$this->module->active
                || !$cart->nbProducts()) {
                Tools::redirect('index.php?controller=order&step=1');
                return;
            }

            if (Tools::isSubmit('paymentConfirmOrder')) {
                foreach ($paymentInfo as $key => &$value) {
                    $value = Tools::getValue($key);
                }

                $errors = $this->_validatePaymentInfo($paymentInfo, true);
                if (!count($errors)) {

                    /* Odeme onayi; onay verirlerse 3d odemeye gider */
                    $result = $this->_preparePaymentInfo($paymentInfo);
                    if (isset($result) && $result['status'] > 0) {

                        Tools::redirect($result['redirect_url']);
                        return;
                        //$template = 'confirmation.tpl';
                        //$paymentConfirmationInfo = $this->_prepareConfirmationInfo($paymentInfo);
                        //$this->context->smarty->assign('paymentConfirmationInfo', $paymentConfirmationInfo);

                    } else {
                        if (isset($result)) {
                            $this->context->smarty->assign('paymentResponse', $result);
                            $errors[] = $result['status_msg'] . ' - Hata kodu: ' . $result['status'];
                            /* Turk Pos bir hata verirse CC forma doner */
                            $template = 'payment.tpl';
                        }
                    }
                }
            }

            /* Payment normal sureci */
            foreach ($paymentInfo as $key => &$value) {
                $this->context->smarty->assign(array($key => $value));
            }

            $this->context->smarty->assign(array(
                'paymentErrors' => $errors,
                'cartTotal' => Tools::displayPrice($this->context->cart->getOrderTotal(true, Cart::BOTH))
            ));

        } catch (Exception $ex) {

            $this->context->smarty->assign(array(
                'message' => $this->module->l('An error occurred. Error message: ', $this->nameForL) . $ex->getMessage()
            ));

            PrestaShopLogger::addLog('Turk Pos Odeme Bir hata olustu - ' . $ex->getMessage());
            $template = 'error.tpl';
        }

        return $this->setTemplate($template);
    }

    /**
     * @param $info
     * @return array
     */
    protected function _validatePaymentInfo($info, $validateInstallment = false)
    {

        $errors = array();
        $cardNumber = $info['paymentCardNumber1']
            . $info['paymentCardNumber2']
            . $info['paymentCardNumber3']
            . $info['paymentCardNumber4'];
        if (!(isset($info['paymentCardHolder']) && mb_strlen($info['paymentCardHolder']))) {
            $errors['paymentCardHolder'] = $this->module->l('Please enter the card holder name.', $this->nameForL);
        }

        if (!(isset($cardNumber) && mb_strlen($cardNumber) && mb_strlen($cardNumber) == 16)) {
            $errors['paymentCardNumber'] = $this->module->l('Please enter your card number.', $this->nameForL);
        }

        if (!(isset($info['paymentCardCVC']) && mb_strlen($info['paymentCardCVC']) && mb_strlen($info['paymentCardCVC']) == 3)) {
            $errors['paymentCardCVC'] = $this->module->l('Please enter the CVC value of your card.');
        }

        if ($validateInstallment && !(isset($info['paymentInstallment']) && mb_strlen(trim($info['paymentInstallment'])))) {
            $errors['paymentInstallment'] = $this->module->l('Please enter the installment value.', $this->nameForL);
        }

        if ($validateInstallment &&
            !(isset($info['paymentCardMonth']) && mb_strlen(trim($info['paymentCardMonth'])))
            || !(isset($info['paymentCardYear']) && mb_strlen(trim($info['paymentCardYear'])))
        ) {
            $errors['paymentCardExpire'] = $this->module->l('Please enter the expire date value.', $this->nameForL);
        } else {

            $y = $info['paymentCardYear'];
            $m = $info['paymentCardMonth'];
            if (!($y >= date('Y') && $y < date('Y') + 15)) {
                $errors['paymentCardYear'] = $this->module->l('The expiration year is not valid.', $this->nameForL);
            }

            if (!(($m >= 1 && $m <= 12)) || ($m < (int)(date('m')) && $y == date('Y'))) {
                $errors['paymentCardMonth'] = $this->module->l('The expiration month is not valid.', $this->nameForL);
            }
        }

        /*if (isset($info['paymentCardNumber']) && mb_strlen($info['paymentCardNumber'])) {
            $bin = Tools::substr($info['paymentCardNumber'], 0, 6);
            $pos_id = $this->turkPosBinListService->selectVPosByBinNumber($bin);
            if (!isset($pos_id)) {
                $pStr = isset($errors['paymentCardNumber']) ? $errors['paymentCardNumber'] . '<br />' : '';
                $errors['paymentCardNumber'] = $pStr . $this->module->l('Please enter valid card number');
            }
        }*/

        return $errors;
    }

    /**
     * @param $data
     * @return array
     * @throws Exception
     */
    protected function _preparePaymentInfo($data)
    {

        $ccnStripped = str_replace(' ', '', $data['paymentCardNumber1']
            . $data['paymentCardNumber2']
            . $data['paymentCardNumber3']
            . $data['paymentCardNumber4']);
        $paymentMonth = trim($data['paymentCardMonth']);
        $paymentYear = trim($data['paymentCardYear']);
        $payment = array(
            'cc_name' => $data['paymentCardHolder'],
            'cc_number' => $ccnStripped,
            'cc_cvc' => $data['paymentCardCVC'],
            'cc_month' => (int)($paymentMonth),
            'cc_year' => (int)($paymentYear),
            'installment' => (int)($data['paymentInstallment']),
            'status' => 0,
            'status_msg' => null,
            'redirect_url' => null,
            'cart_amount' => null,
            'fee' => null,
            'cart_amount_with_fee' => null,
            'error_url' => null,
            'success_url' => null
        );

        $cart = $this->context->cart;
        $customer = $this->context->customer;
        $bin = Tools::substr($payment['cc_number'], 0, 6);
        $installment = $payment['installment'];

        $authorized = false;
        foreach (Module::getPaymentModules() as $module) {
            if ($module['name'] == $this->module->name) {
                $authorized = true;
            }
        }
        if (!$authorized) {
            throw new Exception($this->module->l('This payment method is not available.', $this->nameForL), 500);
        }

        // Check if customer exists
        $customer = new Customer($cart->id_customer);
        $invoiceAddr = new Address($cart->id_address_invoice);
        if (!Validate::isLoadedObject($customer)) {
            Tools::redirect('index.php?controller=order&step=1');
            return null;
        }


        $pos_id = $this->turkPosBinListService->selectVPosByBinNumber($bin);
        if (!isset($pos_id) || $pos_id <= 0) {
            $pos_id = $this->turkPosBinListService->selectPosIDWithDKK();
            if (!isset($pos_id) || $pos_id <= 0) {
                throw new Exception('TurkPosPaymentPaymentModuleFrontController::_preparePaymentInfo '
                    . ' pos id bilgisi bulunamadi - BIN: ' . $bin);
            }
            error_log("GENEL POS KULLANILACAK ($pos_id)");
        }

        $commission = $this->turkPosCommissionRateService->selectCommissionByPosIdAndInstallment((int)$pos_id,
            $installment);
        if (!isset($commission) || count($commission) == 0) {
            throw new Exception('TurkPosPaymentPaymentModuleFrontController::_preparePaymentInfo '
                . ' komisyon bilgisi bulunamadi - Pos ID: ' . $pos_id);
        }

        $orderTotal = (float)$cart->getOrderTotal(true, Cart::BOTH);
        $fee = number_format((float)Tools::ps_round($orderTotal * ((double)$commission / 100), 2), 2, ',', '');
        $totalWithFee = number_format((float)Tools::ps_round($orderTotal * (1 + (double)$commission / 100), 2), 2, ',',
            '');
        $cart_hash = md5($cart->id . '' . time());
        $secure_key = $customer->secure_key;
        $returnUrl = $this->context->link->getModuleLink('turkpospayment', 'notification',
            array('cart_hash' => $cart_hash, 'secure_key' => $secure_key), true);

        $remoteIp = Tools::getRemoteAddr();
        if (!filter_var($remoteIp, FILTER_VALIDATE_IP) || $remoteIp == '::1') {
            $remoteIp = '0.0.0.0';
        }

        $customerGsm = $invoiceAddr->phone_mobile;
        if (!isset($customer)) {
            $customer = '5555555555';
        }

        $payment = array(
            'cc_name' => $data['paymentCardHolder'],
            'cc_number' => $ccnStripped,
            'cc_cvc' => $data['paymentCardCVC'],
            'cc_month' => sprintf("%02d", (int)($paymentMonth)),
            'cc_year' => (int)($paymentYear),
            'installment' => (int)($data['paymentInstallment']),
            'status' => 0,
            'status_msg' => null,
            'redirect_url' => null,
            'cart_amount' => number_format($orderTotal, 2, ',', ''),
            'fee' => $fee,
            'cart_amount_with_fee' => $totalWithFee,
            'error_url' => $returnUrl,
            'success_url' => $returnUrl,
            'secure_key' => $secure_key,
            'cart_hash' => $cart_hash,
            'process_hash' => null,
            'pos_id' => $pos_id,
            'customer_gsm' => $customerGsm,
            'cart_id' => $cart->id,
            'remote_ip' => $remoteIp,
            'process_id' => null
        );

        $response = $this->turkPosPaymentService->pay($payment);
        if (!isset($response)) {
            throw new Exception("TurkPosPaymentPaymentModuleFrontController::_preparePaymentInfo Turk pos cevap vermedi.");
        }

        $payment['status'] = $response->TP_Islem_OdemeResult->Sonuc;
        $payment['status_msg'] = $response->TP_Islem_OdemeResult->Sonuc_Str;
        $payment['redirect_url'] = $response->TP_Islem_OdemeResult->UCD_URL;
        $payment['process_id'] = $response->TP_Islem_OdemeResult->Islem_ID;

        if ((int)($payment['status']) > 0) {

            $paymentEntity = new TurkPosPaymentEntity();

            $paymentEntity->process_id = $payment['process_id'];
            $paymentEntity->pos_id = $payment['pos_id'];
            $paymentEntity->cart_hash = $payment['cart_hash'];
            $paymentEntity->guid = Configuration::get(TurkPosSettings::TURK_POS_CLIENT_GUID, null);
            $paymentEntity->redirect_url = $payment['redirect_url'];
            $paymentEntity->card_number = $this->turkPosPaymentService->getCardMask($payment['cc_number']);
            $paymentEntity->card_owner = $payment['cc_name'];
            $paymentEntity->cart_id = $payment['cart_id'];
            $paymentEntity->currency_id = $cart->id_currency;
            $paymentEntity->customer_id = $customer->id;
            $paymentEntity->cart_amount = doubleval(str_replace(',', '.', $payment['cart_amount']));
            $paymentEntity->installment_number = $payment['installment'];
            $paymentEntity->owner_gsm = $payment['customer_gsm'];
            $paymentEntity->total_amount = doubleval(str_replace(',', '.', $payment['cart_amount_with_fee']));
            $paymentEntity->process_status = 0;//$payment['status'];
            $paymentEntity->process_status_msg = '3d yonlendirildi...';//;$payment['status_msg'];

            $paymentEntity->save();
        }

        return $payment;
    }
}