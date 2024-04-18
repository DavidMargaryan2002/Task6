<?php

class Model
{
    protected $conn;

    protected function __construct()
    {
        $host = 'localhost';
        $db_name = 'shop';
        $username = 'root';
        $password = '';

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}




