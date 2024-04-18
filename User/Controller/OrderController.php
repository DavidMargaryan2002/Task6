<?php

class OrderController
{

    public function addOrder()
    {
        $total = array_sum($_SESSION['sum'] ?? []);
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $order_date = date("Y-m-d");
        $orderModel = OrderModel::getInstance();
        $order_id = $orderModel->addInOrder($name, $surname, $email, $order_date, $total);
        foreach ($_SESSION['cart_array'] as $key => $value) {
            $orderModel->orderItem($order_id, $key, $value);
        }
        unset($_SESSION['sum']);
        unset($_SESSION['total_quantity']);
        unset($_SESSION['cart_array']);
        header('Location:index.php');
    }

    public function orderPage()
    {
        $categoriesModel = CategoriesModel::getInstance();
        $allCategory = $categoriesModel->getAllCategory();
        include 'View/Order.php';
    }


}