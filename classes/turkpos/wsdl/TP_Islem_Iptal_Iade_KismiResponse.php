<?php

class TP_Islem_Iptal_Iade_KismiResponse
{

    /**
     * @var ST_Sonuc $TP_Islem_Iptal_Iade_KismiResult
     * @access public
     */
    public $TP_Islem_Iptal_Iade_KismiResult = null;

    /**
     * @param ST_Sonuc $TP_Islem_Iptal_Iade_KismiResult
     * @access public
     */
    public function __construct($TP_Islem_Iptal_Iade_KismiResult)
    {
        $this->TP_Islem_Iptal_Iade_KismiResult = $TP_Islem_Iptal_Iade_KismiResult;
    }

}
