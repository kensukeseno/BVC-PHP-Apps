<?php
require_once "model/User.php";
require_once "config/Database.php";
require_once "controller/StudentController.php";

class UserController
{
    private $userModel;
    public $studentController;

    public function __construct()
    {
        $database = new Database();
        $this->studentController = new StudentController();
        $db = $database->connect();
        $this->userModel = new User($db);
    }
    public function addUser($username, $email, $password, $confirm_password)
    {
        if ($password !== $confirm_password) {
            $error =  "Password do not match";
        } else {
            $this->userModel->email = $email;
            // check if username already exists
            if (mysqli_num_rows($this->userModel->find()) > 0) {
                $error = "Email already exists, Please choose another";
            } else {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $this->userModel->password = $passwordHash;
                $this->userModel->username = $username;
                $result = $this->userModel->create();
                if ($result) {
                    $_SESSION["message"] = "User added successfully";
                } else {
                    $error = "Failed to add User";
                }
            }
        }
        if ($error) {
            $_SESSION["message"] = $error;
        }
        header("Location:" . $_SERVER['PHP_SELF']);
        exit;
    }
    public function login($email, $password)
    {
        $this->userModel->email = $email;
        $this->userModel->password = $password;
        $result = $this->userModel->find();
        if ($result) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION["message"] = "Login successful";
                $this->studentController->index();
            }
        }
        $_SESSION["message"] = "Invalid email or password";
        header("Location:" . $_SERVER['PHP_SELF']);
        exit;
    }

    public function home()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true):
            $this->studentController->index();
        else:
            return "Register";
        endif;
    }
    public function loginView()
    {
        include "view/LoginView.php";
        exit;
    }
    public function registerView()
    {
        include "view/RegisterView.php";
        exit;
    }
}
