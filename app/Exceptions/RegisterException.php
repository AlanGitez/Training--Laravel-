<?php

namespace App\Exceptions;

use Exception;

class RegisterException extends Exception
{
    protected $_message;
    protected $data;

    public function __construct($msg, $data = null){
        parent::__construct($msg);
        $this->_message = $msg;
        $this->_data = $data;
    }

    public function getData(){
        return $this->_message;
    }



}
