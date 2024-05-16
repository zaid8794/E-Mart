<?php
$title = "Home";
require_once "components/header.php";
?>
<!-- banner start -->
<div class="banner pt-10">
    <div class="container mxw_1360">
        <div class="banner__wrapper d-flex">
            <div class="banner__main banner__height ul_li bg_img" data-background="assets/img/bg/bg_19.jpg">
                <div class="hero-banner__content">
                    <span class="subtitle">₹1000 OFF</span>
                    <h2 class="title text-uppercase">ON ALL PRODUCT</h2>
                    <div class="banner__btn mt-30">
                        <a class="thm-btn" href="shop.php">
                            <span class="btn-wrap">
                                <span>Shop Now</span>
                                <span>Shop Now</span>
                            </span>
                            <i class="far fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="banner__img">
                    <img src="assets/img/banner/banner1.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner end -->


<!-- banner slide start  -->
<div class="banner-slide pt-35">
    <div class="container mxw_1360">
        <div class="banner-slide__active">
            <?php
            $fetch_pro_by_brand = $crud_obj->getData('product GROUP BY brand_id', '*');
            if ($fetch_pro_by_brand > 0) {
                foreach ($fetch_pro_by_brand as $value) {
            ?>
                    <div class="banner-slide__single">
                        <div class="banner-slide__item ul_li bg_img">
                            <div class="banner-slide__img">
                                <img src="admin/uploads/products/<?= $value['product_image'] ?>" style="max-height: 150px; width: auto;" alt="">
                            </div>
                            <div class="banner-slide__content">
                                <span class="offer">Get ₹1000 off</span>
                                <h3><?= $value['product_name'] ?></h3>
                                <h4 class="product__price"><span class="new">₹<?= $value['product_price'] ?></span><span class="old">₹<?= ($value['product_price'] + 1000) ?></span></h4>
                                <a href="product_detail.php?product_slug=<?= $value['product_slug'] ?>">Buy Now</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- banner slide end  -->

<div class="pt-45">
    <div class="container mxw_1360">
        <div class="row">
            <div class="col-lg-9">
                <div class="rd-product-wrap">
                    <div class="tx-product-style-02">
                        <div class="row mt-none-30">
                            <div class="col-lg-12 mt-30">
                                <div class="offer-product ml-10">
                                    <?php
                                    $fetch_cat = $crud_obj->getData('category', '*', '', 'RAND()', '', '1');
                                    if ($fetch_cat > 0) {
                                        $category_name = $fetch_cat[0]['category_name'];
                                        $category_id = $fetch_cat[0]['category_id'];
                                    }
                                    ?>
                                    <div class="product__head ul_li_between mb-10 mt-none-15">
                                        <h2 class="section-heading mt-15">

                                            <span><?= $category_name ?></span>
                                        </h2>
                                        <div class="countdown countdown__black ul_li mt-15" data-countdown="2024/05/20"></div>
                                        <div class="product__btn mt-15">
                                            <a class="thm-btn text-capitalize" href="shop.php?category=<?= $category_id ?>">
                                                <span class="btn-wrap">
                                                    <span>All Items</span>
                                                    <span>All Items</span>
                                                </span>
                                                <i class="far fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <?php
                                        $fetch_pro_by_cat = $crud_obj->getData('product', '*', 'category_id = "' . $category_id . '"', '', '', '4');
                                        if ($fetch_pro_by_cat) {
                                            foreach ($fetch_pro_by_cat as $value) {
                                        ?>
                                                <div class="col-lg-3 col-md-6 ">
                                                    <div class="product__item style-2">
                                                        <div class="product__img text-center pos-rel">
                                                            <a href="product_detail.php?product_slug=<?= $value['product_slug'] ?>"><img src="admin/uploads/products/<?= $value['product_image'] ?>" style="max-width : 170px ;" alt=""></a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="tx-sidebar">
                    <div class="tx-widget widget__product">
                        <h2 class="section-heading mb-20 fs-18"><span>Latest Item</span></h2>
                        <div class="tx-widget__product-slide tx-arrow">
                            <div class="tx-widget__product-single">
                                <?php
                                $pro_fetch = $crud_obj->getData('product GROUP BY brand_id', '*', '', 'product_created_on', 'DESC', '4');
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
                        $row = $crud_obj->getData('category', '*','','RAND()','','4');
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
<?php
require_once "components/footer.php";
?>