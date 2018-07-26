<?php

class TP_Islem_SorgulamaResponse
{

    /**
     * @var ST_Genel_Sonuc $TP_Islem_SorgulamaResult
     * @access public
     */
    public $TP_Islem_SorgulamaResult = null;

    /**
     * @param ST_Genel_Sonuc $TP_Islem_SorgulamaResult
     * @access public
     */
    public function __construct($TP_Islem_SorgulamaResult)
    {
        $this->TP_Islem_SorgulamaResult = $TP_Islem_SorgulamaResult;
    }

}
