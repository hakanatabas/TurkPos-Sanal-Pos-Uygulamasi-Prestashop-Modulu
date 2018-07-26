<?php

class TP_Islem_Iptal_Iade_Kismi
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
     * @var string $Durum
     * @access public
     */
    public $Durum = null;

    /**
     * @var string $Dekont_ID
     * @access public
     */
    public $Dekont_ID = null;

    /**
     * @var float $Tutar
     * @access public
     */
    public $Tutar = null;

    /**
     * @param ST_WS_Guvenlik $G
     * @param string $GUID
     * @param string $Durum
     * @param string $Dekont_ID
     * @param float $Tutar
     * @access public
     */
    public function __construct($G, $GUID, $Durum, $Dekont_ID, $Tutar)
    {
        $this->G = $G;
        $this->GUID = $GUID;
        $this->Durum = $Durum;
        $this->Dekont_ID = $Dekont_ID;
        $this->Tutar = $Tutar;
    }

}
