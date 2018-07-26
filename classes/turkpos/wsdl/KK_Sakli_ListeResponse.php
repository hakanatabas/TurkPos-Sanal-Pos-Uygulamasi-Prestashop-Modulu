<?php

class KK_Sakli_ListeResponse
{

    /**
     * @var ST_Genel_Sonuc $KK_Sakli_ListeResult
     * @access public
     */
    public $KK_Sakli_ListeResult = null;

    /**
     * @param ST_Genel_Sonuc $KK_Sakli_ListeResult
     * @access public
     */
    public function __construct($KK_Sakli_ListeResult)
    {
        $this->KK_Sakli_ListeResult = $KK_Sakli_ListeResult;
    }

}
