<?php
session_start();
require_once 'Model/Model.php';
require_once 'Controller/HomeController.php';
require_once 'Controller/OrderController.php';
$action = $_GET['action'] ?? Null;
switch ($action) {
    case 'cart':
        $homeController = new HomeController();
        $homeController->Header();
        $homeController->getProductById();
        break;
    case 'OrderPage':
        $homeController = new HomeController();
        $homeController->Header();
       $orderController = new OrderController();
       $orderController->orderPage();
        break;
    case 'Order':
        $orderController = new OrderController();
        $orderController->addOrder();
        break;
    case 'CategoryPage':
        $homeController = new HomeController();
        $homeController->Header();
        $homeController->getProductByCategory();
        break;
    default:
        $homeController = new HomeController();
        $homeController->Header();
        $homeController->getProducts();
        break;

}

