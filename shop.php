
<main>
  <section class="product-list">
    
    <?php
        include 'header.php';
        include 'db.php';

        $sql = "SELECT id, name, price, description, image FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        echo '<div class="products1">';
          while($row = $result->fetch_assoc()) {
            echo '<div class="product-item">';
            echo '<img src="' .$row["image"] . '" alt="' . $row["name"] . '">';
            echo '<h3>' . $row["name"] . '</h3>';
            echo '<p>' . $row["description"] . '</p>';
            echo '<p class="price">' . $row["price"] . ' руб.</p>';
            echo '<button class="add-to-cart">Добавить в корзину</button>';
            echo '</div>';
          }
          echo '</div>';
        } else {
        echo "0 results";
        }
        $conn->close();
        include 'footer.php';
    ?>

    <!-- Подключение к базе данных и вывод продукции в виде таблицы -->
  </section>
</main>

