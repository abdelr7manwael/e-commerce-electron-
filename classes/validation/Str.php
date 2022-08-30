<?php
namespace validation;
require_once 'ValidationInterface.php';

class Str  Implements ValidationInterface{


    private $name,$value;

    public function __Construct($name,$value){
        $this->name = $name;
        $this->value = $value;

    }

    public function validate(){

        if( strlen($this->value) > 0 && !is_string($this->value)){
            return "$this->name must be String";
        }

        return '';
    }
    

}
?>