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

     <!-- FORNT -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

     <link rel="stylesheet" href="./assets/css/style.css">
     <title><?php echo $title; ?></title>

   </head>

   <body>

     <!-- PC -->
     <div class="header container-fluid hidden-xs hidden-sm">
       <!-- HEADER -->
       <div class="row">
         <ul class="header__menu list-unstyled d-flex mb-0 w-100 justify-content-end">
           <li class="header__item"><a class="header__item--link" href="https://ananas.vn/search-order"><i class="fas fa-clipboard-list header__item-icon"></i>Tra cứu đơn hàng</a></li>
           <li class="header__item"><a class="header__item--link" href="https://ananas.vn/stores"><i class="fas fa-map-marker-alt header__item-icon"></i> Tìm cửa hàng</a></li>
           <li class="header__item"><a class="header__item--link" href="https://ananas.vn/your-wishlist"><i class="fas fa-heart header__item-icon"></i>Yêu thích</a></li>
           <!--                <li class = "header__item"><a class = "header__item--link" href="-->
           <!--"><img-->
           <!--                                src="-->
           <!--/icon_login.png"> Đăng nhập</a></li>-->
           <li class="header__item"><a class="header__item--link" href="./login.php"><i class="fas fa-user header__item-icon"></i>Đăng nhập</a></li>
           <li class="header__item"><a class="header__item--link" href="https://ananas.vn/your-cart/"><i class="fas fa-shopping-cart header__item-icon"></i>
               Giỏ hàng (<span class="countProduct">0</span>)</a></li>
         </ul>
       </div>

       <!-- NAVBAR -->

       <div class="row">
         <nav class=" navbar navbar-expand-lg navbar-light container">
           <a class="navbar-brand" href="#"><img src="./assets/img/Logo_Ananas_Header.svg"></a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>

           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="nav navbar-nav m-auto">
               <li class=" nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="https://ananas.vn/product-list/?gender=men" id="navbarDropdown">SẢN PHẨM <span class="caret"></span></a>
                 <!-- Sub menu 1 -->
                 <ul class="dropdown-menu">
                   <li class="dropdown-item dropdown">
                     <a class="style1-title" href="/product-list/?gender=men">CHO NAM</a>
                     <i class="fas fa-chevron-right dropdown-icon"></i>
                     <!-- Sub menu 2 -->
                     <ul class="dropdown-menu">
                       <li class="dropdown-item "><a class="style1-title" href="/product-list/?gender=men">Giày</a></li>
                       <li class="dropdown-item"><a class="style1-title" href="/product-list/?gender=women">Áo</a></li>
                       <li class="dropdown-item"><a class="style1-title" href="/promotion/clearance-sale/">Phụ Kiện</a></li>
                       <li class="dropdown-item "><a class="style1-title" href="/product-list?gender=men,women&category=top,bottom,accessories&attribute=">THỜI TRANG & PHỤ KIỆN</a></li>
                     </ul>
                  </li>
                   <li class="dropdown-item"><a class="style1-title" href="/product-list/?gender=women">CHO NỮ</a></li>
                   <li class="dropdown-item"><a class="style1-title" href="/promotion/clearance-sale/">OUTLET SALE</a></li>
                   <li class="dropdown-item ">
                     <a class="style1-title" href="/product-list?gender=men,women&category=top,bottom,accessories&attribute=">THỜI TRANG & PHỤ KIỆN</a>
                     
                   </li>
                 </ul>
               </li>

               <li class="line"></li>
               <li class=" nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="https://ananas.vn/product-list/?gender=men" id="navbarDropdown">NAM <span class="caret"></span></a>
                 <ul class="dropdown-menu style2">
                   <li>
                     <a href="#" class="title">NỔI BẬT</a>

                     <a class="blank">&nbsp;</a>
                     <a class="title1" href=""></a>
                     <a href="/product-list?gender=men&category=&attribute=best-seller">Best Seller</a>
                     <a href="/product-list?gender=men&category=&attribute=new-arrival">New Arrival</a>
                     <a href="/product-list?gender=men&category=&attribute=sale-off">Sale off</a>
                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="#">Bộ sưu tập</a>
                     <a href="/product-list?gender=&category=&attribute=pineapple-or-ananas">Pineapple Or Ananas</a>
                     <a href="/product-list?gender=&category=&attribute=corluray">Corluray</a>
                     <a href="/product-list?gender=men,women&category=&attribute=bst-unsettling">Unsettling</a>
                     <a href="/product-list?gender=&category=&attribute=irrelevent">Irrelevent</a>
                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="#">Collaboration</a>
                     <a href="/product-list/?gender=&category=&attribute=ananas-lucky-luke">Ananas x Lucky Luke</a>
                     <a class="blank">&nbsp;</a>
                   </li>
                   <li class="style2-divider"></li>
                   <li>
                     <a href="#" class="title">GIÀY</a>

                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="#">Dòng sản phẩm</a>
                     <a href="/product-list?gender=men&category=&attribute=basas">Basas</a>
                     <a href="/product-list?gender=men&category=&attribute=vintas">Vintas</a>
                     <a href="/product-list?gender=men&category=&attribute=urbas">Urbas</a>
                     <a href="/product-list?gender=men&category=&attribute=pattas">Pattas</a>
                     <a href="/product-list?gender=men&category=&attribute=creas">Creas</a>
                     <a href="/product-list?gender=men&category=&attribute=track-6">Track 6</a>
                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="#">Style</a>
                     <a href="/product-list?gender=men&category=&attribute=high-top?gender=men&category=&attribute=high-top">High Top</a>
                     <a href="/product-list">Low Top</a>
                     <a href="/product-list?gender=men&category=&attribute=slip-on">Slip-on</a>
                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="/product-list?gender=men&category=shoes&attribute=">Tất cả giày</a>
                     <a class="blank">&nbsp;</a>
                   </li>
                   <li>
                     <a href="/product-list?gender=men&category=top,bottom,accessories&attribute=" class="title">THỜI TRANG & PHỤ KIỆN</a>

                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="#">Nửa trên</a>
                     <a href="/product-list?gender=men&category=&attribute=basic-tee-tron">Basic Tee</a>
                     <a href="/product-list/?gender=&category=&attribute=graphic-tee">Graphic tee</a>
                     <a href="/product-list?gender=&category=&attribute=sweatshirt">Sweatshirt</a>
                     <a href="/product-list?gender=&category=&attribute=hoodie">Hoodie</a>
                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="#">Phụ kiện</a>
                     <a href="/product-list?gender=men&category=&attribute=hat">Nón</a>
                     <a href="/product-list?gender=men&category=&attribute=shoelaces">Dây giày</a>
                     <a href="/product-list?gender=men&category=&attribute=socks">Vớ</a>
                     <a href="/product-list?gender=men&category=&attribute=backpack">Ba lô & Túi</a>
                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="/product-list?gender=men&category=top,bottom,accessories&attribute=">Xem tất cả</a>
                     <a class="blank">&nbsp;</a>
                   </li>
                   <div class="style2-des"><a href="/coming-soon/">MỌI NGƯỜI THƯỜNG GỌI CHÚNG TÔI LÀ <span class="highlight">DỨA</span> !</a></div>
                 </ul>
               </li>

               <li class="line"></li>
               <li class=" nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="https://ananas.vn/product-list/?gender=men" id="navbarDropdown">NỮ<span class="caret"></span></a>
                 <ul class="dropdown-menu style2">
                   <li>
                     <a href="" class="title">NỔI BẬT</a>

                     <a class="blank">&nbsp;</a>
                     <a class="title1" href=""></a>
                     <a href="/product-list?gender=women&category=&attribute=best-seller">Best Seller</a>
                     <a href="/product-list?gender=women&category=&attribute=new-arrival">New Arrival</a>
                     <a href="/product-list?gender=women&category=&attribute=sale-off">Sale-off</a>
                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="#">Bộ sưu tập</a>
                     <a href="/product-list?gender=&category=&attribute=pineapple-or-ananas">Pineapple Or Ananas</a>
                     <a href="/product-list?gender=&category=&attribute=corluray">Corluray</a>
                     <a href="/product-list?gender=men,women&category=&attribute=bst-unsettling">Unsettling</a>
                     <a href="/product-list?gender=&category=&attribute=irrelevent">Irrelevent</a>
                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="#">Collaboration</a>
                     <a href="/product-list/?gender=&category=&attribute=ananas-lucky-luke">Ananas x Lucky Luke</a>
                     <a class="blank">&nbsp;</a>
                   </li>
                   <li class="style2-divider"></li>
                   <li>
                     <a href="" class="title">GIÀY</a>

                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="#">Dòng sản phẩm</a>
                     <a href="/product-list?gender=women&category=&attribute=basas">Basas</a>
                     <a href="/product-list?gender=women&category=&attribute=vintas">Vintas</a>
                     <a href="/product-list?gender=women&category=&attribute=urbas">Urbas</a>
                     <a href="/product-list?gender=women&category=&attribute=pattas">Pattas</a>
                     <a href="/product-list?gender=women&category=&attribute=creas">Creas</a>
                     <a href="/product-list?gender=women&category=&attribute=track-6">Track 6</a>
                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="#">Style</a>
                     <a href="/product-list?gender=men&category=&attribute=high-top?gender=women&category=&attribute=high-top">High Top</a>
                     <a href="/product-list?gender=men&category=&attribute=high-top?gender=women&category=&attribute=low-top">Low Top</a>
                     <a href="/product-list?gender=men&category=&attribute=high-top?gender=women&category=&attribute=slip-on">Slip-on</a>
                     <a class="blank">&nbsp;</a>
                   </li>
                   <li>
                     <a href="/product-list?gender=women&category=top,bottom,accessories&attribute=" class="title">THỜI TRANG & PHỤ KIỆN</a>

                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="#">Nửa trên</a>
                     <a href="/product-list?gender=women&category=&attribute=basic-tee-tron">Basic Tee</a>
                     <a href="/product-list/?gender=&category=&attribute=graphic-tee">Graphic Tee</a>
                     <a href="/product-list?gender=&category=&attribute=sweatshirt">Sweatshirt</a>
                     <a href="/product-list?gender=&category=&attribute=hoodie">Hoodie</a>
                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="#">Phụ kiện</a>
                     <a href="/product-list?gender=women&category=&attribute=hat">Nón</a>
                     <a href="/product-list?gender=women&category=&attribute=shoelaces">Dây giày</a>
                     <a href="/product-list?gender=men&category=&attribute=socks">Vớ</a>
                     <a href="/product-list?gender=women&category=&attribute=backpack">Ba lô & Túi</a>
                     <a class="blank">&nbsp;</a>
                     <a class="title1" href="/product-list?gender=women&category=top,bottom,accessories&attribute=">Xem tất cả</a>
                     <a class="blank">&nbsp;</a>
                   </li>
                   <div class="style2-des"><a href="/coming-soon/">MỌI NGƯỜI THƯỜNG GỌI CHÚNG TÔI LÀ <span class="highlight">DỨA</span> !</a></div>
                 </ul>
               </li>

               <li class="line"></li>
               <li><a class="nav-link" href="https://ananas.vn/promotion/clearance-sale/">SALE OFF</a></li>
               <li class="line"></li>
               <li><a class="nav-link" href="https://ananas.vn/discoveryou"><img src="./assets/img/DiscoverYOU.svg"></a></li>
             </ul>

             <!-- SEARCH BOX -->
             <form class="col-lg-3 col-12 search-box form-inline my-2 my-lg-0 ">
               <input class="search-box__input form-control" type="search" placeholder="Search" aria-label="Search">
               <button class="search-box__btn" type="submit"><i class="fas fa-search"></i></button>
             </form>
           </div>
           <!-- User -->

           <?php if ($currentUser) : ?>
             <a href="profile.php" class="btn-profile rounded-circle ml-1">
               <img class="btn-profile--img " src="avatar.php?id=<?php echo $currentUser['id']; ?>" alt="">
             </a>
           <?php else : ?>
             <a href="profile.php" class="btn-profile rounded-circle ml-1">
               <img class="btn-profile--img " src="avatar.php?id=<?php echo $currentUser['id']; ?>" alt="">
             </a>
           <?php endif; ?>


         </nav>

       </div>


       <div class="row">

         <div class="hot-news-cont">
           <div class="hot-news-slide">
             <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                 <div class="carousel-item active" data-interval="3000">
                   <div class="cont-item d-block w-100 text-center"><a href="https://ananas.vn/faqs/">FREE SHIPPING VỚI HOÁ ĐƠN TỪ 800K !</a></div>
                 </div>
                 <div class="carousel-item" data-interval="3000">
                   <div class="cont-item d-block w-100  text-center"><a href="https://ananas.vn/policy/">HÀNG 2 TUẦN NHẬN ĐỔI - GIÀY NỬA NĂM BẢO HÀNH</a></div>
                 </div>
                 <div class="carousel-item" data-interval="3000">
                   <div class="cont-item d-block w-100  text-center"><a href="https://ananas.vn/faq">BUY MORE PAY LESS - ÁP DỤNG KHI MUA PHỤ KIỆN</a></div>
                 </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                 <span class="text-black carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                 <span class="text-black carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
               </a>
             </div>
           </div>
         </div>

       </div>
       <div id="content" style="min-height:100vh;">
         <div class="container pt-3">
           <?php if ($title != "Home") : ?>
             <h1 class="display-4 text-center font-weight-normal"><?php echo $title ?></h1>
           <?php endif; ?>