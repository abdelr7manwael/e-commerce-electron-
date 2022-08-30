<?php
namespace validation;
require_once 'ValidationInterface.php';

class Max  Implements ValidationInterface{


    private $name,$value;

    public function __Construct($name,$value){
        $this->name = $name;
        $this->value = $value;

    }

    public function validate(){

        if(strlen($this->value) > 0 && strlen($this->value) > 100){
            return "$this->name Must be less than 100 Char";
        }

        return '';
    }
    

}
?>