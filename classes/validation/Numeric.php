<?php
namespace validation;
require_once 'ValidationInterface.php';

class Numeric  Implements ValidationInterface{


    private $name,$value;

    public function __Construct($name,$value){
        $this->name = $name;
        $this->value = $value;

    }

    public function validate(){

        if(strlen($this->value) > 0 &&  ! is_numeric($this->value)){
            return "$this->name must be a Number";
        }

        return '';
    }
    

}
?>