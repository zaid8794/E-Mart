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

        $sql = "UPDATE $table SET $set $condition";
        if ($this->connect()->query($sql)) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->connect()->error;
            return false;
        }
    }

    public function delete($table, $condition)
    {
        $sql = "DELETE FROM $table $condition";
        if ($this->connect()->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->connect()->error;
            return false;
        }
    }
}
