<?php

class TP_Islem_Odeme_WNS
{

    /**
     * @var ST_WS_Guvenlik $G
     * @access public
     */
    public $G = null;

    /**
     * @var int $SanalPOS_ID
     * @access public
     */
    public $SanalPOS_ID = null;

    /**
     * @var string $GUID
     * @access public
     */
    public $GUID = null;

    /**
     * @var string $KK_Sahibi
     * @access public
     */
    public $KK_Sahibi = null;

    /**
     * @var string $KK_No
     * @access public
     */
    public $KK_No = null;

    /**
     * @var string $KK_SK_Ay
     * @access public
     */
    public $KK_SK_Ay = null;

    /**
     * @var string $KK_SK_Yil
     * @access public
     */
    public $KK_SK_Yil = null;

    /**
     * @var string $KK_CVC
     * @access public
     */
    public $KK_CVC = null;

    /**
     * @var string $KK_Sahibi_GSM
     * @access public
     */
    public $KK_Sahibi_GSM = null;

    /**
     * @var string $Hata_URL
     * @access public
     */
    public $Hata_URL = null;

    /**
     * @var string $Basarili_URL
     * @access public
     */
    public $Basarili_URL = null;

    /**
     * @var string $Siparis_ID
     * @access public
     */
    public $Siparis_ID = null;

    /**
     * @var string $Siparis_Aciklama
     * @access public
     */
    public $Siparis_Aciklama = null;

    /**
     * @var int $Taksit
     * @access public
     */
    public $Taksit = null;

    /**
     * @var string $Islem_Tutar
     * @access public
     */
    public $Islem_Tutar = null;

    /**
     * @var string $Toplam_Tutar
     * @access public
     */
    public $Toplam_Tutar = null;

    /**
     * @var string $Islem_Hash
     * @access public
     */
    public $Islem_Hash = null;

    /**
     * @var string $Islem_Guvenlik_Tip
     * @access public
     */
    public $Islem_Guvenlik_Tip = null;

    /**
     * @var string $Islem_ID
     * @access public
     */
    public $Islem_ID = null;

    /**
     * @var string $IPAdr
     * @access public
     */
    public $IPAdr = null;

    /**
     * @var string $Ref_URL
     * @access public
     */
    public $Ref_URL = null;

    /**
     * @var string $Data1
     * @access public
     */
    public $Data1 = null;

    /**
     * @var string $Data2
     * @access public
     */
    public $Data2 = null;

    /**
     * @var string $Data3
     * @access public
     */
    public $Data3 = null;

    /**
     * @var string $Data4
     * @access public
     */
    public $Data4 = null;

    /**
     * @var string $Data5
     * @access public
     */
    public $Data5 = null;

    /**
     * @param ST_WS_Guvenlik $G
     * @param int $SanalPOS_ID
     * @param string $GUID
     * @param string $KK_Sahibi
     * @param string $KK_No
     * @param string $KK_SK_Ay
     * @param string $KK_SK_Yil
     * @param string $KK_CVC
     * @param string $KK_Sahibi_GSM
     * @param string $Hata_URL
     * @param string $Basarili_URL
     * @param string $Siparis_ID
     * @param string $Siparis_Aciklama
     * @param int $Taksit
     * @param string $Islem_Tutar
     * @param string $Toplam_Tutar
     * @param string $Islem_Hash
     * @param string $Islem_Guvenlik_Tip
     * @param string $Islem_ID
     * @param string $IPAdr
     * @param string $Ref_URL
     * @param string $Data1
     * @param string $Data2
     * @param string $Data3
     * @param string $Data4
     * @param string $Data5
     * @access public
     */
    public function __construct(
        $G,
        $SanalPOS_ID,
        $GUID,
        $KK_Sahibi,
        $KK_No,
        $KK_SK_Ay,
        $KK_SK_Yil,
        $KK_CVC,
        $KK_Sahibi_GSM,
        $Hata_URL,
        $Basarili_URL,
        $Siparis_ID,
        $Siparis_Aciklama,
        $Taksit,
        $Islem_Tutar,
        $Toplam_Tutar,
        $Islem_Hash,
        $Islem_Guvenlik_Tip,
        $Islem_ID,
        $IPAdr,
        $Ref_URL,
        $Data1,
        $Data2,
        $Data3,
        $Data4,
        $Data5
    ) {
        $this->G = $G;
        $this->SanalPOS_ID = $SanalPOS_ID;
        $this->GUID = $GUID;
        $this->KK_Sahibi = $KK_Sahibi;
        $this->KK_No = $KK_No;
        $this->KK_SK_Ay = $KK_SK_Ay;
        $this->KK_SK_Yil = $KK_SK_Yil;
        $this->KK_CVC = $KK_CVC;
        $this->KK_Sahibi_GSM = $KK_Sahibi_GSM;
        $this->Hata_URL = $Hata_URL;
        $this->Basarili_URL = $Basarili_URL;
        $this->Siparis_ID = $Siparis_ID;
        $this->Siparis_Aciklama = $Siparis_Aciklama;
        $this->Taksit = $Taksit;
        $this->Islem_Tutar = $Islem_Tutar;
        $this->Toplam_Tutar = $Toplam_Tutar;
        $this->Islem_Hash = $Islem_Hash;
        $this->Islem_Guvenlik_Tip = $Islem_Guvenlik_Tip;
        $this->Islem_ID = $Islem_ID;
        $this->IPAdr = $IPAdr;
        $this->Ref_URL = $Ref_URL;
        $this->Data1 = $Data1;
        $this->Data2 = $Data2;
        $this->Data3 = $Data3;
        $this->Data4 = $Data4;
        $this->Data5 = $Data5;
    }

}
