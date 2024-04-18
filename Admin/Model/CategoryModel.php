<?php

class CategoryModel extends Model
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

    public function getAllCategory()
    {
        $query = 'SELECT * FROM `categories`';
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCategory($category)
    {
        $query = "INSERT INTO `categories` (`cat_id`, `category`) VALUES (NULL, ?);";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$category]);
        return $stmt;
    }

    public function deleteCategory($id)
    {
        $query = 'DELETE FROM `categories` WHERE `categories`.`cat_id` = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
    }
}



