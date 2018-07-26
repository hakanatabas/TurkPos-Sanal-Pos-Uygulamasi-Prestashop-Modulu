<?php

class ST_Sonuc
{

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
     * @param string $Sonuc
     * @param string $Sonuc_Str
     * @access public
     */
    public function __construct($Sonuc, $Sonuc_Str)
    {
        $this->Sonuc = $Sonuc;
        $this->Sonuc_Str = $Sonuc_Str;
    }

}
