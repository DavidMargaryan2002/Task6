<?php

class OrderController
{
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }


    public function addOrder()
    {
        global $product_id;
        $y = 0;
        foreach ($_SESSION['sum'] as $key) {
            $y = $y + $key;
        }
        $total = $y;
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $order_date = date("Y-m-d");
        $order_id = $this->model->addInOrder($name, $surname, $email, $order_date, $total);
        foreach ($_SESSION['cart_array'] as $id => $quan) {
            foreach ($_SESSION['cart'][$id] as $key) {
                $quantity = $quan;
                $product_id = $key['id'];
                $this->model->orderItem($order_id, $product_id, $quantity);
            }
        }
        unset($_SESSION['sum']);
        unset($_SESSION['total_quantity']);
        unset($_SESSION['cart_array']);
        header('Location:index.php');
    }

    public function orderPage()
    {
        include 'View/HeaderFooter/Header.php';
        $allCategory = $this->model->getOllCategory();
        include 'View/navbar.php';
        include 'View/Order.php';
    }


}