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

if ($_POST['form_type'] == 'product_search') {
    $product_search = $_POST['search'];
    $html = '';
    if ($_POST['category_id'] == '') {
        $exec = $crud_obj->getData('product', '*', 'product_name LIKE "%' . $product_search . '%"');
    } else {
        if (isset($_POST['brand_checked']) && $_POST['brand_checked'] != '') {
            $brands = "'" . implode("', '", array_values($_POST['brand_checked'])) . "'";
            $exec = $crud_obj->getData('product', '*', "product_name LIKE '%" . $product_search . "%' AND category_id = '" . $_POST['category_id'] . "' AND brand_id IN ($brands)");
        } else {
            $exec = $crud_obj->getData('product', '*', 'product_name LIKE "%' . $product_search . '%" AND category_id = "' . $_POST['category_id'] . '"');
        }
    }
    if ($exec) {
        foreach ($exec as $value) {
            $html .= '    <li class="product">';
            $html .= '        <div class="product-holder">';
            $html .= '            <a href="product_detail.php?product_id=' . $value['product_id'] . '"><img src="admin/uploads/products/' . $value['product_image'] . '" style="max-width : 150px ; " width="" alt=""></a>';
            $html .= '            <ul class="product__action">';
            $html .= '                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>';
            $html .= '                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>';
            $html .= '                <li><a href="#!"><i class="far fa-heart"></i></a></li>';
            $html .= '            </ul>';
            $html .= '        </div>';
            $html .= '        <div class="product-info mt-4">';
            $html .= '            <h2 class="product__title"><a href="product_detail.php?product_id=' . $value['product_id'] . '">' . $value['product_name'] . '</a></h2>';
            $html .= '            <h4 class="product__price"><span class="new">₹ ' . $value['product_price'] . ' </span><span class="old">₹ ' . ($value['product_price'] + 1000) . '</span></h4>';
            $html .= '            <p class="product-description">' . $value['product_description'] . '</p>';
            $html .= '        </div>';
            $html .= '    </li>';
        }
        $data['search_text'] = isset($_POST['search']) && $_POST['search'] != '' ? 'You search for : "' . $_POST['search'] . '"' : '';
        $data['data'] = $html;
        $data['status'] = 1;
    } else {
        $data['status'] = 0;
        $data['search_text'] = isset($_POST['search']) && $_POST['search'] != '' ? 'You search for : "' . $_POST['search'] . '"' : '';
        $data['msg_error'] = "<h3 class='text-center'>Product not found</h3>";
    }
    echo json_encode($data);
}

if ($_POST['form_type'] == 'product_price_range') {
    $min = $_POST['min_price'];
    $max = $_POST['max_price'];
    $html = '';
    if ($_POST['category_id'] == '') {
        $exec = $crud_obj->getData('product', '*', 'product_price BETWEEN "' . $min . '" AND "' . $max . '"');
    } else {
        if (isset($_POST['brand_checked']) && $_POST['brand_checked'] != '') {
            $brands = "'" . implode("', '", array_values($_POST['brand_checked'])) . "'";
            $exec = $crud_obj->getData('product', '*', "product_price BETWEEN '" . $min . "' AND '" . $max . "' AND category_id = '" . $_POST['category_id'] . "' AND brand_id IN ($brands)");
        } else {
            $exec = $crud_obj->getData('product', '*', 'product_price BETWEEN "' . $min . '" AND "' . $max . '" AND category_id = "' . $_POST['category_id'] . '"');
        }
    }
    if ($exec) {
        foreach ($exec as $value) {
            $html .= '    <li class="product">';
            $html .= '        <div class="product-holder">';
            $html .= '            <a href="product_detail.php?product_id=' . $value['product_id'] . '"><img src="admin/uploads/products/' . $value['product_image'] . '" style="max-width : 150px ; " width="" alt=""></a>';
            $html .= '            <ul class="product__action">';
            $html .= '                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>';
            $html .= '                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>';
            $html .= '                <li><a href="#!"><i class="far fa-heart"></i></a></li>';
            $html .= '            </ul>';
            $html .= '        </div>';
            $html .= '        <div class="product-info mt-4">';
            $html .= '            <h2 class="product__title"><a href="product_detail.php?product_id=' . $value['product_id'] . '">' . $value['product_name'] . '</a></h2>';
            $html .= '            <h4 class="product__price"><span class="new">₹ ' . $value['product_price'] . ' </span><span class="old">₹ ' . ($value['product_price'] + 1000) . '</span></h4>';
            $html .= '            <p class="product-description">' . $value['product_description'] . '</p>';
            $html .= '        </div>';
            $html .= '    </li>';
        }
        $data['data'] = $html;
        $data['status'] = 1;
    } else {
        $data['status'] = 0;
        $data['msg_error'] = "<h3 class='text-center'>Product not found</h3>";
    }
    echo json_encode($data);
}

if ($_POST['form_type'] == 'product_fetch_by_brand') {
    // echo "<pre>";
    // print_r($_POST);
    // die();
    if (isset($_POST['brand_checked'])) {
        $brands = "'" . implode("', '", array_values($_POST['brand_checked'])) . "'";
        $exec = $crud_obj->getData('product', '*', "brand_id IN ($brands) AND category_id = '" . $_POST['category_id'] . "'");
    } else {
        if (!isset($_POST['brand_checked'])) {
            $exec = $crud_obj->getData('product', '*', "category_id = '" . $_POST['category_id'] . "'");
        }
        // $exec = $crud_obj->getData('product', '*', "category_id = '" . $_POST['category_id'] . "'");
    }
    if ($exec) {
        $html = '';
        foreach ($exec as $value) {
            $html .= '    <li class="product">';
            $html .= '        <div class="product-holder">';
            $html .= '            <a href="product_detail.php?product_id=' . $value['product_id'] . '"><img src="admin/uploads/products/' . $value['product_image'] . '" style="max-width : 150px ; " width="" alt=""></a>';
            $html .= '            <ul class="product__action">';
            $html .= '                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>';
            $html .= '                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>';
            $html .= '                <li><a href="#!"><i class="far fa-heart"></i></a></li>';
            $html .= '            </ul>';
            $html .= '        </div>';
            $html .= '        <div class="product-info mt-4">';
            $html .= '            <h2 class="product__title"><a href="product_detail.php?product_id=' . $value['product_id'] . '">' . $value['product_name'] . '</a></h2>';
            $html .= '            <h4 class="product__price"><span class="new">₹ ' . $value['product_price'] . ' </span><span class="old">₹ ' . ($value['product_price'] + 1000) . '</span></h4>';
            $html .= '            <p class="product-description">' . $value['product_description'] . '</p>';
            $html .= '        </div>';
            $html .= '    </li>';
        }
        if (isset($brands)) {
            $selected_brand = array();
            $brand_select = $crud_obj->getData('brand', 'distinct(brand_name)', "brand_id IN ($brands)");
            foreach ($brand_select as $brand) {
                array_push($selected_brand, $brand['brand_name']);
            }
        }
        $data['data'] = $html;
        $data['your_selected_brand'] = isset($selected_brand) ? $selected_brand : '';
        $data['status'] = 1;
    } else {
        $data['status'] = 0;
        $data['msg_error'] = "<h3 class='text-center'>Product not found</h3>";
    }
    echo json_encode($data);
}
