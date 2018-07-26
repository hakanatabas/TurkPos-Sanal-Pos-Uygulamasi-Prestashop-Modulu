<?php
/**
 * Created by Geliyoo.
 * User: geliyoo
 * Date: 08/10/2017
 * Time: 13:26
 */

class TurkPosBinListService extends BaseService
{

    /**
     * TurkPosBinListService constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function load()
    {
        $data = $this->xmlParse($this->turkPosPaymentProvider->binListService()->BIN_SanalPosResult->DT_Bilgi->any);
        if (!isset($data) || !isset($data->diffgram)) {
            throw  new Exception("TurkPosBinListService::load bin listesi cagrilamadi");
        }

        $liste = $data->diffgram->NewDataSet;

        if (!count($liste)) {
            throw  new Exception("TurkPosBinListService::load bin listesi cagrilamadi");
        }

        $list = array();
        foreach ($liste->Temp as $oran) {

            $o = new TurkPosBinListEntity();

            $o->bin_number = $oran->BIN;
            $o->virtual_pos_id = $oran->SanalPOS_ID;
            $o->bank_name = $oran->Kart_Banka;
            $o->card_type = $oran->Kart_Tip;
            $o->dkk = $oran->DKK;

            $list[] = $o;
        }

        return $list;
    }

    public function save($object)
    {
        if (!($object instanceof TurkPosBinListEntity)) {
            throw new Exception("Kaydedilecek BIN nesnesi TurkPosBinListEntity tipinde olmalidir.");
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
                error_log('TurkPosBinListService::refresh kaydedilemedi!');
            }
        }

        error_log('TurkPosBinListService::refresh tamamlandi.');
        return true;
    }

    /**
     * @return TurkPosBinListEntity
     */
    public function getEntity()
    {
        return new TurkPosBinListEntity();
    }

    /**
     * BIN ile ilgili pos ID getirilir.
     * @param $bin
     * @return integer
     */
    public function selectVPosByBinNumber($bin)
    {
        $row = DB::getInstance()->getRow(
            'SELECT * FROM '
            . $this->getEntity()->getTableName()
            . ' WHERE bin_number = ' . pSQL($bin));

        return (isset($row) ? $row['virtual_pos_id'] : null);
    }

    /**
     * @param int $dkk
     * @return array|bool|null|object
     */
    public function selectPosIDWithDKK($dkk = 1)
    {
        $row = DB::getInstance()->getRow(
            'SELECT * FROM ' . $this->getEntity()->getTableName()
            . ' WHERE dkk = ' . pSQL($dkk)
        );

        return (isset($row) ? $row['virtual_pos_id'] : null);
    }
}

/**
 * Interface TurkPosBinListCardTypes
 */
interface TurkPosBinListCardTypes
{
    const CREDIT_CARD = 'Kredi Kartı';
    const DEBIT_CARD = 'Debit Kart';
}