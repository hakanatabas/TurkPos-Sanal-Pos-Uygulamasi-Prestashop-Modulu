<?php
/**
 * Created by Geliyoo.
 * User: geliyoo
 * Date: 08/10/2017
 * Time: 13:26
 */

class TurkPosPaymentService extends BaseService
{

    /**
     * TurkPosPaymentService constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return TurkPosPaymentEntity
     */
    public function getEntity()
    {
        return new TurkPosPaymentEntity();
    }

    /**
     * @param $vpos_id
     * @param $installment
     * @param $cartAmount
     * @param $carAmountWithFee
     * @param $errorUrl
     * @param $successUrl
     * @return SHA2B64Response
     */
    public function processHash($vpos_id, $installment, $cartAmount, $carAmountWithFee, $errorUrl, $successUrl)
    {

        $str = $vpos_id . $installment . $cartAmount . $carAmountWithFee . $errorUrl . $successUrl;

        return $this->turkPosPaymentProvider->SHA2B64($str)->SHA2B64Result;
    }

    /**
     * @param $params
     * @return TP_Islem_OdemeResponse
     */
    public function pay($params)
    {

        $process_hash = $this->processHash(
            $params['pos_id'],
            $params['installment'],
            $params['cart_amount'],
            $params['cart_amount_with_fee'],
            $params['error_url'],
            $params['success_url']
        );
        $params['process_hash'] = $process_hash;

        return $this->turkPosPaymentProvider->tpIslemOdeme($params);
    }

    /**
     * @param $hash
     * @return array|bool|null|object
     */
    public function getEntityWithCartHash($hash)
    {
        $row = DB::getInstance()->getRow(
            'SELECT * FROM ' . $this->getEntity()->getTableName()
            . ' WHERE cart_hash = \'' . pSQL($hash) . '\''
        );

        return (isset($row) ? $row : null);
    }

    /**
     * @param $order_id
     * @return array|bool|null|object
     */
    public function getEntityWithOrderId($order_id)
    {
        $row = DB::getInstance()->getRow(
            'SELECT * FROM ' . $this->getEntity()->getTableName()
            . ' WHERE order_id = \'' . pSQL($order_id) . '\''
        );

        return (isset($row) ? $row : null);
    }

    /**
     * @param $cart_id
     * @return array|false|mysqli_result|null|PDOStatement|resource
     */
    public function getEntityWithCartId($cart_id)
    {
        $rows = DB::getInstance()->executeS(
            'SELECT * FROM ' . $this->getEntity()->getTableName()
            . ' WHERE cart_id = \'' . pSQL($cart_id) . '\''
        );

        return (isset($rows) ? $rows : null);
    }
}