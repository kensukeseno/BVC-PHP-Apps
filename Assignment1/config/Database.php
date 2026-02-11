<?php
class Database
{
    private $host = "localhost";
    private $db_name = "ec_assignment1";
    private $username = "root";
    private $password = "root";
    private $conn;

    public function connect()
    {
        if ($this->conn === null)
            $this->conn = new mysqli(
                $this->host,
                $this->username,
                $this->password,
                $this->db_name
            );

        return $this->conn;
    }
}
