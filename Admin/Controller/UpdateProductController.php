<?php

class UpdateProductController
{
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }
    public function updatePage()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $productById = $this->model->getProductById($id);
            $ollCategory = $this->model->getAllCategory();
            include 'View/UpdatePage.php';
        }
    }
    public function deleteImage()
    {
        $image = $_GET['image'];
        function deleteImage($filePath)
        {
            if (file_exists($filePath)) {
                if (unlink($filePath)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        $imagePath = "Public/Images/$image";
        if (deleteImage($imagePath)) {
            echo 'Image deleted successfully.';
        } else {
            echo 'Failed to delete image.';
        }
    }

    public function updateProduct()
    {
        if (!isset($_SESSION['id'])) {
            include 'View/LoginPage.php';
            die;
        }
        if (isset($_GET['id'])){
            if (!empty($_FILES["image"]["name"])){
                $this->deleteImage();
                $id = $_GET['id'];
                $target_dir = "Public/Images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                $category_id = $_POST['category'];
                $image_path = $_FILES["image"]["name"];
                $this->model->updateProduct($name, $description, $price, $image_path,$quantity, $category_id, $id);
                unset($_POST);
                header("Location:index.php");
                exit;
            }else{
                $id = $_GET['id'];
                $target_dir = "View/Public/Images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                $category_id = $_POST['category'];
                $image_path = $_GET['image'];
                $this->model->updateProduct($name, $description, $price, $image_path,$quantity, $category_id, $id);
                unset($_POST);
                header('Location:index.php');
                exit;
            }

            }
        }



}