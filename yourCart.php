<?php require_once 'init.php';
$title = 'Your cart';

$id_cart = 1;

if (isset($_POST["addCartDetail"])) {
    $id_cart = 1;
    $id_cartDetail = $_POST["id_product"];
    $quantity = $_POST["quantity"];
    $size = $_POST["size"];
    $price = (int)$_POST["price"];
    addCartDetail($id_cart, $id_cartDetail, $size, $quantity,$price);
}

if (isset($_POST["updateQuatity"])) {
    $id_cart = 1;
    $id_cartDetail = $_POST["id_cartDetail"];
    $newQuantity = $_POST["newQuantity"];
    updateCartDetail($id_cart, $id_cartDetail, $newQuantity);
}

if (isset($_POST["removeCartDetail"])) {
    $id_cart = 1;
    $id_cartDetail = $_POST["id_cartDetail"];
    removeCartDetail($id_cart, $id_cartDetail);
}
?>


<?php include './header.php'; ?>

<div class="main-cart container-fluid" data-cart-list="">
    <!--Section: Block Content-->
    <section>

        <!--Grid row-->
        <div class="row">

            <!--LIST PRODUCT IN CART-->
            <div class="col-lg-8">

                <!-- Card -->
                <div class="card wish-list mb-3">
                    <div class="card-body">
<<<<<<< HEAD
                        <h5 class="font-weight-bold mb-4">Giỏ hàng (<span class="cart--count-item">2</span> sản phẩm)</h5>
                        <!-- Product card -->
                        <div class="row mb-4">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                    <img class="img-fluid w-100" src="./assets/img/pro_2-500x500.jpg" alt="Sample">
                                    <a href="#!">
                                        <div class="mask waves-effect waves-light">
                                            <img class="img-fluid w-100" src="./assets/img/pro_3-500x500.jpg">
                                            <div class="mask rgba-black-slight waves-effect waves-light"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-9 col-xl-9">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div class="cart__product-info">
                                            <a href="./products.php">
                                                <h5 class="cart__product-info--heading">Blue denim shirt</h5>
                                            </a>
                                            <p class="cart__product-info--dsc mb-3 text-muted text-uppercase small">Shirt - blue</p>
                                            <p class="cart__product-info--dsc mb-2 text-muted text-uppercase small">Màu: <span class="cart__product-info--color">blue</span></p>
                                            <p class="cart__product-info--dsc mb-3 text-muted text-uppercase small">Size:<span class="cart__product-info--size"> M<span></p>
                                        </div>
                                        <div>
                                            <div class="def-number-input number-input safari_only mb-0 w-100">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus">-</button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i class="fas fa-trash-alt mr-1"></i> Xóa sản phảm</a>
                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i class="fas fa-heart mr-1"></i> Thêm vào danh sách yêu thích </a>
                                        </div>
                                        <p class="mb-0"><span class="cart__product-info--price"><strong>$17.99</strong></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End product card -->
                        <hr class="mb-4">
                        <!-- Product card -->
                        <div class="row mb-4">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                    <img class="img-fluid w-100" src="./assets/img/pro_2-500x500.jpg" alt="Sample">
                                    <a href="#!">
                                        <div class="mask waves-effect waves-light">
                                            <img class="img-fluid w-100" src="./assets/img/pro_3-500x500.jpg">
                                            <div class="mask rgba-black-slight waves-effect waves-light"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-9 col-xl-9">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div class="cart__product-info">
                                            <a href="./products.php">
                                                <h5 class="cart__product-info--heading">Blue denim shirt</h5>
                                            </a>
                                            <p class="cart__product-info--dsc mb-3 text-muted text-uppercase small">Shirt - blue</p>
                                            <p class="cart__product-info--dsc mb-2 text-muted text-uppercase small">Màu: <span class="cart__product-info--color">blue</span></p>
                                            <p class="cart__product-info--dsc mb-3 text-muted text-uppercase small">Size:<span class="cart__product-info--size"> M<span></p>
                                        </div>
                                        <div>
                                            <div class="def-number-input number-input safari_only mb-0 w-100">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus">-</button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i class="fas fa-trash-alt mr-1"></i> Xóa sản phảm</a>
                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i class="fas fa-heart mr-1"></i> Thêm vào danh sách yêu thích </a>
                                        </div>
                                        <p class="mb-0"><span class="cart__product-info--price"><strong>$17.99</strong></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End product card -->
                        <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Hãy tiến hành thanh toán, thêm sản phẩm vào giỏ hàng của bạn không có nghĩa là đặt chúng.</p>

=======
                        <h5 class="font-weight-bold mb-4">Giỏ hàng (<span id="number_cart-detail" class="cart--count-item"><?php echo getCountCartDetail($id_cart); ?></span> sản phẩm)</h5>

                        <!-- CART DETAILS -->
                        <?php echo renderCart(1) ?>
                        <!-- END CART DETAILS -->

                        <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Hãy tiến hành thanh toán, thêm sản phẩm vào giỏ hàng của bạn không có nghĩa là đặt chúng.</p>
>>>>>>> Admin
                    </div>
                </div>
                <!-- Card -->

            </div>
<<<<<<< HEAD
           <!--LIST PRODUCT IN CART-->
=======
            <!--LIST PRODUCT IN CART-->
>>>>>>> Admin

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
<<<<<<< HEAD
                                <span class="totalPriceOfCart">250.000 VNĐ</span>
=======
                                <span class="totalPriceOfCart"><span id="totalCart"><?php echo formatCurrency(getTotalCart($id_cart))?></span> VNĐ</span>
>>>>>>> Admin
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Giảm giá
                                <span class="totalDiscountOfCart">0 VNĐ</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <h4><strong>Tạm tính</strong></h4>
                                </div>
<<<<<<< HEAD
                                <h4><strong><span class="tempPrice">250.000 VND</span></strong></h4>
=======
                                <h4><strong><span id="tempPrice"><?php echo formatCurrency(getTotalCart($id_cart))?></span> VND</strong></h4>
>>>>>>> Admin
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
<<<<<<< HEAD
           <!--CART BILL-->
=======
            <!--CART BILL-->
>>>>>>> Admin

        </div>
        <!--Grid row-->

    </section>
    <!--Section: Block Content-->
</div>

<script>
    
    function increment_quantity(id_cartDetail) {
        var inputQuantityElement = $("#input_quantity-" + id_cartDetail);
        var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
        sendNewQuantity(id_cartDetail, newQuantity);
    }

    function decrement_quantity(id_cartDetail) {
        var inputQuantityElement = $("#input_quantity-" + id_cartDetail);
        if ($(inputQuantityElement).val() > 1) {
            var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
            sendNewQuantity(id_cartDetail, newQuantity);
        }
    }

    function sendEventRemoveCartDetail(id_cartDetail) {

        $.ajax({
            url: "yourCart.php",
            data: {
                id_cartDetail: id_cartDetail,
                removeCartDetail: "",
            },
            type: 'post',
            success: function(response) {
                $("#cart-detail-" + id_cartDetail).remove();
                $("#number_cart-detail").text($(".cart-detail--item").length);
                setTotalPriceOfOrder();
            }
        });

    }

    function setTotalPriceOfOrder() {
        var totalBill = 0;
        var strTotals = document.getElementsByClassName("total_product");
        for (var i = 0; i < strTotals.length; i++) {
            totalBill += currencyToNumber(strTotals[i].textContent);
        }
        $("#tempPrice,#totalCart").text(numberToCurrency(totalBill));
    }

    // Update UI infor cart
    function updateInfoCart(id_cartDetail, new_quantity) {

        var price = currencyToNumber($("#price_product-" + id_cartDetail).text());
        var total = price * new_quantity;

        var strTotalOfProduct = numberToCurrency(total);

        $("#price_product-" + id_cartDetail).val(new_quantity);
        $("#total_product-" + id_cartDetail).text(strTotalOfProduct);

        setTotalPriceOfOrder()
        //Calc totals of cart detail

    }

    function sendNewQuantity(id_cartDetail, new_quantity) {
        var inputQuantityElement = $("#input-quantity-" + id_cartDetail);
        $.ajax({
            url: "yourCart.php",
            data: {
                id_cartDetail: id_cartDetail,
                newQuantity: new_quantity,
                updateQuatity: "",
            },
            type: 'post',
            success: function(response) {
                $("#input_quantity-" + id_cartDetail).val(new_quantity);
                updateInfoCart(id_cartDetail, new_quantity);
            }
        });
    }
</script>
<?php include './footer.php'; ?>