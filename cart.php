<?php
session_start();
include 'db.php';



$user_id = $_SESSION['user_id'];

$sql = "SELECT products.name, products.price, orders.quantity FROM orders 
        JOIN products ON orders.product_id = products.id 
        WHERE orders.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Ваша корзина</h2>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>Цена: " . $row['price'] . " руб.</p>";
        echo "<p>Количество: " . $row['quantity'] . "</p>";
        echo "</div>";
    }
} else {
    echo "Ваша корзина пуста.";
}

$stmt->close();
$conn->close();
?>
