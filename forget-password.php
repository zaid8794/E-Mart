<?php
$title = "Forget Password";
require_once "components/header.php";
require_once "vendor/autoload.php";
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
                    <span>Forget Password</span>
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
            <div class="d-flex justify-content-center">
                <div class="col-lg-6 mt-30">
                    <div class="account__wrap pl-60">
                        <h2 class="account__title">Forget Password</h2>
                        <form id="forget_pass_form">
                            <div class="account__input-field">
                                <label for="email">Email Address</label>
                                <input id="email" name="user_email" type="email" placeholder="Enter Email Address">
                                <input type="hidden" name="form_type" value="forget_password">
                            </div>
                            <span class="text-danger" id="forget_error_msg"></span>
                            <div class="account__btn text-center">
                                <button type="submit" class="thm-btn thm-btn__2">
                                    <span class="btn-wrap">
                                        <span>Submit</span>
                                        <span>Submit</span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
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
        $("#forget_pass_form").on('submit', function(e) {
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
                        $("#forget_pass_form")[0].reset();
                        $("#forget_error_msg").text('');
                        alert(res.success_msg);
                    } else {
                        $("#forget_error_msg").text(res.msg_error);
                    }
                },
            });
        });
    });
</script>