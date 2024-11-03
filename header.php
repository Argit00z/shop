<!-- header.php -->
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <script src="./script.js" defer></script>
  </head>
  <body>
    <div class="wrapper">
      <header>
          <div class="navbar">
            <div class="logo">
              <a href="index.php">
                <img style="width: 20%;" src="./images/flyyoga-logo.jpg" alt="logo">
              </a>
            </div>
            <ul>
              <li><a href="index.php">Главная</a></li>
              <li><a href="shop.php">Магазин</a></li>
              <li><a href="about.php">О нас</a></li>
              <li><a href="contact.php">Обратная связь</a></li> 
              <?php session_start();
              if (isset($_SESSION['user_id'])): ?>
                <li><a href="cart.php">Корзина</a></li>
                <li><a href="exit.php">Выйти</a></li>
              <?php else: ?>
                <li><a href="login.php">Войти</a></li>
              <?php endif; ?>
              
            </ul>
          </div>
        </header>
        <main>
