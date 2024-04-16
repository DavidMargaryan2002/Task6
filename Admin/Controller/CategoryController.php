<?php

class CategoryController
{
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }

    public function addCategoryPage()
    {
        if (!isset($_SESSION['id'])) {
            include 'View/LoginPage.php';
            die;
        }
        $allCategory = $this->model->getAllCategory();
        include 'View/addCategory.php';
    }

    public function addCategory()
    {
        if (isset($_POST['addCategory'])) {
            $category = $_POST['category'];
            $this->model->addCategory($category);
            header('Location:index.php?action=addCategoryPage');
            exit;
        }
    }

    public function getNavbar()
    {
        $allCategory = $this->model->getAllCategory();
        include 'View/Navbar.php';
    }

}
