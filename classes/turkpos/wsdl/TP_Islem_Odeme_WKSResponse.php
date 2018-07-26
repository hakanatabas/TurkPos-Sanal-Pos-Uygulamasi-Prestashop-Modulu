<?php

class TP_Islem_Odeme_WKSResponse
{

    /**
     * @var ST_TP_Islem_Odeme $TP_Islem_Odeme_WKSResult
     * @access public
     */
    public $TP_Islem_Odeme_WKSResult = null;

    /**
     * @param ST_TP_Islem_Odeme $TP_Islem_Odeme_WKSResult
     * @access public
     */
    public function __construct($TP_Islem_Odeme_WKSResult)
    {
        $this->TP_Islem_Odeme_WKSResult = $TP_Islem_Odeme_WKSResult;
    }

}
