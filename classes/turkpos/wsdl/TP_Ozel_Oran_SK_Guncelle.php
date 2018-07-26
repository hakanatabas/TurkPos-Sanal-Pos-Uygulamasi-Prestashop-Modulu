<?php

class TP_Ozel_Oran_SK_Guncelle
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
     * @var string $Ozel_Oran_SK_ID
     * @access public
     */
    public $Ozel_Oran_SK_ID = null;

    /**
     * @var string $MO_1
     * @access public
     */
    public $MO_1 = null;

    /**
     * @var string $MO_2
     * @access public
     */
    public $MO_2 = null;

    /**
     * @var string $MO_3
     * @access public
     */
    public $MO_3 = null;

    /**
     * @var string $MO_4
     * @access public
     */
    public $MO_4 = null;

    /**
     * @var string $MO_5
     * @access public
     */
    public $MO_5 = null;

    /**
     * @var string $MO_6
     * @access public
     */
    public $MO_6 = null;

    /**
     * @var string $MO_7
     * @access public
     */
    public $MO_7 = null;

    /**
     * @var string $MO_8
     * @access public
     */
    public $MO_8 = null;

    /**
     * @var string $MO_9
     * @access public
     */
    public $MO_9 = null;

    /**
     * @var string $MO_10
     * @access public
     */
    public $MO_10 = null;

    /**
     * @var string $MO_11
     * @access public
     */
    public $MO_11 = null;

    /**
     * @var string $MO_12
     * @access public
     */
    public $MO_12 = null;

    /**
     * @param ST_WS_Guvenlik $G
     * @param string $GUID
     * @param string $Ozel_Oran_SK_ID
     * @param string $MO_1
     * @param string $MO_2
     * @param string $MO_3
     * @param string $MO_4
     * @param string $MO_5
     * @param string $MO_6
     * @param string $MO_7
     * @param string $MO_8
     * @param string $MO_9
     * @param string $MO_10
     * @param string $MO_11
     * @param string $MO_12
     * @access public
     */
    public function __construct(
        $G,
        $GUID,
        $Ozel_Oran_SK_ID,
        $MO_1,
        $MO_2,
        $MO_3,
        $MO_4,
        $MO_5,
        $MO_6,
        $MO_7,
        $MO_8,
        $MO_9,
        $MO_10,
        $MO_11,
        $MO_12
    ) {
        $this->G = $G;
        $this->GUID = $GUID;
        $this->Ozel_Oran_SK_ID = $Ozel_Oran_SK_ID;
        $this->MO_1 = $MO_1;
        $this->MO_2 = $MO_2;
        $this->MO_3 = $MO_3;
        $this->MO_4 = $MO_4;
        $this->MO_5 = $MO_5;
        $this->MO_6 = $MO_6;
        $this->MO_7 = $MO_7;
        $this->MO_8 = $MO_8;
        $this->MO_9 = $MO_9;
        $this->MO_10 = $MO_10;
        $this->MO_11 = $MO_11;
        $this->MO_12 = $MO_12;
    }

}
