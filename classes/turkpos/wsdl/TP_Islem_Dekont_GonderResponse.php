<?php

class TP_Islem_Dekont_GonderResponse
{

    /**
     * @var ST_Sonuc $TP_Islem_Dekont_GonderResult
     * @access public
     */
    public $TP_Islem_Dekont_GonderResult = null;

    /**
     * @param ST_Sonuc $TP_Islem_Dekont_GonderResult
     * @access public
     */
    public function __construct($TP_Islem_Dekont_GonderResult)
    {
        $this->TP_Islem_Dekont_GonderResult = $TP_Islem_Dekont_GonderResult;
    }

}
