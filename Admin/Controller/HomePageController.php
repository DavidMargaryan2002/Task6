<?php

class HomePageController
{
    public function getProducts()
    {
        if (!isset($_SESSION['id'])) {
            include 'View/LoginPage.php';
            die;
        }
        $productModel = ProductModel::getInstance();
        $allProducts = $productModel->getAllProducts();
        include 'View/Home.php';
    }

    public function getProductByCategory()
    {
        if (!isset($_SESSION['id'])) {
            include 'View/LoginPage.php';
            die;
        }
        $category_id = $_GET['id'];
        $productModel = ProductModel::getInstance();
        $productByCategory = $productModel->getProductByCategory($category_id);
        include 'View/Categoryes.php';
    }
}
