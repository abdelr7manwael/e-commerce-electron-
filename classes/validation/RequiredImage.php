<?php
namespace validation;
require_once 'ValidationInterface.php';

class RequiredImage Implements ValidationInterface{


    private $name,$value;

    public function __Construct($name,$value){
        $this->name = $name;
        $this->value = $value;

    }

    public function validate(){

        if(strlen($this->value['name']) == 0){
            return "$this->name is Required";
        }

        return '';
    }
    

}
?>