<?php

class AdminsOrderController
{
    public function getAllOrder()
    {
        $ordersModel = OrdersModel::getInstance();
        $order = $ordersModel->getAllOrder();
        include 'View/Order.php';
    }

    public function showOrder()
    {
        $order_id = $_GET['id'];
        $ordersModel = OrdersModel::getInstance();
        $prodByOrderId = $ordersModel->showOrder($order_id);
        $productIds = array_map(function ($item) {
            return $item['product_id'];
        }, $prodByOrderId);
        $productQuantity = array_map(function ($item) {
            return $item['quantity'];
        }, $prodByOrderId);
        $product = $ordersModel->getProductForOrder($productIds);
        include 'View/ShowOrder.php';
    }

}