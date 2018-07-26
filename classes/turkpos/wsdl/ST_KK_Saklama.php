<?php

class ST_KK_Saklama
{

    /**
     * @var string $GUID
     * @access public
     */
    public $GUID = null;

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
     * @param string $GUID
     * @param string $Sonuc
     * @param string $Sonuc_Str
     * @access public
     */
    public function __construct($GUID, $Sonuc, $Sonuc_Str)
    {
        $this->GUID = $GUID;
        $this->Sonuc = $Sonuc;
        $this->Sonuc_Str = $Sonuc_Str;
    }

}
