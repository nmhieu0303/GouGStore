 <?php

  ?>

 <!DOCTYPE html>
 <htm lang="en">

   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
     <!-- fornt awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

     <!-- SELECT2 -->
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" />
     <link rel="stylesheet" type="text/css" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
     <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

     <link rel="stylesheet" href="./assets/css/style.css">
     <title><?php echo $title; ?></title>

   </head>

   <body>
     <div id="app" class="bg-light mt-5">

       <nav class="fixed-top navbar navbar-expand-lg navbar-light bg-white shadow-sm ">
         <div class="container justify-content-center">
           <div class="col-lg-2 col-md-3 text-center">
             <a class="navbar-brand " href="index.php">
               <h3>
                 <span class="text-danger">G</span>ou<span class="text-danger">G</span>
                 <small>Store</small>
               </h3>
             </a>
           </div>
           <!-- SEARCH BOX -->
           <form class="col-lg-4 col-7 search-box form-inline my-2 my-lg-0 ">
             <input class="search-box__input form-control" type="search" placeholder="Search" aria-label="Search">
             <button class="search-box__btn" type="submit"><i class="fas fa-search"></i></button>
           </form>



           <!-- NAV-ITEM -->
           <div class="collapse navbar-collapse justify-content-end text-center" id="navbarSupportedContent">
             <ul class="navbar-nav ml-0">
               <li class="nav-item <?php echo $title == "Total" ? "active" : ""; ?> ">
                 <a class="nav-link" href="#">
                   <div class="nav-item--cart position-relative">
                     <i class="fas fa-shopping-cart cart-icon"></i>
                     <h4 class="cart-number text-white bg-danger rounded-circle">0</h4>
                   </div>
                 </a>
               </li>
               <!-- Đã đăng nhập -->
               <?php if ($currentUser) : ?>
                 <li class="nav-item <?php echo $title == "Profile" ? "active" : ""; ?> ">
                   <a class="nav-link" href="profile.php">Profile</a><?php echo $title == "Profile" ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                 </li>

                 <!-- Chưa đăng nhập -->
               <?php else : ?>
                 <li class="ml-3 nav-item <?php echo $title == "Login" ? "active" : ""; ?> ">
                   <a class="btn btn-primary" href="login.php"><i class="fas fa-sign-in-alt"></i> Login<?php echo $title == "Login" ? '<span class="sr-only">(current)</span>' : ''; ?></a>
                 </li>
               <?php endif; ?>
             </ul>

           </div>
           <?php if ($currentUser) : ?>
             <a href="profile.php" class="btn-profile rounded-circle ml-1">
               <img class="btn-profile--img " src="avatar.php?id=<?php echo $currentUser['id']; ?>" alt="">
             </a>
           <?php endif; ?>
           <!-- MENU BUTTON -->
           <button class="ml-2 navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
         </div>


       </nav>
       <div id="content" style="min-height:100vh;">
         <div class="container pt-3">
           <?php if ($title != "Home") : ?>
             <h1 class="display-4 text-center"><?php echo $title ?></h1>
           <?php endif; ?>