<?php

class TP_Islem_Sorgulama
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
     * @var string $Dekont_ID
     * @access public
     */
    public $Dekont_ID = null;

    /**
     * @var string $Siparis_ID
     * @access public
     */
    public $Siparis_ID = null;

    /**
     * @var string $Islem_ID
     * @access public
     */
    public $Islem_ID = null;

    /**
     * @param ST_WS_Guvenlik $G
     * @param string $GUID
     * @param string $Dekont_ID
     * @param string $Siparis_ID
     * @param string $Islem_ID
     * @access public
     */
    public function __construct($G, $GUID, $Dekont_ID, $Siparis_ID, $Islem_ID)
    {
        $this->G = $G;
        $this->GUID = $GUID;
        $this->Dekont_ID = $Dekont_ID;
        $this->Siparis_ID = $Siparis_ID;
        $this->Islem_ID = $Islem_ID;
    }

}
