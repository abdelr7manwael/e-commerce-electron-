<?php
namespace validation;
require_once 'ValidationInterface.php';

class Required  Implements ValidationInterface{


    private $name,$value;

    public function __Construct($name,$value){
        $this->name = $name;
        $this->value = $value;

    }

    public function validate(){

        if(strlen($this->value) == 0){
            return "$this->name is Required";
        }

        return '';
    }
    

}
?>