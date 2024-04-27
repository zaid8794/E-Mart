<?php
require_once "vendor/autoload.php";

use App\Class\Crud;
$product_detail = '';
$crud_obj = new Crud;
if (isset($_GET['product_id'])) {
    $product_detail = $crud_obj->getData('product LEFT JOIN category ON (product.category_id=category.category_id)', '*', 'product_id = "' . $_GET['product_id'] . '"', '', '', '1');
}
$title = $product_detail[0]['product_name'];
require_once "components/header.php";

?>
<!-- breadcrumb start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="radios-breadcrumb breadcrumbs">
            <ul class="list-unstyled d-flex align-items-center">
                <li class="radiosbcrumb-item radiosbcrumb-begin">
                    <a href="index.php"><span>Home</span></a>
                </li>
                <li class="radiosbcrumb-item radiosbcrumb-end">
                    <span>Shop Single</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<!-- start shop-single-section -->
<section class="shop-single-section pb-70">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-single-wrap mb-30">
                    <div class="product_details_img ">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="pl_thumb">
                                    <img src="admin/uploads/products/<?= $product_detail[0]['product_image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="pl_thumb">
                                    <img src="assets/img/product/img_179.png" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="pl_thumb">
                                    <img src="assets/img/product/img_180.png" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="profile2" role="tabpanel" aria-labelledby="profile-tab3">
                                <div class="pl_thumb">
                                    <img src="assets/img/product/img_181.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop_thumb_tab">
                        <ul class="nav" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><img src="assets/img/product/img_178.png" alt=""> </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><img src="assets/img/product/img_179.png" alt=""></button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><img src="assets/img/product/img_180.png" alt=""></button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="profile-tab3" data-bs-toggle="tab" data-bs-target="#profile2" type="button" role="tab" aria-controls="profile2" aria-selected="false"><img src="assets/img/product/img_181.png" alt=""></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 product-details-col">
                <div class="product-details">
                    <h2><?= $product_detail[0]['product_name'] ?></h2>
                    <div class="price">
                        <span class="current">₹<?= $product_detail[0]['product_price'] ?></span>
                        <span class="old">₹<?= $product_detail[0]['product_price'] + 1000 ?></span>
                    </div>
                    <p><?= $product_detail[0]['product_description'] ?></p>



                    <div class="thb-product-meta-before mt-20">
                        <div class="product_meta">

                            <span class="posted_in">Categories: <a><?= $product_detail[0]['category_name'] ?></a></span>
                        </div>
                    </div>

                    <div class="product-option">
                        <form class="form">
                            <div class="product-row">
                                <div>
                                    <input class="product-count" type="text" value="1" name="product-count">
                                </div>
                                <div class="add-to-cart-btn">
                                    <button class="thm-btn thm-btn__2 no-icon" type="submit">
                                        <span class="btn-wrap">
                                            <span>Shop Now</span>
                                            <span>Shop Now</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col col-xs-12">
                <div class="single-product-info">
                    <!-- Nav tabs -->
                    <div class="tablist">
                        <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                            <li><button class="active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#tb-01">Product Details</button></li>
                            <li><button id="tab-two" data-bs-toggle="pill" data-bs-target="#tb-02">Additional imformation</button></li>
                            <li><button id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#tb-03">Review (09)</button></li>
                        </ul>
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="tb-01">
                            <p>Travelling salesman and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer</p>
                            <p> waved about helplessly as he looked. "What's happened to me?" he thought. It wasn't a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar wallstrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather</p>
                        </div>
                        <div class="tab-pane fade" id="tb-02">
                            <p>Travelling salesman and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer</p>
                            <p> waved about helplessly as he looked. "What's happened to me?" he thought. It wasn't a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar wallstrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather</p>
                        </div>
                        <div class="tab-pane fade" id="tb-03">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="client-rv">
                                        <div class="client-pic">
                                            <img src="assets/img/avatar/comments/img_01.jpg" alt>
                                        </div>
                                        <div class="details">
                                            <div class="name-rating-time">
                                                <div class="name-rating">
                                                    <div>
                                                        <h4>Mice</h4>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                    </div>
                                                </div>
                                                <div class="time">
                                                    <span>1 day ago</span>
                                                </div>
                                            </div>
                                            <div class="review-body">
                                                <p>Helplessly as he looked What's happened to me he thought. It wasn't a dreamtrated magazine and housed in a nice, gilded frame. It showed a lady fitted</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="client-rv">
                                        <div class="client-pic">
                                            <img src="assets/img/avatar/comments/img_02.jpg" alt>
                                        </div>
                                        <div class="details">
                                            <div class="name-rating-time">
                                                <div class="name-rating">
                                                    <div>
                                                        <h4>Hone</h4>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                    </div>
                                                </div>
                                                <div class="time">
                                                    <span>1 day ago</span>
                                                </div>
                                            </div>
                                            <div class="review-body">
                                                <p>Helplessly as he looked What's happened to me he thought. It wasn't a dreamtrated magazine and housed in a nice, gilded frame. It showed a lady fitted</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="client-rv">
                                        <div class="client-pic">
                                            <img src="assets/img/avatar/comments/img_01.jpg" alt>
                                        </div>
                                        <div class="details">
                                            <div class="name-rating-time">
                                                <div class="name-rating">
                                                    <div>
                                                        <h4>Piloa</h4>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                    </div>
                                                </div>
                                                <div class="time">
                                                    <span>2 days ago</span>
                                                </div>
                                            </div>
                                            <div class="review-body">
                                                <p>Helplessly as he looked What's happened to me he thought. It wasn't a dreamtrated magazine and housed in a nice, gilded frame. It showed a lady fitted</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-lg-6 col-sm-12 col-xs-12 review-form-wrapper">
                                    <div class="review-form">
                                        <h4>Here you can review the item</h4>
                                        <form>
                                            <div>
                                                <input type="text" class="form-control" placeholder="Name *" required>
                                            </div>
                                            <div>
                                                <input type="email" class="form-control" placeholder="Email *" required>
                                            </div>
                                            <div>
                                                <textarea class="form-control" placeholder="Review *"></textarea>
                                            </div>
                                            <div class="rating-wrapper">
                                                <div class="rating">
                                                    <a href="#!" class="star-1">
                                                        <i class="fal fa-star"></i>
                                                    </a>
                                                    <a href="#!" class="star-1">
                                                        <i class="fal fa-star"></i>
                                                    </a>
                                                    <a href="#!" class="star-1">
                                                        <i class="fal fa-star"></i>
                                                    </a>
                                                    <a href="#!" class="star-1">
                                                        <i class="fal fa-star"></i>
                                                    </a>
                                                    <a href="#!" class="star-1">
                                                        <i class="fal fa-star"></i>
                                                    </a>
                                                </div>
                                                <div class="submit">
                                                    <button class="thm-btn thm-btn__2 no-icon" type="submit">
                                                        <span class="btn-wrap">
                                                            <span>Shop Now</span>
                                                            <span>Shop Now</span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->

        <div class="row">
            <div class="col col-xs-12">
                <div class="realted-porduct">
                    <h3>Related product</h3>
                    <div class="shop-area">
                        <ul class="products clearfix">
                            <?php
                            $category_product = $crud_obj->getData('product', '*', 'category_id = "' . $product_detail[0]['category_id'] . '"', 'RAND()');
                            if ($category_product) {
                                foreach ($category_product as $row) {
                            ?>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="product_detail.php?product_id=<?= $row['product_id'] ?>"><img src="admin/uploads/products/<?= $row['product_image']?>" style="max-width : 180px ; " alt></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product__title"><a href="product_detail.php?product_id=<?= $row['product_id'] ?>"><?= $row['product_name']; ?></a></h2>
                                            <h4 class="product__price"><span class="new">₹<?= $row['product_price']?></span><span class="old">₹<?= $row['product_price']+1000;?></span></h4>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end of container -->
</section>
<!-- end of shop-single-section -->
<?php
require_once "components/footer.php";
?>