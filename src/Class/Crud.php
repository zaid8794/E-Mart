<?php

namespace App\Class;

use App\Database\Db;

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
        die($sql);
    }
}
