<?php


class OrderModel extends Model
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