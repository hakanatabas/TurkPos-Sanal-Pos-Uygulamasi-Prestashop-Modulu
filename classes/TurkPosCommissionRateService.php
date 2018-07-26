<?php
/**
 * Created by Geliyoo.
 * User: geliyoo
 * Date: 08/10/2017
 * Time: 13:26
 */

class TurkPosCommissionRateService extends BaseService
{

    /**
     * TurkPosCommissionRateService constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function load()
    {

        $data = $this->xmlParse($this->turkPosPaymentProvider->skCommissionRates()->TP_Ozel_Oran_SK_ListeResult->DT_Bilgi->any);
        if (!isset($data) || !isset($data->diffgram)) {
            throw  new Exception("TurkPosCommissionRateService::load komisyon listesi cagrilamadi");
        }

        $liste = $data->diffgram->NewDataSet;

        if (!count($liste)) {
            throw  new Exception("TurkPosCommissionRateService::load komisyon listesi cagrilamadi");
        }

        $list = array();
        foreach ($liste->DT_Ozel_Oranlar_SK as $oran) {

            $o = new TurkPosCommissionRateEntity();

            $o->virtual_pos_id = $oran->SanalPOS_ID;
            $o->card_brand_image = $oran->Kredi_Karti_Banka_Gorsel;
            $o->client_guid = $oran->GUID;
            $o->credit_card_brand = $oran->Kredi_Karti_Banka;
            $o->special_rate_sk_id = $oran->Ozel_Oran_SK_ID;
            $o->credit_card_brand_eng = Tools::strtolower($this->replace_tr($oran->Kredi_Karti_Banka));
            $o->installment_rate_1 = (double)$oran->MO_01;
            $o->installment_rate_2 = (double)$oran->MO_02;
            $o->installment_rate_3 = (double)$oran->MO_03;
            $o->installment_rate_4 = (double)$oran->MO_04;
            $o->installment_rate_5 = (double)$oran->MO_05;
            $o->installment_rate_6 = (double)$oran->MO_06;
            $o->installment_rate_7 = (double)$oran->MO_07;
            $o->installment_rate_8 = (double)$oran->MO_08;
            $o->installment_rate_9 = (double)$oran->MO_09;
            $o->installment_rate_10 = (double)$oran->MO_10;
            $o->installment_rate_11 = (double)$oran->MO_11;
            $o->installment_rate_12 = (double)$oran->MO_12;

            $list[] = $o;
        }

        return $list;
    }

    public function save($object)
    {
        if (!($object instanceof TurkPosCommissionRateEntity)) {
            throw new Exception("Kaydedilecek komisyon nesnesi TurkPosCommissionRateEntity tipinde olmalidir.");
        }

        return $object->save();
    }

    public function refresh()
    {
        $list = $this->load();
        if (!count($list)) {
            return false;
        }


        foreach ($list as $l) {
            if (!$this->save($l)) {
                error_log('TurkPosCommissionRateService::refresh kaydedilemedi!');
            }
            $this->saveBankLogo($l->card_brand_image, $l->credit_card_brand_eng);
        }

        error_log('TurkPosCommissionRateService::refresh tamamlandi.');
        return true;
    }

    /**
     * @return TurkPosCommissionRateEntity
     */
    public function getEntity()
    {
        return new TurkPosCommissionRateEntity();
    }

    /**
     * @param $logoUrl
     */
    public function saveBankLogo($logoUrl, $brand)
    {
        $image = Tools::file_get_contents($logoUrl);
        file_put_contents(TurkPosSettings::TURK_POS_MODULE_DIR . 'views/img/' . $brand . '.png', $image);
    }

    /**
     * @param $pos_id
     * @param $installment
     * @return integer or null
     * @throws Exception
     */
    public function selectCommissionByPosIdAndInstallment($pos_id, $installment)
    {
        $row = DB::getInstance()->getRow(
            'SELECT * FROM ' . $this->getEntity()->getTableName()
            . ' WHERE virtual_pos_id = ' . pSQL($pos_id)
        );

        if ($installment < 1 || $installment > 12) {
            throw new Exception("TurkPosCommissionRateService::selectCommissionByPosIdAndInstallment"
                . " taksit sayisi dogru degildir. 1-12 arasinda olmali.");
        }
        return (isset($row) ? $row['installment_rate_' . $installment] : null);
    }

    /**
     * @param $pos_id
     * @return array|bool|null|object
     */
    public function selectCommissionByPosId($pos_id)
    {
        $row = DB::getInstance()->getRow(
            'SELECT * FROM ' . $this->getEntity()->getTableName()
            . ' WHERE virtual_pos_id = ' . pSQL($pos_id)
        );

        return (isset($row) ? $row : null);
    }

    /**
     * @return array|false|mysqli_result|null|PDOStatement|resource
     */
    public function getCommissions()
    {
        $rows = DB::getInstance()->executeS(
            'SELECT * FROM ' . $this->getEntity()->getTableName()
        );

        return (isset($rows) ? $rows : null);
    }

    /**
     * @param $price
     * @param $installment_rate
     * @param $installment
     * @return array
     */
    public function displayTotalPriceWithCommissionAndInstallment($price, $installment_rate, $installment)
    {
        $total = 0.00;
        $per_installment_total = 0.00;
        if (isset($installment_rate) && doubleval($installment_rate) > 0) {

            $total = (double)Tools::ps_round(
                (double)$price * (1 + (double)$installment_rate / 100), 2
            );
            $per_installment_total = (double)Tools::ps_round(
                (double)$total / (int)$installment, 2
            );

        }

        return array(
            'total' => Tools::displayPrice($total),
            'per_installment_total' => Tools::displayPrice($per_installment_total)
        );
    }
}