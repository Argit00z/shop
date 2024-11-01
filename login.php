<?php include 'header.php'; ?>


<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Запрос на выборку пользователя по логину
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = SHA1(?)");
    $stmt->bind_param("ss", $input_username, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Проверка, найден ли пользователь
    if ($result->num_rows > 0) {
        // Начинаем сессию
        session_start();
        $_SESSION['user_id'] = $user['id'];; // Сохраняем имя пользователя в сессии

        // Перенаправляем на страницу shop.php
        header("Location: index1.php");
        exit(); // Завершаем скрипт после перенаправления
    } else {
        echo "Неверный логин или пароль.";
    }

    $stmt->close();
}

$conn->close();
?>
<h2>Добро пожаловать в наш магазин!</h2>
    
    
    <p>Форма авторизации:</p>
    <form class="auth-form" action="login.php" method="POST">
        <input type="text" name="username" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit" class="login-button">Войти</button> <!-- Кнопка входа -->
    </form>


<?php include 'footer.php'; ?>