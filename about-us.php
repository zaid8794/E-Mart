<?php
$title = "About Us";
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
                    <span>About us</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<!-- about start -->
<section class="about">
    <div class="container">
        <div class="row g-0 align-items-center">
            <div class="col-xl-5 col-lg-5">
                <div class="about__img">
                    <img src="assets/img/about/about.avif" alt="">
                </div>
            </div>
            <div class="col-xl-7 col-lg-7">
                <div class="about__content pl-70">
                    <h2>
                        Welcome to <span style="color: #ff8717;">E Mart</span>
                    </h2>
                    <h3>Trusted Destination for Electronics Gadgets</h3>
                    <p>At E Mart, we're not just into electronics – we're hooked. Since day one, our goal has been to change how you see and use technology. We're all about creating stuff that makes you go, "Wow!"</p><br>
                    <h3>Our Commitment</h3>
                    <p>We believe that technology should be accessible to everyone. That's why we're dedicated to offering a diverse range of products at competitive prices, without compromising on quality or reliability. From smartphones to smart home devices, from audio equipment to gaming gear, every item in our inventory is meticulously selected to meet our stringent standards.</p><br>
                </div>
            </div>
        </div>
        <div class="row g-0 align-items-center flex-row-reverse md-mt-30">
            <div class="col-xl-5 col-lg-5">
                <div class="about__img">
                    <img src="assets/img/about/about2.jpg" alt="">
                </div>
            </div>
            <div class="col-xl-7 col-lg-7">
                <div class="about__content pr-55">
                    <h3>Why Choose Us</h3>
                    <p>At E Mart, we're not just into electronics - we're hooked. Since day one, our goal has been to change how you see and use technology. We're all about creating stuff that makes you go, "Wow!"</p>
                    <ul class="about__list list-unstyled mt-25">
                        <li>We partner with leading brands and manufacturers to ensure that every product we offer meets the highest standards of quality and performance.</li>
                        <li> Your satisfaction is our top priority. If for any reason you're not completely satisfied with your purchase, let us know, and we'll do everything we can to make it right.</li>
                    </ul>
                    <div class="about__btn mt-30">
                        <a class="thm-btn thm-btn__2" href="shop.php">
                            <span class="btn-wrap">
                                <span>Discover More</span>
                                <span>Discover More</span>
                            </span>
                            <i class="far fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about end -->
<?php
require_once "components/footer.php";
?>