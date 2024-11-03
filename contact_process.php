<?php
include 'header.php';
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
if ($conn->query($sql) === TRUE) {
  echo "Сообщение отправлено. Мы свяжемся с вами в ближайшее время.";
} else {
  echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
include 'footer.php';
?>
