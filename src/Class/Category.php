<?php
require_once "../../vendor/autoload.php";

use App\Class\Crud;

$crud_obj = new Crud;
if ($_POST['form_type'] == 'save') {
    if (empty($_POST['category_name'])) {
        $data['msg_error'] = "Please select category name";
        $data['status'] = 0;
    } else {

        $category_name = $_POST['category_name'];
        if ($crud_obj->getData('category', '*', 'category_name = "' . $category_name . '"')) {
            $data['msg_error'] = "Category name already exists";
            $data['status'] = 0;
        } else {
            $data = [
                'category_name' => $_POST['category_name'],
            ];
            $exec =  $crud_obj->insert('category', $data);
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
    $cat_id = $_POST['cat_id'];
    $query = $crud_obj->getData('category', '*', 'category_id = "' . $cat_id . '"');
    echo json_encode($query);
}

if ($_POST['form_type'] == 'update') {
    if (empty($_POST['category_name'])) {
        $data['msg_error'] = "Category name is required";
        $data['status'] = 0;
    } else {
        $category_name = $_POST['category_name'];

        $data = [
            'category_name' => $_POST['category_name'],
        ];
        $exec =  $crud_obj->update('category', $data, 'WHERE `category_id` = "' . $_POST['category_id'] . '"');
        if ($exec == 1) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
    }
    echo json_encode($data);
}

if ($_POST['form_type'] == 'delete') {
    $category_id = $_POST['cat_id'];
    $exec = $crud_obj->delete('category', "WHERE `category_id` = '$category_id'");
    if ($exec == 1) {
        $data['status'] = 1;
        $data['remove'] =  'category_' . $category_id;
    } else {
        $data['status'] = 0;
    }
    echo json_encode($data);
}
