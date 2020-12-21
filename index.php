<?php
require_once 'init.php';
// Xử lý logic ở đây
if (isset($_POST['content-post']) && isset($_FILES["img-post"])) {
  $file = $_FILES["img-post"];
  $img = file_get_contents($file['tmp_name']);
  createNewPost($currentUser['id'], $_POST['content-post'], $img);
  renderNewFeed();
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
      <!-- item -->
      <div class="thumbnail">
        <div class="cont-item">
          <a href="./products.php" tabindex="0">
            <img src="./assets/img/pro_ABC100_1-500x500.jpg">
          </a>
        </div>
        <div class="caption">
          <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
          </h3>
          <h3 class="color">Pink</h3>
          <h3 class="price">275.000 VND</h3>
        </div>
      </div>
      <!-- End item -->
      <!-- item -->
      <div class="thumbnail">
        <div class="cont-item">
          <a href="./products.php" tabindex="0">
            <img src="./assets/img/pro_2-500x500.jpg">
          </a>
        </div>
        <div class="caption">
          <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
          </h3>
          <h3 class="color">Pink</h3>
          <h3 class="price">275.000 VND</h3>
        </div>
      </div>
      <!-- End item -->
      <!-- item -->
      <div class="thumbnail">
        <div class="cont-item">
          <a href="./products.php" tabindex="0">
            <img src="./assets/img/pro_3-500x500.jpg">
          </a>
        </div>
        <div class="caption">
          <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
          </h3>
          <h3 class="color">Pink</h3>
          <h3 class="price">275.000 VND</h3>
        </div>
      </div>
      <!-- End item -->
      <!-- item -->
      <div class="thumbnail">
        <div class="cont-item">
          <a href="./products.php" tabindex="0">
            <img src="./assets/img/pro_4-500x500.jpg">
          </a>
        </div>
        <div class="caption">
          <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
          </h3>
          <h3 class="color">Pink</h3>
          <h3 class="price">275.000 VND</h3>
        </div>
      </div>
      <!-- End item -->
      <!-- item -->
      <div class="thumbnail">
        <div class="cont-item">
          <a href="./products.php" tabindex="0">
            <img src="./assets/img/pro_5-500x500.jpg">
          </a>
        </div>
        <div class="caption">
          <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
          </h3>
          <h3 class="color">Pink</h3>
          <h3 class="price">275.000 VND</h3>
        </div>
      </div>
      <!-- End item -->
      <!-- item -->
      <div class="thumbnail">
        <div class="cont-item">
          <a href="./products.php" tabindex="0">
            <img src="./assets/img/pro_6-500x500.jpg">
          </a>
        </div>
        <div class="caption">
          <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
          </h3>
          <h3 class="color">Pink</h3>
          <h3 class="price">275.000 VND</h3>
        </div>
      </div>
      <!-- End item -->
    </div>
  </div>
</div>
<!-- SALE OFF -->
<div class="home-sale-off container-fluid">
  <div class="prd-detail-title">SALE OFF</div>
  <div class="slider prd-detail-slide">
    <!-- item -->
    <div class="thumbnail">
      <div class="cont-item">
        <a href="./products.php" tabindex="0">
          <img src="./assets/img/pro_ABC100_1-500x500.jpg">
        </a>
      </div>
      <div class="caption">
        <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
        </h3>
        <h3 class="color">Pink</h3>
        <h3 class="price-real">420.000 VND</h3>
        <h3 class="price">275.000 VND</h3>
      </div>
    </div>
    <!-- End item -->
    <!-- item -->
    <div class="thumbnail">
      <div class="cont-item">
        <a href="./products.php" tabindex="0">
          <img src="./assets/img/pro_2-500x500.jpg">
        </a>
      </div>
      <div class="caption">
        <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
        </h3>
        <h3 class="color">Pink</h3>
        <h3 class="price-real">420.000 VND</h3>
        <h3 class="price">275.000 VND</h3>
      </div>
    </div>
    <!-- End item -->
    <!-- item -->
    <div class="thumbnail">
      <div class="cont-item">
        <a href="./products.php" tabindex="0">
          <img src="./assets/img/pro_3-500x500.jpg">
        </a>
      </div>
      <div class="caption">
        <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
        </h3>
        <h3 class="color">Pink</h3>
        <h3 class="price-real">420.000 VND</h3>
        <h3 class="price">275.000 VND</h3>
      </div>
    </div>
    <!-- End item -->
    <!-- item -->
    <div class="thumbnail">
      <div class="cont-item">
        <a href="./products.php" tabindex="0">
          <img src="./assets/img/pro_4-500x500.jpg">
        </a>
      </div>
      <div class="caption">
        <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
        </h3>
        <h3 class="color">Pink</h3>
        <h3 class="price-real">420.000 VND</h3>
        <h3 class="price">275.000 VND</h3>
      </div>
    </div>
    <!-- End item -->
    <!-- item -->
    <div class="thumbnail">
      <div class="cont-item">
        <a href="./products.php" tabindex="0">
          <img src="./assets/img/pro_5-500x500.jpg">
        </a>
      </div>
      <div class="caption">
        <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
        </h3>
        <h3 class="color">Pink</h3>
        <h3 class="price-real">420.000 VND</h3>
        <h3 class="price">275.000 VND</h3>
      </div>
    </div>
    <!-- End item -->
    <!-- item -->
    <div class="thumbnail">
      <div class="cont-item">
        <a href="./products.php" tabindex="0">
          <img src="./assets/img/pro_6-500x500.jpg">
        </a>
      </div>
      <div class="caption">
        <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
        </h3>
        <h3 class="color">Pink</h3>
        <h3 class="price-real">420.000 VND</h3>
        <h3 class="price">275.000 VND</h3>
      </div>
    </div>
    <!-- End item -->

  </div>
</div>

<!-- BEST SELLER -->
<div class="home-best-seller container-fluid">
  <div class="prd-detail-title">BEST SELLER</div>
  <div class="slider prd-detail-slide">
    <!-- item -->
    <div class="thumbnail">
      <div class="cont-item">
        <a href="./products.php" tabindex="0">
          <img src="./assets/img/pro_ABC100_1-500x500.jpg">
        </a>
      </div>
      <div class="caption">
        <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
        </h3>
        <h3 class="color">Pink</h3>
        <h3 class="price">275.000 VND</h3>
      </div>
    </div>
    <!-- End item -->
    <!-- item -->
    <div class="thumbnail">
      <div class="cont-item">
        <a href="./products.php" tabindex="0">
          <img src="./assets/img/pro_2-500x500.jpg">
        </a>
      </div>
      <div class="caption">
        <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
        </h3>
        <h3 class="color">Pink</h3>
        <h3 class="price">275.000 VND</h3>
      </div>
    </div>
    <!-- End item -->
    <!-- item -->
    <div class="thumbnail">
      <div class="cont-item">
        <a href="./products.php" tabindex="0">
          <img src="./assets/img/pro_3-500x500.jpg">
        </a>
      </div>
      <div class="caption">
        <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
        </h3>
        <h3 class="color">Pink</h3>
        <h3 class="price">275.000 VND</h3>
      </div>
    </div>
    <!-- End item -->
    <!-- item -->
    <div class="thumbnail">
      <div class="cont-item">
        <a href="./products.php" tabindex="0">
          <img src="./assets/img/pro_4-500x500.jpg">
        </a>
      </div>
      <div class="caption">
        <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
        </h3>
        <h3 class="color">Pink</h3>
        <h3 class="price">275.000 VND</h3>
      </div>
    </div>
    <!-- End item -->
    <!-- item -->
    <div class="thumbnail">
      <div class="cont-item">
        <a href="./products.php" tabindex="0">
          <img src="./assets/img/pro_5-500x500.jpg">
        </a>
      </div>
      <div class="caption">
        <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
        </h3>
        <h3 class="color">Pink</h3>
        <h3 class="price">275.000 VND</h3>
      </div>
    </div>
    <!-- End item -->
    <!-- item -->
    <div class="thumbnail">
      <div class="cont-item">
        <a href="./products.php" tabindex="0">
          <img src="./assets/img/pro_6-500x500.jpg">
        </a>
      </div>
      <div class="caption">
        <h3 class="name"><a href="./products.php" tabindex="0">Baseball Cap - Be Positive</a>
        </h3>
        <h3 class="color">Pink</h3>
        <h3 class="price">275.000 VND</h3>
      </div>
    </div>
    <!-- End item -->

  </div>
</div>




<?php include 'footer.php'; ?>