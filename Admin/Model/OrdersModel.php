<?php
require_once 'Model.php';

class OrdersModel extends Model
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

    public function getProductForOrder($productIds)
    {
        $inQuery = implode(',', array_fill(0, count($productIds), '?'));
        $query = "SELECT * FROM `products` WHERE `id` IN ({$inQuery})";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($productIds);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}