<?php

class DeleteController
{
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }

    public function deleteCategory(){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $this->model->deleteCategory($id);
            header('Location:index.php?action=addCategoryPage');
        }
    }
    public function deleteProduct()
    {
        if (isset($_GET['id']) && $_GET['image'] ){
            $id = $_GET['id'];
            $image = $_GET['image'];
        function deleteImage($filePath) {
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
            $this->model->deletePost($id);
        header('Location:index.php');
        }

    }
}