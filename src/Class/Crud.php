<?php

namespace App\Class;

use App\Db\Db;

class Crud extends Db
{
    public function getData($table, $field = '', $condition = '', $order_by_field = '', $order_by_type = '', $limit = '')
    {
        $sql = "SELECT $field FROM $table";
        if ($condition != '') {
            $sql .= " WHERE $condition";
        }
        if ($order_by_field != '') {
            $sql .= " ORDER BY $order_by_field $order_by_type";
        }
        if ($limit != '') {
            $sql .= " LIMIT $limit";
        }
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            return 0;
        }
    }

    public function pagination($table, $field = '', $condition = '', $no_of_records_per_page)
    {
        $sql = "SELECT $field FROM $table";
        if ($condition != '') {
            $sql .= " WHERE $condition";
        }
        $result = $this->connect()->query($sql);
        $total_records = $result->fetch_column();
        $total_pages = ceil($total_records / $no_of_records_per_page);
        return $total_pages;
    }

    public function insert($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        if ($this->connect()->query($sql)) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->connect()->error;
            return false;
        }
    }

    public function update($table, $data, $condition)
    {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key='$value', ";
        }
        $set = rtrim($set, ", ");

        $sql = "UPDATE $table SET $set WHERE $condition";
        if ($this->connect()->query($sql)) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->connect()->error;
            return false;
        }
    }

    public function delete($table, $condition)
    {
        $sql = "DELETE FROM $table WHERE $condition";
        if ($this->connect()->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->connect()->error;
            return false;
        }
    }

    public function slugify($product_name)
    {
        $slug = preg_replace('/[^a-z0-9]+/i', '-', $product_name);
        $slug = strtolower($slug);
        return $slug;
    }

    public function upload_image($product_image)
    {
        $allowed_types = ['jpg', 'png', 'bmp', 'jpeg'];
        $max_file_size = 5 * 1024 * 1024;
        if ($_FILES['product_image']['error'] == UPLOAD_ERR_OK) {
            $file_name = $_FILES['product_image']['name'];
            $tmp_file_name = $_FILES['product_image']['tmp_name'];
            $file_etension_name = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $file_size = $_FILES['product_image']['size'];
            if (!in_array($file_etension_name, $allowed_types)) {
                $data['msg_error'] = "Image is Invalid";
                $data['status'] = 0;
            } elseif ($file_size > $max_file_size) {
                $data['msg_error'] = "Invalid file size, max file size is 5MB";
                $data['status'] = 0;
            } else {
                $new_file_name = date("Ymdhis") . '.' . $file_etension_name;
                $target_dir = "../../admin/uploads/products/";
                $target_file = $target_dir . '/' . $new_file_name;
                move_uploaded_file($tmp_file_name, $target_file);
                return $new_file_name;
            }
        }
    }
}
