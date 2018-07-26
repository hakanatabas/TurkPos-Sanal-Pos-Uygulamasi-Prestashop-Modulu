<?php

/**
 * Created by Geliyoo.
 * User: geliyoo
 * Date: 07/10/2017
 * Time: 02:18
 */

class TurkPosLogEntity extends BaseEntity
{

    public $id;
    public $error_code;
    public $error_msg;
    public $guid;
    public $cart_id;
    public $pos_id;
    public $process_id;
    public $date_add;
    public $date_upd;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => TurkPosSettings::TURK_POS_DB_TABLE_LOGS_0,
        'primary' => 'id',
        'fields' => array(
            'id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'error_code' => array('type' => self::TYPE_INT),
            'error_msg' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 1024
            ),
            'guid' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 255
            ),
            'cart_id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'pos_id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'process_id' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'size' => 100
            ),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat', 'copy_post' => false),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat', 'copy_post' => false)
        ),
    );
}