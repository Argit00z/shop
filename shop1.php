
<link rel="stylesheet" type="text/css" href="./style.css">
<script src="./script.js" defer></script>
<header>
    <div class="navbar">
      <div class="logo">
        <a href="index.php">Магазин спорта</a>
      </div>
      <ul>
        <li><a href="index.php">Главная</a></li>
        <li><a href="shop.php">Магазин</a></li>
        <li><a href="about.php">О нас</a></li>
        <li><a href="contact.php">Контакты</a></li>
        
          <li><a href="cart.php">Корзина</a></li>
          <li><a href="index.php">Выйти</a></li>
        
          
        
      </ul>
    </div>
  </header>
<main>
  <section class="product-list">

    <?php
        include 'db.php';

        $sql = "SELECT id, name, price, description, image FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Выводим данные о каждом товаре
            while($row = $result->fetch_assoc()) {
              echo '<div class="product-item">';
              echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
              echo '<h3>' . $row["name"] . '</h3>';
              echo '<p>' . $row["description"] . '</p>';
              echo '<p class="price">' . $row["price"] . ' руб.</p>';
              echo '<form action="add_to_cart.php" method="post">';
              echo '<input type="hidden" name="product_id" value="' . $row["id"] . '">';
              echo '<input type="number" name="quantity" value="1" min="1">';
              echo '<button type="submit" class="add-to-cart">Добавить в корзину</button>';
              echo '</form>';
              echo '</div>';
            }
          } else {
            echo "Нет доступных товаров";
          }
        $conn->close();
        include 'footer.php';
    ?>

    <!-- Подключение к базе данных и вывод продукции в виде таблицы -->
  </section>
</main>

