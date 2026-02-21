<?php
// Archivo: footer.php
// Incluir este archivo donde necesites el footer
// Asumiendo que tienes las traducciones cargadas en $translations
?>

<!-- Footer -->
<footer>
    <div class="footer-container">
        <!-- Sección de marca -->
        <div class="footer-brand">
            <a href="index.php" class="footer-logo">
                <img src="assets/img/logo.png" alt="LABMEB" class="footer-logo-img">
                <span class="footer-logo-text">LABMEB</span>
            </a>
            <p class="footer-description">
                <?php echo $translations['welcome_text'] ?? 'Ofrecemos soluciones de análisis y laboratorio con tecnología de punta.'; ?>
            </p>
            <!-- Footer Social -->
            <div class="footer-social">
                <a href="https://www.facebook.com" target="_blank" class="social-link" aria-label="Facebook">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com" target="_blank" class="social-link" aria-label="Twitter">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="https://www.linkedin.com" target="_blank" class="social-link" aria-label="LinkedIn">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
                <a href="https://www.instagram.com" target="_blank" class="social-link" aria-label="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>

        <!-- Enlaces rápidos -->
        <div class="footer-section">
            <h4><?php echo $translations['quick_links'] ?? 'Enlaces Rápidos'; ?></h4>
            <ul class="footer-links">
                <li><a href="index.php"><?php echo $translations['home'] ?? 'Inicio'; ?></a></li>
                <li><a href="about.php"><?php echo $translations['about'] ?? 'Quiénes Somos'; ?></a></li>
                <li><a href="services.php"><?php echo $translations['services'] ?? 'Servicios'; ?></a></li>
                <li><a href="contact.php"><?php echo $translations['contact'] ?? 'Contacto'; ?></a></li>
            </ul>
        </div>

        <!-- Servicios -->
        <div class="footer-section">
            <h4><?php echo $translations['services_footer'] ?? 'Servicios'; ?></h4>
            <ul class="footer-links">
                <li><a href="services.php"><?php echo $translations['lab_demo'] ?? 'Laboratorio Demo'; ?></a></li>
                <li><a href="services.php"><?php echo $translations['lab_mobile'] ?? 'Laboratorio Móvil'; ?></a></li>
                <li><a href="services.php"><?php echo $translations['consulting'] ?? 'Consultoría'; ?></a></li>
            </ul>
        </div>

        <!-- Información de contacto -->
        <div class="footer-section">
            <h4><?php echo $translations['contact_footer'] ?? 'Contacto'; ?></h4>
            <ul class="contact-info">
                <li>
                    <div class="contact-icon">
                        <i class="fa-solid fa-map-marker-alt"></i>
                    </div>
                    <span><?php echo $translations['address'] ?? 'Av. Ciencia 123, Ciudad Tecnológica'; ?></span>
                </li>
                <li>
                    <div class="contact-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <span><?php echo $translations['phone_number'] ?? '+1 (555) 123-4567'; ?></span>
                </li>
                <li>
                    <div class="contact-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <span><?php echo $translations['email_contact'] ?? 'info@labmeb.com'; ?></span>
                </li>
            </ul>
        </div>

        <!-- Mapa -->
        <div class="footer-map-full">
            <div class="map-full-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.952912260219!2d3.375295414770757!3d6.527631324028475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8b2ae68280c1%3A0xdc9e87a367c3d9cb!2sLagos%2C%20Nigeria!5e0!3m2!1sen!2sus!4v1625041170517!5m2!1sen!2sus"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
                <div class="map-overlay">
                    <h5><?php echo $translations['our_location'] ?? 'Nuestra Ubicación'; ?></h5>
                    <p><?php echo $translations['visit_us'] ?? 'Visítanos en nuestras instalaciones principales'; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer inferior -->
    <div class="footer-bottom">
        <div class="footer-bottom-inner">
            <div class="footer-copyright">
                &copy; 2024 LABMEB. Todos los derechos reservados.
            </div>
            <div class="footer-legal">
                <a href="privacy.php"><?php echo $translations['privacy_policy'] ?? 'Política de Privacidad'; ?></a>
                <a href="terms.php"><?php echo $translations['terms_service'] ?? 'Términos de Servicio'; ?></a>
                <a href="legal.php"><?php echo $translations['legal_notice'] ?? 'Aviso Legal'; ?></a>
            </div>
        </div>
    </div>
</footer>