<?php $title ='Your cart'; ?>
<?php include './header.php'; ?>

<div class="main-cart container-fluid" data-cart-list="">
<!--Section: Block Content-->
<section>

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col-lg-8 mb-4">

      <!-- Card -->
      <div class="card wish-list pb-1">
        <div class="card-body">

          <h4 class="font-weight-bold mb-4">Thông tin giao hàng</h4>

          <!-- Full name-->
          <div class="md-form md-outline my-0">
            <input type="text" name ="full_name" id="full_name" class="form-control mb-0">
            <label for="full_name">Họ và tên</label>
          </div>
          <!-- Full name -->

          <!-- Address -->
          <div class="md-form md-outline">
            <input type="text" name="address" id="address"  class="form-control">
            <label for="address">Địa chỉ</label>
          </div>

          <!-- Town / City -->
          <div class="md-form md-outline">
            <input type="text"  name="city" id="city" class="form-control">
            <label for="city">Tỉnh / Thành phố</label>
          </div>

          <!-- Phone -->
          <div class="md-form md-outline">
            <input type="number" name ="number_phone" id="number_phone" class="form-control">
            <label for="number_phone">Số điện thoại</label>
          </div>

          <!-- Email address -->
          <div class="md-form md-outline">
            <input type="email" name ="email" id="email" class="form-control">
            <label for="email">Email</label>
          </div>

          <!-- Additional information -->
          <div class="md-form md-outline">
            <textarea id="form76" class="md-textarea form-control" rows="4"></textarea>
            <label for="form76">Additional information</label>
          </div>


        </div>
      </div>
      <!-- Card -->

    </div>
    <!--Grid column-->

     <!--CART BILL-->
     <div class="col-lg-4">

<!-- Card -->
<div class="card mb-3">
    <div class="card-body">

        <h4 class="font-weight-bold mb-3">Đơn hàng</h4>
        <hr>
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Hóa đơn
                <span class="totalPriceOfCart">250.000 VNĐ</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Giảm giá
                <span class="totalDiscountOfCart">0 VNĐ</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                    <h4><strong>Tạm tính</strong></h4>
                </div>
                <h4><strong><span class="tempPrice">250.000 VND</span></strong></h4>
            </li>
        </ul>

        <a href="./checkout.php" class="btn bg-primary-color btn-primary-color btn-block waves-effect waves-light">Tiếp tục thanh toán</a>

    </div>
</div>
<!-- Card -->

<!-- Card -->
<div class="card mb-3">
    <div class="card-body">

        <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
            Mã khuyến mãi
            <span><i class="fas fa-chevron-down pt-1"></i></span>
        </a>

        <div class="collapse" id="collapseExample1">
            <div class="mt-3">
                <div class="md-form md-outline mb-0">
                    <input type="text" id="discount-code1" class="form-control font-weight-light" placeholder="Enter discount code">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Card -->

</div>
<!--CART BILL-->

  </div>
  <!--Grid row-->

</section>
<!--Section: Block Content-->
<?php include './footer.php'; ?>