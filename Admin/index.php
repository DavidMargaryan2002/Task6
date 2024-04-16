<?php
session_start();
require_once 'Model/Model.php';
require_once 'Controller/CheckLoginController.php';
require_once 'Controller/CategoryController.php';
require_once 'Controller/HomePageController.php';
require_once 'Controller/AddNewProductController.php';
require_once 'Controller/DeleteController.php';
require_once 'Controller/UpdateProductController.php';
require_once 'Controller/AdminsOrderController.php';

$action = $_GET['action'] ?? Null;
switch ($action) {
    case 'logOut':
        $checkLoginController = new CheckLoginController();
        $checkLoginController->logOut();
        break;
    case 'order':
        $categoryController = new CategoryController();
        $categoryController->getNavbar();
        $orderController = new AdminsOrderController();
        $orderController->getAllOrder();
        break;
    case 'showOrder':
        $categoryController = new CategoryController();
        $categoryController->getNavbar();
        $orderController = new AdminsOrderController();
        $orderController->showOrder();
        break;
    case 'addProductPage':
        $categoryController = new CategoryController();
        $categoryController->getNavbar();
        $addNewProduct = new AddNewProductController();
        $addNewProduct->addProductsPage();
        break;
    case 'addCategoryPage':
        $categoryController = new CategoryController();
        $categoryController->getNavbar();
        $categoryController->addCategoryPage();
        break;
    case 'updatePage':
        $categoryController = new CategoryController();
        $categoryController->getNavbar();
        $updateProduct = new UpdateProductController();
        $updateProduct->updatePage();
        break;
    case 'addProduct':
        $addNewProductPage = new AddNewProductController();
        $addNewProductPage->addProducts();
        break;
    case 'addCategory':
        $categoryController = new CategoryController();
        $categoryController->addCategory();
        break;
    case 'UpdateProduct':
        $updateProduct = new UpdateProductController();
        $updateProduct->updateProduct();
        break;
    case 'getProducts':
        $checkLoginController = new CheckLoginController();
        $categoryController = new CategoryController();
        $categoryController->getNavbar();
        $homePageController = new HomePageController();
        $homePageController->getProducts();
        break;
    case 'getProductByCategory':
        $categoryController = new CategoryController();
        $categoryController->getNavbar();
        $homePageController = new HomePageController();
        $homePageController->getProductByCategory();
        break;
    case 'deleteProduct':
        $deleteProduct = new DeleteController();
        $deleteProduct->deleteProduct();
        break;
    case 'deleteCategory':
        $deleteProduct = new DeleteController();
        $deleteProduct->deleteCategory();
        break;
    default:
        $checkLoginController = new CheckLoginController();
        $checkLoginController->AdminLogin();
        $categoryController = new CategoryController();
        $categoryController->getNavbar();
        $homePageController = new HomePageController();
        $homePageController->getProducts();
        break;
}
