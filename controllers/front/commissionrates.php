<?php

/**
 * Class TurkPosPaymentAjaxModuleFrontController
 */

class TurkPosPaymentCommissionRatesModuleFrontController extends ModuleFrontController
{
    protected $turkPosBinListService;
    protected $turkPosCommissionRateService;

    protected $nameForL = 'commissionrates';

    /**
     *
     */
    public function initContent()
    {

        $this->turkPosBinListService = new TurkPosBinListService();
        $this->turkPosCommissionRateService = new TurkPosCommissionRateService();
        $this->ajax = true;
        parent::initContent();
    }

    /**
     *
     */
    public function postProcess()
    {
        $secure_key = $this->context->cart->secure_key;
        if (!isset($secure_key)) {
            $this->ajaxDie("{'error_msg': 'Context bulunamadi....'}");
        }
    }

    /**
     *
     */
    public function displayAjax()
    {
        try {

            $this->ajaxDie(Tools::jsonEncode($this->prepareInstallmentInfo(
                Tools::getValue('paymentCardNumber', null)
            ))
            );

        } catch (Exception $ex) {
            $this->ajaxDie("{'error_message': '" . $ex->getMessage() . "'}");
        }
    }

    /**
     * @param $cardNumber
     * @return array
     * @throws Exception
     */
    protected function prepareInstallmentInfo($cardNumber)
    {


        $cart = $this->context->cart;
        $bin = Tools::substr($cardNumber, 0, 6);

        $pos_id = $this->turkPosBinListService->selectVPosByBinNumber($bin);
        if (!isset($pos_id) || $pos_id <= 0) {
            $pos_id = $this->turkPosBinListService->selectPosIDWithDKK();
            if (!isset($pos_id) || $pos_id <= 0) {
                throw new Exception('TurkPosPaymentPaymentModuleFrontController::_prepareInstallmentInfo '
                    . ' pos id bilgisi bulunamadi - BIN: ' . $bin);
            }
        }

        $commission = $this->turkPosCommissionRateService->selectCommissionByPosId((int)$pos_id);
        if (!isset($commission) || count($commission) == 0) {
            throw new Exception('TurkPosPaymentPaymentModuleFrontController::_prepareInstallmentInfo '
                . ' komisyon bilgisi bulunamadi - Pos ID: ' . $pos_id);
        }

        $result = array(
            'virtual_pos_id' => $pos_id,
            'bin_number' => $bin,
            'credit_card_brand' => $commission['credit_card_brand'],
            'credit_card_brand_eng' => $commission['credit_card_brand_eng'],
            'cart_amount' => Tools::displayPriceSmarty(array(
                'price' => (float)$cart->getOrderTotal(true, Cart::BOTH),
                'currency' => $cart->id_currency
            ), $this->context->smarty)
        );

        $result['installment_rates'] = array(
            '1' => (double)$commission['installment_rate_1'],
            '2' => (double)$commission['installment_rate_2'],
            '3' => (double)$commission['installment_rate_3'],
            '4' => (double)$commission['installment_rate_4'],
            '5' => (double)$commission['installment_rate_5'],
            '6' => (double)$commission['installment_rate_6'],
            '7' => (double)$commission['installment_rate_7'],
            '8' => (double)$commission['installment_rate_8'],
            '9' => (double)$commission['installment_rate_9'],
            '10' => (double)$commission['installment_rate_10'],
            '11' => (double)$commission['installment_rate_11'],
            '12' => (double)$commission['installment_rate_12']
        );

        $orderTotal = (float)$cart->getOrderTotal(true, Cart::BOTH);
        $fee = array();
        $totalWithFee = array();
        foreach ($result['installment_rates'] as $key => $val) {
            if ($val < 0) {
                continue;
            }
            $valx = $val < 0 ? 0 : $val;
            $fee[$key] = Tools::displayPriceSmarty(array(
                'price' => (float)Tools::ps_round($orderTotal * ($valx / 100), 2),
                'currency' => $cart->id_currency
            ), $this->context->smarty);
            $totalWithFee[$key] = Tools::displayPriceSmarty(array(
                'price' => (float)Tools::ps_round($orderTotal * (1 + $valx / 100), 2),
                'currency' => $cart->id_currency
            ), $this->context->smarty);
        }

        $result['installment_fees'] = $fee;
        $result['installment_totals'] = $totalWithFee;

        return $result;
    }
}
