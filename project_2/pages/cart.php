<?php
session_start();
include '../config/connect.php';

if (!isset($_SESSION['client_id'])) {
    header('Location: login.php');
    exit();
}

$client_id = $_SESSION['client_id'];

$sql = "SELECT p.Name, p.Price, c.quantity_in_cart
        FROM cart c
        JOIN product p ON c.product_id = p.Id_product
        WHERE c.client_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $client_id);
$stmt->execute();
$result = $stmt->get_result();

$total = 0;
while ($row = $result->fetch_assoc()) {
    echo "<div class='cart-item'>";
    echo "<h4>{$row['Name']}</h4>";
    echo "<p>Price: {$row['Price']} × {$row['quantity_in_cart']}</p>";
    echo "</div>";
    $total += $row['Price'] * $row['quantity_in_cart'];
}
echo "<h3>Total: $total MAD</h3>";
?>