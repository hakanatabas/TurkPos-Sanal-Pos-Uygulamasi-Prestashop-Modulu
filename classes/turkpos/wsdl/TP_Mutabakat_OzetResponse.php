<?php

class TP_Mutabakat_OzetResponse
{

    /**
     * @var ST_Genel_Sonuc $TP_Mutabakat_OzetResult
     * @access public
     */
    public $TP_Mutabakat_OzetResult = null;

    /**
     * @param ST_Genel_Sonuc $TP_Mutabakat_OzetResult
     * @access public
     */
    public function __construct($TP_Mutabakat_OzetResult)
    {
        $this->TP_Mutabakat_OzetResult = $TP_Mutabakat_OzetResult;
    }

}
