<?php
$title = "Contact Us";
require_once "components/header.php";
if (!isset($_SESSION['user'])) {
    echo "<script>window.location='index.php';</script>";
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
                    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="http://localhost/wp/?page_id=6" enctype="multipart/form-data">
                        <div class="col2-set" id="customer_details">
                            <div class="coll-1">
                                <div class="woocommerce-billing-fields">
                                    <h3>Billing Details</h3>
                                    <p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">
                                        <label for="billing_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="" autocomplete="given-name" value="" />
                                    </p>
                                    <p class="form-row form-row form-row-last validate-required" id="billing_last_name_field">
                                        <label for="billing_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="" autocomplete="family-name" value="" />
                                    </p>
                                    <div class="clear"></div>
                                    <p class="form-row form-row form-row-wide" id="billing_company_field">
                                        <label for="billing_company" class="">Company Name</label>
                                        <input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="" autocomplete="organization" value="" />
                                    </p>
                                    <p class="form-row form-row form-row-first validate-required validate-email" id="billing_email_field">
                                        <label for="billing_email" class="">Email Address <abbr class="required" title="required">*</abbr></label>
                                        <input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" autocomplete="email" value="" />
                                    </p>
                                    <p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                                        <label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                                        <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="" autocomplete="tel" value="" />
                                    </p>
                                    <div class="clear"></div>
                                    <p class="form-row form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field">
                                        <label for="billing_country" class="">Country <abbr class="required" title="required">*</abbr></label>
                                        <select name="billing_country" id="billing_country" autocomplete="country" class="country_to_state country_select ">
                                            <option value="">Select a country&hellip;</option>
                                            <option value="AX" selected='selected'>&#197;land Islands</option>
                                        </select>
                                        <noscript>
                                            <input type="submit" name="woocommerce_checkout_update_totals" value="Update country" />
                                        </noscript>
                                    </p>
                                    <p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                                        <label for="billing_address_1" class="">Address <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="Street address" autocomplete="address-line1" value="" />
                                    </p>
                                    <p class="form-row form-row form-row-wide address-field" id="billing_address_2_field">
                                        <input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit etc. (optional)" autocomplete="address-line2" value="" />
                                    </p>
                                    <p class="form-row form-row address-field validate-postcode validate-required form-row-first  woocommerce-invalid-required-field" id="billing_city_field">
                                        <label for="billing_city" class="">Town / City <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="" autocomplete="address-level2" value="" />
                                    </p>
                                    <p class="form-row form-row form-row-last address-field validate-required validate-postcode" id="billing_postcode_field">
                                        <label for="billing_postcode" class="">Postcode / ZIP <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="input-text " name="billing_postcode8" id="billing_postcode" placeholder="" autocomplete="postal-code" value="" />
                                    </p>
                                    <div class="clear"></div>
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

                                            <?= $subtotal >= 500 ? 'Free Shipping' : '₹' . $shipping = 50 ?>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><?= ($subtotal + $shipping) ?></span></strong> </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div id="payment" class="woocommerce-checkout-payment">
                                <ul class="wc_payment_methods payment_methods methods">
                                    <li class="wc_payment_method payment_method_cheque">
                                        <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque" checked='checked' data-order_button_text="" />
                                        <!--grop add span for radio button style-->
                                        <span class='grop-woo-radio-style'></span>
                                        <!--custom change-->
                                        <label for="payment_method_cheque">
                                            Check Payments </label>
                                        <div class="payment_box payment_method_cheque">
                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    </li>
                                    <li class="wc_payment_method payment_method_paypal">
                                        <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal" data-order_button_text="Proceed to PayPal" />
                                        <!--grop add span for radio button style-->
                                        <span class='grop-woo-radio-style'></span>
                                        <!--custom change-->
                                        <label for="payment_method_paypal">
                                            PayPal <img src="assets/img/icon/paypal.png" alt="PayPal Acceptance Mark" /><a href="#!" class="about_paypal" title="What is PayPal?">What is PayPal?</a> </label>
                                        <div class="payment_box payment_method_paypal" style="display:none;">
                                            <p>Pay via PayPal; you can pay with your credit card if you don&#8217;t have a PayPal account.</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="form-row place-order mt-20">
                                    <noscript>
                                        Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.
                                        <br />
                                        <input type="submit" class="thm-btn alt" name="woocommerce_checkout_update_totals" value="Update totals" />
                                    </noscript>

                                    <button class="thm-btn thm-btn__2 no-icon br-0">
                                        <span class="btn-wrap">
                                            <span>Place order</span>
                                            <span>Place order</span>
                                        </span>
                                    </button>

                                    <input type="hidden" id="_wpnonce5" name="_wpnonce" value="783c1934b0" />
                                    <input type="hidden" name="_wp_http_referer" value="/wp/?page_id=6" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end checkout-section -->
<?php
require_once "components/footer.php";
?>