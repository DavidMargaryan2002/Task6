<?php
class AdminModel extends Model
{
    public static $instance = null;

    public function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function checkAdmin($email, $hashpassword)
    {
        $query = 'SELECT * FROM `admin` WHERE email = :email AND password = :password';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':email' => $email, ':password' => $hashpassword]);
        return $stmt->rowCount();
    }
}