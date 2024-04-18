<?php

class CategoryController
{

    public function addCategoryPage()
    {
        if (!isset($_SESSION['id'])) {
            include 'View/LoginPage.php';
            die;
        }
        $categoryModel = CategoryModel::getInstance();
        $allCategory = $categoryModel->getAllCategory();
        include 'View/addCategory.php';
    }

    public function addCategory()
    {
        if (isset($_POST['addCategory'])) {
            $category = $_POST['category'];
            $categoryModel = CategoryModel::getInstance();
            $categoryModel->addCategory($category);
            header('Location:index.php?action=addCategoryPage');
            exit;
        }
    }

    public function getNavbar()
    {
        $categoryModel = CategoryModel::getInstance();
        $allCategory = $categoryModel->getAllCategory();
        include 'View/Navbar.php';
    }

}
