// ---------- TOGGLE DEL MENÚ MÓVIL ----------
document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.querySelector(".mobile-toggle");
    const navMenu = document.querySelector(".nav-menu");

    if (toggle && navMenu) {
        toggle.addEventListener("click", () => {
            navMenu.classList.toggle("active");
        });
    }

    // ---------- CARRUSEL AUTOMÁTICO ----------
    /*  document.addEventListener("DOMContentLoaded", () => {
          const hero = document.querySelector(".hero-carousel");
          if (hero) {
              hero.classList.add("loading");
              setTimeout(() => {
                  hero.classList.remove("loading");
                  hero.classList.add("ready");
              }, 400); // pequeño delay para entrada suave
          }
      });
  
  */
    // ---------- CAMBIO REAL DE IDIOMA (redirige con ?lang=xx) ----------
    const langLinks = document.querySelectorAll(".language-switch a");

    langLinks.forEach(link => {
        link.addEventListener("click", e => {
            e.preventDefault(); // evitamos comportamiento por defecto para construir URL limpia

            const lang = link.getAttribute("data-lang");
            if (!lang) return console.warn("Idioma no especificado en enlace", link);

            // Construir nueva URL preservando ruta y otros query params (salvo lang)
            const url = new URL(window.location.href);
            url.searchParams.set('lang', lang);

            // Redirigir a la URL construida (PHP recogerá $_GET['lang'] y lo guardará en sesión)
            window.location.href = url.toString();
        });
    });

});


/* ======================================================
   🌐 JS CARRUSEL COMPACTO
====================================================== */
document.addEventListener('DOMContentLoaded', function () {
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
        resetTimer();
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

    function resetTimer() {
        clearInterval(slideInterval);
        startSlideTimer();
    }

    nextBtn.addEventListener('click', () => showSlide(currentSlide + 1));
    prevBtn.addEventListener('click', () => showSlide(currentSlide - 1));
    dots.forEach((dot, i) => dot.addEventListener('click', () => showSlide(i)));

    // Swipe táctil
    let touchStartX = 0;
    let touchEndX = 0;
    const carousel = document.querySelector('.hero-carousel');
    carousel.addEventListener('touchstart', e => touchStartX = e.changedTouches[0].screenX);
    carousel.addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].screenX;
        if (touchEndX < touchStartX - 30) showSlide(currentSlide + 1);
        if (touchEndX > touchStartX + 30) showSlide(currentSlide - 1);
    });

    showSlide(0);
});
