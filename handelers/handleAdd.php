<?php
session_start();
require_once "../classes/Product.php";
require_once "../classes/helpers/Image.php";
require_once "../classes/validation/Validator.php";

use helpers\Image;
use validation\Validator;


if(isset($_POST['submit'])){    
    // if come from form or Not

    $name = $_POST['name'];
    $desc =  $_POST['desc'];
    $price =  $_POST['price'];
    $category_id =  $_POST['category_id'];
    $img = $_FILES['picture'];
    $v = new Validator;

    $v->rules('name', $name, ['Max:100','string', 'required']);
    $v->rules('describtion', $desc, ['required', 'string']);
    $v->rules('price', $price, ['required', 'numeric']);
    $v->rules('category', $category_id, ['required']);
    $v->rules('image', $price, ['required-image', 'image']);


    $errors = $v->errors ;
  
    // var_dump($errors);





    
    if($errors == []){
        //Validation result

        $image = new Image($img);
        $data = [
            "name" => $name,
            "desc" =>  $desc,
            "price" =>  $price,
            "category_id" =>  $category_id,
            "picture" => $image->new_name,
        ];

        $prod = new Product;
        $product = $prod->store($data);

        if($product == true){
            $image->upload();
            $_SESSION["success"] = "your product added successfully";
            header("location: ../products/index.php");
            
        }else{
            $_SEEION['errors'] = "Query Error";    
            header("location: ../products/add.php");

            
        }
         

    }
    else{
    $_SESSION['errors'] = $errors;
    header("location: ../products/add.php");

    }

}
else{
    header("location: ../products/add.php");
}
?>