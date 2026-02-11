<?php
require_once "model/Student.php";
require_once "config/Database.php";

class StudentController
{
    private $studentModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();
        $this->studentModel = new Student($db);
    }
    public function addStudent($name, $email)
    {
        $this->studentModel->name = $name;
        $this->studentModel->email = $email;
        $result = $this->studentModel->create();
        if ($result) {
            $_SESSION["message"] = "Student added successfully";
        } else {
            $_SESSION["message"] = "Failed to add student";
        }
        header("Location:" . $_SERVER['PHP_SELF']);
        exit;
    }
    public function deleteStudent($id)
    {
        $this->studentModel->id = $id;
        $result = $this->studentModel->delete();
        if ($result) {
            $_SESSION["message"] = "Student deleted successfully";
        } else {
            $_SESSION["message"] = "Failed to delete student";
        }
        header("Location:" . $_SERVER['PHP_SELF']);
        exit;
    }
    public function index()
    {
        $students = $this->studentModel->read();

        include "view/StudentView.php";
        exit;
    }
}
