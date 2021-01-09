<?php require_once 'init.php';

repquireLoggedIn();
$id_cart = $_SESSION["cartId"];

$title = 'Your cart';
$id_user = $_SESSION['userId'];

if (isset($_POST["remove"])) {
    $id_product = $_POST["id_product"];
    removeWishItem($id_product, $id_user);
}

if (isset($_POST["add"])) {
    $id_product = $_POST["id_product"];
    addWishItem($id_product, $id_user);
}

?>


<?php include './header.php'; ?>

<div class="main-cart container-fluid" >
    <!--Section: Block Content-->
    <section>

        <!--Grid row-->
        <div class="row">
        <h3 class="text-center my-5 font-weight-bold w-75 mx-auto">SẢN PHẨM YÊU THÍCH</h3>
            <!--LIST PRODUCT IN CART-->
            <div class="col-lg-10 m-auto">

                <!-- Card -->
                <div class="card wish-list mb-3">
                    <div class="card-body ">
                        <h5 class="font-weight-bold mb-4">Sản phẩm  (<span id="number_cart-detail" class="cart--count-item"><?php echo getCountWishItem($id_user); ?></span> sản phẩm)</h5>

                        <!-- CART DETAILS -->
                        <?php echo renderWishlist($id_user) ?>
                        <!-- END CART DETAILS -->

            
                    </div>
                </div>
                <!-- Card -->

            </div>
            <!--LIST PRODUCT IN CART-->
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
                $("#countProductCartFixed").text($(".cart-detail--item").length);
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