<?php

class KK_Sakli_Liste
{

    /**
     * @var ST_WS_Guvenlik $G
     * @access public
     */
    public $G = null;

    /**
     * @var string $Kart_No
     * @access public
     */
    public $Kart_No = null;

    /**
     * @var string $KS_KK_Kisi_ID
     * @access public
     */
    public $KS_KK_Kisi_ID = null;

    /**
     * @param ST_WS_Guvenlik $G
     * @param string $Kart_No
     * @param string $KS_KK_Kisi_ID
     * @access public
     */
    public function __construct($G, $Kart_No, $KS_KK_Kisi_ID)
    {
        $this->G = $G;
        $this->Kart_No = $Kart_No;
        $this->KS_KK_Kisi_ID = $KS_KK_Kisi_ID;
    }

}
