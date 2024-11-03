<?php include 'header.php'; ?>
<main>
  <section class="contact">
    <h2>Обратная связь</h2>
    <form action="contact_process.php" method="post">
      <label for="name">Имя:</label><br>
      <input type="text" id="name" name="name" required><br>
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br>
      <label for="message">Сообщение:</label><br>
      <textarea id="message" name="message" required></textarea><br>
      <button type="submit">Отправить</button>
    </form>
  </section>
</main>
<?php include 'footer.php'; ?>
