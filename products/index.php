<?php 
session_start();

require_once '../shared/header.php';
require_once "../classes/Product.php";
require_once "../classes/helpers/Str.php";

use helpers\Str;
$class = new Product;
$products = $class->getAll(); 

?>

<section class="row justify-content-start mt-3">
    <?php if(isset($_SESSION['not_found'])){?>
        <div class="alert alert-danger">
            <p class= "text-center mb-0">  <?php echo $_SESSION['not_found'] ?></p>
            
            </div>
   
    <?php } ?>

    <?php if(isset($_SESSION['success'])){?>
        <div class=" alert alert-success">
            
            
            <p class= "text-center mb-0">  <?php echo $_SESSION['success'] ?></p>
            
            
        </div>
        
        <?php } ?>
<?php unset($_SESSION['not_found']); ?>
<?php unset($_SESSION['success']); ?>
    
    <?php
      if(isset($_SESSION['id'])){
          ?>
            <div class="text-end mb-2">
                
                
                <a  class = "btn btn-primary" href="/e-commerce/products/add.php">Add New Product</a>
                
                
            </div>
            <?php }?> 
 
 <?php foreach($products as $prod){
 ?>
<div class="col-lg-3 mb-5" >

    <div class="card" style="width: 19.5rem; ">
    <div style="height:180px">
    <?php if($prod['picture']){ ?>
        <img src="../assets/images/<?= $prod['picture'] ?>" class="card-img-top w-100 h-100" >
<?php }else{?>
    <img src="../assets/images/noImg.webp" class="card-img-top w-100 h-100" alt="NO Img Now">

<?php } ?>
    </div>
        <div class="card-body">
            <h5 class="card-title"><?= $prod['name']?></h5>
            <p class="text-muted">$ <?= $prod['price']?></p>
            <p class="card-text"><?= Str::limit($prod['desc'])?> </p>
            <div class="row justify-content-around pb-0">
                <a href="show.php?id=<?= $prod['id']?>" class="col-5 btn btn-outline-primary">View</a>
                <a href="#" class="col-5 btn btn-primary">Add to cart</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

</section>

<div class="d-flex justify-content-center">

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>


<?php require_once '../shared/footer.php' ?>