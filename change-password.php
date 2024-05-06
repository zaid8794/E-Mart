<?php
$title = "Change Password";
require_once "components/header.php";
require_once "vendor/autoload.php";
if (!isset($_SESSION['user'])) {
    echo "<script>window.location='register.php';</script>";
}
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
                    <span>Change Password</span>
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
                        <h2 class="account__title">Change Password</h2>
                        <form id="change_pass_form">
                            <div class="account__input-field">
                                <label for="old_password">Old Password</label>
                                <input id="old_password" name="old_password" type="password" placeholder="Enter old password">
                            </div>
                            <div class="account__input-field">
                                <label for="new_password">New Password</label>
                                <input id="new_password" name="new_password" type="password" placeholder="Enter new password">
                            </div>
                            <div class="account__input-field">
                                <label for="confirm_password">Confirm Password</label>
                                <input id="confirm_password" name="confirm_password" type="password" placeholder="Enter confirm password">
                                <input type="hidden" name="form_type" value="change_password">
                            </div>
                            <span class="text-danger" id="change_error_msg"></span>
                            <div class="account__btn text-center">
                                <button type="submit" class="thm-btn thm-btn__2">
                                    <span class="btn-wrap">
                                        <span>Change</span>
                                        <span>Change</span>
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
        $("#change_pass_form").on('submit', function(e) {
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
                        $("#change_pass_form")[0].reset();
                        $("#change_error_msg").text('');
                        alert(res.success_msg);
                    } else {
                        $("#change_error_msg").text(res.msg_error);
                    }
                },
            });
        });
    });
</script>