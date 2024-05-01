<?php
$title = "Shop";
require_once "components/header.php";
require_once "vendor/autoload.php";

use App\Class\Crud;

$crud_obj = new Crud;
$no_of_records_per_page = 12;
if (isset($_GET['category'])) {
    $category_id = $_GET['category'];
}
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$offset = ($pageno - 1) * $no_of_records_per_page;
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
                    <span>Shop</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<!-- start shop-section -->
<section class="shop-section pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="shop-area shop-left-sidebar clearfix">
                    <div class="woocommerce-content-wrap">
                        <div class="woocommerce-toolbar-top">
                            <!-- <p class="woocommerce-result-count">Showing 1–12 of 70 results</p> -->
                            <?php
                            if (isset($_GET['category'])) {
                                $category_select = $crud_obj->getData('category', 'category_name', 'category_id = "' . $_GET['category'] . '"', '', '', '1');
                                if ($category_select) {
                                    foreach ($category_select as $category) {
                            ?>
                                        <p id="your_category_selected" class="fw-bold">Selected Category : <?= $category['category_name'] ?><span class="mx-3">|</span></p>
                            <?php
                                    }
                                }
                            }
                            ?>
                            <p id="your_selected_brand" class="fw-bold"></p>
                            <p id="your_search_text" class="fw-bold"></p>
                            <div class="products-sizes">
                                <a href="#!" class="grid-4 active">
                                    <div class="grid-draw">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <div class="grid-draw">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <div class="grid-draw">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <a href="#!" class="list-view">
                                    <div class="grid-draw-line">
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <div class="grid-draw-line">
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <div class="grid-draw-line">
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="woocommerce-content-inner">
                            <ul class="products  default-column clearfix" id="product_fetch">
                                <?php
                                if (isset($_GET['category']) && $_GET['category'] != '') {
                                    $row = $crud_obj->getData('product', '*', 'category_id="' . $category_id . '"', '', '', "$offset, $no_of_records_per_page");
                                } else {
                                    $row = $crud_obj->getData('product', '*', '', '', '', "$offset,$no_of_records_per_page");
                                }
                                if ($row) {
                                    foreach ($row as $value) {
                                ?>
                                        <li class="product">
                                            <div class="product-holder">
                                                <a href="product_detail.php?product_id=<?= $value['product_id'] ?>"><img src="admin/uploads/products/<?= $value['product_image']; ?>" style="max-width : 150px ; " width="" alt=""></a>
                                                <ul class="product__action">
                                                    <li><a class="add_to_cart" data-productid="<?= $value['product_id'] ?>" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#5F5D5D'"><i class="far fa-shopping-basket"></i></a></li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product-info mt-4">
                                                <h2 class="product__title"><a href="product_detail.php?product_id=<?= $value['product_id'] ?>"><?= $value['product_name']; ?></a></h2>
                                                <h4 class="product__price"><span class="new">₹<?= $value['product_price'] ?></span><span class="old">₹<?= $value['product_price'] + 1000; ?></span></h4>
                                                <p class="product-description"><?= $value['product_description'] ?></p>
                                            </div>
                                        </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="pagination_wrap pt-20">
                            <ul>
                                <li class="<?= $pageno <= 1 ? 'disabled' : '' ?>"><a href="<?= $pageno <= 1 ? '#' : "?category=" . $category_id . "&pageno=" . ($pageno - 1) ?>"><i class="far fa-angle-double-left"></i></a></li>
                                <?php
                                if (isset($_GET['category']) && $_GET['category'] != '') {
                                    $total_pages = $crud_obj->pagination('product', 'COUNT(*)', "category_id={$category_id}", $no_of_records_per_page);
                                } else {
                                    $total_pages = $crud_obj->pagination('product', 'COUNT(*)', '', $no_of_records_per_page);
                                }
                                for ($i = 1; $i <= $total_pages; $i++) {
                                ?>
                                    <li><a class="<?= $pageno == $i ? 'current_page' : '' ?>" href="?category=<?= $category_id ?>&pageno=<?= $i ?>"><?= $i ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="<?= $pageno >= $total_pages ? 'disabled' : '' ?>"><a href="<?= $pageno >= $total_pages ? '#' : "?category=" . $category_id . "&pageno=" . ($pageno + 1) ?>"><i class="far fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>


                    </div>
                    <div class="shop-sidebar">
                        <div class="widget">
                            <h2 class="widget__title">
                                <span>Search</span>
                            </h2>
                            <form class="widget__search" id="product_search">
                                <input type="text" name="search" id="search" placeholder="Search..." onkeypress="return event.keyCode != 13;">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget widget_price_filter">
                            <h2 class="widget__title">
                                <span>Price Filtering</span>
                            </h2>
                            <div class="filter-price">
                                <form>
                                    <div id="slider-range"></div>
                                    <p>Price : <input type="text" id="amount"></p>
                                </form>
                            </div>
                        </div>
                        <div class="widget">
                            <h2 class="widget__title">
                                <span>Category</span>
                            </h2>
                            <ul class="widget__category">
                                <li><a href="shop.php">All Category<i class="far fa-chevron-right"></i></a></li>
                                <?php
                                $row = $crud_obj->getData('category', '*');
                                foreach ($row as $value) {
                                ?>
                                    <li><a href="shop.php?category=<?= $value['category_id'] ?>"><?= $value['category_name'] ?><i class="far fa-chevron-right"></i></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <?php
                        if (isset($_GET['category']) && $_GET['category'] != '') {
                        ?>
                            <div class="widget">
                                <h2 class="widget__title">
                                    <span>Brands</span>
                                </h2>
                                <div class="checkbox">
                                    <?php
                                    $brand_fetch = $crud_obj->getData('brand', '*', 'category_id = "' . $_GET['category'] . '"');
                                    if ($brand_fetch) {
                                        foreach ($brand_fetch as $brand) {
                                    ?>
                                            <div class="checkbox__item ul_li">
                                                <input class="form-check-input" type="checkbox" name="brand_checkbox" class="brand_checkbox" id="brand_checkbox" value="<?= $brand['brand_id'] ?>" />
                                                <label for="b1"><?= $brand['brand_name'] ?></label>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end container -->
</section>
<!-- end shop-section -->
<?php
require_once "components/footer.php";
?>

<script>
    $(document).ready(function() {
        function myFunction() {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
        /*----------------------------
	= SHOP PRICE SLIDER
    ------------------------------ */
        if ($("#slider-range").length) {
            $("#slider-range").slider({
                range: true,
                min: 500,
                max: 200000,
                values: [500, 100000],
                slide: function(event, ui) {
                    $("#amount").val("₹" + ui.values[0] + " - ₹" + ui.values[1]);
                    var selectedBrands = [];
                    $('input[name="brand_checkbox"]:checked').each(function() {
                        selectedBrands.push($(this).val());
                    });
                    $.ajax({
                        url: "src/Class/Product.php",
                        type: "POST",
                        data: {
                            category_id: '<?= isset($_GET['category']) && $_GET['category'] != '' ? $_GET['category'] : '' ?>',
                            min_price: ui.values[0],
                            max_price: ui.values[1],
                            brand_checked: selectedBrands,
                            form_type: 'product_price_range',
                        },
                        dataType: 'json',
                        success: function(res) {
                            if (res.status == 1) {
                                $('#product_fetch').html(res.data);
                                $('.pagination_wrap').addClass('d-none');
                            } else {
                                $("#product_fetch").html(res.msg_error);
                                $('.pagination_wrap').addClass('d-none');
                            }
                        }
                    });
                },
            });
            $("#amount").val(
                "₹" +
                $("#slider-range").slider("values", 0) +
                " - ₹" +
                $("#slider-range").slider("values", 1)
            );
        }

        $('input[name="search"]').keyup(function(e) {
            e.preventDefault();
            var selectedBrands = [];
            $('input[name="brand_checkbox"]:checked').each(function() {
                selectedBrands.push($(this).val());
            });
            var search = $(this).val().trim();
            if (search == "") {
                $('#your_search_text').text('');
            }
            $.ajax({
                url: "src/Class/Product.php",
                type: 'POST',
                dataType: 'json',
                data: {
                    category_id: '<?= isset($_GET['category']) && $_GET['category'] != '' ? $_GET['category'] : '' ?>',
                    search: search,
                    brand_checked: selectedBrands,
                    form_type: "product_search",
                },
                success: function(res) {
                    if (res.status == 1) {
                        $('#product_fetch').html(res.data);
                        if (res.search_text != '') {
                            $('#your_search_text').html(res.search_text + "<span class='mx-3'>|</span>");
                            $('.pagination_wrap').addClass('d-none');
                        } else {
                            $('#your_search_text').html('');
                            $('.pagination_wrap').removeClass('d-none');
                        }
                    } else {
                        $("#product_fetch").html(res.msg_error);
                        if (res.search_text != '') {
                            $('#your_search_text').html(res.search_text + "<span class='mx-3'>|</span>");
                            $('.pagination_wrap').addClass('d-none');
                        } else {
                            $('.pagination_wrap').removeClass('d-none');
                        }
                    }
                }
            });
        });

        $('input[id="brand_checkbox"]').change(function() {
            var selectedBrands = [];
            $('input[name="brand_checkbox"]:checked').each(function() {
                selectedBrands.push($(this).val());
            });
            $.ajax({
                url: 'src/Class/Product.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    category_id: '<?= isset($_GET['category']) && $_GET['category'] != '' ? $_GET['category'] : '' ?>',
                    brand_checked: selectedBrands,
                    form_type: "product_fetch_by_brand",
                },
                success: function(res) {
                    if (res.status == 1) {
                        $('#product_fetch').html(res.data);
                        if (res.your_selected_brand != '') {
                            $('#your_selected_brand').html("Your selected brand : " + res.your_selected_brand + "<span class='mx-3'>|</span>");
                            $('.pagination_wrap').addClass('d-none');
                        } else {
                            $('#your_selected_brand').html("");
                            $('.pagination_wrap').removeClass('d-none');
                        }
                    } else {
                        $("#product_fetch").html(res.msg_error);
                        if (res.your_selected_brand != '') {
                            $('.pagination_wrap').addClass('d-none');
                        } else {
                            $('.pagination_wrap').removeClass('d-none');
                        }
                    }
                }
            });
        });

        $(".add_to_cart").click(function(e) {
            e.preventDefault();
            var product_id = $(this).data('productid');
            $.ajax({
                url: "src/Class/Cart.php",
                type: "POST",
                data: {
                    product_id: product_id,
                    form_type: 'add_to_cart',
                },
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