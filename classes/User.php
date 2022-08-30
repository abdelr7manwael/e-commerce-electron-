<?php
require_once "MySql.php";


class User extends MySql{

    
    public function store(array $data){

        $data['firstname'] = mysqli_real_escape_string(parent::connect(), $data['firstname']);
        $data['secondname'] = mysqli_real_escape_string(parent::connect(), $data['secondname']);
        $data['password'] = mysqli_real_escape_string(parent::connect(), $data['password']);

       $fullname= $data['firstname'] . " ". $data['secondname'] ;  
      
       $password = sha1($data['password']); 
      
      $query = "INSERT INTO `users` (`full_name`, `email`, `password`, `role`) VALUES 
       ('$fullname','{$data['email']}','$password', 1)";

       $result = parent::connect()->query($query);
       if($result == true){

            return true;
        }
        return "false"; 
    }

    public function attempt($email, $password){
        $query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' ";

        $result = parent::connect()->query($query);

        $user = null;
        if($result->num_rows == 1){

            $user = $result->fetch_assoc();
        }

        return $user;

    }
}
?>