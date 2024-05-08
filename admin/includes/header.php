<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("location:../register.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Required meta tags -->
    <title>Admin</title>
    <!-- Favicon -->
    <link rel="icon" href="img/logo/favicon2.png">
    <!-- These plugins only need for the run this page -->
    <link rel="stylesheet" href="css/default-assets/datatables.bootstrap4.css">
    <link rel="stylesheet" href="css/default-assets/responsive.bootstrap4.css">
    <link rel="stylesheet" href="css/default-assets/buttons.bootstrap4.css">
    <link rel="stylesheet" href="css/default-assets/select.bootstrap4.css">
    <!-- These plugins only need for the run this page -->
    <link rel="stylesheet" href="css/default-assets/new/sweetalert-2.min.css">
    <!-- Master Stylesheet CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Preloader -->
    <!-- <div id="preloader-area">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div> -->
    <!-- Preloader -->

    <!-- ======================================
    ******* Main Page Wrapper **********
    ======================================= -->

    <!-- Choose Layout -->


    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="flapt-page-wrapper">
        <!-- Sidemenu Area -->
        <div class="flapt-sidemenu-wrapper">
            <!-- Desktop Logo -->
            <div class="flapt-logo">
                <a href="index.php">
                    <img class="desktop-logo" src="img/logo/logo-2.png" alt="Desktop Logo">
                    <img class="small-logo" src="img/logo/favicon2.png" alt="Mobile Logo">
                </a>
            </div>
            <!-- Side Nav -->
            <div class="flapt-sidenav" id="flaptSideNav">
                <!-- Side Menu Area -->
                <div class="side-menu-area">
                    <!-- Sidebar Menu -->
                    <nav>
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="menu-header-title">Dashboard</li>
                            <li id="index"><a href="index.php"><i class='bx bx-home-heart'></i><span>Dashboard</span></a></li>
                            <li id="category"><a href="category.php"><i class='fa fa-list'></i><span>Category</span></a></li>
                            <li id="brand"><a href="brand.php"><i class='fa fa-bold'></i><span>Brands</span></a></li>
                            <li id="product"><a href="product.php"><i class='fa fa-th'></i><span>Products</span></a></li>
                            <li id="user"><a href="user.php"><i class='fa fa-users'></i><span>Users</span></a></li>
                            <li id="order"><a href="orders.php"><i class='fa fa-pie-chart'></i><span>Orders</span></a></li>
                            <li id="contactus"><a href="contactus.php"><i class="fa fa-envelope"></i><span>Messages</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Content -->
        <div class="flapt-page-content">
            <!-- Top Header Area -->
            <header class="top-header-area d-flex align-items-center justify-content-between">
                <div class="left-side-content-area d-flex align-items-center">
                    <!-- Mobile Logo -->
                    <div class="mobile-logo">
                        <a href="index.php"><img src="img/logo/favicon.png" alt="Mobile Logo"></a>
                    </div>
                    <!-- Triggers -->
                    <div class="flapt-triggers">
                        <div class="menu-collasped" id="menuCollasped">
                            <i class='bx bx-grid-alt'></i>
                        </div>
                        <div class="mobile-menu-open" id="mobileMenuOpen">
                            <i class='bx bx-grid-alt'></i>
                        </div>
                    </div>
                </div>
                <div class="right-side-navbar d-flex align-items-center justify-content-end">
                    <!-- Mobile Trigger -->
                    <div class="right-side-trigger" id="rightSideTrigger">
                        <i class='bx bx-menu-alt-right'></i>
                    </div>
                    <!-- Top Bar Nav -->
                    <ul class="right-side-content d-flex align-items-center">
                        <li class="nav-item dropdown">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/bg-img/user.png" alt=""></button>
                            <div class="dropdown-menu profile dropdown-menu-right">
                                <!-- User Profile Area -->
                                <div class="user-profile-area">
                                    <a href="#" class="dropdown-item"><i class="bx bx-lock font-15" aria-hidden="true"></i> Change Password</a>
                                    <a href="../src/Class/Logout.php" class="dropdown-item"><i class="bx bx-power-off font-15" aria-hidden="true"></i> Sign-out</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>