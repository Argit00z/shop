<?php
include 'header.php';
include 'db.php';

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_item_id'])) {
    $remove_item_id = intval($_POST['remove_item_id']);
    $sql_delete = "DELETE FROM orders WHERE user_id = ? AND product_id = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("ii", $user_id, $remove_item_id);
    $stmt_delete->execute();
    $stmt_delete->close();
}

$sql = "SELECT products.id, products.name, products.price, orders.quantity FROM orders 
        JOIN products ON orders.product_id = products.id 
        WHERE orders.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Ваша корзина</h2>";
if ($result->num_rows > 0) {
    $total = 0;
    while ($row = $result->fetch_assoc()) {
        $item_total = $row['price'] * $row['quantity'];
        $total += $item_total;
        echo "<div class='cart-item'>";
        echo "<div>";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>Цена: " . $row['price'] . " руб.</p>";
        echo "<p>Количество: " . $row['quantity'] . "</p>";
        echo "</div>";
        echo "<div class='item-total'>";
        echo "<p>Итого: " . $item_total . " руб.</p>";
        echo "<form method='POST' style='display:inline-block;'>";
        echo "<input type='hidden' name='remove_item_id' value='" . $row['id'] . "'>";
        echo "<button type='submit'>Удалить</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }
    echo "<div class='cart-total'>";
    echo "<p>Общая сумма: " . $total . " руб.</p>";
    echo "</div>";
} else {
    echo "Ваша корзина пуста.";
}

$stmt->close();
$conn->close();
?>
<style>
    .cart-container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }
    .cart-item:last-child {
        border-bottom: none;
    }
    .cart-item h3 {
        margin: 0;
        font-size: 1.2em;
    }
    .cart-item p {
        margin: 0;
    }
    .cart-item .price, .cart-item .quantity {
        font-weight: bold;
    }
    .cart-total {
        text-align: right;
        padding: 10px;
        font-size: 1.2em;
        font-weight: bold;
    }
    h2 {
        text-align: center;
    }
</style>

<?php include 'footer.php'; ?>
