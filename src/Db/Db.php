<?php

namespace App\Database;

use mysqli;

class Db
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'mca_4_db';

    protected function connect()
    {
        $con = new mysqli($this->host, $this->username, $this->password, $this->database);
        return $con;
    }
}
