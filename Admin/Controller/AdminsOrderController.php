<?php

class AdminsOrderController
{
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }

    public function getAllOrder()
    {
        $order = $this->model->getAllOrder();
        include 'View/Order.php';
    }

    public function showOrder()
    {
        $order_id = $_GET['id'];
        $prodByOrderId = $this->model->showOrder($order_id);
        foreach ($prodByOrderId as $val) {
            $id = $val['product_id'];
            $quantity = $val['quantity'];
            $product[$id] = $this->model->getProductById($id);
        }
        include 'View/ShowOrder.php';
    }
}