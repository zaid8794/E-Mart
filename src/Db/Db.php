<?php

namespace App\Db;

use mysqli;

class Db
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'project';

    protected function connect()
    {
        $con = new mysqli($this->host, $this->username, $this->password, $this->database);
        return $con;
    }
}
