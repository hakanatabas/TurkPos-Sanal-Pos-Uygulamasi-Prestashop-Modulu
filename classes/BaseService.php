<?php
/**
 * Created by Geliyoo.
 * User: geliyoo
 * Date: 08/10/2017
 * Time: 15:18
 */

abstract class BaseService
{

    protected $turkPosPaymentProvider;

    /**
     * TurkPosBinListService constructor.
     */
    public function __construct()
    {
        $this->turkPosPaymentProvider = new TurkPosPaymentProvider();
    }

    /**
     * @return mixed
     */
    abstract public function getEntity();

    /**
     * Tum bilgileri siler...
     *
     */
    public function deleteAll()
    {
        $ent = $this->getEntity();
        DB::getInstance(_PS_USE_SQL_SLAVE_)->execute('DELETE FROM ' . $ent->getTableName());
        error_log($ent->getTableName() . ' tablosu icerikleri silindi.');
    }

    /**
     * @param $xmlString
     * @return SimpleXMLElement
     */
    public function xmlParse($xmlString)
    {
        $xmlstr = "<?xml version='1.0' standalone='yes'?><root>" . $xmlString . "</root>";
        $xmlstr = str_replace(array("diffgr:", "msdata:"), '', $xmlstr);
        return simplexml_load_string($xmlstr);
    }

    /**
     * @param $text
     * @return mixed
     */
    public function replace_tr($text, $onlyChar = false)
    {
        $text = trim($text);
        $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ' ');
        $replace = array('c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', '_');
        if ($onlyChar) {
            $replace = array('c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u');
        }
        $new_text = str_replace($search, $replace, $text);
        return $new_text;
    }

    /**
     * @param $pan
     * @return string
     */
    public function getCardMask($pan)
    {
        $bin = Tools::substr($pan, 0, 4);
        $card = Tools::substr($pan, -4);
        $asterisk = str_repeat('*', Tools::strlen($pan) - 10);
        return $bin . $asterisk . $card;
    }

    /**
     * @param $val
     * @param $decimal
     * @param string $decS
     * @param string $thousS
     * @return float
     */
    public function number_format($val, $decimal = 2, $decS = ',', $thousS = '')
    {
        return (double)number_format((double)Tools::ps_round($val, $decimal), $decimal, $decS, $thousS);
    }
}