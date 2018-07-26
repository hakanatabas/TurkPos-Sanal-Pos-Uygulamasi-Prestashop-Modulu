<?php

/**
 * Created by Geliyoo.
 * User: geliyoo
 * Date: 07/10/2017
 * Time: 02:18
 */

class TurkPosCommissionRateEntity extends BaseEntity
{

    public $id;
    public $special_rate_sk_id;
    public $client_guid;
    public $virtual_pos_id;
    public $credit_card_brand;
    public $card_brand_image;
    public $credit_card_brand_eng;
    public $installment_rate_1;
    public $installment_rate_2;
    public $installment_rate_3;
    public $installment_rate_4;
    public $installment_rate_5;
    public $installment_rate_6;
    public $installment_rate_7;
    public $installment_rate_8;
    public $installment_rate_9;
    public $installment_rate_10;
    public $installment_rate_11;
    public $installment_rate_12;
    public $date_add;
    public $date_upd;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => TurkPosSettings::TURK_POS_DB_TABLE_COMMISSION_RATES_0,
        'primary' => 'id',
        'fields' => array(
            'id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'special_rate_sk_id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'client_guid' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 255
            ),
            'virtual_pos_id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'credit_card_brand' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 50
            ),
            'card_brand_image' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 255
            ),
            'credit_card_brand_eng' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 50
            ),
            'installment_rate_1' => array('type' => self::TYPE_FLOAT),
            'installment_rate_2' => array('type' => self::TYPE_FLOAT),
            'installment_rate_3' => array('type' => self::TYPE_FLOAT),
            'installment_rate_4' => array('type' => self::TYPE_FLOAT),
            'installment_rate_5' => array('type' => self::TYPE_FLOAT),
            'installment_rate_6' => array('type' => self::TYPE_FLOAT),
            'installment_rate_7' => array('type' => self::TYPE_FLOAT),
            'installment_rate_8' => array('type' => self::TYPE_FLOAT),
            'installment_rate_9' => array('type' => self::TYPE_FLOAT),
            'installment_rate_10' => array('type' => self::TYPE_FLOAT),
            'installment_rate_11' => array('type' => self::TYPE_FLOAT),
            'installment_rate_12' => array('type' => self::TYPE_FLOAT),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat', 'copy_post' => false),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat', 'copy_post' => false)
        ),
    );
}