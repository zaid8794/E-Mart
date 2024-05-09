<!-- feature start -->
<div class="feature pt-40 pb-30">
    <div class="container">
        <div class="feature__wrap ul_li">
            <div class="feature__item ul_li">
                <div class="icon">
                    <img src="assets/img/icon/feat_01.svg" alt="">
                </div>
                <div class="content">
                    <h3>Free Shipping</h3>
                    <p>Free shipping over ₹500</p>
                </div>
            </div>
            <div class="feature__item ul_li">
                <div class="icon">
                    <img src="assets/img/icon/feat_02.svg" alt="">
                </div>
                <div class="content">
                    <h3>Payment Secure</h3>
                    <p>Got 100% Payment Safe</p>
                </div>
            </div>
            <div class="feature__item ul_li">
                <div class="icon">
                    <img src="assets/img/icon/feat_03.svg" alt="">
                </div>
                <div class="content">
                    <h3>Support 24/7</h3>
                    <p>Top quialty 24/7 Support</p>
                </div>
            </div>
            <div class="feature__item ul_li">
                <div class="icon">
                    <img src="assets/img/icon/feat_04.svg" alt="">
                </div>
                <div class="content">
                    <h3>100% Money Back</h3>
                    <p>Cutomers Money Backs</p>
                </div>
            </div>
            <div class="feature__item ul_li">
                <div class="icon">
                    <img src="assets/img/icon/feat_05.svg" alt="">
                </div>
                <div class="content">
                    <h3>Quality Products</h3>
                    <p>We Insure Product Quailty</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- feature end -->
</main>
<!-- main part end -->

<!-- footer start -->
<footer class="footer footer__style-three black-bg pt-75">
    <div class="container mxw_1360">
        <div class="footer__main pt-70 pb-90">
            <div class="row mt-none-40">
                <div class="footer__widget col-lg-4 col-md-4 mt-40">
                    <div class="footer__logo mb-20">
                        <a href="index.php"><img src="assets/img/logo/logo-2.png" width="200px" alt=""></a>
                    </div>
                    <p>Welcome to E Mart, your ultimate destination for cutting-edge electronic gadgets and devices. At E Mart, we're passionate about technology and dedicated to bringing you the latest innovations in electronics.</p>
                </div>
                <div class="footer__widget col-lg-4 col-md-4 mt-40">
                    <h2 class="title">Find It Fast</h2>
                    <?php
                    $category_fetch = $crud_obj->getData('category', '*', '', '', '', '6');
                    if ($category_fetch > 0) {
                    ?>
                        <ul class="quick-links">
                            <?php
                            foreach ($category_fetch as $category) {
                            ?>
                                <li><a href="shop.php?category=<?= $category['category_id'] ?>"><?= $category['category_name'] ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    <?php
                    }
                    ?>
                </div>

                <div class="footer__widget col-lg-4 col-md-4 mt-40">
                    <h2 class="title">Quick Links</h2>
                    <ul class="quick-links">
                    <li><a href=".php">Shop</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="contact-us.php">Contact Us</a></li>
                        <?php
                        if (isset($_SESSION['user'])) {
                        ?>
                            <li><a href="my-orders.php">My Orders</a></li>
                        <?php
                        } else {
                        ?>
                            <li><a href="register.php">My Orders</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer__bottom ul_li_center">
            <div class="footer__copyright mt-15">
                &copy; 2024 <a href="#!">Project</a> . All Rights Reserved.
            </div>
            <div class="footer__social mt-15">
                <a href="#!"><i class="fab fa-facebook-f"></i></a>
                <a href="#!"><i class="fab fa-twitter"></i></a>
                <a href="#!"><i class="fab fa-instagram"></i></a>
                <a href="#!"><i class="fab fa-linkedin"></i></a>
                <a href="#!"><i class="fab fa-github"></i></a>
            </div>
            <div class="payment_method mt-15">
                <img src="assets/img/bg/payment_method.png" alt="">
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->

</div>

<!-- jquery include -->
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/backToTop.js"></script>
<script src="assets/js/uikit.min.js"></script>
<script src="assets/js/theia-sticky-sidebar.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jqueryui.js"></script>
<script src="assets/js/touchspin.js"></script>
<script src="assets/js/countdown.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
    $(document).ready(function() {
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
                        window.location.reload();
                    } else {

                    }
                }
            })
        });


        $(".remove_sidebar_cart_btn").on("click", function() {
            var cart_id = $(this).data("cartid");
            $.ajax({
                url: 'src/Class/Cart.php',
                type: "POST",
                dataType: "JSON",
                data: {
                    cart_id: cart_id,
                    form_type: "remove_sidebar_cart",
                },
                success: function(res) {
                    if (res.status == 1) {
                        window.location.reload();
                    } else {

                    }
                }
            });
        });

        $(".cancel_order").click(function() {
            var order_number = $(this).data('orderno');
            $.ajax({
                url: '../src/Class/Checkout.php',
                type: "POST",
                dataType: "json",
                data: {
                    order_number: order_number,
                    action: 'cancel_order',
                },
                success: function(res) {
                    if (res.status == 1) {
                        alert(res.success_msg);
                        window.location.reload();
                    } else {
                        alert(res.msg_error);
                    }
                }
            })
        });

        $(".return_order").click(function() {
            var order_number = $(this).data('orderno');
            $.ajax({
                url: '../src/Class/Checkout.php',
                type: "POST",
                dataType: "json",
                data: {
                    order_number: order_number,
                    action: 'return_order',
                },
                success: function(res) {
                    if (res.status == 1) {
                        alert(res.success_msg);
                        window.location.reload();
                    } else {
                        alert(res.msg_error);
                    }
                }
            })
        });
    });
</script>
</body>

</html>