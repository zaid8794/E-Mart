<?php
$title = "Cart";
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
                    <span>Cart</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<!-- start cart-section -->
<section class="cart-section woocommerce-cart pb-80">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="woocommerce">
                    <form method="post">
                        <table class="shop_table shop_table_responsive cart">
                            <thead>
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cart_fetch = $crud_obj->getData('cart LEFT JOIN product ON (cart.product_id = product.product_id)', '*', 'user_id="' . $_SESSION['user']['id'] . '"');
                                $subtotal = 0;
                                if ($cart_fetch > 0) {
                                    foreach ($cart_fetch as $cart) {
                                        $subtotal += $cart['product_price'] * $cart['qty'];
                                ?>
                                        <tr class="cart_single">
                                            <td class="product-remove">
                                                <a class="remove remove_sidebar_cart_btn" data-cartid="<?= $cart['cart_id'] ?>" style="cursor: pointer;" title="Remove this item" data-product_id="8" data-product_sku="my name is">&times;</a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="#!">
                                                    <img src="admin/uploads/products/<?= $cart['product_image'] ?>" width="500px" alt="#!" />
                                                </a>
                                            </td>
                                            <td class="product-name" data-title="Product">
                                                <a href="product_detail.php?slug=<?= $cart['product_slug'] ?>"><?= $cart['product_name'] ?></a>
                                            </td>

                                            <td class="product-price" data-title="Price">
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><?= $cart['product_price'] ?></span>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity">
                                                    <input type="number" step="1" min="0" name="cart[c9f0f895fb98ab9159f51fd0297e236d][qty]" value="<?= $cart['qty'] ?>" title="Qty" class="product-count input-text qty text product-count form-control" />
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><?= ($cart['product_price'] * $cart['qty']) ?></span>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr class="text-center">
                                        <td colspan="6">
                                            cart is empty
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <div class="wc-proceed-to-checkout">
                            <button type="submit" class="checkout-button thm-btn thm-btn__2 no-icon br-0 alt wc-forward">
                                <span class="btn-wrap">
                                    <span>Update Cart</span>
                                    <span>Update Cart</span>
                                </span>
                            </button>
                        </div>
                    </form>
                    <div class="cart-collaterals">
                        <div class="cart_totals calculated_shipping">
                            <h2>Cart Totals</h2>
                            <table class="shop_table shop_table_responsive table-bordered">
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><?= $subtotal ?></span>
                                    </td>
                                </tr>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a href="checkout.php" class="checkout-button thm-btn thm-btn__2 no-icon br-0 alt wc-forward">
                                    <span class="btn-wrap">
                                        <span>Proceed to Checkout</span>
                                        <span>Proceed to Checkout</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end cart-section -->
<?php
require_once "components/footer.php";
?>