<!-- Start footer -->
<div class="footer container ">
 <div class="row d-flex text-center mt-5">
  <div class="col-md-3  ">
   <h3>SẢN PHẨM</h3>
   <p>Giày nữ</p>
   <p>Giày nam</p>
   <p>Thời trang</p>
   <p>Sale-off</p>
  </div>
  <div class="col-md-3 ">
   <h3>CÔNG TY</h3>
  </div>
  <div class="col-md-3 ">
   <h3>HỖ TRỢ</h3>
  </div>
  <div class="col-md-3 ">
   <h3>LIÊN HỆ</h3>
  </div>
 </div>
</div>

<!-- end footer -->
<!-- CART FIXED -->
<div class="cartfixed d-none d-md-block  hidden-xs hidden-sm" data-target="#shop_cart" data-toggle="collapse">
    <span class="countProduct">0</span><br>
    <i class="fas fa-shopping-cart header__item-icon"></i>

    <div id="shop_cart" class="cart collapse">
        <span class="caret"></span>
        <ul class="list-group">
            <li class="list-group-item title">GIỎ HÀNG (<span class="countProduct">0</span>)</li>
            <li class="list-group-item divider"></li>
            <li class="list-group-item items">
                            </li>
                        <li class="list-group-item total"><span class="float-left">Tổng cộng:</span><span class="float-right tright">0 VNĐ</span></li>
            <li class="list-group-item butn">
                <a href="https://ananas.vn/your-cart/" class="btn btn-checkout mini-cart-checkout">THANH TOÁN</a>
            </li>
            <li class="list-group-item butn">
                <a href="javascript:void(0)" class="btn btn-addlike multipleAddLike">THÊM VÀO YÊU THÍCH</a>
            </li>
        </ul>
    </div>
</div>

<script>
function loadFile(event) {
 var imgInput = document.getElementById("img-preview");
 imgInput.src = URL.createObjectURL(event.target.files[0]);
}
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
 $('.js-example-basic-single').select2();
});


</script>

<!-- Slick -->
<script type="text/javascript" src='./assets/js/slick.js'></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>


<script src="./assets/js/main.js"></script>

</body>

</htm>
