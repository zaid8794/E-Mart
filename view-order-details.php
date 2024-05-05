<?php
$title = "My Orders";
require_once "components/header.php";
if (!isset($_SESSION['user'])) {
    echo "<script>window.location='register.php';</script>";
}
$order_number = $_GET['order-number'];
$fetch_order = $crud_obj->getData('order_master LEFT JOIN address ON (order_master.address_id = address.address_id) LEFT JOIN product ON (order_master.product_id = product.product_id)', '*', 'order_number = "' . $order_number . '"');
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
                <?php
                if ($fetch_order > 0) {
                    if ($fetch_order[0]['status'] == 'pending') {
                        $color = 'warning';
                    } elseif ($fetch_order[0]['status'] == 'in transit') {
                        $color = 'primary';
                    } elseif ($fetch_order[0]['status'] == 'delivered') {
                        $color = 'success';
                    } else {
                        $color = 'danger';
                    }
                ?>
                    <div class="d-flex justify-content-between align-items-center py-3">
                        <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #<?= $fetch_order[0]['order_number'] ?></h2>
                        <div>
                            <?php
                            if ($fetch_order[0]['status'] != 'cancelled' && $fetch_order[0]['status'] != 'returned') {
                            ?>
                                <button class="btn btn-danger cancel_order shadow-none" data-orderno="<?= $order_number ?>">Cancel Item</button>
                                <button class="btn btn-warning return_order shadow-none" data-orderno="<?= $order_number ?>">Return Item</button>
                                <a class="btn btn-info download_order shadow-none" target="_blank" href="src/Class/Invoice.php?order_number=<?= $fetch_order[0]['order_number'] ?>"><i class="fas fa-download"></i>&nbsp;Invoice</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card shadow border mb-4">
                                <div class="card-body">
                                    <div class="mb-3 d-flex justify-content-between">
                                        <div>
                                            <span class="me-3">Order Date : <?= $fetch_order[0]['created_on'] ?></span>
                                            <span class="badge rounded-pill bg-<?= $color ?>"><?= $fetch_order[0]['status'] ?></span>
                                        </div>
                                        <div class="d-flex">
                                            <?php
                                            if ($fetch_order[0]['status'] != 'cancelled' && $fetch_order[0]['status'] != 'returned') {
                                            ?>
                                                <a class="btn btn-info download_order shadow-none" target="_blank" href="src/Class/Invoice.php?order_number=<?= $fetch_order[0]['order_number'] ?>"><i class="fas fa-download"></i>&nbsp;Invoice</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <?php
                                            $subtotal = 0;
                                            foreach ($fetch_order as $order) {
                                                $subtotal += ($order['qty'] * $order['product_price']);
                                                $shipping = $subtotal >= 500 ? 0 : 50;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="admin/uploads/products/<?= $order['product_image'] ?>" alt="" width="100px" class="img-fluid">
                                                            </div>
                                                            <div class="flex-lg-grow-1 ms-3">
                                                                <h6 class="small mb-0">
                                                                    <a href="product_detail.php?product_slug=<?= $order['product_slug'] ?>" class="text-reset"><?= $order['product_name'] ?></a>
                                                                </h6>
                                                                <span class="small">₹<?= $order['product_price'] . " x " . $order['qty'] ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end mt-2" colspan="2">₹<?= $order['total'] ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot style="border-top: 1px solid grey;">
                                            <tr class="text-end">
                                                <td colspan="2">Subtotal</td>
                                                <td class="text-end">₹<?= $subtotal ?></td>
                                            </tr>
                                            <tr class="text-end">
                                                <td colspan="2">Shipping</td>
                                                <td class="text-end">₹<?= $shipping ?></td>
                                            </tr>
                                            <tr class="text-end fw-bold">
                                                <td colspan="2">TOTAL</td>
                                                <td class="text-end">₹<?= ($subtotal + $shipping) ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <h3 class="h6">Payment Method</h3>
                                        <p><?= $fetch_order[0]['payment_method'] ?><br>
                                            <?php
                                            if ($fetch_order[0]['payment_method'] == 'cod') {
                                                echo " Total : ₹" . ($subtotal + $shipping) . " <span class='badge bg-warning rounded-pill'>UNPAID</span></p>";
                                            } else {
                                                echo " Total : ₹" . ($subtotal + $shipping) . " <span class='badge bg-success rounded-pill'>PAID</span></p>";
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <h3 class="h6">Billing address</h3>
                                        <address>
                                            <strong><?= $fetch_order[0]['address_full_name'] ?></strong><br>
                                            <?= $fetch_order[0]['full_address'] ?><br>
                                            <?= $fetch_order[0]['city'] . ", " . $fetch_order[0]['state'] . " - " . $fetch_order[0]['pincode'] ?><br>
                                            <?= $fetch_order[0]['country'] ?><br>
                                            Mobile : <?= $fetch_order[0]['address_mobile'] ?>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php
require_once "components/footer.php";
?>