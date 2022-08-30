<?php
namespace validation;
require_once 'ValidationInterface.php';

class Image Implements ValidationInterface{


    private $name,$value;

    public function __Construct($name,$value){
        $this->name = $name;
        $this->value = $value;

    }

    public function validate(){

        $types = ['images/jpg', 'images/jpeg', 'images/png', 'images/gif'];
        if( strlen($this->value['name']) > 0 && in_array($this->value['type'], $types)){
            return "$this->name is Required";
        }

        return '';
    }
    

}
?>