<?php

class Model
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $host = 'localhost';
        $db_name = 'shop';
        $username = 'root';
        $password = '';

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __destruct()
    {
        $this->conn = null;
    }

    public function getAllProducts()
    {
        $query = 'SELECT * FROM `products` ';
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOllCategory()
    {
        $query = 'SELECT * FROM `categories`';
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getProductByCategory($category_id)
    {
        $query = "SELECT * FROM `products` WHERE category_id = :category_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $query = "SELECT * FROM `products` WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addInOrder($name, $surname, $email, $order_date, $total)
    {
        $query = "INSERT INTO `orders` (`id`, `name`, `surname`, `email`, `order_date`, `total`) VALUES (NULL, ?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name, $surname, $email, $order_date, $total]);
        $lastId = $this->conn->lastInsertId();
        return $lastId;

    }

    public function orderItem($order_id, $product_id, $quantity)
    {
        $query = "INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$order_id, $product_id, $quantity]);
    }


}