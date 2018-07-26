<?php

class TP_Islem_Odeme_BKMResponse
{

    /**
     * @var ST_TP_Islem_Odeme_BKM $TP_Islem_Odeme_BKMResult
     * @access public
     */
    public $TP_Islem_Odeme_BKMResult = null;

    /**
     * @param ST_TP_Islem_Odeme_BKM $TP_Islem_Odeme_BKMResult
     * @access public
     */
    public function __construct($TP_Islem_Odeme_BKMResult)
    {
        $this->TP_Islem_Odeme_BKMResult = $TP_Islem_Odeme_BKMResult;
    }

}
