<?php include('lang.php'); ?>
<?php
$page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LABMEB</title>

  <!-- Favicon -->
  <link rel="icon" href="assets/img/logo.png" type="image/png">


  <link rel="stylesheet" href="assets/css/header.css">
  <link rel="stylesheet" href="assets/css/footer.css">
  <?php
  if ($page == 'index.php') echo '<link rel="stylesheet" href="assets/css/index.css">';
  elseif ($page == 'about.php') echo '<link rel="stylesheet" href="assets/css/about.css">';
  elseif ($page == 'services.php') echo '<link rel="stylesheet" href="assets/css/services.css">';
  elseif ($page == 'contact.php') echo '<link rel="stylesheet" href="assets/css/contact.css">';
  ?>
</head>

<body>
  <header>
    <div class="header-container">
      <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="LABMEB" /></a>
      <nav class="nav-menu">
        <ul>
          <li><a href="index.php"><?= $translations['home'] ?></a></li>
          <li><a href="about.php"><?= $translations['about'] ?></a></li>
          <li><a href="services.php"><?= $translations['services'] ?></a></li>
          <li><a href="contact.php"><?= $translations['contact'] ?></a></li>
        </ul>
      </nav>
      <div class="mobile-toggle" id="mobile-menu">&#9776;</div>
      <div class="language-switch">
        <a href="?lang=es" data-lang="es">ES</a> |
        <a href="?lang=en" data-lang="en">EN</a> |
        <a href="?lang=pt" data-lang="pt">PT</a>
      </div>

    </div>
  </header>

  <script src="assets/js/main.js"></script>