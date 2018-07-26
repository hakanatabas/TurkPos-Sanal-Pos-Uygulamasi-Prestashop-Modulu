<?php

class TP_Ozel_Oran_SK_Liste
{

    /**
     * @var ST_WS_Guvenlik $G
     * @access public
     */
    public $G = null;

    /**
     * @var string $GUID
     * @access public
     */
    public $GUID = null;

    /**
     * @param ST_WS_Guvenlik $G
     * @param string $GUID
     * @access public
     */
    public function __construct($G, $GUID)
    {
        $this->G = $G;
        $this->GUID = $GUID;
    }

}
