<?php
session_start();
if (isset($_POST['action']) && $_POST['action'] === 'add') {
    $id = $_POST['id'];
    $price = $_POST['price'];
    $quantity = 1;
    if (isset($_SESSION['cart_array'][$id])) {
        $_SESSION['cart_array'][$id] += 1;
        $_SESSION['sum'][$id] = $price * $_SESSION['cart_array'][$id];
        $_SESSION['total_quantity'][$id] = $_SESSION['cart_array'][$id];

    } else {
        $_SESSION['cart_array'][$id] = $quantity;
        $_SESSION['total_quantity'][$id] = $_SESSION['cart_array'][$id];
        $_SESSION['sum'][$id] += $price;
    }
}
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];
    unset($_SESSION['cart_array'][$id]);
    unset($_SESSION['sum'][$id]);
    unset($_SESSION['total_quantity'][$id]);

}