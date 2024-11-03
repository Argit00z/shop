<?php include 'header.php'; ?>

<main style="text-align: center;">
  <section class="hero">
    
    <?php 
      if (isset($_SESSION['user_id'])): {
        echo "<h1>C возвращением,",$_SESSION['user_name'],!"</h1>";
      }else:{ 
        echo "<h1>Добро пожаловать!</h1>";
      }
      endif; ?>
    
    <p>Здесь вы найдете лучшие товары по отличным ценам.</p>
  </section>
  <section class="products-overview">
    <h2 style="padding-top: 30px;">Наши товары</h2>
    
      <div class="slideshow-container">
        <div class="slide">
          <img class="img_slide" src="./images/эластич.jpg" >
        </div>
        <div class="slide">
          <img class="img_slide" src="./images/штанга.jpg" >
        </div>
        <div class="slide">
          <img class="img_slide" src="./images/скакалка.jpg" ">
        </div>
      </div>

  </section>
</main>
<?php include 'footer.php'; ?>