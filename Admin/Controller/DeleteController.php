<?php

class DeleteController
{

    public function deleteCategory()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoryModel = CategoryModel::getInstance();
            $categoryModel->deleteCategory($id);
            header('Location:index.php?action=addCategoryPage');
        }
    }

    public function deleteProduct()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $productModel = ProductModel::getInstance();
            $productModel->deletePost($id);
            header('Location:index.php');
        }
    }
}