<?php

class HomeController
{
    public function Header()
    {
        include 'View/HeaderFooter/Header.php';
    }

    public function Footer()
    {
        include 'View/HeaderFooter/Footer.php';
    }

    public function Navbar()
    {
        $categoriesModel = CategoriesModel::getInstance();
        $allCategory = $categoriesModel->getAllCategory();
        include 'View/navbar.php';
    }

    public function getProducts()
    {
        $this->Header();
        $this->Navbar();
        $productsModel = ProductsModel::getInstance();
        $allProducts = $productsModel->getAllProducts();
        include 'View/Home.php';
        $this->Footer();
    }

    public function getProductForCart()
    {
        $this->Navbar();
        if (isset($_SESSION['cart_array'])) {
            $categoriesModel = CategoriesModel::getInstance();
            $allCategory = $categoriesModel->getAllCategory();
            $array = $_SESSION['cart_array'];
            $productsModel = ProductsModel::getInstance();
            $productIds = array_keys($array);
            $quantity = array_keys($array);
            foreach ($array as $key => $value) {
                $product[$key] = $productsModel->getProductById($key);

            }

            $price = array_sum($_SESSION['sum'] ?? []);
            $total_quantity = array_sum($_SESSION['total_quantity'] ?? []);
            include 'View/CartPage.php';
            $this->Footer();
        }


    }

    public function getProductByCategory()
    {
        $this->Header();
        $this->Navbar();
        $categoriesModel = CategoriesModel::getInstance();
        $allCategory = $categoriesModel->getAllCategory();
        $category_id = $_GET['id'];
        $productsModel = ProductsModel::getInstance();
        $productByCategory = $productsModel->getProductByCategory($category_id);
        include 'View/CategoryPage.php';
    }


}
