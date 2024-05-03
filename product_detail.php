<?php
require_once "vendor/autoload.php";

use App\Class\Crud;

$product_detail = '';
$crud_obj = new Crud;
if (isset($_GET['product_slug'])) {
    $product_detail = $crud_obj->getData('product LEFT JOIN category ON (product.category_id=category.category_id)', '*', 'product_slug = "' . $_GET['product_slug'] . '"', '', '', '1');
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
                    <span><?= $title ?></span>
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
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                    <img src="assets/img/product/img_178.png" alt="">
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                    <img src="assets/img/product/img_179.png" alt="">
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                    <img src="assets/img/product/img_180.png" alt="">
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="profile-tab3" data-bs-toggle="tab" data-bs-target="#profile2" type="button" role="tab" aria-controls="profile2" aria-selected="false">
                                    <img src="assets/img/product/img_181.png" alt="">
                                </button>
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
                        <form id="add_to_cart_form">
                            <div class="product-row">
                                <div>
                                    <input type="hidden" name="form_type" id="form_type">
                                    <input type="hidden" name="product_id" value="<?= $product_detail[0]['product_id'] ?>">
                                    <input class="product-count" type="text" value="1" name="qty">
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
                                            <a href="product_detail.php?product_slug=<?= $row['product_slug'] ?>"><img src="admin/uploads/products/<?= $row['product_image'] ?>" style="max-width : 180px ; " alt></a>
                                            <ul class="product__action">
                                                <li><a class="add_to_cart" data-productid="<?= $row['product_id'] ?>" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#5F5D5D'"><i class="far fa-shopping-basket"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product__title"><a href="product_detail.php?product_slug=<?= $row['product_slug'] ?>"><?= $row['product_name']; ?></a></h2>
                                            <h4 class="product__price"><span class="new">₹<?= $row['product_price'] ?></span><span class="old">₹<?= $row['product_price'] + 1000; ?></span></h4>
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
<script>
    $(document).ready(function() {
        $("#add_to_cart_form").on('submit', function(e) {
            e.preventDefault();
            $("#form_type").val('add_to_cart');
            var fd = new FormData(this);
            $.ajax({
                url: "src/Class/Cart.php",
                type: "POST",
                processData: false,
                contentType: false,
                data: fd,
                dataType: 'json',
                success: function(res) {
                    if (res.msg_error == 'login_not_set') {
                        window.location.href = 'register.php';
                    } else if (res.status == 1) {
                        $("#snackbar").text(res.success_msg).addClass('show');
                        setTimeout(function() {
                            $("#snackbar").removeClass('show');
                        }, 3000);
                    } else {

                    }
                }
            })
        });
    });
</script>