<?php include('includes/header.php'); ?>

<main>
  <section class="contact-form-section">
    <h2><?= $translations['contact'] ?></h2>
    <p><?= $translations['fill_form'] ?></p>

    <form action="backend/contact_process.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name"><?= $translations['name'] ?> *</label>
        <input type="text" name="name" id="name" required>
      </div>
      <div class="form-group">
        <label for="email"><?= $translations['email'] ?> *</label>
        <input type="email" name="email" id="email" required>
      </div>
      <div class="form-group">
        <label for="phone"><?= $translations['phone'] ?></label>
        <input type="text" name="phone" id="phone">
      </div>
      <div class="form-group">
        <label for="message"><?= $translations['message'] ?> *</label>
        <textarea name="message" id="message" required></textarea>
      </div>

      <button type="submit"><?= $translations['send'] ?></button>
    </form>
  </section>
</main>

<?php include('includes/footer.php'); ?>