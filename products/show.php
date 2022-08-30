<?php

session_start();

include '../shared/header.php';
require_once "../classes/Product.php";
require_once "../classes/helpers/Str.php";


$id = $_GET['id'];

$prod = new product;
$product = $prod->getOne($id);
?>




<section class="row justify-content-start my-5" >
    <?php if(isset($_SESSION['errors'])){?>
        <div class="alert alert-danger">
            <?php foreach($_SESSION['errors'] as $e ){ ?>
               
                <p class= "text-center mb-0">  <?php echo $e ?></p>
                
            <?php }?>
            </div>
   
    <?php } ?>

<?php unset($_SESSION['errors']); ?>
<?php if($product){?>    
<div id="proimg"  class="col-lg-6 mb-5">
        <div class="text-center" >
           <?php if($product['picture']){?>
            <img  src="../assets/images/<?= $product['picture'] ?>" class="img-fluid"
            style="max-height:400px" alt="">
            <?php }else{ ?>
                <img  src="../assets/images/noImg.webp" class="img-fluid"
            style="max-height:400px" alt="">
            <?php } ?>
        </div>
    </div>
    <div id="prodata" class="col-lg-6">
        <h1><?= $product['name'];?> </h1>
        <p><?= $product['desc'];?> </p>
        <h3><?= "$ ".$product['price'];?> </h3>
        
        <br>
        <input type="number" class=" fw-bold fs-6" name="quantity" min="1" max="10" value="1" id="" style="padding: 3px 0px; text-align:center;"> 
        <a href="#" class="btn btn-primary">Add to cart</a>

        <?php if(isset($_SESSION['id'])){?>
        <div class="row justify-content-start  mt-3">
            <div class="col-6">
            <a href="/e-commerce/products/edit.php?id=<?= $id ?>" 
            class="btn btn-outline-primary fw-bold w-100">Edit</a>

            </div>
            <div class="col-6">
                <a href="/e-commerce/handelers/handleDelete.php?id=<?= $id ?>" class="btn btn-danger fw-bold w-100">Delete</a>
            </div>
        </div>
        
        <?php } ?>
    </div>

    <?php }else{
        echo"No Product Found";
    }?>
</section>
<?php include '../shared/footer.php' ?>