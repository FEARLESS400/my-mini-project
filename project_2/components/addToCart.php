<?php
session_start();
include '../config/connect.php';

if (!isset($_SESSION['client_id'])) {
    header('Location: login.php');
    exit();
}

$client_id = $_SESSION['client_id'];
$product_id = $_POST['product_id'];

// Check if this product is already in the cart
$check = $conn->prepare("SELECT * FROM cart WHERE client_id = ? AND product_id = ?");
$check->bind_param("ii", $client_id, $product_id);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    // Product exists → increase quantity
    $conn->query("UPDATE cart SET quantity_in_cart = quantity_in_cart + 1 WHERE client_id = $client_id AND product_id = $product_id");
} else {
    // New product → insert it
    $insert = $conn->prepare("INSERT INTO cart (client_id, product_id, quantity_in_cart) VALUES (?, ?, 1)");
    $insert->bind_param("ii", $client_id, $product_id);
    $insert->execute();
}

header('Location: index.php');
?>