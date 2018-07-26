<?php

class TP_Islem_IzlemeResponse
{

    /**
     * @var ST_Genel_Sonuc $TP_Islem_IzlemeResult
     * @access public
     */
    public $TP_Islem_IzlemeResult = null;

    /**
     * @param ST_Genel_Sonuc $TP_Islem_IzlemeResult
     * @access public
     */
    public function __construct($TP_Islem_IzlemeResult)
    {
        $this->TP_Islem_IzlemeResult = $TP_Islem_IzlemeResult;
    }

}
