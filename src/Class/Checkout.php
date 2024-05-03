<?php
require_once "../../vendor/autoload.php";

use App\Class\Crud;

$crud_obj = new Crud;
session_start();
date_default_timezone_set('Asia/Calcutta');
if ($_POST['action'] == 'place_order') {
    $user_id = $_SESSION['user']['id'];
    $cart_fetch = $crud_obj->getData('cart LEFT JOIN product ON (cart.product_id = product.product_id)', '*', "user_id = $user_id");
    if ($cart_fetch > 0) {
        $address_id = $_POST['add_id'];
        $payment_method = $_POST['payment_method'];
        $order_number = "ORD" . date('dmYHis') . $user_id;
        foreach ($cart_fetch as $cart) {
            $data = [
                'order_number' => $order_number,
                'user_id' => $user_id,
                'address_id' => $address_id,
                'product_id' => $cart['product_id'],
                'qty' => $cart['qty'],
                'product_price' => $cart['product_price'],
                'total' => ($cart['qty'] * $cart['product_price']),
                'payment_method' => $payment_method,
                'status' => 'pending',
                'created_on' => date('d-m-Y H:i:s'),
            ];
            $exec = $crud_obj->insert('order_master', $data);
            if ($exec == 1) {
                $delete_cart = $crud_obj->delete('cart', "cart_id = '" . $cart['cart_id'] . "'");
                $data['status'] = 1;
            } else {
                $data['msg_error'] = 'Error placing order';
                $data['status'] = 0;
            }
        }
    } else {
        $data['status'] = 0;
        $data['msg_error'] = 'No products available in cart';
    }
    echo json_encode($data);
}

if ($_POST['action'] == 'change_status') {
    $status = $_POST['status'];
    $order_number = $_POST['order_number'];
    if (!empty($status) && !empty($order_number)) {
        $data = [
            'status' => $status,
        ];
        $exec = $crud_obj->update('order_master', $data, 'order_number = "' . $order_number . '"');
        if ($exec) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
    } else {
        $data['status'] = 0;
    }
    echo json_encode($data);
}

if ($_POST['action'] == 'order_details') {
    $order_number = $_POST['order_no'];
    $fetch_order = $crud_obj->getData('order_master LEFT JOIN address ON (order_master.address_id = address.address_id) LEFT JOIN product ON (order_master.product_id = product.product_id)', '*', 'order_number = "' . $order_number . '"');
    $html = '';
    if ($fetch_order > 0) {
        // echo "<pre>";
        // print_r($fetch_order);
        // die();
        if ($fetch_order[0]['status'] == 'pending') {
            $color = 'warning';
        } elseif ($fetch_order[0]['status'] == 'in transit') {
            $color = 'primary';
        } elseif ($fetch_order[0]['status'] == 'delivered') {
            $color = 'success';
        } else {
            $color = 'danger';
        }
        $subtotal = 0;
        $html .= "<div class='d-flex justify-content-between align-items-center py-3'>";
        $html .= "    <h2 class='h5 mb-0'><a href='#' class='text-muted'></a> Order #" . $fetch_order[0]['order_number'] . "</h2>";
        $html .= "</div>";
        $html .= "<div class='row'>";
        $html .= "    <div class='col-lg-8'>";
        $html .= "        <div class='card mb-4'>";
        $html .= "            <div class='card-body'>";
        $html .= "                <div class='mb-3 d-flex justify-content-between'>";
        $html .= "                    <div>";
        $html .= "                        <span class='me-3'>Order Date : " . $fetch_order[0]['created_on'] . "</span>";
        $html .= "                        <span class='badge rounded-pill bg-$color'>" . $fetch_order[0]['status'] . "</span>";
        $html .= "                    </div>";
        $html .= "                    <div class='d-flex'>";
        $html .= "                        <button class='btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text'><i class='bi bi-download'></i> <span class='text'>Invoice</span></button>";
        $html .= "                    </div>";
        $html .= "                </div>";
        $html .= "                <table class='table table-borderless'>";
        $html .= "                    <tbody>";
        foreach ($fetch_order as $order) {
            $subtotal += ($order['qty'] * $order['product_price']);
            $shipping = $subtotal >= 500 ? 0 : 50;
            $html .= "                        <tr>";
            $html .= "                            <td>";
            $html .= "                                <div class='d-flex mb-2'>";
            $html .= "                                    <div class='flex-shrink-0'>";
            $html .= "                                        <img src='../../admin/uploads/products/" . $order['product_image'] . "' alt='' width='50' class='img-fluid'>";
            $html .= "                                    </div>";
            $html .= "                                    <div class='flex-lg-grow-1 ms-3'>";
            $html .= "                                        <h6 class='small mb-0'><a href='#' class='text-reset'>" . $order['product_name'] . "</h6>";
            $html .= "                                        <span class='small'>Price : ₹" . $order['product_price'] . "</span>";
            $html .= "                                    </div>";
            $html .= "                                </div>";
            $html .= "                            </td>";
            $html .= "                            <td>Qty : " . $order['qty'] . "</td>";
            $html .= "                            <td class='text-end'>₹" . $order['total'] . "</td>";
            $html .= "                        </tr>";
        }
        $html .= "                    </tbody>";
        $html .= "                    <tfoot>";
        $html .= "                        <tr>";
        $html .= "                            <td colspan='2'>Subtotal</td>";
        $html .= "                            <td class='text-end'>₹" . $subtotal . "</td>";
        $html .= "                        </tr>";
        $html .= "                        <tr>";
        $html .= "                            <td colspan='2'>Shipping</td>";
        $html .= "                            <td class='text-end'>₹" . $shipping . "</td>";
        $html .= "                        </tr>";
        $html .= "                        <tr class='fw-bold'>";
        $html .= "                            <td colspan='2'>TOTAL</td>";
        $html .= "                            <td class='text-end'>₹" . ($subtotal + $shipping) . "</td>";
        $html .= "                        </tr>";
        $html .= "                    </tfoot>";
        $html .= "                </table>";
        $html .= "            </div>";
        $html .= "        </div>";
        $html .= "    </div>";
        $html .= "    <div class='col-lg-4'>";
        $html .= "        <div class='card mb-4'>";
        $html .= "            <div class='card-body'>";
        $html .= "                <h3 class='h6'>Payment Method</h3>";
        $html .= "                <p>" . $fetch_order[0]['payment_method'] . "<br>";
        if ($fetch_order[0]['payment_method'] == 'cod') {
            $html .= "                    Total: ₹" . ($subtotal + $shipping) . " <span class='badge bg-warning rounded-pill'>UNPAID</span></p>";
        } else {
            $html .= "                    Total: ₹" . ($subtotal + $shipping) . " <span class='badge bg-success rounded-pill'>PAID</span></p>";
        }
        $html .= "            </div>";
        $html .= "        </div>";
        $html .= "        <div class='card mb-4'>";
        $html .= "            <div class='card-body'>";
        $html .= "                <h3 class='h6'>Billing address</h3>";
        $html .= "                <address>";
        $html .= "                    <strong>" . $fetch_order[0]['address_full_name'] . "</strong><br>";
        $html .= "                    " . $fetch_order[0]['full_address'] . "<br>";
        $html .= "                    " . $fetch_order[0]['city'] . ", " . $fetch_order[0]['state'] . " - " . $fetch_order[0]['pincode'] . "<br>";
        $html .= "                    " . $fetch_order[0]['country'] . "<br>";
        $html .= "                    Mobile : " . $fetch_order[0]['address_mobile'];
        $html .= "                </address>";
        $html .= "            </div>";
        $html .= "        </div>";
        $html .= "    </div>";
        $html .= "</div>";
        $data['status'] = 1;
        $data['fetch_order_html'] = $html;
    } else {
        $data['status'] = 0;
    }
    echo json_encode($data);
}
