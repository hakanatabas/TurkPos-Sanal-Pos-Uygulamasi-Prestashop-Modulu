<?php

class TP_Islem_Iptal_Iade
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
     * @var string $Durum
     * @access public
     */
    public $Durum = null;

    /**
     * @var string $Dekont_ID
     * @access public
     */
    public $Dekont_ID = null;

    /**
     * @param ST_WS_Guvenlik $G
     * @param string $GUID
     * @param string $Durum
     * @param string $Dekont_ID
     * @access public
     */
    public function __construct($G, $GUID, $Durum, $Dekont_ID)
    {
        $this->G = $G;
        $this->GUID = $GUID;
        $this->Durum = $Durum;
        $this->Dekont_ID = $Dekont_ID;
    }

}
