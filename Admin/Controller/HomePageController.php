<?php

class HomePageController
{
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }

    public function getProducts()
    {
        if (!isset($_SESSION['id'])) {
            include 'View/LoginPage.php';
            die;
        }
        $allProducts = $this->model->getAllProducts();
        include 'View/Home.php';
    }

    public function getProductByCategory()
    {
        if (!isset($_SESSION['id'])) {
            include 'View/LoginPage.php';
            die;
        }
        $category_id = $_GET['id'];
        $productByCategory = $this->model->getProductByCategory($category_id);
        include 'View/Categoryes.php';
    }
}
