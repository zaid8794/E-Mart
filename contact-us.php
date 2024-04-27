<?php
$title = "Contact Us";
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
                    <span>Contact</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<!-- contact info start -->
<section class="contact-info">
    <div class="container">
        <div class="row justify-content-center mt-none-30">
            <div class="col-xl-3 col-lg-4 col-md-6 mt-30">
                <div class="contact-info__item d-flex">
                    <span class="icon"><img src="assets/img/icon/mail.svg" alt=""></span>
                    <div class="content">
                        <h3>Mail address</h3>
                        <a href="mailto:zaidvora9@gmail.com">zaidvora9@gmail.com</a>
                        <a href="mailto:sohilvora2000@gmail.com">sohilvora2000@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mt-30">
                <div class="contact-info__item active d-flex">
                    <span class="icon"><img src="assets/img/icon/location.svg" alt=""></span>
                    <div class="content">
                        <h3>Office Location</h3>
                        <p>Junagadh<br> Gujarat, India 362001</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mt-30">
                <div class="contact-info__item d-flex">
                    <span class="icon"><img src="assets/img/icon/call-2.svg" alt=""></span>
                    <div class="content">
                        <h3>Mobile Number</h3>
                        <a href="tel:9033594669">+91 90335 94669</a>
                        <a href="tel:7383063130">+91 73830 63130</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mt-30">
                <div class="contact-info__item d-flex">
                    <span class="icon"><img src="assets/img/icon/linkedin2.svg" alt=""></i></span>
                    <div class="content">
                        <h3>Connect Us</h3>
                        <a href="https://www.linkedin.com/in/zaid-vora-5333b4233">www.linkedin.com/in/zaid-vora-5333b4233</a>
                        <a href="https://www.linkedin.com/in/sohil-vora-4611a8233">www.linkedin.com/in/sohil-vora-4611a8233</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact info end -->

<!-- contact start -->
<section class="contact pt-90">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img src="assets/img/contact/contactus.jpg" alt="">
            </div>
            <div class="col-lg-7">
                <div class="contact-from__wrap pl-55">
                    <form class="contact-from" id="contact_form" action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="contact-from__field">
                                    <input type="text" name="name" placeholder="Enter your name*" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-from__field">
                                    <input type="email" name="email" placeholder="Enter your mail*" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-from__field">
                                    <input type="tel" name="mobile" maxlength="10" placeholder="Enter your number*" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-from__field">
                                    <input type="text" name="subject" placeholder="Subject*" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-from__field">
                                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your Massage*" required></textarea>
                                </div>
                            </div>

                            <div class="contact-from__btn mt-35">
                                <button type="submit" class="thm-btn thm-btn__2">
                                    <span class="btn-wrap">
                                        <span>Send Messege</span>
                                        <span>Send Messege</span>
                                    </span>
                                    <i class="far fa-long-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact end -->

<!-- contact info start -->
<section class="contact-info-area pt-50 pb-80">
    <div class="container">
        <div class="row mt-none-30">
            <div class="col-lg-12 mt-30 text-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59382.66501234002!2d70.39641006680559!3d21.530561193057714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3958018c6a277f53%3A0x13b52f8520a86e48!2sJunagadh%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1714246934682!5m2!1sen!2sin" width="90%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- contact info end -->
<?php
require_once "components/footer.php";
?>

<script>
    $(document).ready(function() {

        $('#contact_form').on('submit', function(e) {
            e.preventDefault();
            var fd = new FormData(this);
            $.ajax({
                url: "src/Class/Contact.php",
                type: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: fd,
                success: function(res) {
                    if (res.status == 1) {
                        alert("Thank You For Contacting Us");
                        $('#contact_form')[0].reset();
                    } else {
                        console.log(res);
                        $("#msg_error").text(res.msg_error);
                    }
                }
            });
        });
    });
</script>