<?php

class UpdateProductController
{
    public function updatePage()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $productModel = ProductModel::getInstance();
            $productById = $productModel->getProductById($id);
            $categoryModel = CategoryModel::getInstance();
            $allCategory = $categoryModel->getAllCategory();
            include 'View/UpdatePage.php';
        }
    }

    public function updateProduct()
    {
        if (!isset($_SESSION['id'])) {
            include 'View/LoginPage.php';
            die;
        }

        if (!isset($_GET['id'])) {
            header('Location: error.php');
            exit;
        }

        $id = $_GET['id'];

        if (!empty($_FILES["image"]["name"])) {
            $target_dir = 'Public/Images/';
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $image_path = $_FILES["image"]["name"];
        } else {
            $image_path = $_POST['image'];
        }

        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $category_id = $_POST['category'];

        $productModel = ProductModel::getInstance();
        $productModel->updateProduct($name, $description, $price, $image_path, $quantity, $category_id, $id);

        header('Location: index.php');
        exit;
    }

}