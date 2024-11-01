<?php
define('DB_HOST', 'localhost'); //Адрес
define('DB_USER', 'root'); //Имя пользователя
define('DB_PASSWORD', ''); //Пароль
define('DB_NAME', 'shop'); //Имя БД
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn == false) {
    print ("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} 
?>
