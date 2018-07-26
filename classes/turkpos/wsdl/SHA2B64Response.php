<?php

class SHA2B64Response
{

    /**
     * @var string $SHA2B64Result
     * @access public
     */
    public $SHA2B64Result = null;

    /**
     * @param string $SHA2B64Result
     * @access public
     */
    public function __construct($SHA2B64Result)
    {
        $this->SHA2B64Result = $SHA2B64Result;
    }

}
