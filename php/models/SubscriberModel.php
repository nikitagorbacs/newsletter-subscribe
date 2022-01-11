<?php

class SubscriberModel
{
    private $conn;
    private $table = 'subscribers';

    public $id;
    public $email;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAll()
    {
        // Raw sql query
        $query = 'SELECT * from ' . $this->table;

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
    }

    public function create()
    {
        //Clean email field from possible bugs or user harmful injections
        $email = htmlspecialchars($this->email);

        // Raw sql query
        $query = "INSERT INTO subscribers (email) VALUES ('" . $email . "')";

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Execute query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        //Clean email field from possible bugs or user harmful injections
        $id = htmlspecialchars($this->id);

        // Raw sql query
        $query = "DELETE FROM subscribers WHERE id = :id";

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);



        //Execute query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
