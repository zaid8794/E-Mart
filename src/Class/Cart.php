<?php
require_once "../../vendor/autoload.php";

use App\Class\Crud;

$crud_obj = new Crud;
session_start();
if (!isset($_SESSION['user'])) {
    $data['msg_error'] = 'login_not_set';
    echo json_encode($data);
} else {
    if ($_POST['form_type'] == 'add_to_cart') {
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['user']['id'];
        $cart_fetch = $crud_obj->getData('cart', '*', "product_id = $product_id AND user_id = $user_id");
        if ($cart_fetch > 0) {
            $old_qty = $cart_fetch[0]['qty'];
            $new_qty = $old_qty + 1;
            $data = [
                'qty' => $new_qty,
            ];
            $sql = $crud_obj->update('cart', $data, "product_id = $product_id AND user_id = $user_id");
            if ($sql == 1) {
                $data['status'] = 1;
                $data['success_msg'] = 'Already added to cart';
            } else {
                $data['status'] = 0;
            }
        } else {
            $data = [
                'user_id' => $_SESSION['user']['id'],
                'product_id' => $product_id,
                'qty' => 1
            ];
            $sql = $crud_obj->insert('cart', $data);
            if ($sql == 1) {
                $data['status'] = 1;
                $data['success_msg'] = 'Successfully added to cart';
            } else {
                $data['status'] = 0;
            }
        }
        echo json_encode($data);
    }
    if ($_POST['form_type'] == 'remove_sidebar_cart') {
        $cart_id = $_POST['cart_id'];
        $remove_cart = $crud_obj->delete('cart', 'cart_id = "' . $cart_id . '"');
        if ($remove_cart == 1) {
            $data['status'] = 1;
            $data['success_msg'] = 'Successfully deleted from cart';
        } else {
            $data['status'] = 0;
        }
        echo json_encode($data);
    }
}
