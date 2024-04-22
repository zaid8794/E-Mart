<?php
require_once "../../vendor/autoload.php";

use App\Class\Crud;

$crud_obj = new Crud;
if ($_POST['form_type'] == 'save') {

    if (empty($_POST['category_id'])) {
        $data['msg_error'] = "Please select category name";
        $data['status'] = 0;
    } else if (empty($_POST['brand_id'])) {
        $data['msg_error'] = "Please select Brand name";
        $data['status'] = 0;
    } else if (empty($_POST['product_name'])) {
        $data['msg_error'] = "Product Name is Required";
        $data['status'] = 0;
    } else if (empty($_POST['product_price'])) {
        $data['msg_error'] = "Product Price is Required";
        $data['status'] = 0;
    } else if (empty($_POST['product_description'])) {
        $data['msg_error'] = "Product Description is Required";
        $data['status'] = 0;
    } else if (empty($_FILES['product_image']['name'])) {
        $data['msg_error'] = "Product Image is Required";
        $data['status'] = 0;
    } else {

        $allowed_types = ['jpg', 'png', 'bmp', 'jpeg'];
        $max_file_size = 5 * 1024 * 1024;
        if ($_FILES['product_image']['error'] == UPLOAD_ERR_OK) {
            $file_name = $_FILES['product_image']['name'];
            $tmp_file_name = $_FILES['product_image']['tmp_name'];
            $file_etension_name = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_size = $_FILES['product_image']['size'];
            if (!in_array($file_etension_name, $allowed_types)) {
                $data['msg_error'] = "Image is Invalid";
                $data['status'] = 0;
            } elseif ($file_size > $max_file_size) {
                $data['msg_error'] = "Invalid file size, max file size is 5MB";
                $data['status'] = 0;
            } else {
                $new_file_name = date("Ymdhis") . '.' . $file_etension_name;
                $target_dir = "../../uploads/products/";
                $target_file = $target_dir . '/' . $new_file_name;
                if (move_uploaded_file($tmp_file_name, $target_file)) {

                    $brand_id = $_POST['brand_id'];
                    $category_id = $_POST['category_id'];
                    $product_name = $_POST['product_name'];
                    $product_price = $_POST['product_price'];
                    $product_description = $_POST['product_description'];
                    $product_image = $new_file_name;

                    if ($crud_obj->getData('product', '*', 'product_name = "'.$product_name.'" AND category_id = "' . $category_id . '" AND brand_id = "' . $brand_id . '"')) {
                        $data['msg_error'] = "Product already exists";
                        $data['status'] = 0;
                    } else {
                        $data = [
                            'brand_id' => $brand_id,
                            'category_id' => $category_id,
                            'product_name' => $product_name,
                            'product_price' => $product_price,
                            'product_description' => $product_description,
                            'product_image' => $product_image,
                            'is_active'=>"Enable",
                            'product_slug' => $crud_obj->slugify($product_name),

                        ];
                        $exec =  $crud_obj->insert('product', $data);
                        if ($exec == 1) {
                            $data['status'] = 1;
                        } else {
                            $data['status'] = 0;
                        }
                    }
                }
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
        $brand_name = $_POST['brand_name'];

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
    $product_id = $_POST['product_id'];
    $exec = $crud_obj->delete('product', "WHERE `product_id` = '$product_id'");
    if ($exec == 1) {
        $data['status'] = 1;
        $data['remove'] =  'product_' . $product_id;
    } else {
        $data['status'] = 0;
    }
    echo json_encode($data);
}
