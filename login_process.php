<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  $user = $result->fetch_assoc();
  if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      echo "Авторизация успешна!";
  } else {
      echo "Неверный пароль.";
  }
} else {
  echo "Пользователь не найден.";
}
$conn->close();
?>
