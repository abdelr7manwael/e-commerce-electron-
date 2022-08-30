
<?php
session_start();
if(isset($_SESSION['id'])){

    require_once "../classes/Product.php";
    
    
    $id = $_GET['id'];
    
    $prod = new Product;
    $product = $prod->getOne($id);
    $img = $product['picture'];
    
    unlink("../assets/images/".$img);
    $delete = $prod ->delete($id);
    
    if($delete==true){
        $_SESSION['success'] = "The Product Deleted Successfully";
        header("location: ../index.php");

        
    }
    else{

        $_SESSION['errors'] = ['The Product not Deleted for some Reason'];
        header("location:../products/show?id=$id");
    }
    
    header("location:../index.php");
}else{
    $_SESSION['not_found'] = "The page ur looking for is not Found";
    header("location: ../index.php");
}
?>
