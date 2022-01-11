<?php

class Database
{
    private $dbhost = 'localhost';
    private $dbname = 'magebit';
    private $dbuser = 'root';
    private $dbpass = '';
    private $conn;

    public function connection()
    {
        try {
            $this->conn = new PDO('mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname, $this->dbuser, $this->dbpass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
