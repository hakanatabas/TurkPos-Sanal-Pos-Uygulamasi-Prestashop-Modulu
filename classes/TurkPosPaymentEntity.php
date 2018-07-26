<?php

/**
 * Created by Geliyoo.
 * User: geliyoo
 * Date: 07/10/2017
 * Time: 02:18
 */

class TurkPosPaymentEntity extends BaseEntity
{

    public $id;
    public $guid;
    public $pos_id;
    public $order_id;
    public $cart_id;
    public $cart_hash;
    public $customer_id;
    public $currency_id;
    public $receipt_id;
    public $process_id;
    public $order_process_id;
    public $process_status;
    public $process_status_msg;
    public $card_owner;
    public $card_number;
    public $owner_gsm;
    public $installment_number;
    public $cart_amount;
    public $total_amount;
    public $description;
    public $redirect_url;
    public $date_add;
    public $date_upd;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => TurkPosSettings::TURK_POS_DB_TABLE_PAYMENTS_0,
        'primary' => 'id',
        'fields' => array(
            'id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'guid' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 255
            ),
            'pos_id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'order_id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'cart_id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'customer_id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'currency_id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'cart_hash' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isMd5',
                'size' => 100,
                'required' => true
            ),
            'receipt_id' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'size' => 100
            ),
            'process_id' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'size' => 100
            ),
            'order_process_id' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'size' => 100
            ),
            'process_status' => array('type' => self::TYPE_INT),
            'process_status_msg' => array(
                'type' => self::TYPE_STRING,
                //'validate' => 'isGenericName',
                'size' => 1024
            ),
            'card_owner' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 255
            ),
            'card_number' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 20
            ),
            'owner_gsm' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'size' => 15
            ),
            'installment_number' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'cart_amount' => array('type' => self::TYPE_FLOAT, 'required' => true),
            'total_amount' => array('type' => self::TYPE_FLOAT, 'required' => true),
            'description' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'size' => 1024
            ),
            'redirect_url' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isAbsoluteUrl',
                'size' => 1024,
                'required' => true
            ),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat', 'copy_post' => false),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat', 'copy_post' => false)
        ),
    );
}