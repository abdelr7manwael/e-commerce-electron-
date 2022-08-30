<?php
session_start();
require_once "../classes/User.php";
require_once "../classes/validation/Validator.php";


use validation\Validator;


if(isset($_POST['submit'])){    
    // if come from form or Not

    $email = $_POST['email'];
    $password =  $_POST['password'];
    
    $v = new Validator;

    $v->rules('email', $email, ['email', 'required']);
    $v->rules('password', $password, ['required']);

    $errors = $v->errors ;
  
    // var_dump($errors);
    // die();


    if($errors == []){
        //Validation result
        $user= new User;
        $attempt = $user->attempt($email, sha1($password));


        if($attempt != null){
           
            $_SESSION["success"] = "your logged in successfully";
            $_SESSION['id'] = $attempt['id'];
            $_SESSION['full_name'] = $attempt['full_name'];
            $_SESSION['email'] = $attempt['email'];
            $_SESSION['role'] = $attempt['role'];

            header("location: ../index.php");
            
        }else{
            array_push($errors , "ur credentials are Wrong");   
            $_SESSION['errors'] = $errors;

            header("location: ../login.php");

            
        }
         

    
        
    }
    else{
    $_SESSION['errors'] = $errors;
    header("location: ../login.php");

    }

}
else{
    header("location: ../login.php");
}
?>