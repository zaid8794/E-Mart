<?php
require_once "../../vendor/autoload.php";

use App\Class\Crud;

$crud_obj = new Crud;
if ($_POST['form_type'] == 'save') {

    if (empty($_POST['category_id'])) {
        $data['msg_error'] = "Please select category name";
        $data['status'] = 0;
    } else if (empty($_POST['brand_name'])) {
        $data['msg_error'] = "Brand Name is Required";
        $data['status'] = 0;
    } else {

        $category_id = $_POST['category_id'];
        $brand_name = trim($_POST['brand_name']);
        if ($crud_obj->getData('brand', '*', 'category_id = "' . $category_id . '" AND brand_name = "' . $brand_name . '"')) {
            $data['msg_error'] = "Brand name already exists";
            $data['status'] = 0;
        } else {
            $data = [
                'category_id' => $category_id,
                'brand_name' => $brand_name,
            ];
            $exec =  $crud_obj->insert('brand', $data);
            if ($exec == 1) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }
        }
    }
    echo json_encode($data);
}

if ($_POST['form_type'] == 'edit') {
    $brand_id = $_POST['brand_id'];
    $query = $crud_obj->getData('brand', '*', 'brand_id = "' . $brand_id . '"');
    echo json_encode($query);
}

if ($_POST['form_type'] == 'update') {
    if (empty($_POST['category_id'])) {
        $data['msg_error'] = "Category name is required";
        $data['status'] = 0;
    } elseif (empty($_POST['brand_name'])) {
        $data['msg_error'] = "Brand name is required";
        $data['status'] = 0;
    } else {
        $category_id = $_POST['category_id'];
        $brand_id = $_POST['brand_id'];
        $brand_name = trim($_POST['brand_name']);

        $data = [
            'category_id' => $category_id,
            'brand_name' => $brand_name,
        ];
        $exec =  $crud_obj->update('brand', $data, 'WHERE `brand_id` = "' . $_POST['brand_id'] . '"');
        if ($exec == 1) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
    }
    echo json_encode($data);
}

if ($_POST['form_type'] == 'delete') {
    $brand_id = $_POST['brand_id'];
    $exec = $crud_obj->delete('brand', "WHERE `brand_id` = '$brand_id'");
    if ($exec == 1) {
        $data['status'] = 1;
        $data['remove'] =  'brand_' . $brand_id;
    } else {
        $data['status'] = 0;
    }
    echo json_encode($data);
}
