<?php

/**
 * Created by Geliyoo.
 * User: geliyoo
 * Date: 07/10/2017
 * Time: 02:18
 */

class TurkPosBinListEntity extends BaseEntity
{

    public $id;
    public $bin_number;
    public $virtual_pos_id;
    public $bank_name;
    public $dkk;
    public $card_type;
    public $date_add;
    public $date_upd;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => TurkPosSettings::TURK_POS_DB_TABLE_BIN_LIST_0,
        'primary' => 'id',
        'fields' => array(
            'id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'bin_number' => array('type' => self::TYPE_INT, 'required' => true),
            'virtual_pos_id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'bank_name' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 255
            ),
            'dkk' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'card_type' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 50
            ),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat', 'copy_post' => false),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat', 'copy_post' => false)
        ),
    );
}