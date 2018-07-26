<?php

class TP_Islem_Iptal_IadeResponse
{

    /**
     * @var ST_Sonuc $TP_Islem_Iptal_IadeResult
     * @access public
     */
    public $TP_Islem_Iptal_IadeResult = null;

    /**
     * @param ST_Sonuc $TP_Islem_Iptal_IadeResult
     * @access public
     */
    public function __construct($TP_Islem_Iptal_IadeResult)
    {
        $this->TP_Islem_Iptal_IadeResult = $TP_Islem_Iptal_IadeResult;
    }

}
