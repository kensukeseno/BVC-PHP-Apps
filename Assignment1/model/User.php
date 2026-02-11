<?php
class User
{
    private $conn;
    public $id;
    public $username;
    public $password;
    public $email;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function find()
    {
        $query = "SELECT * FROM user WHERE email='{$this->email}' LIMIT 1";
        return $this->conn->query($query);
    }

    public function create()
    {
        $query = "INSERT INTO user(username, password, email) VALUES('{$this->username}', '{$this->password}', '{$this->email}')";
        return $this->conn->query($query);
    }
}
