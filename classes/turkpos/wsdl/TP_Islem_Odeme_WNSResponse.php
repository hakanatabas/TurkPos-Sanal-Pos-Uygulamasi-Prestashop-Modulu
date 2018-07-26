<?php

class TP_Islem_Odeme_WNSResponse
{

    /**
     * @var ST_TP_Islem_Odeme $TP_Islem_Odeme_WNSResult
     * @access public
     */
    public $TP_Islem_Odeme_WNSResult = null;

    /**
     * @param ST_TP_Islem_Odeme $TP_Islem_Odeme_WNSResult
     * @access public
     */
    public function __construct($TP_Islem_Odeme_WNSResult)
    {
        $this->TP_Islem_Odeme_WNSResult = $TP_Islem_Odeme_WNSResult;
    }

}
