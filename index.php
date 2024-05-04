<?php
$title = "Home";
require_once "components/header.php";
?>
<!-- banner start -->
<div class="banner pt-10">
    <div class="container mxw_1360">
        <div class="banner__wrapper d-flex">
            <!-- <div class="category-nav">
                <ul class="category-nav__list list-unstyled" style="height: 100%;">
                    <li><a href="shop.php"><img src="#" class="fas fa-arrow-right" alt="">All Products</a></li>
                    <?php
                    // $row = $crud_obj->getData('category', '*');
                    // if ($row) {
                    //     foreach ($row as $value) {
                    ?>
                            <li><a href="shop.php?category=<? //= $value['category_id'] 
                                                            ?>"><img src="#" class="fas fa-arrow-right" alt=""><? //= $value['category_name'] 
                                                                                                                ?></a></li>
                    <?php
                    //     }
                    // }
                    ?>
                </ul>
            </div> -->
            <div class="banner__main banner__height ul_li bg_img" data-background="assets/img/bg/bg_19.jpg">
                <div class="hero-banner__content">
                    <span class="subtitle">100% organic Food</span>
                    <h2 class="title text-uppercase">100% Fresh Grocery <br> Combo Pack</h2>
                    <p class="content">Sumptuous, filling, and temptingly healthy.</p>
                    <h4 class="price">From <span>$99.00</span></h4>
                    <div class="banner__btn mt-30">
                        <a class="thm-btn" href="shop.html">
                            <span class="btn-wrap">
                                <span>Shop Now</span>
                                <span>Shop Now</span>
                            </span>
                            <i class="far fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="banner__img">
                    <img src="assets/img/product/img_121.png" alt="">
                </div>
                <div class="banner__ofer-box">
                    <img src="assets/img/icon/offer_bg.png" alt="">
                    <span class="offer-text"><span class="discount">30<span>%</span></span> <br>
                        <span>OFF</span></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- category start -->
<div class="category pt-35 pb-60">
    <div class="container mxw_1360">
        <div class="category__slide">
            <a class="category__item" href="#!">
                <div class="category__icon">
                    <img src="assets/img/icon/c_01.svg" alt="">
                </div>
                <h3 class="category__title">Best Deals</h3>
            </a>
            <a class="category__item" href="#!">
                <div class="category__icon">
                    <img src="assets/img/icon/c_02.svg" alt="">
                </div>
                <h3 class="category__title">Milk & Juices</h3>
            </a>
            <a class="category__item" href="#!">
                <div class="category__icon">
                    <img src="assets/img/icon/c_03.svg" alt="">
                </div>
                <h3 class="category__title">Herbal Medicine</h3>
            </a>
            <a class="category__item" href="#!">
                <div class="category__icon">
                    <img src="assets/img/icon/c_04.svg" alt="">
                </div>
                <h3 class="category__title">Frozen Foods</h3>
            </a>
            <a class="category__item" href="#!">
                <div class="category__icon">
                    <img src="assets/img/icon/c_05.svg" alt="">
                </div>
                <h3 class="category__title">Dried Food</h3>
            </a>
            <a class="category__item" href="#!">
                <div class="category__icon">
                    <img src="assets/img/icon/c_06.svg" alt="">
                </div>
                <h3 class="category__title">Breakfast & Dairy</h3>
            </a>
            <a class="category__item" href="#!">
                <div class="category__icon">
                    <img src="assets/img/icon/c_07.svg" alt="">
                </div>
                <h3 class="category__title">Cocolate Box</h3>
            </a>
            <a class="category__item" href="#!">
                <div class="category__icon">
                    <img src="assets/img/icon/c_08.svg" alt="">
                </div>
                <h3 class="category__title">Vegetables</h3>
            </a>
            <a class="category__item" href="#!">
                <div class="category__icon">
                    <img src="assets/img/icon/c_03.svg" alt="">
                </div>
                <h3 class="category__title">Herbal Medicine</h3>
            </a>
        </div>
    </div>
</div>
<!-- category end -->

<!-- banner slide start  -->
<div class="banner-slide">
    <div class="container mxw_1360">
        <div class="banner-slide__active">
            <div class="banner-slide__single">
                <div class="banner-slide__item ul_li bg_img">
                    <div class="banner-slide__img">
                        <img src="assets/img/product/img_122.png" alt="">
                    </div>
                    <div class="banner-slide__content">
                        <span class="offer">Get 30% off</span>
                        <h3>Smart Phone</h3>
                        <h4 class="price">Starting <span>560.99</span></h4>
                        <a href="shop.html">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="banner-slide__single">
                <div class="banner-slide__item ul_li bg_img" data-background="assets/img/bg/bg_20.jpg">
                    <div class="banner-slide__img">
                        <img src="assets/img/product/img_123.png" alt="">
                    </div>
                    <div class="banner-slide__content">
                        <span class="offer">Get 30% off</span>
                        <h3>Montblanc Watch</h3>
                        <h4 class="price">Starting <span>560.99</span></h4>
                        <a href="shop.html">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="banner-slide__single">
                <div class="banner-slide__item ul_li bg_img">
                    <div class="banner-slide__img">
                        <img src="assets/img/product/img_124.png" alt="">
                    </div>
                    <div class="banner-slide__content">
                        <span class="offer">Get 30% off</span>
                        <h3>SAMSUNG Galaxy</h3>
                        <h4 class="price">Starting <span>560.99</span></h4>
                        <a href="shop.html">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="banner-slide__single">
                <div class="banner-slide__item ul_li bg_img" data-background="assets/img/bg/bg_20.jpg">
                    <div class="banner-slide__img">
                        <img src="assets/img/product/img_123.png" alt="">
                    </div>
                    <div class="banner-slide__content">
                        <span class="offer">Get 30% off</span>
                        <h3>Montblanc Watch</h3>
                        <h4 class="price">Starting <span>560.99</span></h4>
                        <a href="shop.html">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner slide end  -->

<div class="pt-40">
    <div class="container mxw_1360">
        <div class="row">
            <div class="col-lg-9">
                <div class="rd-product-wrap">
                    <div class="product__nav-wrap style-2 ul_li_between mb-20">
                        <h2 class="section-heading fs-16"><span><span>Baby Items</span></span> / Gift Item /
                            Shopping </h2>
                        <ul class="product__nav style-2 nav nav-tabs" id="myTab3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="ctx-tab-01" data-bs-toggle="tab" data-bs-target="#ctx-tab1" type="button" role="tab" aria-controls="ctx-tab1" aria-selected="true">Born Vita</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="ctx-tab-02" data-bs-toggle="tab" data-bs-target="#ctx-tab2" type="button" role="tab" aria-controls="ctx-tab2" aria-selected="false">Dairy Pack</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="ctx-tab-03" data-bs-toggle="tab" data-bs-target="#ctx-tab3" type="button" role="tab" aria-controls="ctx-tab3" aria-selected="false">Milk</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="ctx-tab-04" data-bs-toggle="tab" data-bs-target="#ctx-tab4" type="button" role="tab" aria-controls="ctx-tab4" aria-selected="false">Vegetabless</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane animated fadeInUp" id="ctx-tab1" role="tabpanel" aria-labelledby="ctx-tab-01">
                            <div class="row g-0">
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_125.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Beats Flex
                                                    Wireless Earbuds – Apple W1 Headphone</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_126.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Sceptre
                                                    24″ Professional Thin 75Hz 1080p</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_127.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">CLB 510BT
                                                    Wireless Headphones with Purebass</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_128.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">BLACK+DECKER BPWH84W Washer
                                                    Portable</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animated fadeInUp" id="ctx-tab2" role="tabpanel" aria-labelledby="ctx-tab-02">
                            <div class="row g-0">
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_125.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Beats Flex
                                                    Wireless Earbuds – Apple W1 Headphone</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_126.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Sceptre
                                                    24″ Professional Thin 75Hz 1080p</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_127.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">CLB 510BT
                                                    Wireless Headphones with Purebass</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_128.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">BLACK+DECKER BPWH84W Washer
                                                    Portable</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animated fadeInUp show active" id="ctx-tab3" role="tabpanel" aria-labelledby="ctx-tab-03">
                            <div class="row g-0">
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_125.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Beats Flex
                                                    Wireless Earbuds – Apple W1 Headphone</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_126.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Sceptre
                                                    24″ Professional Thin 75Hz 1080p</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_127.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">CLB 510BT
                                                    Wireless Headphones with Purebass</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_128.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">BLACK+DECKER BPWH84W Washer
                                                    Portable</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animated fadeInUp" id="ctx-tab4" role="tabpanel" aria-labelledby="ctx-tab-04">
                            <div class="row g-0">
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_125.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Beats Flex
                                                    Wireless Earbuds – Apple W1 Headphone</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_126.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Sceptre
                                                    24″ Professional Thin 75Hz 1080p</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_127.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">CLB 510BT
                                                    Wireless Headphones with Purebass</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__item style-2">
                                        <div class="product__img text-center pos-rel">
                                            <a href="shop-single.html"><img src="assets/img/product/img_128.png" alt=""></a>
                                            <ul class="product__action style-2 ul_li">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126)</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">BLACK+DECKER BPWH84W Washer
                                                    Portable</a></h2>
                                            <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="tx-sidebar">
                    <a href="#!">
                        <div class="add-banner add-banner__3 br-5 add-banner__h407 p-30" data-bg-color="#EFEFEF">
                            <div class="add-banner__content">
                                <span>Get Save 30% off</span>
                                <h3 class="fw-500">Cloud Cam, <br> Security Camera</h3>
                                <div class="upto-offer ul_li mt-15 mb-10">
                                    <span class="upto">Up <br> To</span>
                                    <span class="offer-no">70 <span>%</span></span>
                                </div>
                            </div>
                            <div class="add-banner__img">
                                <img src="assets/img/product/img_130.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="pt-45">
    <div class="container mxw_1360">
        <div class="row">
            <div class="col-lg-9">
                <div class="rd-product-wrap">
                    <div class="tx-product-style-02">
                        <div class="row mt-none-30">
                            <!-- <div class="col-lg-3 mt-30">
                                <div class="add-banner fd-column add-banner__3 p-30 bg_img add-banner__h480" data-background="assets/img/bg/bg_21.jpg">
                                    <div class="add-banner__content">
                                        <span>Get Save 30% off</span>
                                        <h3>Cloud Cam, Security Camera</h3>
                                        <div class="upto-offer ul_li mt-15 mb-10">
                                            <span class="upto">Up <br> To</span>
                                            <span class="offer-no">70 <span>%</span></span>
                                        </div>
                                        <a class="add-banner__btn" href="#!">Buy Now</a>
                                    </div>
                                    <div class="add-banner-img">
                                        <img src="assets/img/product/img_131.png" alt="">
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-lg-12 mt-30">
                                <div class="offer-product ml-10">
                                    <div class="product__head ul_li_between mb-10 mt-none-15">
                                        <h2 class="section-heading mt-15">
                                            <span><span>Baby Items</span></span> / Gift Item
                                        </h2>
                                        <div class="countdown countdown__black ul_li mt-15" data-countdown="2024/08/28"></div>
                                        <div class="product__btn mt-15">
                                            <a class="thm-btn text-capitalize" href="shop.html">
                                                <span class="btn-wrap">
                                                    <span>All Items</span>
                                                    <span>All Items</span>
                                                </span>
                                                <i class="far fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="product__item style-2">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img src="assets/img/product/img_132.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(126) Review</span>
                                                    </div>
                                                    <h2 class="product__title"><a href="shop-single.html">Fire HD 10 tablet,
                                                            10.1″, 1080p Full HD</a></h2>
                                                    <span class="product__available">Available:
                                                        <span>334</span></span>
                                                    <div class="product__progress progress color-primary">
                                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product__item style-2">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img src="assets/img/product/img_133.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(126) Review</span>
                                                    </div>
                                                    <h2 class="product__title"><a href="shop-single.html">Sceptre 24″ Professional
                                                            Thin 75Hz 1080p</a></h2>
                                                    <span class="product__available">Available:
                                                        <span>334</span></span>
                                                    <div class="product__progress progress color-primary">
                                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                                </div>
                                                <span class="product__badge"><span>New</span></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product__item style-2">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img src="assets/img/product/img_134.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(126) Review</span>
                                                    </div>
                                                    <h2 class="product__title"><a href="shop-single.html">Rokinon Xeen CF 16mm
                                                            T2.6 Pro Cinema</a></h2>
                                                    <span class="product__available">Available:
                                                        <span>334</span></span>
                                                    <div class="product__progress progress color-primary">
                                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <h4 class="product__price"><span class="new">$30.52</span><span class="old">$28.52</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="tx-sidebar">
                    <div class="tx-widget widget__product">
                        <h2 class="section-heading mb-20 fs-18"><span>Leatest Item</span></h2>
                        <div class="tx-widget__product-slide tx-arrow">
                            <div class="tx-widget__product-single">
                                <?php
                                $pro_fetch = $crud_obj->getData('product GROUP BY category_id', '*', '', 'product_created_on', 'DESC');
                                if ($pro_fetch > 0) {
                                    foreach ($pro_fetch as $value) {
                                ?>
                                        <div class="tx-widget__product-item tx-product ul_li">
                                            <div class="thumb">
                                                <a href="product_detail.php?product_slug=<?= $value['product_slug'] ?>"><img src="admin/uploads/products/<?= $value['product_image'] ?>" alt=""></a>
                                            </div>
                                            <div class="content">
                                                <h3><a href="product_detail.php?product_slug=<?= $value['product_slug'] ?>"><?= $value['product_name'] ?></a></h3>
                                                <h4 class="product__price"><span class="new">₹<?= $value['product_price'] ?></span><span class="old">₹<?= ($value['product_price'] + 1000) ?></span></h4>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- product start -->
<div class="product pt-40">
    <div class="container mxw_1360">
        <div class="row mt-20">
            <div class="col-lg-3 mt-30">
                <div class="product-category bg_img" data-background="assets/img/bg/cat_bg.jpg">
                    <h2 class="product-category__title">Choose Catagory</h2>
                    <ul class="list-unstyled">
                        <?php
                        $row = $crud_obj->getData('category', '*');
                        if ($row) {
                            foreach ($row as $value) {
                        ?>
                                <li class="cat-item-has-children"><a href="shop.php?category=<?= $value['category_id'] ?>"><?= $value['category_name'] ?></a></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 mt-30">
                <div class="product__wrap">
                    <div class="rd-products__nav ul_li_between mb-20">
                        <h2 class="section-heading"><span>Some Product</span></h2>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="Mobile-tab" data-bs-toggle="tab" data-bs-target="#Mobile" type="button" role="tab" aria-controls="Mobile" aria-selected="true">Mobile</button>
                            </li>
                            <?php
                            $row = $crud_obj->getData('category', '*', 'category_name != "Mobile"');
                            if ($row) {
                                foreach ($row as $value) {
                            ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="<?= $value['category_name'] ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $value['category_name'] ?>" type="button" role="tab" aria-controls="<?= $value['category_name'] ?>" aria-selected="false"><?= $value['category_name'] ?></button>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane animated fadeInUp show active" id="Mobile" role="tabpanel" aria-labelledby="Mobile-tab">
                            <div class="row g-0">
                                <?php
                                $pro_fetch = $crud_obj->getData('product LEFT JOIN category ON (product.category_id = category.category_id)', '*', 'category.category_name = "Mobile"', 'RAND()', '', '4');
                                if ($pro_fetch > 0) {
                                    foreach ($pro_fetch as $value) {
                                ?>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="product__item style-2">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="product_detail.php?product_slug=<?= $value['product_slug'] ?>"><img src="admin/uploads/products/<?= $value['product_image']; ?>" style="max-width : 170px ; " alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li style="cursor: pointer;"><a class="add_to_cart" data-productid="<?= $value['product_id'] ?>" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#5F5D5D'"><i class="far fa-shopping-basket"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <h2 class="product__title"><a href="product_detail.php?product_slug=<?= $value['product_slug'] ?>"><?= $value['product_name'] ?></a></h2>
                                                    <h4 class="product__price"><span class="new">₹<?= $value['product_price'] ?></span><span class="old">₹<?= ($value['product_price'] + 1000) ?></span></h4>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        $row = $crud_obj->getData('category', '*', 'category_name != "Mobile"');
                        if ($row) {
                            foreach ($row as $value) {
                        ?>
                                <div class="tab-pane animated fadeInUp" id="<?= $value['category_name'] ?>" role="tabpanel" aria-labelledby="<?= $value['category_name'] ?>-tab">
                                    <div class="row g-0">
                                        <?php
                                        $pro_fetch = $crud_obj->getData('product', '*', 'category_id = "' . $value['category_id'] . '"', 'RAND()', '', '4');
                                        if ($pro_fetch > 0) {
                                            foreach ($pro_fetch as $value) {
                                        ?>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="product__item style-2">
                                                        <div class="product__img text-center pos-rel">
                                                            <a href="product_detail.php?product_slug=<?= $value['product_slug'] ?>"><img src="admin/uploads/products/<?= $value['product_image']; ?>" style="max-width : 170px ; " alt=""></a>
                                                            <ul class="product__action style-2 ul_li">
                                                                <li style="cursor: pointer;"><a class="add_to_cart" data-productid="<?= $value['product_id'] ?>" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#5F5D5D'"><i class="far fa-shopping-basket"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="product__content">
                                                            <h2 class="product__title"><a href="product_detail.php?product_slug=<?= $value['product_slug'] ?>"><?= $value['product_name'] ?></a></h2>
                                                            <h4 class="product__price"><span class="new">₹<?= $value['product_price'] ?></span><span class="old">₹<?= ($value['product_price'] + 1000) ?></span></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product end -->

<!-- banner start -->
<div class="banner pt-50 pb-80">
    <div class="container mxw_1360">
        <div class="row mt-none-30">
            <div class="col-lg-6 mt-30">
                <div class="banner__single ul_li_between bg_img" data-background="assets/img/bg/bg_27.jpg">
                    <div class="content">
                        <span>Expert mechanic</span>
                        <h2>Repair Car Perfectly <br> From Expertist</h2>
                        <p>Sumptuous, filling, and temptingly healthy.</p>
                        <a href="contact.html">Make enquiry <i class="far fa-long-arrow-right"></i></a>
                    </div>
                    <div class="thumb">
                        <img src="assets/img/product/img_162.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-30">
                <div class="banner__single ul_li_between bg_img" data-background="assets/img/bg/bg_28.jpg">
                    <div class="content">
                        <span>Expert mechanic</span>
                        <h2>Repair Car Perfectly <br> From Expertist</h2>
                        <p>Sumptuous, filling, and temptingly healthy.</p>
                        <a href="contact.html">Make enquiry <i class="far fa-long-arrow-right"></i></a>
                    </div>
                    <div class="thumb">
                        <img src="assets/img/product/img_163.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner end -->
<?php
require_once "components/footer.php";
?>