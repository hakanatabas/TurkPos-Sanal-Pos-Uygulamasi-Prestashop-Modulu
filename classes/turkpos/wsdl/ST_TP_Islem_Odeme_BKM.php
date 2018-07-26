<?php

class ST_TP_Islem_Odeme_BKM
{

    /**
     * @var string $Redirect_URL
     * @access public
     */
    public $Redirect_URL = null;

    /**
     * @var int $Response_Code
     * @access public
     */
    public $Response_Code = null;

    /**
     * @var string $Response_Message
     * @access public
     */
    public $Response_Message = null;

    /**
     * @param string $Redirect_URL
     * @param int $Response_Code
     * @param string $Response_Message
     * @access public
     */
    public function __construct($Redirect_URL, $Response_Code, $Response_Message)
    {
        $this->Redirect_URL = $Redirect_URL;
        $this->Response_Code = $Response_Code;
        $this->Response_Message = $Response_Message;
    }

}
