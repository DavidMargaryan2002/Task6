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

    public function checkAdmin($email, $hashpassword)
    {
        $query = 'SELECT * FROM `admin` WHERE email = :email AND password = :password';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':email' => $email, ':password' => $hashpassword]);
        return $stmt->rowCount();
    }


    public function getAllProducts()
    {
        $query = 'SELECT * FROM `products` ';
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllCategory()
    {
        $query = 'SELECT * FROM `categories`';
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllOrder()
    {
        $query = 'SELECT * FROM `Orders`';
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function showOrder($order_id)
    {
        $query = "SELECT * FROM `order_items` WHERE order_id = :order_id;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $description, $price, $image_path,$quantity, $category_id)
    {
        $query = "INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_path`,`quantity`, `category_id`) VALUES (NULL, ?, ?, ?,?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name, $description, $price, $image_path,$quantity, $category_id]);
        return $stmt;
    }
    public function addCategory($category)
    {
        $query = "INSERT INTO `categories` (`cat_id`, `category`) VALUES (NULL, ?);";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$category]);
        return $stmt;
    }

    function getProductByCategory($category_id)
    {
        $query = "SELECT * FROM `products` WHERE category_id = :category_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletePost($id)
    {
        $query = ' DELETE FROM `products` WHERE `products`.`id` = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
    }
    public function deleteCategory($id)
    {
        $query = ' DELETE FROM `categories` WHERE `categories`.`cat_id` = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
    }
    public function getProductById($id)
    {
        $query = "SELECT * FROM `products` WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function updateProduct($name, $description, $price, $image_path,$quantity, $category_id, $id)
    {
        $query = "UPDATE products SET name = :name, description = :description, price = :price, image_path = :image_path,quantity = :cuantity, category_id = :category_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image_path', $image_path);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


}