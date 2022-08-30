<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("location: index.php");
    $_SESSION['not_found'] = "The page ur looking for is not Found";
}
require_once "../shared/header.php"; 
require_once "../classes/Category.php"; 
require_once "../classes/Product.php";

$id = $_GET['id'];

$cat = new Category;
$categories = $cat->getAll();

$prod = new Product;
$product = $prod->getOne($id);

?>

<section class="row justify-content-center my-5 ">
<div class="col-lg-10  border p-5 pt-1 bg-white ">
    <h1 class="text-center fw-bold activ mt-4" style="font-size:50px">Edit Product</h1>
<div class="pt-3">
    <form   method="post" action="../handelers/handleEdit.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id?>">
        
        <div class="mb-3">
            
            <label for="productName" class="form-label">Product Title</label>
            <input required  type="text" name="name" minlength="3" class="form-control border border-0 rounded py-3"
             style="background-color:#E4E3E3;" value="<?= $product['name']?>" placeholder="Enter Product Name" id="productName" aria-describedby="emailHelp">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            
        </div>
        <div class="mb-3">
            <label for="productDescribtion" class="form-label">product Describtion</label>
            <textarea required  type="text" name="desc" class="form-control border border-0 rounded py-3"
             style="background-color:#E4E3E3;"   placeholder="Enter Product Desc"  minlenght="5" id="productDescribtion" aria-describedby="emailHelp"
             ><?= $product['desc']?> </textarea>
        </div>
        <div class="row">

            <div class="mb-3 col-6">
                <label for="productprice" class="form-label">price</label>
                <input required type="number"  step="0.01" name="price" class="form-control border border-0 rounded py-3"
             style="background-color:#E4E3E3;" value="<?= $product['price']?>"  placeholder="Enter Product Price" id="productprice">
            </div>
            <div class="mb-3 col-6">
                <!-- Category Id -->
                <label for="exampleInputPassword1" class="form-label">Category</label>
                <select name="category_id" class="form-control border border-0 rounded py-3"
                style="background-color:#E4E3E3;" id="" required>
                    <option value="">Choose Category</option>
                    <?php
                    foreach($categories as $c){
                    ?>
                    <option  value="<?= $c['id']?>" <?php if($c['id'] == $product['category_id']){ ?> selected <?php } ?> > <?= $c['id']." - ".$c['name']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <!-- <div class="my-3" >
            
            <label class="mb-1" for="pic">Product Photo</label><br>
            <div class="p-3 rounded" style="background-color:#E4E3E3;">

                
                <input required type="file" name="picture" id="pic">
            </div>
        </div> -->

        
            <div class="text-center mt-4" >

                <input type="submit" name="submit" value="Submit" class="btn btn-primary py-2 px-4 fs-5 fw-bold">
            </div>
    </form>
</div>
</div>
</section>


<?php require_once "../shared/footer.php";?>
