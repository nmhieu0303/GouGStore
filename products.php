<?php require_once 'init.php';
$title = "";
?>

<?php include 'header.php'; ?>
<div id="content" class="mb-4">
    <div class="container pt-3">


        <div class="prd-detail container-fluid">
            <input type="hidden" id="is-page-product-detail" value="1">
            <div class="row">
                <!-- Breadcrumb -->
                <div class="col-xs-12 col-sm-12 col-md-12 hidden-xs hidden-sm">
                    <ol class="breadcrumb">
                        <li><a href="/product-list?gender=&amp;category=shoes&amp;attribute=">Giày</a></li>
                        <li><a href="/product-list/?gender=&amp;category=&amp;attribute=urbas">Urbas</a></li>
                        <li class="active">Urbas Unsettling - Low Top</li>
                    </ol>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <!-- Image product -->
                    <div class="row prd-detail-img">
                        <div class="slider-product-img">
                            <!-- Large image  -->
                            <div class="slider slider-for">
                                <div class="prd-detail-main-img">
                                    <img class="main-img" src="./assets/img/pro_A61102_1.jpg">
                                </div>
                                <div class="prd-detail-main-img">
                                    <img class="main-img" src="./assets/img/pro_A61102_2.jpg">
                                </div>
                                <div class="prd-detail-main-img">
                                    <img class="main-img" src="./assets/img/pro_A61102_3.jpg">
                                </div>
                                <div class="prd-detail-main-img">
                                    <img class="main-img" src="./assets/img/pro_A61102_4.jpg">
                                </div>
                                <div class="prd-detail-main-img">
                                    <img class="main-img" src="./assets/img/pro_A61102_5.jpg">
                                </div>
                            </div>
                            <!-- Image thumbnails -->
                            <div class="slider slider-nav responsive">
                                <div>
                                    <img class="main-img item" src="./assets/img/pro_A61102_1.jpg">
                                </div>
                                <div>
                                    <img class="main-img item" src="./assets/img/pro_A61102_2.jpg">
                                </div>
                                <div>
                                    <img class="main-img item" src="./assets/img/pro_A61102_3.jpg">
                                </div>
                                <div>
                                    <img class="main-img item" src="./assets/img/pro_A61102_4.jpg">
                                </div>
                                <div>
                                    <img class="main-img item" src="./assets/img/pro_A61102_5.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product review -->

                    <div class="row product-review mt-3">
                        <div class="product-review__header d-flex w-100 justify-content-between align-items-center border-bottom">
                            <h4>
                                Đánh giá
                            </h4>
                            <a class="product__review--count" data-toggle="collapse" href="#product-review__list" role="button" aria-expanded="false" aria-controls="product-review__list">
                                <span class="product__review--number">5</span> Bình luận
                            </a>
                        </div>
                        <!-- Review list -->
                        <ul id="product-review__list" class="list-unstyled collapse">
                            <!-- Review item -->
                            <li class="product-review__item">
                                <a href="#" class="product-review__avatar mr-3">
                                    <img class="product-review__avatar--img" src="avatar.php?id= '<?php echo $_SESSION['userId'] ?>'" alt="">
                                </a>
                                <div class="product-review__main">
                                    <a href="#" class="product-review__author">Nguyễn Minh Hiếu</a>
                                    <div class="product-review__rating">
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                    </div>
                                    <p class="product-review__content">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur officiis reprehenderit, autem, harum expedita, a eius beatae nesciunt aliquid omnis ab quibusdam vero illo dignissimos. Obcaecati expedita ratione unde voluptatem?
                                    </p>
                                    <small class="product-review__time">2020-11-19 14:22</small>
                                </div>
                            </li>
                            <!-- Review item -->
                            <li class="product-review__item">
                                <a href="#" class="product-review__avatar mr-3">
                                    <img class="product-review__avatar--img" src="avatar.php?id= '<?php echo $_SESSION['userId'] ?>'" alt="">
                                </a>
                                <div class="product-review__main">
                                    <a href="#" class="product-review__author">Nguyễn Minh Hiếu</a>
                                    <div class="product-review__rating">
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                    </div>
                                    <p class="product-review__content">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur officiis reprehenderit, autem, harum expedita, a eius beatae nesciunt aliquid omnis ab quibusdam vero illo dignissimos. Obcaecati expedita ratione unde voluptatem?
                                    </p>
                                    <small class="product-review__time">2020-11-19 14:22</small>
                                </div>
                            </li>
                            <!-- Review item -->
                            <li class="product-review__item">
                                <a href="#" class="product-review__avatar mr-3">
                                    <img class="product-review__avatar--img" src="avatar.php?id= '<?php echo $_SESSION['userId'] ?>'" alt="">
                                </a>
                                <div class="product-review__main">
                                    <a href="#" class="product-review__author">Nguyễn Minh Hiếu</a>
                                    <div class="product-review__rating">
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                    </div>
                                    <p class="product-review__content">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur officiis reprehenderit, autem, harum expedita, a eius beatae nesciunt aliquid omnis ab quibusdam vero illo dignissimos. Obcaecati expedita ratione unde voluptatem?
                                    </p>
                                    <small class="product-review__time">2020-11-19 14:22</small>
                                </div>
                            </li>
                            <!-- Review item -->
                            <li class="product-review__item">
                                <a href="#" class="product-review__avatar mr-3">
                                    <img class="product-review__avatar--img" src="avatar.php?id= '<?php echo $_SESSION['userId'] ?>'" alt="">
                                </a>
                                <div class="product-review__main">
                                    <a href="#" class="product-review__author">Nguyễn Minh Hiếu</a>
                                    <div class="product-review__rating">
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                    </div>
                                    <p class="product-review__content">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur officiis reprehenderit, autem, harum expedita, a eius beatae nesciunt aliquid omnis ab quibusdam vero illo dignissimos. Obcaecati expedita ratione unde voluptatem?
                                    </p>
                                    <small class="product-review__time">2020-11-19 14:22</small>
                                </div>
                            </li>
                            <!-- Review item -->
                            <li class="product-review__item">
                                <a href="#" class="product-review__avatar mr-3">
                                    <img class="product-review__avatar--img" src="avatar.php?id= '<?php echo $_SESSION['userId'] ?>'" alt="">
                                </a>
                                <div class="product-review__main">
                                    <a href="#" class="product-review__author">Nguyễn Minh Hiếu</a>
                                    <div class="product-review__rating">
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="rating-svg-icon">
                                            <polygon points="7.5 .8 9.7 5.4 14.5 5.9 10.7 9.1 11.8 14.2 7.5 11.6 3.2 14.2 4.3 9.1 .5 5.9 5.3 5.4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polygon>
                                        </svg>
                                    </div>
                                    <p class="product-review__content">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur officiis reprehenderit, autem, harum expedita, a eius beatae nesciunt aliquid omnis ab quibusdam vero illo dignissimos. Obcaecati expedita ratione unde voluptatem?
                                    </p>
                                    <small class="product-review__time">2020-11-19 14:22</small>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

                <!-- Infomation product -->
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 prd-detail-right">
                    <h3 class="font-weight-bold">Urbas Unsettling - Low Top - Starlight/Lavender</h3>
                    <h6 class="mt-4 mb-4 d-flex justify-content-between">
                        <span class="pull-left">Mã sản phẩm: <strong>A61102</strong></span>
                        <span class="pull-right">Tình trạng: <strong>New Arrival</strong></span>
                    </h6>
                    <div class="mt-4 mb-4">
                        <h6 class="price"><del>590.000 VND</del></h6>
                        <h4 class="saleprice">490.000 VND</h4>
                    </div>
                    <div class="divider"></div>
                    <h6 class="mt-4 mb-4">Sở hữu công thức pha màu "khó chịu". Urbas Unsettling tạo nên điểm nhấn mạnh mẽ, gây kích thích thị giác thông qua sự đối lập trong từng gam màu. Điểm chốt hạ cho một outfit đặc biệt thú vị, tách biệt khỏi sự trùng lặp thông thường. </h6>
                    <div class="divider"></div>
                    <!-- Color -->
                    <div class="color">
                        <ul class="nav tree">
                            <li class="cb-color-fixed">
                                <label data-link=""><span class="bg-color" style="background-color: #b4cfd9;"></span><input name="cbColor" type="checkbox" value="0" hidden=""></label>
                                <label data-link="https://ananas.vn/product-detail/a61106/"><span class="bg-color" style="background-color: #b4cfd9;"></span><input name="cbColor" type="checkbox" value="0" hidden=""></label>
                                <label data-link="https://ananas.vn/product-detail/a61107/"><span class="bg-color" style="background-color: #303e55;"></span><input name="cbColor" type="checkbox" value="0" hidden=""></label>
                                <label data-link="https://ananas.vn/product-detail/a61103/"><span class="bg-color" style="background-color: #303e55;"></span><input name="cbColor" type="checkbox" value="0" hidden=""></label>
                            </li>
                        </ul>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h5 class=" mt-2 font-weight-bold">SIZE</h5>
                            <select id="pickSize" class="custom-select btn-group bootstrap-select">
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h5 class="mt-2 font-weight-bold">SỐ LƯỢNG</h5>
                            <select id="pickQuantity" class="custom-select btn-group bootstrap-select">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                    </div>
                    <div class="row grp-btn1">
                        <a href="" class="btn btn-addcart" id="addProductToCart" data-ananas-validations="">THÊM VÀO GIỎ HÀNG</a>
                        <a href="" data-idproduct="253661" class="btn btn-like addToWishList" data-isproductlistpage="0" data-liked="false" data-action="transferCartToWishList" data-img="https://ananas.vn/wp-content/themes/ananas/fe-assets/images/svg/Heart_product_1.svg" data-img-like="https://ananas.vn/wp-content/themes/ananas/fe-assets/images/svg/Heart_product_2.svg ?" data-img-unlike="https://ananas.vn/wp-content/themes/ananas/fe-assets/images/svg/Heart_product_1.svg">
                            <img id="image-heart" src="https://ananas.vn/wp-content/themes/ananas/fe-assets/images/svg/Heart_product_1.svg"></a>
                    </div>
                    <div class="row">
                        <a data-url-cart="https://ananas.vn/your-cart" id="pickOrder" data-ananas-validations="" class="btn btn-checkout">THANH TOÁN</a>
                        <input type="hidden" id="_wpnonce" name="_wpnonce" value="b2da4192a6"><input type="hidden" name="_wp_http_referer" value="/product-detail/a61102/"> </div>
                    <div class="row info-validate empty-error" style="display: none;">
                        Vui lòng chọn Size/Số lượng phù hợp
                    </div>

                    <!-- Details info -->
                    <div>
                        <div class="panel-group" id="prdDetailInfor" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a class="dropdown-toggle" role="button" data-toggle="collapse" data-parent="#prdDetailInfor" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            THÔNG TIN SẢN PHẨM <span class="caret"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="divider-1"></div>
                                    <div class="panel-body">
                                        <h6>
                                            <p>
                                                Gender: Unisex<br>
                                                Size run: 35 – 46<br>
                                                Upper: Canvas<br>
                                                Outsole: Rubber<br>
                                            </p>
                                            <p><img class="alignnone size-full wp-image-6905" src="https://ananas.vn/wp-content/uploads/Size-chart-1-e1559209680920.jpg" alt="" width="500" height="358"></p>
                                        </h6>
                                    </div>
                                </div>
                                <div class="divider-1"></div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">

                                        <a class="dropdown-toggle collapsed" role="button" data-toggle="collapse" data-parent="#prdDetailInfor" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            QUY ĐỊNH ĐỔI SẢN PHẨM <span class="caret"></span>
                                        </a>

                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="divider-1"></div>
                                    <div class="panel-body">
                                        <h6>
                                            <ul>
                                                <li>Chỉ đổi hàng 1 lần duy nhất, mong bạn cân nhắc kĩ trước khi quyết định.</li>
                                                <li>Thời hạn đổi sản phẩm khi mua trực tiếp tại cửa hàng là 07 ngày, kể từ ngày mua. Đổi sản phẩm khi mua online là 14 ngày, kể từ ngày nhận hàng.</li>
                                                <li>Sản phẩm đổi phải kèm hóa đơn. Bắt buộc phải còn nguyên tem, hộp, nhãn mác.</li>
                                                <li>Sản phẩm đổi không có dấu hiệu đã qua sử dụng, không giặt tẩy, bám bẩn, biến dạng.</li>
                                                <li>Ananas chỉ ưu tiên hỗ trợ đổi size. Trong trường hợp sản phẩm hết size cần đổi, bạn có thể đổi sang 01 sản phẩm khác:<br>
                                                    - Nếu sản phẩm muốn đổi ngang giá trị hoặc có giá trị cao hơn, bạn sẽ cần bù khoảng chênh lệch tại thời điểm đổi (nếu có).<br>
                                                    - Nếu bạn mong muốn đổi sản phẩm có giá trị thấp hơn, chúng tôi sẽ không hoàn lại tiền.</li>
                                                <li>Trong trường hợp sản phẩm - size bạn muốn đổi không còn hàng trong hệ thống. Vui lòng chọn sản phẩm khác.</li>
                                                <li>Không hoàn trả bằng tiền mặt dù bất cứ trong trường hợp nào. Mong bạn thông cảm.</li>
                                            </ul>
                                        </h6>
                                    </div>
                                </div>
                                <div class="divider-1"></div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class=" dropdown-toggle collapsed" role="button" data-toggle="collapse" data-parent="#prdDetailInfor" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            BẢO HÀNH THẾ NÀO ? <span class="caret"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="divider-1"></div>
                                    <div class="panel-body">
                                        <h6>
                                            <p>Mỗi đôi giày Ananas trước khi xuất xưởng đều trải qua nhiều khâu kiểm tra. Tuy vậy, trong quá trình sử dụng, nếu nhận thấy các lỗi: gãy đế, hở đế, đứt chỉ may,...trong thời gian 6 tháng từ ngày mua hàng, mong bạn sớm gửi sản phẩm về Ananas nhằm giúp chúng tôi có cơ hội phục vụ bạn tốt hơn. Vui lòng gửi sản phẩm về bất kỳ cửa hàng Ananas nào, hoặc gửi đến trung tâm bảo hành Ananas ngay trong trung tâm TP.HCM trong giờ hành chính:</p>
                                            <p>Lầu 1, 75/1 Mai Thị Lựu, P. Đa Kao, Q1, TP.HCM<br>
                                                Hotline: 028 3526 7774 </p>
                                        </h6>
                                    </div>
                                </div>
                                <div class="divider-1 hidden-xs hidden-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 visible-xs visible-sm">
                    <div class="row prd-detail-img">
                    </div>
                </div>

            </div>
        </div>

        <?php include 'footer.php'; ?>