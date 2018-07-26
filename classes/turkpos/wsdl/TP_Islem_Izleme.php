<?php

class TP_Islem_Izleme
{

    /**
     * @var ST_WS_Guvenlik $G
     * @access public
     */
    public $G = null;

    /**
     * @var string $GUID
     * @access public
     */
    public $GUID = null;

    /**
     * @var string $Tarih_Bas
     * @access public
     */
    public $Tarih_Bas = null;

    /**
     * @var string $Tarih_Bit
     * @access public
     */
    public $Tarih_Bit = null;

    /**
     * @var string $Islem_Tip
     * @access public
     */
    public $Islem_Tip = null;

    /**
     * @var string $Islem_Durum
     * @access public
     */
    public $Islem_Durum = null;

    /**
     * @param ST_WS_Guvenlik $G
     * @param string $GUID
     * @param string $Tarih_Bas
     * @param string $Tarih_Bit
     * @param string $Islem_Tip
     * @param string $Islem_Durum
     * @access public
     */
    public function __construct($G, $GUID, $Tarih_Bas, $Tarih_Bit, $Islem_Tip, $Islem_Durum)
    {
        $this->G = $G;
        $this->GUID = $GUID;
        $this->Tarih_Bas = $Tarih_Bas;
        $this->Tarih_Bit = $Tarih_Bit;
        $this->Islem_Tip = $Islem_Tip;
        $this->Islem_Durum = $Islem_Durum;
    }

}
