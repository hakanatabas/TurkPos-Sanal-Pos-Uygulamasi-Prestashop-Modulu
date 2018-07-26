<?php

class ST_Genel_Sonuc
{

    /**
     * @var DT_Bilgi $DT_Bilgi
     * @access public
     */
    public $DT_Bilgi = null;

    /**
     * @var string $Sonuc
     * @access public
     */
    public $Sonuc = null;

    /**
     * @var string $Sonuc_Str
     * @access public
     */
    public $Sonuc_Str = null;

    /**
     * @param DT_Bilgi $DT_Bilgi
     * @param string $Sonuc
     * @param string $Sonuc_Str
     * @access public
     */
    public function __construct($DT_Bilgi, $Sonuc, $Sonuc_Str)
    {
        $this->DT_Bilgi = $DT_Bilgi;
        $this->Sonuc = $Sonuc;
        $this->Sonuc_Str = $Sonuc_Str;
    }

}
