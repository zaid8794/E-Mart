<?php
require_once "../../vendor/autoload.php";

use App\Class\Crud;
use PHPMailer\PHPMailer\PHPMailer;

$crud_obj = new Crud;
session_start();
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
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];
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
                $user = [
                    'id' => $user_select[0]['user_id'],
                    'name' => $user_select[0]['username'],
                    'email' => $user_select[0]['email'],
                    'mobile' => $user_select[0]['mobile'],
                ];
                if ($user_select[0]['u_type'] == 'user') {
                    $_SESSION['user'] = $user;
                    $data['status'] = 1;
                    $data['user'] = 'User';
                } else {
                    $_SESSION['admin'] = $user;
                    $data['status'] = 1;
                    $data['user'] = 'Admin';
                }
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

if ($_POST['form_type'] == 'forget_password') {
    $email = $_POST['user_email'];
    if (empty($email)) {
        $data['msg_error'] = "Email is required";
        $data['status'] = 0;
    } else {
        $user_select = $crud_obj->getData('register', '*', 'email = "' . $email . '"', '', '', '1');
        if ($user_select > 0) {
            if ($user_select[0]['u_type'] == 'user') {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->Username = "zaidvora9@gmail.com";
                    $mail->Password = 'baem gfur ldyl xtub';
                    $mail->setFrom('zaidvora9@gmail.com', 'E Mart');
                    $mail->addAddress($user_select[0]['email']);
                    $mail->isHTML(true);
                    $mail->Subject = "Forget Password for " . $user_select[0]['email'] . " Account";
                    $mail->Body = '<p>Your Password is : ' . $user_select[0]['password'] . '</p>';
                    if ($mail->send()) {
                        $data['status'] = 1;
                        $data['success_msg'] = 'Password sent to your registered email';
                    } else {
                        $data['status'] = 0;
                        $data['msg_error'] = 'Something went wrong';
                    }
                } catch (Exception $e) {
                    $data['msg_error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        } else {
            $data['msg_error'] = "User not registered";
            $data['status'] = 0;
        }
    }
    echo json_encode($data);
}

if ($_POST['form_type'] == 'change_password') {
    // echo "<pre>";
    // print_r($_POST);
    // die();
    $user_id = $_SESSION['user']['id'];
    $old_password = trim($_POST['old_password']);
    $new_password = trim($_POST['new_password']);
    $conf_password = trim($_POST['confirm_password']);

    if (empty($old_password)) {
        $data['msg_error'] = "Old password is required";
        $data['status'] = 0;
    } elseif (empty($new_password)) {
        $data['msg_error'] = "New password is required";
        $data['status'] = 0;
    } elseif (empty($conf_password)) {
        $data['msg_error'] = "Confirm password is required";
        $data['status'] = 0;
    } else {
        $select = $crud_obj->getData('register', '*', "user_id = $user_id", '', '', '1');
        if ($select[0]['password'] == $old_password) {
            if ($new_password == $conf_password) {
                if ($old_password == $new_password) {
                    $data['status'] = 0;
                    $data['msg_error'] = 'New password cannot be same as old password...';
                } else {
                    $data = [
                        'password' => $new_password,
                    ];
                    $exec = $crud_obj->update('register', $data, "user_id = $user_id");
                    if ($exec == 1) {
                        $data['status'] = 1;
                        $data['success_msg'] = "Password updated successfully";
                    } else {
                        $data['status'] = 0;
                        $data['msg_error'] = 'Something went wrong';
                    }
                }
            } else {
                $data['status'] = 0;
                $data['msg_error'] = 'New password and confirm password does not match...';
            }
        } else {
            $data['status'] = 0;
            $data['msg_error'] = 'Old password does not match...';
        }
    }
    echo json_encode($data);
}
