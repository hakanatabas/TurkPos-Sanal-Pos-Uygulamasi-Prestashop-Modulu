<?php

class TP_Islem_Odeme_BKM
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
     * @var string $Customer_Info
     * @access public
     */
    public $Customer_Info = null;

    /**
     * @var string $Customer_GSM
     * @access public
     */
    public $Customer_GSM = null;

    /**
     * @var string $Error_URL
     * @access public
     */
    public $Error_URL = null;

    /**
     * @var string $Success_URL
     * @access public
     */
    public $Success_URL = null;

    /**
     * @var string $Order_ID
     * @access public
     */
    public $Order_ID = null;

    /**
     * @var string $Order_Description
     * @access public
     */
    public $Order_Description = null;

    /**
     * @var string $Amount
     * @access public
     */
    public $Amount = null;

    /**
     * @var string $Payment_Hash
     * @access public
     */
    public $Payment_Hash = null;

    /**
     * @var string $Transaction_ID
     * @access public
     */
    public $Transaction_ID = null;

    /**
     * @var string $IPAddress
     * @access public
     */
    public $IPAddress = null;

    /**
     * @var string $Referrer_URL
     * @access public
     */
    public $Referrer_URL = null;

    /**
     * @param ST_WS_Guvenlik $G
     * @param string $GUID
     * @param string $Customer_Info
     * @param string $Customer_GSM
     * @param string $Error_URL
     * @param string $Success_URL
     * @param string $Order_ID
     * @param string $Order_Description
     * @param string $Amount
     * @param string $Payment_Hash
     * @param string $Transaction_ID
     * @param string $IPAddress
     * @param string $Referrer_URL
     * @access public
     */
    public function __construct(
        $G,
        $GUID,
        $Customer_Info,
        $Customer_GSM,
        $Error_URL,
        $Success_URL,
        $Order_ID,
        $Order_Description,
        $Amount,
        $Payment_Hash,
        $Transaction_ID,
        $IPAddress,
        $Referrer_URL
    ) {
        $this->G = $G;
        $this->GUID = $GUID;
        $this->Customer_Info = $Customer_Info;
        $this->Customer_GSM = $Customer_GSM;
        $this->Error_URL = $Error_URL;
        $this->Success_URL = $Success_URL;
        $this->Order_ID = $Order_ID;
        $this->Order_Description = $Order_Description;
        $this->Amount = $Amount;
        $this->Payment_Hash = $Payment_Hash;
        $this->Transaction_ID = $Transaction_ID;
        $this->IPAddress = $IPAddress;
        $this->Referrer_URL = $Referrer_URL;
    }

}
