<?php
session_start();
include "./shared/header.php";
?>
<section class="row justify-content-center align-items-center mt-5 ">
  <?php if(isset($_SESSION['success'])){?>
        <div class="col-lg-5 alert alert-success">
           
               
                <p class= "text-center mb-0">  <?php echo $_SESSION['success'] ?></p>
                
            
            </div>
   
    <?php } ?>

<?php unset($_SESSION['success']); ?>
<?php if(isset($_SESSION['errors'])){?>
        
        <div class="col-lg-5 alert alert-danger">
            <?php foreach($_SESSION['errors'] as $e ){ ?>
               
                <p class= "text-center mb-0">  <?php echo $e ?></p>
                
            <?php }?>
            </div>
   
    <?php } ?>

<?php unset($_SESSION['errors']); ?>

<div class="col-12"></div>
<div class="col-lg-5  border mb-5 bg-white">
    <h1 class="text-center fw-bold activ mt-5" style="font-size:50px">Log in</h1>
    
    <div class="contanier">
    <form action="/e-commerce/handelers/handellogin.php" method="post">    
    <div class="row justify-content-center">
            
        <input class="col-11 border border-0 rounded py-3  mt-5 mb-4" style="background-color:#E4E3E3;" 
        placeholder=" Enter Your Email ..." type="email" name="email" id="">
        <input class="col-11 border border-0 rounded py-3  mb-5" style="background-color:#E4E3E3;" 
        placeholder=" Enter Your Password ..." type="password" name="password" id="">
    </div>
    <div class="text-center mb-4">
      <input class="btn btn-primary rounded-0 fs-5 fw-bold" type="submit"
      name="submit" style="padding:9px 30px;" Value="Log in" >
            
    </div>
    </form>   
    <div class="container text-end mb-5">
        <a class="nav-link log-li fw-bold activ" href="/e-commerce/signup.php">Dont Have an Account?</a>
    </div>
    </div>
</div>
</section>

<?php
// include "./shared/footer.php";
?>