<?php
session_start();
if(isset($_SESSION['id'])){
    require_once "../classes/Product.php";
    $id = $_GET['id']; 
    if(isset($_POST['submit'])){
        
        $id = $_POST['id'];
        
        // $temp = explode(".", $_FILES["picture"]["name"]);
        $name =  $_POST['name'];
        $desc =  $_POST['desc'];
        $price = $_POST['price'];
        $category_id =  $_POST['category_id'];
        // $_FILES['picture']['name'] =date("Ymd  H:m:s")." " . rand(0, 3000).".".end($temp); 
        
        if(true){//Validation result
            $data = [
                "name" => $_POST['name'],
                "desc" =>  $_POST['desc'],
                "price" =>  $_POST['price'],
                "category_id" =>  $_POST['category_id'],
                // "picture" => $_FILES['picture']['name'],
            ];
            $prod = new Product;
            $product = $prod->update($data, $id);
        header("location: ../products/edit.php?id=$id");

        }else{
        header("location: ../products/edit.php?id=$id");

        }

    }else{
        header("location: ../products/edit.php?id=$id");
    }
}else{
    $_SESSION['not_found'] = "The page ur looking for is not Found";
    header("location: ../index.php");
}

?>