<?php

class TP_Ozel_Oran_SK_ListeResponse
{

    /**
     * @var ST_Genel_Sonuc $TP_Ozel_Oran_SK_ListeResult
     * @access public
     */
    public $TP_Ozel_Oran_SK_ListeResult = null;

    /**
     * @param ST_Genel_Sonuc $TP_Ozel_Oran_SK_ListeResult
     * @access public
     */
    public function __construct($TP_Ozel_Oran_SK_ListeResult)
    {
        $this->TP_Ozel_Oran_SK_ListeResult = $TP_Ozel_Oran_SK_ListeResult;
    }

}
