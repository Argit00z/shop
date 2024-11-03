<?php include 'header.php'; ?>


<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Проверка на существование пользователя с таким же именем
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div>Пользователь с таким именем уже существует.</div>";
    } else {
        // Вставка нового пользователя в базу данных
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, SHA1(?))");
        $stmt->bind_param("ss", $input_username, $input_password);

        if ($stmt->execute()) {
            // Перенаправление на index.php
            echo "<div>Регистрация прошла успешно. Вы будете перенаправлены на главную страницу.</div>";
            echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 3000);</script>";
            exit();
        } else {
            echo "<div>Ошибка при регистрации: " . $stmt->error . "</div>";
        }
    }

    $stmt->close();
}

$conn->close();
?>
<main>
        <div class="auth-form">
            <form action="" method="post">
                <label for="username">Имя пользователя:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" class="register-button" value="Зарегистрироваться">
            </form>
        </div>
    </main>
<?php include 'footer.php'; ?>