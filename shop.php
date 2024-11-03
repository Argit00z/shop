
<?php include 'header.php'; ?>
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
            if (isset($_SESSION['user_id'])) {
              echo '<input type="number" name="quantity" value="1" min="1">';
              echo '<button type="submit" class="add-to-cart">Добавить в корзину</button>';
            } else {
              echo '<p>Для добавления товара в корзину необходимо войти</p>';
            }
            echo '</form>';
            echo '<button class="details-button" data-name="' . $row["name"] . '" data-description="' . htmlspecialchars($row["description"], ENT_QUOTES) . '" data-image="' . $row["image"] . '" data-price="' . $row["price"] . '">Подробнее</button>';
            echo '</div>';
          }
        } else {
          echo "Нет доступных товаров";
        }
      $conn->close();
  ?>
  </section>

  <div id="product-modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <img style="width: 50%;" id="modal-image" src="" alt="">
    <h2 id="modal-name"></h2>
    <p id="modal-description"></p>
    <p id="modal-price" class="price"></p>
  </div>
</div>

<?php include 'footer.php'; ?>
<style>
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
  }

  .modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
</style>

<script>
  // Get the modal
  var modal = document.getElementById("product-modal");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  // Get all the "Подробнее" buttons
  var detailsButtons = document.querySelectorAll('.details-button');

  detailsButtons.forEach(function(button) {
    button.onclick = function() {
      document.getElementById('modal-name').textContent = this.getAttribute('data-name');
      document.getElementById('modal-description').textContent = this.getAttribute('data-description');
      document.getElementById('modal-image').src = this.getAttribute('data-image');
      document.getElementById('modal-price').textContent = this.getAttribute('data-price') + ' руб.';
      modal.style.display = "block";
    }
  });
</script>


