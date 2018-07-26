<?php

class TP_Mutabakat_Ozet
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
     * @param ST_WS_Guvenlik $G
     * @param string $GUID
     * @param string $Tarih_Bas
     * @param string $Tarih_Bit
     * @access public
     */
    public function __construct($G, $GUID, $Tarih_Bas, $Tarih_Bit)
    {
        $this->G = $G;
        $this->GUID = $GUID;
        $this->Tarih_Bas = $Tarih_Bas;
        $this->Tarih_Bit = $Tarih_Bit;
    }

}
