<?php
$title = "My Orders";
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
                    <a href="index.php"><span>Home</span></a>
                </li>
                <li class="radiosbcrumb-item radiosbcrumb-end">
                    <span>My Orders</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<!-- start shop-section -->
<section class="shop-section pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="woocommerce-content-inner">
                    <?php
                    $total_orders = 0;
                    $subtotal = 0;
                    $order_fetch = $crud_obj->getData('order_master LEFT JOIN address ON (order_master.address_id = address.address_id)', '*', "order_master.user_id = '" . $_SESSION['user']['id'] . "' GROUP BY order_master.order_number", 'created_on', 'DESC');
                    if ($order_fetch > 0) {
                        $total_orders = count($order_fetch);
                        echo "<div class='pb-4'><h4>Total Orders : " . $total_orders . "</h4></div>";
                        foreach ($order_fetch as $value) {
                            if ($value['status'] == 'pending') {
                                $color = 'warning';
                            } elseif ($value['status'] == 'in transit') {
                                $color = 'primary';
                            } elseif ($value['status'] == 'delivered') {
                                $color = 'success';
                            } else {
                                $color = 'danger';
                            }
                            $subtotal += ($value['qty'] * $value['product_price']);
                            $shipping = $subtotal >= 500 ? 0 : 50;
                    ?>
                            <div class="card mb-5">
                                <div class="card-header">
                                    <div class="text-center align-items-center justify-content-between d-flex">
                                        <div>
                                            <p class="fw-bold">Order</p>
                                            <span>#<?= $value['order_number'] ?></span>
                                        </div>
                                        <div>
                                            <p class="fw-bold">Order Placed On</p>
                                            <span><?= $value['created_on'] ?></span>
                                        </div>
                                        <div>
                                            <p class="fw-bold">Ship to</p>
                                            <span><?= $value['address_full_name'] ?></span>
                                        </div>
                                        <div>
                                            <p class="fw-bold">Total</p>
                                            <span>₹<?= ($subtotal + $shipping) ?></span>
                                        </div>
                                        <div>
                                            <p class="fw-bold">Payment-Method</p>
                                            <span><?= $value['payment_method'] ?></span>
                                        </div>
                                        <div>
                                            <a href="view-order-details.php?order-number=<?= $value['order_number'] ?>" class="btn btn-secondary shadow-none btn-sm fw-lighter">View Order Details</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-column">
                                                <div class="d-flex ms-4">
                                                    <?php
                                                    if ($value['status'] != 'cancelled' && $value['status'] != 'returned') {
                                                        echo "<h6>Expected Delivery Date : " . date('d-m-Y', strtotime($value['created_on'] . ' + ' . 5 . ' days')) . "</h6>";
                                                    }
                                                    ?>
                                                    <span class="ms-4 badge rounded-pill bg-<?= $color ?>"><?= $value['status'] ?></span>
                                                </div>
                                                <?php
                                                $order_product = $crud_obj->getData('order_master LEFT JOIN product ON (order_master.product_id = product.product_id)', '*', "order_master.order_number = '" . $value['order_number'] . "'");
                                                if ($order_product > 0) {
                                                    foreach ($order_product as $row) {
                                                ?>
                                                        <div class="d-flex align-items-center m-4">
                                                            <a href="product_detail.php?product_slug=<?= $row['product_slug'] ?>"><img src="admin/uploads/products/<?= $row['product_image'] ?>" style="max-width: 100px;" alt=""></a>
                                                            <div class="mx-4">
                                                                <h6><?= $row['product_name'] ?></h6>
                                                                <span>₹<?= $row['product_price'] . ' x ' . $row['qty'] ?> </span>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div>
                                                <?php
                                                if ($value['status'] != 'cancelled' && $value['status'] != 'returned') {
                                                ?>
                                                    <button class="btn btn-danger cancel_order shadow-none" data-orderno="<?= $value['order_number'] ?>">Cancel Item</button>
                                                    <button class="btn btn-warning return_order shadow-none" data-orderno="<?= $value['order_number'] ?>">Return Item</button>
                                                    <a class="btn btn-info download_order shadow-none" target="_blank" href="src/Class/Invoice.php?order_number=<?= $value['order_number'] ?>"><i class="fas fa-download"></i>&nbsp;Invoice</a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }else {
                        echo '<div class="text-center display-6">No Orders</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once "components/footer.php";
?>