<?php

class ST_WS_Guvenlik
{

    /**
     * @var string $CLIENT_CODE
     * @access public
     */
    public $CLIENT_CODE = null;

    /**
     * @var string $CLIENT_USERNAME
     * @access public
     */
    public $CLIENT_USERNAME = null;

    /**
     * @var string $CLIENT_PASSWORD
     * @access public
     */
    public $CLIENT_PASSWORD = null;

    /**
     * @param string $CLIENT_CODE
     * @param string $CLIENT_USERNAME
     * @param string $CLIENT_PASSWORD
     * @access public
     */
    public function __construct($CLIENT_CODE, $CLIENT_USERNAME, $CLIENT_PASSWORD)
    {
        $this->CLIENT_CODE = $CLIENT_CODE;
        $this->CLIENT_USERNAME = $CLIENT_USERNAME;
        $this->CLIENT_PASSWORD = $CLIENT_PASSWORD;
    }

}
