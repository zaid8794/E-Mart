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

        $brand_id = $_POST['brand_id'];
        $category_id = $_POST['category_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_description = $_POST['product_description'];
        $product_image = $_FILES['product_image'];

        if ($crud_obj->getData('product', '*', 'product_name = "' . $product_name . '" AND category_id = "' . $category_id . '" AND brand_id = "' . $brand_id . '"')) {
            $data['msg_error'] = "Product already exists";
            $data['status'] = 0;
        } else {
            $data = [
                'brand_id' => $brand_id,
                'category_id' => $category_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_description' => $product_description,
                'product_image' => $crud_obj->upload_image($product_image),
                'is_active' => "Enable",
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
    echo json_encode($data);
}

if ($_POST['form_type'] == 'edit') {
    $product_id = $_POST['product_id'];
    $query = $crud_obj->getData('product', '*', 'product_id = "' . $product_id . '"', '', '', '1');
    $exec_brand = $crud_obj->getData('brand', '*', 'brand_name != "' . $_POST['brand_name'] . '" AND category_id = "' . $_POST['category_id'] . '"');
    $brand_name = '<option value="' . $_POST['brand_id'] . '" selected>' . $_POST['brand_name'] . '</option>';
    foreach ($exec_brand as $brand) {
        $brand_name .= '<option value="' . $brand['brand_id'] . '">' . $brand['brand_name'] . '</option>';
    }
    $data['data'] = $query;
    $data['brand_id'] = $brand_name;
    echo json_encode($data);
}

if ($_POST['form_type'] == 'update') {
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
    } else {
        if ($_FILES['product_image']['name'] != '') {
            $productimage = $crud_obj->upload_image($_FILES['product_image']);
        } else {
            $productimage = $_POST['old_product_image'];
        }
        $brand_id = $_POST['brand_id'];
        $category_id = $_POST['category_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_description = $_POST['product_description'];
        $product_image = $productimage;
        $data = [
            'brand_id' => $brand_id,
            'category_id' => $category_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_description' => $product_description,
            'product_image' => $product_image,
            'is_active' => "Enable",
            'product_slug' => $crud_obj->slugify($product_name),
        ];
        $exec =  $crud_obj->update('product', $data, 'WHERE product_id = "' . $_POST['product_id'] . '"');
        if ($exec) {
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

if ($_POST['form_type'] == 'change_brand_by_category') {
    $cat_id = $_POST['cat_id'];
    $exec = $crud_obj->getData('brand', '*', 'category_id = "' . $cat_id . '"');
    if ($exec) {
        $output = '<option value="0" selected disabled>Select Brand Name</option>';
        foreach ($exec as $brand) {
            $output .= '<option value="' . $brand['brand_id'] . '">' . $brand['brand_name'] . '</option>';
        }
        $data['status'] = 1;
        $data['data'] = $output;
    }
    echo json_encode($data);
}
