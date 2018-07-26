<?php

class BIN_SanalPos
{

    /**
     * @var ST_WS_Guvenlik $G
     * @access public
     */
    public $G = null;

    /**
     * @var string $BIN
     * @access public
     */
    public $BIN = null;

    /**
     * @param ST_WS_Guvenlik $G
     * @param string $BIN
     * @access public
     */
    public function __construct($G, $BIN)
    {
        $this->G = $G;
        $this->BIN = $BIN;
    }

}
