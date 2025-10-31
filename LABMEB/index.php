<?php include('includes/header.php'); ?>

<main>

  <!-- HERO CAROUSEL -->
  <section class="hero-carousel">
    <div class="carousel-container">

      <!-- Slide 1  carrou-->
      <div class="carousel-slide active">
        <img src="assets/img/hero-bg.png" alt="<?= $translations['lab_demo'] ?>">
        <div class="carousel-content">
          <h1><?= $translations['hero_title_1'] ?></h1>
          <p><?= $translations['hero_text_1'] ?></p>
          <a href="services.php" class="carousel-btn"><?= $translations['learn_more'] ?></a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-slide">
        <img src="assets/img/hero-bg.png" alt="<?= $translations['lab_mobile'] ?>">
        <div class="carousel-content">
          <h1><?= $translations['hero_title_2'] ?></h1>
          <p><?= $translations['hero_text_2'] ?></p>
          <a href="about.php" class="carousel-btn"><?= $translations['learn_more'] ?></a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-slide">
        <img src="assets/img/hero-bg.png" alt="<?= $translations['consulting'] ?>">
        <div class="carousel-content">
          <h1><?= $translations['hero_title_3'] ?></h1>
          <p><?= $translations['hero_text_3'] ?></p>
          <a href="contact.php" class="carousel-btn"><?= $translations['learn_more'] ?></a>
        </div>
      </div>

      <!-- Indicadores -->
      <div class="carousel-indicators">1 / 3</div>

      <!-- Controles -->
      <div class="carousel-controls">
        <div class="carousel-nav">
          <button class="carousel-nav-btn carousel-prev"><i class="fas fa-chevron-left"></i></button>
          <button class="carousel-nav-btn carousel-next"><i class="fas fa-chevron-right"></i></button>
        </div>
        <div class="carousel-dots">
          <div class="carousel-dot active"></div>
          <div class="carousel-dot"></div>
          <div class="carousel-dot"></div>
        </div>
      </div>

      <!-- Barra de progreso -->
      <div class="carousel-progress">
        <div class="carousel-progress-bar"></div>
      </div>
    </div>
  </section>

  <!-- INTRO -->
  <section class="intro">
    <h2><?= $translations['welcome_title'] ?></h2>
    <p><?= $translations['welcome_text'] ?></p>
  </section>

  <!-- SERVICIOS DESTACADOS -->
  <section class="services-home">
    <div class="service-card">
      <h3><?= $translations['lab_demo'] ?></h3>
      <p><?= $translations['service_lab_demo_text'] ?? 'Laboratorio de demostración equipado con tecnología avanzada.' ?></p>
      <a href="services.php#demo" class="btn"><?= $translations['learn_more'] ?></a>
    </div>

    <div class="service-card">
      <h3><?= $translations['lab_mobile'] ?></h3>
      <p><?= $translations['service_lab_mobile_text'] ?? 'Laboratorio móvil que lleva la ciencia a cualquier lugar.' ?></p>
      <a href="services.php#mobile" class="btn"><?= $translations['learn_more'] ?></a>
    </div>

    <div class="service-card">
      <h3><?= $translations['consulting'] ?></h3>
      <p><?= $translations['service_consulting_text'] ?? 'Asesorías especializadas en implementación y mejora de procesos.' ?></p>
      <a href="services.php#consulting" class="btn"><?= $translations['learn_more'] ?></a>
    </div>
  </section>

</main>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    const nextBtn = document.querySelector('.carousel-next');
    const prevBtn = document.querySelector('.carousel-prev');
    const progressBar = document.querySelector('.carousel-progress-bar');
    const indicators = document.querySelector('.carousel-indicators');

    let currentSlide = 0;
    let slideInterval;
    const slideDuration = 5000;

    function showSlide(n) {
      slides.forEach(slide => slide.classList.remove('active'));
      dots.forEach(dot => dot.classList.remove('active'));
      currentSlide = (n + slides.length) % slides.length;
      slides[currentSlide].classList.add('active');
      dots[currentSlide].classList.add('active');
      indicators.textContent = `${currentSlide + 1} / ${slides.length}`;
      progressBar.style.width = '0%';
      clearInterval(slideInterval);
      startSlideTimer();
    }

    function startSlideTimer() {
      let start = Date.now();
      slideInterval = setInterval(() => {
        const elapsed = Date.now() - start;
        const progress = (elapsed / slideDuration) * 100;
        progressBar.style.width = `${Math.min(progress, 100)}%`;
        if (progress >= 100) showSlide(currentSlide + 1);
      }, 50);
    }

    nextBtn.addEventListener('click', () => showSlide(currentSlide + 1));
    prevBtn.addEventListener('click', () => showSlide(currentSlide - 1));
    dots.forEach((dot, i) => dot.addEventListener('click', () => showSlide(i)));

    showSlide(0);
  });
</script>

<?php include('includes/footer.php'); ?>