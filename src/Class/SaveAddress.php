<?php

require_once "../../vendor/autoload.php";

use App\Class\Crud;

$crud_obj = new Crud;
session_start();

if ($_POST['form_type'] == 'save_address') {
    $address_full_name = trim($_POST['address_full_name']);
    $address_email = trim($_POST['address_email']);
    $address_mobile = trim($_POST['address_mobile']);
    $address1 = trim($_POST['address1']);
    $address2 = trim($_POST['address2']);
    $fulladdress = $address1 . ', ' . $address2;
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $pincode = trim($_POST['pincode']);
    $country = trim($_POST['country']);
    if (empty($address_full_name)) {
        $data['msg_error'] = "Full Name is required";
        $data['status'] = 0;
    } elseif (empty($address_email)) {
        $data['msg_error'] = "Email is required";
        $data['status'] = 0;
    } elseif (empty($address_mobile)) {
        $data['msg_error'] = "Mobile is required";
        $data['status'] = 0;
    } elseif (empty($address1)) {
        $data['msg_error'] = "Address1 is required";
        $data['status'] = 0;
    } elseif (empty($address2)) {
        $data['msg_error'] = "Address2 is required";
        $data['status'] = 0;
    } elseif (empty($city)) {
        $data['msg_error'] = "City is required";
        $data['status'] = 0;
    } elseif (empty($state)) {
        $data['msg_error'] = "State is required";
        $data['status'] = 0;
    } elseif (empty($pincode)) {
        $data['msg_error'] = "Pincode is required";
        $data['status'] = 0;
    } elseif (empty($country)) {
        $data['msg_error'] = "Country is required";
        $data['status'] = 0;
    } else {
        $data = [
            'user_id' => $_SESSION['user']['id'],
            'address_full_name' => $address_full_name,
            'address_email' => $address_email,
            'address_mobile' => $address_mobile,
            'full_address' => $fulladdress,
            'city' => $city,
            'state' => $state,
            'pincode' => $pincode,
            'country' => $country
        ];
        $exec =  $crud_obj->insert('address', $data);
        if ($exec == 1) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
    }
    echo json_encode($data);
}

if ($_POST['form_type'] == 'remove_address') {
    $address_id = $_POST['address_id'];
    $exec = $crud_obj->delete('address', "`address_id` = '$address_id'");
    if ($exec == 1) {
        $data['status'] = 1;
        $data['remove'] =  'address_' . $address_id;
    } else {
        $data['status'] = 0;
    }
    echo json_encode($data);
}
