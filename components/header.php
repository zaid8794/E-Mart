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
                                <i class="fal fa-calendar-alt"></i> Friday, July 27, 2020
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
                            <span class="count">0</span>
                        </div>
                    </div>
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
                        <?php
                        if (basename($_SERVER['REQUEST_URI']) == 'index.php') {
                        ?>
                            <div class="header__category">
                                <a class="header__category-nav" href="#!">
                                    <img class="bar" src="assets/img/icon/bar.svg" alt="">
                                    Browse Categories
                                    <i class="fas fa-chevron-down"></i>
                                </a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="header__category pos-rel">
                                <div class="vertical-menu">
                                    <button class="header__category-nav">
                                        <img class="bar" src="assets/img/icon/bar.svg" alt="">
                                        Browse Catetory
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <div class="vertical-menu-list category-nav">
                                        <ul class="category-nav__list list-unstyled">
                                            <li><a href="#"><img src="assets/img/icon/cat_01.svg" alt="">Bluetooth speaker</a></li>
                                            <li class="menu-item-has-children">
                                                <a href="#"><img src="assets/img/icon/cat_02.svg" alt="">Digital camera</a>
                                                <ul>
                                                    <li><a href="#">Electric razor</a></li>
                                                    <li><a href="#">Digital camera</a></li>
                                                    <li><a href="#">Electric frying pan</a></li>
                                                    <li><a href="#">external hard drive</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#"><img src="assets/img/icon/cat_03.svg" alt="">Laser printer</a></li>
                                            <li class="menu-item-has-children">
                                                <a href="#"><img src="assets/img/icon/cat_04.svg" alt="">Electric frying pan</a>
                                                <ul>
                                                    <li><a href="#">Electric razor</a></li>
                                                    <li><a href="#">Digital camera</a></li>
                                                    <li><a href="#">Electric frying pan</a></li>
                                                    <li><a href="#">external hard drive</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#"><img src="assets/img/icon/cat_05.svg" alt="">Robotics vacuum</a></li>
                                            <li class="menu-item-has-children">
                                                <a href="#"><img src="assets/img/icon/cat_06.svg" alt="">external hard drive</a>
                                                <ul>
                                                    <li><a href="#">Electric razor</a></li>
                                                    <li><a href="#">Digital camera</a></li>
                                                    <li><a href="#">Electric frying pan</a></li>
                                                    <li><a href="#">external hard drive</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#"><img src="assets/img/icon/cat_07.svg" alt="">Electric razor</a></li>
                                            <li><a href="#"><img src="assets/img/icon/cat_08.svg" alt="">Washing machine</a></li>
                                            <li><a href="#"><img src="assets/img/icon/cat_09.svg" alt="">Rice cooker</a></li>
                                            <li><a href="#"><img src="assets/img/icon/cat_10.svg" alt="">Telivsion & Monitor</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
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
                                    <li><a href="contact-us.php">Contact</a></li>
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
                                <a class="thm-btn thm-btn__2 text-black" href="register.php">
                                    <span class="btn-wrap">
                                        <span>Login / Sign Up</span>
                                        <span>Login / Sign Up</span>
                                    </span>
                                </a>
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
                <button type="button" class="cart_close_btn"><i class="fal fa-times"></i></button>
                <h2 class="heading_title text-uppercase">Cart Items - <span>4</span></h2>
                <div class="cart_items_list">
                    <div class="cart_item">
                        <div class="item_image">
                            <img src="assets/img/product/img_01.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">
                                Rorem ipsum dolor sit amet.
                            </h4>
                            <span class="item_price">$19.00</span>
                            <button type="button" class="remove_btn"><i class="fal fa-times"></i></button>
                        </div>
                    </div>
                    <div class="cart_item">
                        <div class="item_image">
                            <img src="assets/img/product/img_02.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">
                                Rorem ipsum dolor sit amet.
                            </h4>
                            <span class="item_price">$22.00</span>
                            <button type="button" class="remove_btn"><i class="fal fa-times"></i></button>
                        </div>
                    </div>
                    <div class="cart_item">
                        <div class="item_image">
                            <img src="assets/img/product/img_03.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">
                                Rorem ipsum dolor sit amet.
                            </h4>
                            <span class="item_price">$43.00</span>
                            <button type="button" class="remove_btn"><i class="fal fa-times"></i></button>
                        </div>
                    </div>
                    <div class="cart_item">
                        <div class="item_image">
                            <img src="assets/img/product/img_04.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">
                                Rorem ipsum dolor sit amet.
                            </h4>
                            <span class="item_price">$14.00</span>
                            <button type="button" class="remove_btn"><i class="fal fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="total_price text-uppercase">
                    <span>Sub Total:</span>
                    <span>$87.00</span>
                </div>
                <ul class="btns_group ul_li">
                    <li>
                        <a href="cart.html" class="thm-btn">
                            <span class="btn-wrap">
                                <span>View Cart</span>
                                <span>View Cart</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="checkout.html" class="thm-btn thm-btn__black">
                            <span class="btn-wrap">
                                <span>Checkout</span>
                                <span>Checkout</span>
                            </span>
                        </a>
                    </li>
                </ul>
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
                    <li class="dropdown"><a href="index.html">Home</a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Home One</a></li>
                            <li><a href="home-2.html">Home Two</a></li>
                            <li><a href="home-3.html">Home Three</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Shop</a>
                        <ul class="sub-menu">
                            <li><a href="shop.html">Shop Default</a></li>
                            <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                            <li><a href="shop-single.html">Shop Single</a></li>
                            <li><a href="cart.html">Shop Cart</a></li>
                            <li><a href="checkout.html">Shop Checkout</a></li>
                            <li><a href="account.html">Account</a></li>
                        </ul>
                    </li>
                    <li><a href="shop.html">Accesories</a></li>
                    <li class="dropdown">
                        <a href="#!">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="news.html">Blog</a></li>
                            <li><a href="news-single.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#!">Pages</a>
                        <ul class="submenu">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="about.html">Account</a></li>
                            <li><a href="404.html">404</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <!-- side-mobile-menu end -->
        </aside>
        <div class="body-overlay"></div>
        <!-- slide-bar end -->

        <!-- main part start -->
        <main>