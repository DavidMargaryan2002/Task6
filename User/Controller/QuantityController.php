<?php
session_start();
if (isset($_POST['action']) && $_POST['action'] == 'min') {
    $id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    $price = (int)$_POST['price'];
    $hidden_quantity = (int)$_POST['hidden_quantity'];
    if ($quantity >= 1) {
        $_SESSION['cart_array'][$id] = $quantity;
        $_SESSION['total_quantity'][$id] = $_SESSION['cart_array'][$id];
        $_SESSION['sum'][$id] = $price * $_SESSION['cart_array'][$id];
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'plus') {
    $id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    $price = (int)$_POST['price'];
    $hidden_quantity = (int)$_POST['hidden_quantity'];
    if ($quantity > $hidden_quantity) {
        $quantity = $hidden_quantity;
    }
    $_SESSION['cart_array'][$id] = $quantity;
    $_SESSION['total_quantity'][$id] = $_SESSION['cart_array'][$id];
    $_SESSION['sum'][$id] = $price * $_SESSION['cart_array'][$id];
}








