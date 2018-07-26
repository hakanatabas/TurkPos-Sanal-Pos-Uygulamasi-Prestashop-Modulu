<?php

class KK_Saklama
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
     * @var string $KK_Sahibi
     * @access public
     */
    public $KK_Sahibi = null;

    /**
     * @var string $KK_No
     * @access public
     */
    public $KK_No = null;

    /**
     * @var string $KK_SK_Ay
     * @access public
     */
    public $KK_SK_Ay = null;

    /**
     * @var string $KK_SK_Yil
     * @access public
     */
    public $KK_SK_Yil = null;

    /**
     * @var string $KK_CVV
     * @access public
     */
    public $KK_CVV = null;

    /**
     * @var string $Data1
     * @access public
     */
    public $Data1 = null;

    /**
     * @var string $Data2
     * @access public
     */
    public $Data2 = null;

    /**
     * @var string $Data3
     * @access public
     */
    public $Data3 = null;

    /**
     * @param ST_WS_Guvenlik $G
     * @param string $Kart_No
     * @param string $KK_Sahibi
     * @param string $KK_No
     * @param string $KK_SK_Ay
     * @param string $KK_SK_Yil
     * @param string $KK_CVV
     * @param string $Data1
     * @param string $Data2
     * @param string $Data3
     * @access public
     */
    public function __construct(
        $G,
        $Kart_No,
        $KK_Sahibi,
        $KK_No,
        $KK_SK_Ay,
        $KK_SK_Yil,
        $KK_CVV,
        $Data1,
        $Data2,
        $Data3
    ) {
        $this->G = $G;
        $this->Kart_No = $Kart_No;
        $this->KK_Sahibi = $KK_Sahibi;
        $this->KK_No = $KK_No;
        $this->KK_SK_Ay = $KK_SK_Ay;
        $this->KK_SK_Yil = $KK_SK_Yil;
        $this->KK_CVV = $KK_CVV;
        $this->Data1 = $Data1;
        $this->Data2 = $Data2;
        $this->Data3 = $Data3;
    }

}
