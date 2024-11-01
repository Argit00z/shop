<?php include 'header.php'; ?>
<main>
  <section class="contact">
    <h2>Контакты</h2>
    <form action="contact_process.php" method="post">
      <label for="name">Имя:</label>
      <input type="text" id="name" name="name" required>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="message">Сообщение:</label>
      <textarea id="message" name="message" required></textarea>
      <button type="submit">Отправить</button>
    </form>
  </section>
</main>
<?php include 'footer.php'; ?>
