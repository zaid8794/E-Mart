<?php
require_once "vendor/autoload.php";

use App\Class\Crud;

$crud_obj = new Crud;
date_default_timezone_set('Asia/Calcutta');
session_start();
?>
<!doctype html>
<html lang="en">

<head>

    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= !empty($title) || $title != '' ? $title : "Project Name"  ?></title>

    <link rel="shortcut icon" href="assets/img/favicon.png" type="images/x-icon" />

    <!-- css include -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/uikit.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <div class="body_wrap">

        <!-- preloder start  -->
        <!-- <div class="preloder_part">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div> -->
        <!-- preloder end  -->

        <!-- back to top start -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- back to top end -->

        <!-- header start -->
        <header class="header header__style-three">
            <div class="header__top">
                <div class="container mxw_1360">
                    <div class="header__top-info ul_li_between mt-none-10">
                        <ul class="header__top-left ul_li mt-10">
                            <li><a href="#">Call us</a> free 24/7 : <a href="tel:+919033594669" class="text-dark">(+91) 9033594669</a></li>
                            <li><i class="fas fa-envelope"></i> <a href="mailto:zaidvora9@gmail.com" class="text-dark">zaidvora9@gmail.com</a></li>
                        </ul>
                        <div class="header__top-right ul_li mt-10">
                            <div class="date">
                                <i class="fal fa-calendar-alt"></i> <?= date('l, F d, Y H:i') ?>
                            </div>
                            <div class="header__social ml-25">
                                <a href="#!"><i class="fab fa-facebook-f"></i></a>
                                <a href="#!"><i class="fab fa-twitter"></i></a>
                                <a href="#!"><i class="fab fa-instagram"></i></a>
                                <a href="#!"><i class="fab fa-youtube"></i></a>
                                <a href="#!"><i class="fab fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mxw_1360">
                <div class="header__middle ul_li_between">
                    <div class="header__logo">
                        <a href="index.html">
                            <img src="assets/img/logo/logo.svg" alt="">
                        </a>
                    </div>
                    <!-- <div class="header-date">
                        <i class="far fa-calendar-alt"></i>Friday - Jul 27, 2020
                    </div> -->
                    <form class="header__search-box" action="#">
                        <!-- <div class="select-box">
                            <select id="category" name="category">
                                <option value="">All Categories</option>
                                <option value="4">Summer collections</option>
                                <option value="5">Breakfast & Dairy</option>
                                <option value="6">Beverage & Drinks</option>
                                <option value="7">Cocolate Box</option>
                                <option value="8">Dried Food Corner</option>
                                <option value="9">Frozen Foods</option>
                                <option value="10">Baby Food Corner</option>
                                <option value="11">Milk & Juices</option>
                                <option value="12">Organic & Snacks</option>
                            </select>
                        </div> -->
                        <input type="text" name="search" id="search" placeholder="Search For Products" required />
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                    <?php
                    if (isset($_SESSION['user'])) {
                        $cart_count = $crud_obj->getData('cart', '*', "user_id = '" . $_SESSION['user']['id'] . "'")
                    ?>
                        <div class="header__icons ul_li">
                            <div class="icon">
                                <a href="#!"><img src="assets/img/icon/user.svg" alt=""></a>
                            </div>
                            <div class="icon wishlist-icon">
                                <a href="#!">
                                    <img src="assets/img/icon/heart.svg" alt="">
                                    <span class="count">0</span>
                                </a>
                            </div>
                            <div class="cart_btn icon">
                                <img src="assets/img/icon/shopping_bag.svg" alt="">
                                <span class="count"><?= $cart_count > 0 ? count($cart_count) : '0' ?></span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="header__wrap" data-uk-sticky="top: 250; animation: uk-animation-slide-top;">
                <div class="container mxw_1360">
                    <div class="header__main ul_li">
                        <div class="header__logo">
                            <a href="index.php">
                                <img src="assets/img/logo/logo.svg" alt="">
                            </a>
                        </div>
                        <!-- <?php
                                // if (basename($_SERVER['REQUEST_URI']) == 'index.php' || basename($_SERVER['REQUEST_URI']) == '') {
                                ?>
                            <div class="header__category">
                                <a class="header__category-nav" style="cursor: pointer;">
                                    <img class="bar" src="assets/img/icon/bar.svg" alt="">
                                    Browse Categories
                                    <i class="fas fa-chevron-down"></i>
                                </a>
                            </div>
                        <?php
                        // } else {
                        ?> -->
                        <div class="header__category pos-rel">
                            <div class="vertical-menu">
                                <button class="header__category-nav">
                                    <img class="bar" src="assets/img/icon/bar.svg" alt="">
                                    Browse Catetory
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="vertical-menu-list category-nav">
                                    <ul class="category-nav__list list-unstyled">
                                        <!-- <li><a href="shop.php"><img src="#" class="fas fa-arrow-right" alt="">All Products</a></li> -->
                                        <?php
                                        $row = $crud_obj->getData('category', '*');
                                        if ($row) {
                                            foreach ($row as $value) {
                                        ?>
                                                <li><a href="shop.php?category=<?= $value['category_id'] ?>"><img src="#" class="fas fa-arrow-right" alt=""><?= $value['category_name'] ?></a></li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                        // }
                        ?>
                        <div class="hamburger_menu d-lg-none">
                            <a href="javascript:void(0);" class="">
                                <div class="icon bar">
                                    <span><i class="fal fa-bars"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="main-menu navbar navbar-expand-lg">
                            <nav class="main-menu__nav collapse navbar-collapse">
                                <ul>
                                    <li class="active"><a href="index.php">Home</a></li>
                                    <li><a href="shop.php">Shop</a></li>
                                    <li><a href="about-us.php">About Us</a></li>
                                    <li><a href="contact-us.php">Contact Us</a></li>
                                    <?php
                                    if (isset($_SESSION['user'])) {
                                    ?>
                                        <li><a href="my-orders.php">My Orders</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="header__main-right ul_li">
                            <!-- <div class="header__icons ul_li mr-15">
                                <div class="icon">
                                    <a href="#!"><img src="assets/img/icon/user.svg" alt=""></a>
                                </div>
                                <div class="icon wishlist-icon">
                                    <a href="#!">
                                        <img src="assets/img/icon/heart.svg" alt="">
                                        <span class="count">0</span>
                                    </a>
                                </div>
                                <div class="icon">
                                    <a href="#!">
                                        <img src="assets/img/icon/bookmark.svg" alt="">
                                        <span class="count">0</span>
                                    </a>
                                </div>
                                <div class="cart_btn icon">
                                    <img src="assets/img/icon/shopping_bag.svg" alt="">
                                    <span class="count">0</span>
                                </div>
                            </div> -->
                            <div class="login-sign-btn">
                                <?php
                                if (isset($_SESSION['user'])) {
                                ?>
                                    <a class="thm-btn thm-btn__2 text-black" href="src/Class/Logout.php">
                                        <span class="btn-wrap">
                                            <span>Logout</span>
                                            <span>Logout</span>
                                        </span>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a class="thm-btn thm-btn__2 text-black" href="register.php">
                                        <span class="btn-wrap">
                                            <span>Login / Sign Up</span>
                                            <span>Login / Sign Up</span>
                                        </span>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->

        <!-- slide-bar start -->
        <aside class="slide-bar">
            <div class="close-mobile-menu">
                <a href="javascript:void(0);"><i class="fal fa-times"></i></a>
            </div>
            <!-- sidebar-info start -->
            <div class="cart_sidebar">
                <?php
                $cart_fetch = $crud_obj->getData('cart LEFT JOIN product ON (cart.product_id = product.product_id)', '*', 'user_id="' . $_SESSION['user']['id'] . '"');
                ?>
                <button type="button" class="cart_close_btn"><i class="fal fa-times"></i></button>
                <?php
                if ($cart_fetch > 0) {
                ?>
                    <h2 class="heading_title text-uppercase">Cart Items - <span><?= count($cart_fetch) ?></span></h2>
                    <div class="cart_items_list">
                        <?php
                        $subtotal = 0;
                        foreach ($cart_fetch as $cart) {
                            $subtotal += ($cart['product_price'] * $cart['qty']);
                        ?>
                            <div class="cart_item">
                                <div class="item_image">
                                    <img src="../admin/uploads/products/<?= $cart['product_image'] ?>" alt="image_not_found">
                                </div>
                                <div class="item_content">
                                    <h4 class="item_title">
                                        <?= $cart['product_name'] ?>
                                    </h4>
                                    <span class="item_price">₹&nbsp;<?= $cart['product_price'] ?> x <?= $cart['qty'] ?></span>
                                    <button type="button" class="remove_sidebar_cart_btn remove_btn" data-cartid="<?= $cart['cart_id'] ?>"><i class="fal fa-times"></i></button>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="total_price text-uppercase">
                        <span>Sub Total:</span>
                        <span>₹&nbsp;<?= $subtotal ?></span>
                    </div>
                    <ul class="btns_group ul_li">
                        <li>
                            <a href="cart.php" class="thm-btn">
                                <span class="btn-wrap">
                                    <span>View Cart</span>
                                    <span>View Cart</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="checkout.php" class="thm-btn thm-btn__black">
                                <span class="btn-wrap">
                                    <span>Checkout</span>
                                    <span>Checkout</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                <?php
                } else {
                ?>
                    <h2 class="heading_title text-uppercase">Cart Items - <span>0</span></h2>
                    <div class="cart_items_list">
                        <div class="cart_item">
                            No items added to cart
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- sidebar-info end -->

            <!-- side-mobile-menu start -->
            <nav class="side-mobile-menu">
                <div class="header-mobile-search">
                    <form role="search" method="get" action="#">
                        <input type="text" placeholder="Search Keywords">
                        <button type="submit"><i class="ti-search"></i></button>
                    </form>
                </div>
                <ul id="mobile-menu-active">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="about-us.php">About Us</a></li>
                    <li><a href="contact-us.php">Contact Us</a></li>
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <li><a href="my-orders.php">My Orders</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
            <!-- side-mobile-menu end -->
        </aside>
        <div class="body-overlay"></div>
        <!-- slide-bar end -->

        <!-- main part start -->
        <main>
            <div id="snackbar"></div>