<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" href="/e-commerce/assets/images/images.png">
    <link rel="icon" href="/e-commerce/assets/images/images.png" >
    <!-- <link rel="icon" href="./assets/images/images.png" sizes="16x16" type="image/png"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/e-commerce/assets/css/style.css">
    <title>Electron store</title>
</head>
<body class="bg-light">

<nav class="fixed-top navbar navbar-expand-lg bg-white" style="height:80px;">
  <div class="container bg-white">
    <a class="navbar-brand fs-3 d-flex fw-bold" href="/e-commerce"> <i class="bi bi-laptop"></i>  &nbsp;Electron Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <div class="m-auto">

      <ul class="navbar-nav  mb-lg-0 ">
       <li class="nav-item">
          <a id="" class="nav-link fs-5 mx-2" aria-current="page" href="/e-commerce/index.php">All</a>
        </li>
      <li class="nav-item">
          <a id="" class="nav-link fs-5 mx-2" aria-current="page" href="#">Laptop</a>
        </li>
        <li class="nav-item">
          <a id="" class="nav-link fs-5 mx-2" aria-current="page" href="#">PCs</a>
        </li>
        <li class="nav-item">
          <a id="" class="nav-link fs-5 mx-2" aria-current="page" href="#">Phone</a>
        </li>
        
      </ul>
      
    </div>
      <?php
      if(!isset($_SESSION['id'])){
      ?>
          <div class="mx-5 my-3">
          
            <a href="/e-commerce/login.php" class="btn btn-primary fs-5 fw-bold" style="padding:9px 30px;" >Log in</a>
            <a href="/e-commerce/signup.php" class="btn btn-outline-primary fs-5 fw-bold" style="padding:9px 30px;" >sign up</a>
            

            </div>
            
            <?php }else { ?>
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['full_name']?>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Cart</a></li>
                            <li><a class="dropdown-item" href="#">Orders History</a></li>
                            <li><a class="dropdown-item" href="#">profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="/e-commerce/handelers/handellogout.php">Log out</a></li>
                          </ul>
                        </div>
              <?php } ?>
    </div>
  </div>
</nav>
<main class="container mt-5 pt-5">
    
