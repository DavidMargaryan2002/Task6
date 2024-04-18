<?php

class ProductModel extends Model
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

    public function getAllProducts()
    {
        $query = 'SELECT * FROM `products` ';
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function addProduct($name, $description, $price, $image_path, $quantity, $category_id)
    {
        $query = "INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_path`,`quantity`, `category_id`) VALUES (NULL, ?, ?, ?,?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name, $description, $price, $image_path, $quantity, $category_id]);
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

    public function getProductById($id)
    {
        $query = "SELECT * FROM `products` WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateProduct($name, $description, $price, $image_path, $quantity, $category_id, $id)
    {
        $query = "UPDATE products SET name = :name, description = :description, price = :price, image_path = :image_path, quantity = :quantity, category_id = :category_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':image_path', $image_path, PDO::PARAM_STR);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}