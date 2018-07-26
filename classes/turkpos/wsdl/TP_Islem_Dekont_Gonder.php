<?php

class TP_Islem_Dekont_Gonder
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
     * @var string $E_Posta
     * @access public
     */
    public $E_Posta = null;

    /**
     * @param ST_WS_Guvenlik $G
     * @param string $GUID
     * @param string $Dekont_ID
     * @param string $E_Posta
     * @access public
     */
    public function __construct($G, $GUID, $Dekont_ID, $E_Posta)
    {
        $this->G = $G;
        $this->GUID = $GUID;
        $this->Dekont_ID = $Dekont_ID;
        $this->E_Posta = $E_Posta;
    }

}
