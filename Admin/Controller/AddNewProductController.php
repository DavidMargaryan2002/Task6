<?php

class AddNewProductController
{
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }

    public function addProductsPage()
    {
        if (!isset($_SESSION['id'])) {
            include 'View/LoginPage.php';
            die;
        }
        $allCategory = $this->model->getAllCategory();
        include 'View/AddNewProduct.php';
    }

    public function addProducts()
    {
        if (!isset($_SESSION['id'])) {
            include 'View/LoginPage.php';
            die;
        }
        $target_dir = "View/Public/Images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $category_id = $_POST['category'];
        $image_path = $_FILES["image"]["name"];

        if (!empty($name) && !empty($description) && !empty($price) && !empty($category_id) && !empty($image_path)) {
            $this->model->addProduct($name, $description, $price, $image_path, $quantity, $category_id);
            unset($_POST);
            header("Location: index.php?action=getProducts");
            exit;
        }
    }
}
