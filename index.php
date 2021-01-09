<?php
require_once 'init.php';
$title="Trang chủ";
// Xử lý logic ở đây
if(isset($_POST["unsetBill"])){
  unset($_SESSION["id_bill"]);
}

if (isset($_POST['content-post']) && isset($_FILES["img-post"])) {
  $file = $_FILES["img-post"];
  $img = file_get_contents($file['tmp_name']);
  header('Location: index.php');
  exit();
}

?>

<?php include 'header.php'; ?>

<?php include 'slidePanner.php'; ?>

<!-- NEW ARRAIVAL-->
<div class="bg-gradient-primary">
  <div class="home-new-arrial container-fluid">
    <div class="prd-detail-title">NEW ARRIVAL</div>
    <div class="slider prd-detail-slide">
     <?php 
         $products = getNewProduct();
        echo renderThumbnailProductListHome($products);
      ?>
    </div>
  </div>
</div>
<!-- SALE OFF -->
<div class="home-sale-off container-fluid">
  <div class="prd-detail-title">SALE OFF</div>
  <div class="slider prd-detail-slide">
     <?php 
         $products = getSaleProduct();
        echo renderThumbnailProductListHome($products);
      ?>
  </div>
</div>

<!-- BEST SELLER -->
<div class="home-best-seller container-fluid">
  <div class="prd-detail-title">BEST SELLER</div>
  <div class="slider prd-detail-slide">
  <?php 
         $products = getHotProduct();
        echo renderThumbnailProductListHome($products);
      ?>
  </div>
</div>

<?php include 'footer.php'; ?>