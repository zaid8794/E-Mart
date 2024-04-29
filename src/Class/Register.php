<?php
require_once "../../vendor/autoload.php";

use App\Class\Crud;

$crud_obj = new Crud;
// echo "<pre>";
// print_r($user_select);
// die();
if ($_POST['form_type'] == "register") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);
    $mobile = trim($_POST['mobile']);
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
    $user_type = 'user';
    if (empty($name)) {
        $data['msg_error'] = "Name is required";
        $data['status'] = 0;
    } elseif (empty($email)) {
        $data['msg_error'] = "Email is required";
        $data['status'] = 0;
    } elseif (empty($mobile)) {
        $data['msg_error'] = "Mobile is required";
        $data['status'] = 0;
    } elseif (empty($gender)) {
        $data['msg_error'] = "Please select gender";
        $data['status'] = 0;
    } elseif (empty($password)) {
        $data['msg_error'] = "Password is required";
        $data['status'] = 0;
    } elseif (empty($cpassword)) {
        $data['msg_error'] = "Confirm password is required";
        $data['status'] = 0;
    } else {
        if ($password == $cpassword) {
            $user_select = $crud_obj->getData('register', '*', 'email = "' . $email . '"', '', '', '1');
            if ($user_select > 0) {
                $data['msg_error'] = "User already registered";
                $data['status'] = 0;
            } else {
                $data = [
                    'username' => $name,
                    'email' => $email,
                    'password' => $password,
                    'mobile' => $mobile,
                    'gender' => $gender,
                    'u_type' => $user_type,
                ];
                $exec =  $crud_obj->insert('register', $data);
                if ($exec == 1) {
                    $data['status'] = 1;
                } else {
                    $data['status'] = 0;
                }
            }
        } else {
            $data['msg_error'] = "Confirm password does not match";
            $data['status'] = 0;
        }
    }
    echo json_encode($data);
}

if ($_POST['form_type'] == 'login') {
    // echo "<pre>";
    // print_r($_POST);
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];
    // die();
    if (empty($email)) {
        $data['msg_error'] = "Email is required";
        $data['status'] = 0;
    } elseif (empty($password)) {
        $data['msg_error'] = "Password is required";
        $data['status'] = 0;
    } else {
        $user_select = $crud_obj->getData('register', '*', 'email = "' . $email . '"', '', '', '1');
        if ($user_select > 0) {
            if ($user_select[0]['password'] == $password) {
                unset($user_select[0]['password']);
                session_start();
                $user = [
                    'id' => $user_select[0]['user_id'],
                    'name' => $user_select[0]['username'],
                    'email' => $user_select[0]['email'],
                    'mobile' => $user_select[0]['mobile'],
                ];
                $_SESSION['user'] = $user;
                $data['status'] = 1;
            } else {
                $data['msg_error'] = "Password is incorrect";
                $data['status'] = 0;
            }
        } else {
            $data['msg_error'] = "User not registered";
            $data['status'] = 0;
        }
    }
    echo json_encode($data);
}
