<?php

class CheckLoginController
{
    public function AdminLogin()
    {
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hashPassword = md5($password);
            if (empty($email) || empty($password)) {
                $_SESSION["error"] = 'Email and password are required';
                echo "empty";
                exit;
            }
            $adminModel = AdminModel::getInstance();
            $admins = $adminModel->checkAdmin($email, $hashPassword);
            if ($admins < 1) {
                $_SESSION["error"] = 'Wrong email or password';
                exit;
            }

            $_SESSION["id"] = "key";

        }
    }

    public function logOut()
    {
        unset($_SESSION['id']);
        include 'View/LoginPage.php';
    }
}
