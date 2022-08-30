<?php
namespace validation;
require_once 'ValidationInterface.php';
require_once 'Str.php';
require_once 'Max.php';
require_once 'Email.php';
require_once 'Numeric.php';
require_once 'Required.php';
require_once 'RequiredImage.php';
require_once 'Image.php';

class Validator{


    public $errors = [];
    private function makeValidate(ValidationInterface $v){

        return $v->validate();

    }

    public function rules($name, $value, array $rules){

        foreach($rules as $r){

            if($r == "required"){
                $error = $this->makeValidate(new Required($name, $value));
            }
            elseif($r == "string"){
                $error = $this->makeValidate(new Str($name, $value));
            }elseif($r == "email"){
                $error = $this->makeValidate(new Email($name, $value));
            }elseif($r == "Max:100"){
                $error = $this->makeValidate(new Max($name, $value));
            }elseif($r == "numeric"){
                $error = $this->makeValidate(new Numeric($name, $value));
            }elseif($r == "required-image"){
                $error = $this->makeValidate(new RequiredImage($name, $value));
            }elseif($r == "image"){
                $error = $this->makeValidate(new Image($name, $value));
            }
            else{
                $error = '';
            }

           
            if($error !== ''){
                array_push($this->errors, $error);
            }
        }

        // return $errors;
    }
    

}
?>