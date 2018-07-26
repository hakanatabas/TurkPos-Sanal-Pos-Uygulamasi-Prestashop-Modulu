<?php

class ST_TP_Islem_Odeme
{

    /**
     * @var int $Islem_ID
     * @access public
     */
    public $Islem_ID = null;

    /**
     * @var string $UCD_URL
     * @access public
     */
    public $UCD_URL = null;

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
     * @param int $Islem_ID
     * @param string $UCD_URL
     * @param string $Sonuc
     * @param string $Sonuc_Str
     * @access public
     */
    public function __construct($Islem_ID, $UCD_URL, $Sonuc, $Sonuc_Str)
    {
        $this->Islem_ID = $Islem_ID;
        $this->UCD_URL = $UCD_URL;
        $this->Sonuc = $Sonuc;
        $this->Sonuc_Str = $Sonuc_Str;
    }

}
