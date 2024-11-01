<?php
include 'header.php';
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT name, price, description, image, stock FROM products WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo "<div class='product-details'>";
  echo "<img src='images/" . $row["image"] . "' alt='" . $row["name"] . "'>";
  echo "<h2>" . $row["name"] . "</h2>";
  echo "<p>Цена: " . $row["price"] . " руб.</p>";
  echo "<p>Описание: " . $row["description"] . "</p>";
  echo "<p>В наличии: " . $row["stock"] . " шт.</p>";
  echo "</div>";
} else {
  echo "Продукт не найден.";
}
$conn->close();
include 'footer.php';
?>
