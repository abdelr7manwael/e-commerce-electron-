<?php
session_start();
require_once "../classes/User.php";
require_once "../classes/validation/Validator.php";


use validation\Validator;


if(isset($_POST['submit'])){    
    // if come from form or Not

    $email = $_POST['email'];
    $firstname =  $_POST['firstname'];
    $secondname =  $_POST['secondname'];
    $password =  $_POST['password'];
    $confirm_password =  $_POST['confirm_password'];
    
    $v = new Validator;

    $v->rules('email', $email, ['email', 'required']);
    $v->rules('firstname', $firstname, ['required', 'string']);
    $v->rules('secondname', $secondname, ['required', 'string']);
    $v->rules('password', $password, ['required']);
    $v->rules('confirm_password', $confirm_password, ['required']);

    $errors = $v->errors ;
  
    // var_dump($errors);
    // die();





    
    if($errors == []){
        //Validation result

        if($password == $confirm_password){

            $data = [
            "firstname" => $firstname,
            "secondname" =>  $secondname,
            "email" =>  $email,
            "password" =>  $password,
        ];

        $user= new User;
        $storeUser = $user->store($data);

        if($storeUser == true){
            // $image->upload();
            $_SESSION["success"] = "your data added successfully";
            header("location: ../login.php");
            
        }else{
            array_push($errors , "Query Error");   
    $_SESSION['errors'] = $errors;

            header("location: ../signup.php");

            
        }
         

        }
        else{
            array_push($errors, "password and Confirm_password doesn't match");
    $_SESSION['errors'] = $errors;
            header("location: ../signup.php");
        }
        
    }
    else{
    $_SESSION['errors'] = $errors;
    header("location: ../signup.php");

    }

}
else{
    header("location: ../sign.php");
}
?>