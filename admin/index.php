<?php
require_once "includes/header.php";
require_once "../vendor/autoload.php";

use App\Class\Crud;

$crud_obj = new Crud;
?>
<!-- Body Content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-xl">
                    <!-- Card -->
                    <div class="card box-margin">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Title -->
                                    <h6 class="text-uppercase font-14">
                                        Users
                                    </h6>

                                    <!-- Heading -->
                                    <span class="font-24 text-dark mb-0">
                                        <?php
                                        $fetch_user = $crud_obj->getData('register', '*', 'u_type = "user"');
                                        echo count($fetch_user);
                                        ?>
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <!-- Icon -->
                                    <div class="icon">
                                        <img src="img/bg-img/user.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl">
                    <!-- Card -->
                    <div class="card box-margin">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Title -->
                                    <h6 class="font-14 text-uppercase">
                                        Products
                                    </h6>
                                    <!-- Heading -->
                                    <span class="font-24 text-dark mb-0">
                                        <?php
                                        $fetch_product = $crud_obj->getData('product', '*');
                                        echo count($fetch_product);
                                        ?>
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <!-- Icon -->
                                    <div class="icon">
                                        <img src="img/bg-img/product.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl">
                    <!-- Card -->
                    <div class="card box-margin">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Title -->
                                    <h6 class="font-14 text-uppercase">
                                        Orders
                                    </h6>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">
                                            <!-- Heading -->
                                            <span class="font-24 text-dark mb-0">
                                                <?php
                                                $fetch_order = $crud_obj->getData('order_master', '*');
                                                $subtotal = 0;
                                                foreach ($fetch_order as $order) {
                                                    $subtotal += ($order['qty'] * $order['product_price']);
                                                }
                                                echo "₹" . $subtotal;
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <!-- Icon -->
                                    <div class="icon">
                                        <img src="img/bg-img/rupee.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl">
                    <!-- Card -->
                    <div class="card box-margin">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Title -->
                                    <h6 class="font-14 text-uppercase">
                                        Enquiry
                                    </h6>
                                    <!-- Heading -->
                                    <span class="font-24 text-dark mb-0">
                                        <?php
                                        $fetch_enquiry = $crud_obj->getData('contactus', '*');
                                        echo count($fetch_enquiry);
                                        ?>
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <!-- Icon -->
                                    <div class="icon">
                                        <img src="img/bg-img/message.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / .row -->

            <div class="row">
                <!-- Order Summary Area -->
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Today Order Summary</h6>
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Order</th>
                                            <th>Customer Account</th>
                                            <th>Amount</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        date_default_timezone_set('Asia/Calcutta');
                                        $today = date('d-m-Y');
                                        $row = $crud_obj->getData('order_master LEFT JOIN register ON (order_master.user_id = register.user_id)', '*', "created_on LIKE '%" . $today . "%' GROUP BY order_number", 'order_number', 'desc');
                                        if ($row > 0) {
                                            foreach ($row as $value) {
                                        ?>
                                                <tr>
                                                    <th scope="row">
                                                        <a class="btn btn-sm btn-secondary btn-icon rounded-pill" target="_blank" href="../src/Class/Invoice.php?order_number=<?= $value['order_number'] ?>">
                                                            <span class="btn-inner--icon"><i class="fa fa-download"></i></span>
                                                            <span class="btn-inner--text">Invoice</span>
                                                        </a>
                                                    </th>
                                                    <td class="order">
                                                        <span class="font-14 mb-0"><?= $value['created_on'] ?></span>
                                                        <span class="d-block font-13"><?= $value['order_number'] ?></span>
                                                    </td>
                                                    <td>
                                                        <span class="client"><?= $value['email'] ?></span>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $total = 0;
                                                        $fetch_amount = $crud_obj->getData('order_master', 'qty,product_price', 'order_number = "' . $value['order_number'] . '"');
                                                        foreach ($fetch_amount as $amount) {
                                                            $total += ($amount['qty'] * $amount['product_price']);
                                                            $shippig = $total >= 500 ? 0 : 50;
                                                        }
                                                        echo "₹" . ($total + $shippig);
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <span class="client"><?= $value['payment_method'] ?></span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <?php
                                                            if ($value['status'] == 'pending') {
                                                            ?>
                                                                <button type="button" class="btn btn-rounded btn-warning">
                                                                    <span class="btn-inner--text">
                                                                        <?= $value['status'] ?>
                                                                    </span>
                                                                </button>
                                                            <?php
                                                            } elseif ($value['status'] == 'delivered') {
                                                            ?>
                                                                <button type="button" class="btn btn-rounded btn-success">
                                                                    <span class="btn-inner--text">
                                                                        <?= $value['status'] ?>
                                                                    </span>
                                                                </button>
                                                            <?php
                                                            } elseif ($value['status'] == 'in transit') {
                                                            ?>
                                                                <button type="button" class="btn btn-rounded btn-primary">
                                                                    <span class="btn-inner--text">
                                                                        <?= $value['status'] ?>
                                                                    </span>
                                                                </button>
                                                            <?php
                                                            } elseif ($value['status'] == 'cancelled' || $value['status'] == 'returned') {
                                                            ?>
                                                                <button type="button" class="btn btn-rounded btn-danger">
                                                                    <span class="btn-inner--text">
                                                                        <?= $value['status'] ?>
                                                                    </span>
                                                                </button>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($value['status'] != 'cancelled' || $value['status'] != 'returned') {
                                                            ?>
                                                                <select id="change_status_select_<?= $value['order_number'] ?>" name="change_status_select" data-selectid="<?= $value['order_number'] ?>" class="d-none p-2">
                                                                    <option value="pending">Pending</option>
                                                                    <option value="in transit">In Transit</option>
                                                                    <option value="delivered">Delivered</option>
                                                                    <option value="cancelled">Cancelled</option>
                                                                </select>
                                                                <!-- Actions -->
                                                                <div class="actions ml-3">
                                                                    <button class="btn btn-sm btn-info waves-effect btn-circle waves-light mr-2" onclick="$('#change_status_select_<?= $value['order_number'] ?>').toggle().removeClass('d-none')" data-bs-toggle="tooltip" title="change status" data-original-title="Edit">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </button>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" id="" class="fetch_order_button btn btn-secondary btn-sm waves-effect btn-circle waves-light mr-2" data-orderno="<?= $value['order_number'] ?>" data-bs-toggle="tooltip" title="view order" data-original-title="Edit">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr colspan="7">
                                                <th scope="row">
                                                    No orders today
                                                </th>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="fetch_order_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
<?php
require_once "includes/footer.php";
?>
<script>
    $(document).ready(function() {
        $("select[name='change_status_select']").change(function() {
            var id = $(this).data("selectid");
            var status = $("#change_status_select_" + id).val();
            $.ajax({
                url: '../src/Class/Checkout.php',
                type: 'post',
                data: {
                    status: status,
                    order_number: id,
                    action: 'change_status',
                },
                dataType: 'json',
                success: function(res) {
                    if (res.status == 1) {
                        window.location.reload();
                    } else {

                    }
                }
            })
        });

        $(".fetch_order_button").click(function() {
            var order_no = $(this).data("orderno");
            $.ajax({
                url: '../src/Class/Checkout.php',
                type: "POST",
                data: {
                    order_no: order_no,
                    action: 'order_details',
                },
                dataType: "json",
                success: function(res) {
                    if (res.status == 1) {
                        $('#fetch_order_modal').modal('show');
                        $('.modal-body').html(res.fetch_order_html);
                    } else {

                    }
                }
            })
        });
    });
</script>