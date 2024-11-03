<?php

include 'header.php';



include 'db.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Проверка, есть ли уже этот товар в корзине
    $sql = "SELECT * FROM orders WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Если товар уже в корзине, увеличиваем количество
        $sql = "UPDATE orders SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $quantity, $user_id, $product_id);
    } else {
        // Если товара нет в корзине, добавляем новый
        $sql = "INSERT INTO orders (user_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $user_id, $product_id, $quantity);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Товар успешно добавлен в корзину!'); window.location.href='shop.php';</script>";
    } else {
        echo "<script>alert('Ошибка при добавлении товара в корзину: " . $stmt->error . "'); window.location.href='shop.php';</script>";
    }
    $stmt->close();
    $conn->close();
}

include 'footer.php';

?>
