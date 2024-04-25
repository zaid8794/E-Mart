<?php
require_once "../../vendor/autoload.php";

use App\Class\Crud;

$crud_obj = new Crud;


$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$subject = $_POST['subject'];
$message = $_POST['message'];

    $data = [
        'contact_name' => $name,
        'contact_email' => $email,
        'contact_mobile' => $mobile,
        'contact_subject' => $subject,
        'contact_message' => $message,
        
    ];
    $exec =  $crud_obj->insert('contactus', $data);
    if ($exec == 1) {
        $data['status'] = 1;
    } else {
        $data['status'] = 0;
    }
echo json_encode($data);
