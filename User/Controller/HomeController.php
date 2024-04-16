<?php

class HomeController
{
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }

    public function Header()
    {
        include 'View/HeaderFooter/Header.php';
    }

    public function Footer()
    {
        include 'View/HeaderFooter/Footer.php';
    }

    public function getProducts()
    {
        $allProducts = $this->model->getAllProducts();
        $this->Header();
        $this->addCategoryPage();
        include 'View/Home.php';
        $this->Footer();
    }

    public function getProductById()
    {
        $allCategory = $this->model->getOllCategory();
        include 'View/navbar.php';
        if (isset($_SESSION['cart_array'])) {
            $array = $_SESSION['cart_array'];
            foreach ($array as $id => $quantity) {
                $_SESSION['cart'][$id] = $this->model->getProductById($id);
            }
            $this->total();
            $this->Footer();
        }
    }

    public function addCategoryPage()
    {
        $allCategory = $this->model->getOllCategory();
        include 'View/navbar.php';

    }

    public function getProductByCategory()
    {
        $allCategory = $this->model->getOllCategory();
        include 'View/navbar.php';
        $category_id = $_GET['id'];
        $productByCategory = $this->model->getProductByCategory($category_id);
        include 'View/CategoryPage.php';

    }

    public function total()
    {
        if (isset($_SESSION['cart_array']) || isset($_SESSION['sum']) || isset($_SESSION['total_quantity'])) {
            $y = 0;
            foreach ($_SESSION['sum'] as $key) {
                $y = $y + $key;
            }
            $price = $y;
            $x = 0;
            foreach ($_SESSION['total_quantity'] as $val) {
                $x = $x + $val;
            }
            $total_quantity = $x;
            include 'View/CartPage.php';
        }
    }
}
