<?php
$title = "Checkout";
require_once "components/header.php";
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
                    <a href="index.html"><span>Home</span></a>
                </li>
                <li class="radiosbcrumb-item radiosbcrumb-end">
                    <span>Checkout</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<!-- start checkout-section -->
<section class="checkout-section pb-80">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="woocommerce">
                    <div class="checkout woocommerce-checkout">
                        <div class="col2-set">

                            <div class="coll-2">
                                <div class="woocommerce-billing-fields">
                                    <div class="clear"></div>
                                    <h3>Saved Address</h3>
                                    <div class="row">
                                        <?php
                                        $address_fetch = $crud_obj->getData('address', '*', 'user_id = "' . $_SESSION['user']['id'] . '"');
                                        if ($address_fetch > 0) {
                                            foreach ($address_fetch as $address) {
                                        ?>
                                                <div class="col-lg-6" id="address_<?= $address['address_id'] ?>">
                                                    <div class="card shadow selected_address p-4 ms-3 mb-4" id="selected_address_<?= $address['address_id'] ?>">
                                                        <div class="fw-bold mb-1">
                                                            <input type="radio" data-addid="<?= $address['address_id'] ?>" name="address_id" style="height: 15px; width: 20px; accent-color: #ff8717;" value="<?= $address['address_id'] ?>" <?= count($address_fetch) == 1 ? 'checked' : '' ?>>
                                                            <button type="button" data-addressid="<?= $address['address_id'] ?>" class="btn btn-danger btn-sm float-end remove_address"><i class="fas fa-trash"></i></button>
                                                        </div>
                                                        <div class="fw-bold mb-1">
                                                            Name : <span class="fw-normal"><?= $address['address_full_name'] ?></span>
                                                        </div>
                                                        <div class="fw-bold mb-1">
                                                            Email : <span class="fw-normal"><?= $address['address_email'] ?></span>
                                                        </div>
                                                        <div class="fw-bold mb-1">
                                                            Address : <span class="fw-normal"><?= $address['full_address'] . ', ' . $address['city'] . ', ' . $address['state'] . ' - ' . $address['pincode'] . ', ' . $address['country'] ?></span>
                                                        </div>
                                                        <div class="fw-bold mb-1">
                                                            Mobile : <span class="fw-normal"><?= $address['address_mobile'] ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="coll-1">
                                <div class="woocommerce-shipping-fields">
                                    <h3 id="ship-to-different-address">
                                        <label for="ship-to-different-address-checkbox" class="checkbox">+ Add New Address +</label>
                                        <input id="ship-to-different-address-checkbox" class="input-checkbox" type="checkbox" name="ship_to_different_address" value="1" />
                                    </h3>
                                    <form method="post" id="save_address_form">
                                        <div class="shipping_address mb-5">
                                            <div class="form-row form-row form-row-last validate-required">
                                                <label for="shipping_first_name">Name <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text" name="address_full_name" placeholder="" />
                                            </div>
                                            <div class="clear"></div>
                                            <div class="form-row form-row form-row-last validate-required">
                                                <label for="shipping_first_name">Email <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text" name="address_email" placeholder="" />
                                            </div>
                                            <div class="form-row form-row form-row-last validate-required">
                                                <label for="shipping_last_name">Mobile <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text" name="address_mobile" placeholder="" />
                                            </div>
                                            <div class="form-row form-row form-row-last validate-required">
                                                <label for="shipping_first_name">Address <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text" name="address1" placeholder="Apartment, suite, unit etc." />
                                                <input type="text" class="input-text mt-3" name="address2" placeholder="Street address" />
                                            </div>
                                            <div class="form-row form-row form-row-last validate-required">
                                                <label for="shipping_first_name">Town / City <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text" name="city" placeholder="" />
                                            </div>
                                            <div class="form-row form-row form-row-last validate-required">
                                                <label for="shipping_first_name">State <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text" name="state" placeholder="" />
                                            </div>
                                            <div class="form-row form-row form-row-last validate-required">
                                                <label for="shipping_last_name">Pincode / Zip <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text" name="pincode" placeholder="" />
                                            </div>
                                            <div class="form-row form-row form-row-last validate-required">
                                                <label for="shipping_last_name">Country <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text" name="country" value="India" readonly />
                                            </div>
                                            <div class="form-row form-row form-row-last validate-required mt-3">
                                                <input type="hidden" name="form_type" value="save_address">
                                                <button type="submit" class="thm-btn thm-btn__2 no-icon br-0">
                                                    <span class="btn-wrap">
                                                        <span>Save Address</span>
                                                        <span>Save Address</span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="form-row form-row form-row-last validate-required">
                                                <span class="text-danger" id="error_msg"></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <h3 id="order_review_heading">Your order</h3>
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <table class="shop_table woocommerce-checkout-review-order-table">
                                <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cart_fetch = $crud_obj->getData('cart LEFT JOIN product ON (cart.product_id = product.product_id)', '*', 'user_id="' . $_SESSION['user']['id'] . '"');
                                    $subtotal = 0;
                                    $shipping = 0;
                                    if ($cart_fetch > 0) {
                                        foreach ($cart_fetch as $cart) {
                                            $subtotal += $cart['product_price'] * $cart['qty'];
                                            $shipping = $subtotal >= 500 ? 0 : 50;
                                    ?>
                                            <tr class="cart_single">
                                                <td class="product-name">
                                                    <?= $cart['product_name'] ?>&nbsp; <strong class="product-quantity">&times; <?= $cart['qty'] ?></strong> </td>
                                                <td class="product-total">
                                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><?= ($cart['product_price'] * $cart['qty']) ?></span>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        $shipping = 0;
                                        ?>
                                        <tr class="cart_single">
                                            <td class="product-name">Cart is empty</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><?= $subtotal ?></span>
                                        </td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Shipping</th>
                                        <td data-title="Shipping">
                                            <?= '₹' . $shipping ?>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><?= ($subtotal + $shipping) ?></span></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div id="payment" class="woocommerce-checkout-payment">
                                <form method="post" id="checkout_form">
                                    <ul class="wc_payment_methods payment_methods methods">
                                        <li class="wc_payment_method payment_method_cheque">
                                            <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cod" checked='checked' />
                                            <!--grop add span for radio button style-->
                                            <span class='grop-woo-radio-style'></span>
                                            <!--custom change-->
                                            <label for="payment_method_cheque">
                                                Cash on delivery <i class="fas fa-cod"></i></label>
                                            <div class="payment_box payment_method_cheque">
                                                <p>After delivery cash payment</p>
                                            </div>
                                        </li>
                                        <li class="wc_payment_method payment_method_paypal">
                                            <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="upi" data-order_button_text="Proceed to PayPal" />
                                            <!--grop add span for radio button style-->
                                            <span class='grop-woo-radio-style'></span>
                                            <!--custom change-->
                                            <label for="payment_method_paypal">Upi</label>
                                            <div class="payment_box payment_method_paypal">
                                                <p>Pay with google pay, amazon, phonepay or any other</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="form-row place-order mt-20">
                                        <input type="hidden" name="add_id" id="add_id">
                                        <input type="hidden" name="action" value="place_order">
                                        <button type="submit" class="thm-btn thm-btn__2 no-icon br-0">
                                            <span class="btn-wrap">
                                                <span>Place order</span>
                                                <span>Place order</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end checkout-section -->
<?php
require_once "components/footer.php";
?>
<script>
    $(document).ready(function() {
        $("#save_address_form").on('submit', function(e) {
            e.preventDefault();
            var fd = new FormData(this);
            $.ajax({
                url: 'src/Class/SaveAddress.php',
                type: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: fd,
                success: function(res) {
                    if (res.status == 1) {
                        $("#save_address_form")[0].reset();
                        window.location.reload();
                    } else {
                        $("#error_msg").text(res.msg_error);
                    }
                }
            });
        });

        $('.remove_address').click(function(e) {
            var address_id = $(this).data('addressid');
            $.ajax({
                url: 'src/Class/SaveAddress.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    address_id: address_id,
                    form_type: 'remove_address',
                },
                success: function(res) {
                    if (res.status == 1) {
                        $("#" + res.remove).html('');
                    } else {

                    }
                }
            });
        });

        var checked_address_id = $('input[name="address_id"]:checked').data('addid');
        $('#selected_address_' + checked_address_id).css('border', '2px solid #ff8717');

        $('input[name="address_id"]').change(function() {
            $('.selected_address').css('border', '0');
            var addid = $(this).data('addid');
            $('#selected_address_' + addid).css('border', '2px solid #ff8717');
        });

        $("#checkout_form").on('submit', function(e) {
            e.preventDefault();
            var address_id = $('input[name="address_id"]:checked').val();
            if (address_id == '' || address_id == undefined || address_id == null) {
                alert('Please select Address');
            } else {
                $("input[name='add_id']").val(address_id);
                var fd = new FormData(this);
                $.ajax({
                    url: 'src/Class/Checkout.php',
                    type: 'POST',
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data: fd,
                    success: function(res) {
                        if (res.status == 1) {
                            alert("Thank you for shopping");
                            window.location.href = 'index.php';
                        } else {
                            alert(res.msg_error);
                            window.location.href = 'shop.php';
                        }
                    }
                });
            }
        });
    });
</script>