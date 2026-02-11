<?php
require_once "controller/UserController.php";
require_once "controller/StudentController.php";

session_start();

$userController = new UserController();
$studentController = new StudentController();

// Handling redirects (GET reqiest) between register view and login view
$page = $_GET['page'] ?? '';
// Catch Register/Login view request here
if ($page && $page  == 'RegisterView') $userController->registerView();
elseif ($page && $page  == 'LoginView') $userController->loginView();

// Direct POST  request to controllers
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        $userController->addUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm_password']);
    } elseif (isset($_POST['login'])) {
        $userController->login($_POST['email'], $_POST['password']);
    } elseif (isset($_POST['add_student'])) {
        $studentController->addStudent($_POST['name'], $_POST['email']);
    } elseif (isset($_POST['delete_student'])) {
        $studentController->deleteStudent($_POST['id']);
    }
}

// Render a view based on login status
$view = $userController->Home();
include  __DIR__ . "/view/{$view}View.php";
