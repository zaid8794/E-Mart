<?php
session_start();
require_once "vendor/autoload.php";
if (isset($_SESSION['user'])) {
    header("location: index.php");
}
$title = "Login / Sign Up";
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
                    <span>Account</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<!-- account start -->
<section class="account pb-90">
    <div class="container">
        <div class="row mt-none-30">
            <div class="col-lg-6 mt-30">
                <div class="account__wrap pr-60">
                    <h2 class="account__title">Sign Up</h2>
                    <form action="#" id="register_form">
                        <div class="account__input-field">
                            <label for="name">Your Name</label>
                            <input id="name" name="name" type="text" placeholder="Enter your name*">
                        </div>
                        <div class="row">
                            <div class="account__input-field col-lg-6">
                                <label for="email">Email Address</label>
                                <input id="email" name="email" type="email" placeholder="Enter Email Address*">
                            </div>
                            <div class="account__input-field col-lg-6">
                                <label for="email">Mobile</label>
                                <input id="mobile" name="mobile" maxlength="10" type="tel" placeholder="Enter Mobile Number*">
                            </div>
                        </div>
                        <div class="account__input-field">
                            <label for="gender">Gender :</label>
                            <input id="male" name="gender" type="radio" value="male">Male
                            <input id="female" name="gender" type="radio" value="female">Female
                        </div>
                        <div class="row">
                            <div class="account__input-field col-lg-6">
                                <label for="password">Create Password</label>
                                <input id="password" type="password" name="password" placeholder="Create Password*">
                            </div>
                            <div class="account__input-field col-lg-6">
                                <label for="cpassword">Confirm Password</label>
                                <input id="cpassword" type="password" name="cpassword" placeholder="Confirm Password*">
                            </div>
                        </div>
                        <span class="text-danger" id="error_msg"></span>
                        <input type="hidden" name="form_type" value="register">
                        <div class="account__btn">
                            <button type="submit" class="thm-btn thm-btn__2">
                                <span class="btn-wrap">
                                    <span>Sign Up</span>
                                    <span>Sign Up</span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 mt-30">
                <div class="account__wrap pl-60">
                    <h2 class="account__title">Login</h2>
                    <form id="login_form">
                        <div class="account__input-field">
                            <label for="lemail">Email Address</label>
                            <input id="lemail" name="login_email" type="email" placeholder="Enter Email Address ">
                        </div>
                        <div class="account__input-field">
                            <label for="lpassword">Password</label>
                            <input id="lpassword" name="login_password" type="password" placeholder="password">
                            <input type="hidden" name="form_type" value="login">
                        </div>
                        <span class="text-danger" id="login_error_msg"></span>
                        <div class="account__input-field">
                            <a href="" class="form-check-label">Forgot password?</a>
                        </div>
                        <div class="account__btn">
                            <button type="submit" class="thm-btn thm-btn__2">
                                <span class="btn-wrap">
                                    <span>Login</span>
                                    <span>Login</span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- account end -->
<?php
require_once "components/footer.php";
?>
<script>
    $(document).ready(function() {
        $("#register_form").on('submit', function(e) {
            e.preventDefault();
            var fd = new FormData(this);
            $.ajax({
                url: 'src/Class/Register.php',
                type: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: fd,
                success: function(res) {
                    if (res.status == 1) {
                        $("#error_msg").text('');
                        $("#register_form")[0].reset();
                        alert("Thanks for Register");
                    } else {
                        $("#error_msg").text(res.msg_error);
                    }
                },
            });
        });

        $("#login_form").on('submit', function(e) {
            e.preventDefault();
            var fd = new FormData(this);
            $.ajax({
                url: 'src/Class/Register.php',
                type: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: fd,
                success: function(res) {
                    if (res.status == 1) {
                        console.log(res.user);
                        $("#login_form")[0].reset();
                        $("#login_error_msg").text('');
                        if (res.user == 'User') {
                            window.location.href = 'index.php';
                        } else {
                            window.location.href = 'admin/index.php';
                        }
                    } else {
                        $("#login_error_msg").text(res.msg_error);
                    }
                },
            });
        });
    });
</script>