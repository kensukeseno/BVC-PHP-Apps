<?php
class Student
{
    private $conn;
    public $id;
    public $name;
    public $email;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT * FROM students";
        return $this->conn->query($query);
    }

    public function create()
    {
        $query = "INSERT INTO students(name, email) VALUES('{$this->name}', '{$this->email}')";

        return $this->conn->query($query);
    }

    public function delete()
    {
        $query = "DELETE FROM students WHERE id = " . $this->id;
        return $this->conn->query($query);
    }
}
