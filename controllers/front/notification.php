<?php
/**
 * notification.php
 *
 * Main file of the module
 *
 * @author  Geliyoo <eticaret@geliyoo.com>
 * @version 1.0.0
 * @see     PaymentModuleCore
 */

/**
 * This class receives a POST request from the PSP and creates the PrestaShop
 * order according to the request parameters
 **/
class TurkPosPaymentNotificationModuleFrontController extends ModuleFrontController
{

    public $ssl = true;
    protected $turkPosPaymentService;

    protected $nameForL = 'notification';

    /**
     *
     */
    public function initContent()
    {
        $this->display_column_left = false;
        $this->display_column_right = false;
        parent::initContent();
    }
    /*
     * Handles the Instant Payment Notification
     *
     * @todo You probably have to register the following notification URL on
     * the PSP side : http://yourstore.com/index.php?fc=module&module=turkpospayment&controller=notification
     * @return bool
     */
    public function postProcess()
    {
        // We don't do anything if the module has been disabled by the merchant
        if ($this->module->active == false) {
            die;
        }

        $template = 'error.tpl';
        $cart_hash = Tools::getValue('cart_hash', null);
        $rs_secure_key = Tools::getValue('secure_key', null);
        //
        $tp_status = Tools::getValue('TURKPOS_RETVAL_Sonuc', 0);
        $tp_status_msg = Tools::getValue('TURKPOS_RETVAL_Sonuc_Str', null);
        $tp_receipt_id = Tools::getValue('TURKPOS_RETVAL_Dekont_ID', 0);
        $tp_process_id = Tools::getValue('TURKPOS_RETVAL_Siparis_ID', 0);

        try {

            $this->turkPosPaymentService = new TurkPosPaymentService();

            if (!isset($rs_secure_key) || empty($rs_secure_key)) {
                throw new Exception("Secure key gecersiz.");
            }

            error_log(" *** this" . $this->context->customer->secure_key);
            error_log(" *** rs " . $rs_secure_key);

            if ($this->context->customer->secure_key != $rs_secure_key) {
                throw new Exception("Customer ile odeme secure key uyumsuz.");
            }

            $payment = $this->turkPosPaymentService->getEntityWithCartHash($cart_hash);
            if (!isset($payment) || !count($payment)) {
                throw new Exception("Cart ID gecerli degildir.");
            }

            if (!isset($tp_process_id) || $tp_process_id == 0) {
                throw new Exception("Siparis ID gecersiz.");
            }

            if ((isset($payment['receipt_id']) && !empty($payment['receipt_id'])) || (isset($payment['order_id']) && (int)($payment['order_id'] > 0))) {
                //TODO: daha once odenmis gorunen bir odeme bilgisi geldi log a yaz.
                throw new Exception("Bu siparis icin odeme zaten alinmis. Gecersiz islem.");
            }

            //
            $cart_id = $payment['cart_id'];
            $customer_id = $payment['customer_id'];
            $amount = $payment['cart_amount'];

            $context = Context::getContext();
            $context->cart = new Cart((int)$cart_id);
            $context->customer = new Customer((int)$customer_id);
            $context->currency = new Currency((int)$context->cart->id_currency);
            $context->language = new Language((int)$context->customer->id_lang);

            $secure_key = $context->customer->secure_key;
            $module_name = $this->module->displayName;
            $currency_id = (int)$context->currency->id;

            if ($rs_secure_key != $secure_key) {
                //TODO:odeme yapilan ide tablodaki musteri uyumsuz log a yaz.
                throw new Exception("Odeme yapan musteri ile isleme gonderilen musteri uyumsuz.");
            }

            if ((int)($tp_status) > 0 && (int)($tp_receipt_id) > 0) {

                $payment_status = Configuration::get('PS_OS_PAYMENT');
                $message = $this->module->l('Payment accepted', $this->nameForL);
                // Order process
                $this->module->validateOrder(
                    $cart_id,
                    $payment_status,
                    $amount,
                    $module_name,
                    $message,
                    array('transaction_id', $tp_receipt_id),
                    $currency_id,
                    false,
                    $secure_key
                );

                $currentOrder = $this->module->currentOrder;
                if (!isset($currentOrder)) {
                    throw new Exception('Odeme alindi ama siparis olusmadı! '
                        . ' - islemID: ' . $tp_process_id
                        . ' - islem sonuc MSG: ' . $tp_status_msg
                        . ' - islem sonuc kodu: ' . $tp_status
                    );
                }

                $paymentEntity = new TurkPosPaymentEntity($payment['ID']);

                $paymentEntity->order_id = $this->module->currentOrder;
                $paymentEntity->receipt_id = $tp_receipt_id;
                $paymentEntity->order_process_id = $tp_process_id;
                $paymentEntity->process_status = $tp_status;
                $paymentEntity->process_status_msg = mb_convert_encoding($tp_status_msg, 'UTF-8');

                $paymentEntity->save();

                $paymentInfo = array(
                    'order_reference' => $this->module->currentOrderReference,
                    'message' => $message,
                    'order_detail_link' => ''
                );

                Tools::redirect(
                    'index.php?controller=order-confirmation&id_cart=' . $cart_id
                    . '&id_module=' . $this->module->id
                    . '&id_order=' . $currentOrder
                    . '&key=' . $secure_key
                    . '&cart_hash=' . $cart_hash
                );

                return;
            } else {

                $paymentEntity = new TurkPosPaymentEntity($payment['ID']);

                $paymentEntity->order_process_id = $tp_process_id;
                $paymentEntity->process_status = $tp_status;
                $paymentEntity->process_status_msg = mb_convert_encoding($tp_status_msg, 'UTF-8');

                $paymentEntity->save();

                $this->context->smarty->assign(array(
                    'message' => $tp_status_msg,
                    'process_id' => $tp_process_id,
                    'code' => $tp_status
                ));

                PrestaShopLogger::addLog(
                    'Turk Pos Odeme islemi basarisiz. - '
                    . ' - islemID: ' . $tp_process_id
                    . ' - islem sonuc MSG: ' . $tp_status_msg
                    . ' - islem sonuc kodu: ' . $tp_status
                    . ' - Karttaki isim: ' . $payment['card_owner']
                    . ' - Kart No: ' . $payment['card_number']
                );

            }

        } catch (Exception $e) {

            $message = $this->module->l('Payment Error.', $this->nameForL);
            $this->context->smarty->assign(array(
                'message' => $this->module->l('An error occurred. Error message: ', $this->nameForL) . $e->getMessage()
            ));

            PrestaShopLogger::addLog('Turk Pos Odeme Bir hata olustu - ' . $e->getMessage());

        }

        $this->context->smarty->assign(array(
            'paymentErrors' => null
        ));

        return $this->setTemplate($template);
    }
}
