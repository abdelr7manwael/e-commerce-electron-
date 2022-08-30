<?php
namespace validation;
require_once 'ValidationInterface.php';

class Email  Implements ValidationInterface{


    private $name,$value;

    public function __Construct($name,$value){
        $this->name = $name;
        $this->value = $value;

    }

    public function validate(){

        if(strlen($this->value) > 0 && !filter_var($this->value, FILTER_VALIDATE_EMAIL)){
            return "$this->name is Not a Valid Email";
        }

        return '';
    }
    

}
?>