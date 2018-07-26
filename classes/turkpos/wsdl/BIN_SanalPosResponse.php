<?php

class BIN_SanalPosResponse
{

    /**
     * @var ST_Genel_Sonuc $BIN_SanalPosResult
     * @access public
     */
    public $BIN_SanalPosResult = null;

    /**
     * @param ST_Genel_Sonuc $BIN_SanalPosResult
     * @access public
     */
    public function __construct($BIN_SanalPosResult)
    {
        $this->BIN_SanalPosResult = $BIN_SanalPosResult;
    }

}
