<?php
session_start();
include "./shared/header.php";
?>



<section class="row justify-content-center align-items-center mt-5 ">

 <?php if(isset($_SESSION['errors'])){?>
        
        <div class="col-lg-6 alert alert-danger">
            <?php foreach($_SESSION['errors'] as $e ){ ?>
               
                <p class= "text-center mb-0">  <?php echo $e ?></p>
                
            <?php }?>
            </div>
   
    <?php } ?>

<?php unset($_SESSION['errors']); ?>
<div class="col-12"></div>
<div class="col-lg-6  border mb-5 bg-white">
    <h1 class="text-center fw-bold activ mt-5" style="font-size:50px">sign up</h1>
    
    <div class="contanier">
    <form action="/e-commerce/handelers/handelregister.php" method="post">    
    <div class="row justify-content-around mt-5">
            
            <input class="col-5 border border-0 py-3 rounded" style="background-color:#E4E3E3;" 
            placeholder="First name" type="text" name="firstname" id="" >
            <input class="col-5 border border-0 py-3 rounded" style="background-color:#E4E3E3;" placeholder="Last name" type="text" name="secondname" id="">
    </div>
    <div class="row justify-content-center mt-5">
            
            <input class="col-11 border border-0 py-3 rounded" style="background-color:#E4E3E3;" placeholder="Email" type="text" name="email" id="">
            <!-- <input class="col-5 border border-0 py-3 rounded" style="background-color:#E4E3E3;" placeholder="Last name" type="text" name="" id=""> -->
    </div>
    <div class="row justify-content-around mt-5">
            
            <input class="col-5 border border-0 py-3 rounded" style="background-color:#E4E3E3;" placeholder="Password" type="password" name="password" id="">
            <input class="col-5 border border-0 py-3 rounded" style="background-color:#E4E3E3;" placeholder="Confirm Passwrod" type="password" name="confirm_password" id="">
    </div>
    <div class="text-center mt-5 my-4">
      <input class="btn btn-primary rounded-0 fs-5 fw-bold" type="submit" name ="submit"   style="padding:9px 30px;" value="Submit" >
            
    </div>
    </form>   
    <div class="container text-end mb-5">
        <a class="nav-link log-li fw-bold activ" href="/e-commerce/login.php">Already Have Account?</a>
    </div>
    </div>
</div>
</section>