<?php

class KK_SaklamaResponse
{

    /**
     * @var ST_KK_Saklama $KK_SaklamaResult
     * @access public
     */
    public $KK_SaklamaResult = null;

    /**
     * @param ST_KK_Saklama $KK_SaklamaResult
     * @access public
     */
    public function __construct($KK_SaklamaResult)
    {
        $this->KK_SaklamaResult = $KK_SaklamaResult;
    }

}
