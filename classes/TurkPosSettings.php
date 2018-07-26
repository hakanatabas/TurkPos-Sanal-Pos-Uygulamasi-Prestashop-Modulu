<?php
/**
 * Modul temel tanimlari burada olacak.
 *
 * Created by Geliyoo.
 * User: geliyoo
 */

interface TurkPosSettings
{
    /* MODULE INFO */
    const TURK_POS_IS_LIVE = 'TURK_POS_IS_LIVE';
    const TURK_POS_DB_PREFIX = 'turk_pos_';
    const TURK_POS_MODULE_NAME = 'turkpospayment';
    const TURK_POS_MODULE_DIR = _PS_MODULE_DIR_ . self::TURK_POS_MODULE_NAME . '/';

    /* TABLES */
    const TURK_POS_DB_TABLE_BIN_LIST_0 = self::TURK_POS_DB_PREFIX . 'bin_list';
    const TURK_POS_DB_TABLE_COMMISSION_RATES_0 = self::TURK_POS_DB_PREFIX . 'commission_rates';
    const TURK_POS_DB_TABLE_LOGS_0 = self::TURK_POS_DB_PREFIX . 'logs';
    const TURK_POS_DB_TABLE_PAYMENTS_0 = self::TURK_POS_DB_PREFIX . 'payments';

    const TURK_POS_DB_TABLE_BIN_LIST = _DB_PREFIX_ . self::TURK_POS_DB_TABLE_BIN_LIST_0;
    const TURK_POS_DB_TABLE_COMMISSION_RATES = _DB_PREFIX_ . self::TURK_POS_DB_TABLE_COMMISSION_RATES_0;
    const TURK_POS_DB_TABLE_LOGS = _DB_PREFIX_ . self::TURK_POS_DB_TABLE_LOGS_0;
    const TURK_POS_DB_TABLE_PAYMENTS = _DB_PREFIX_ . self::TURK_POS_DB_TABLE_PAYMENTS_0;

    /* API INFO */
    const TURK_POS_CLIENT_CODE = 'TURK_POS_CLIENT_CODE';
    const TURK_POS_CLIENT_USERNAME = 'TURK_POS_CLIENT_USERNAME';
    const TURK_POS_CLIENT_PASSWORD = 'TURK_POS_CLIENT_PASSWORD';
    const TURK_POS_CLIENT_GUID = 'TURK_POS_CLIENT_GUID';
    const TURK_POST_WSDL_URL_FOR_TEST = 'TURK_POST_WSDL_URL_FOR_TEST';
    const TURK_POST_WSDL_URL_FOR_PROD = 'TURK_POST_WSDL_URL_FOR_PROD';

}