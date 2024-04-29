<?php
require_once "../../vendor/autoload.php";

use App\Class\Crud;

$crud_obj = new Crud;

if ($_POST['form_type']=="register") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $user_type = 'user';

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
    echo json_encode($data);
}
