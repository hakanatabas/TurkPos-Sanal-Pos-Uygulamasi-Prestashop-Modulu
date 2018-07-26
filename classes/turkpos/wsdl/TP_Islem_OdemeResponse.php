<?php

class TP_Islem_OdemeResponse
{

    /**
     * @var ST_TP_Islem_Odeme $TP_Islem_OdemeResult
     * @access public
     */
    public $TP_Islem_OdemeResult = null;

    /**
     * @param ST_TP_Islem_Odeme $TP_Islem_OdemeResult
     * @access public
     */
    public function __construct($TP_Islem_OdemeResult)
    {
        $this->TP_Islem_OdemeResult = $TP_Islem_OdemeResult;
    }

}
