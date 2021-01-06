<?php

$id_cart = 1;
if (
    isset($POST["product"]) && isset($POST["user"])
    && isset($POST["color"])  && isset($POST["image"])
)
?>
<!-- CART FIXED -->
<div class="cartfixed d-none d-md-block  hidden-xs hidden-sm" data-target="#shop_cart" data-toggle="collapse">
    <span id="countProductCartFixed"><?php echo getCountCartDetail($id_cart); ?></span><br>
    <i class="fas fa-shopping-cart header__item-icon"></i>

    <div id="shop_cart" class="cart collapse">
        <span class="caret"></span>
        <ul class="list-group">
            <li class="list-group-item title">GIỎ HÀNG (<span id="countProduct"><?php echo getCountCartDetail($id_cart); ?></span>)</li>
            <li class="list-group-item divider"></li>
            <!-- LIST ITEM IN CART -->
            <li class="list-group-item items">
                <!-- ITEM -->
                <div class="media product-2854-free">
                    
                    <div class="media-left is-mini-cart">
                        <a href="#"><img class="media-object" src="https://ananas.vn/wp-content/uploads/pro_ABC003_1.jpg" data-holder-rendered="true"></a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Baseball Cap - Live in the moment -Black</h4>
                        <h5>
                            <span class="price"> 250.000 VNĐ</span>

                        </h5>
                        <div style="display:none;"><span class="productId" hidden="hidden"></span><span class="value">2854</span></div>
                        <h5><span class="size">Size:</span><span class="value">free</span>
                        </h5>
                        <h5><span class="quantity">Số lượng:</span><span class="value">1</span></h5>
                    </div>
                    
                </div>
                <!-- ITEM -->
                <div class="divider"></div>
                <!-- ITEM -->
                <div class="media product-2854-free">
                    <div class="media-left is-mini-cart">
                        <a href="#"><img class="media-object" src="https://ananas.vn/wp-content/uploads/pro_ABC003_1.jpg" data-holder-rendered="true"></a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Baseball Cap - Live in the moment -Black</h4>
                        <h5>
                            <span class="price"> 250.000 VNĐ</span>

                        </h5>
                        <div style="display:none;"><span class="productId" hidden="hidden"></span><span class="value">2854</span></div>
                        <h5><span class="size">Size:</span><span class="value">free</span>
                        </h5>
                        <h5><span class="quantity">Số lượng:</span><span class="value">1</span></h5>
                    </div>
                </div>
                <!-- ITEM -->
                <div class="divider"></div>
                <!-- ITEM -->
                <div class="media product-2854-free">
                    <div class="media-left is-mini-cart">
                        <a href="#"><img class="media-object" src="https://ananas.vn/wp-content/uploads/pro_ABC003_1.jpg" data-holder-rendered="true"></a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Baseball Cap - Live in the moment -Black</h4>
                        <h5>
                            <span class="price"> 250.000 VNĐ</span>

                        </h5>
                        <div style="display:none;"><span class="productId" hidden="hidden"></span><span class="value">2854</span></div>
                        <h5><span class="size">Size:</span><span class="value">free</span>
                        </h5>
                        <h5><span class="quantity">Số lượng:</span><span class="value">1</span></h5>
                    </div>
                </div>
                <!-- ITEM -->

            </li>
            <!-- LIST ITEM IN CART -->
            <li class="list-group-item divider"></li>
            <li class="list-group-item total"><span class="float-left">Tổng cộng:</span><span class="float-right tright">0 VNĐ</span></li>
            <li class="list-group-item butn">
                <a href="./yourCart.php" class="btn btn-checkout mini-cart-checkout">THANH TOÁN</a>
            </li>
            <li class="list-group-item butn">
                <a href="javascript:void(0)" class="btn btn-addlike multipleAddLike">THÊM VÀO YÊU THÍCH</a>
            </li>
        </ul>
    </div>
</div>