<?php require_once 'init.php';
$title = "";
?>

<?php include 'header.php'; ?>
<div id="content" class="mb-4">
    <div class="container pt-3">
        <!-- List product -->
        <div class="row prd1-right-box d-none d-md-block">
            <img class="w-100 my-3" src="./assets/img/banner_productlist.jpg">
        </div>
        <div class="row prd1-right-items">
        <?php 
            $products = getProductAll();
            echo renderDataPageProductList($products); 
        ?>
        </div>
        <!-- End list product -->
        <?php include 'footer.php'; ?>