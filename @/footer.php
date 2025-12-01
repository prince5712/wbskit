
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto bg-black text-white">
        <div class="container-fluid py-5">
            <!-- Main Footer Content -->
            <div class="container">
                <div class="row g-4 mb-5">
                    <!-- Brand & Description -->
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-brand">
                            <h5 class="mb-3 fw-bold text-white"><?= SITE_BRAND ?></h5>
                            <p class="mb-0 text-white-50">
                                <?= t('footer_description', 'A modern PHP starter kit with Bootstrap integration.') ?>
                            </p>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-3 col-md-6">
                        <h6 class="text-white fw-bold mb-3 text-uppercase small">
                            <?= t('footer_links', 'Quick Links') ?>
                        </h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="index.php" class="text-white-50 text-decoration-none footer-link">
                                    <?= t('nav_home', 'Home') ?>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="about.php" class="text-white-50 text-decoration-none footer-link">
                                    <?= t('nav_about', 'About') ?>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="services.php" class="text-white-50 text-decoration-none footer-link">
                                    <?= t('nav_services', 'Services') ?>
                                </a>
                            </li>
                            <li>
                                <a href="contact.php" class="text-white-50 text-decoration-none footer-link">
                                    <?= t('nav_contact', 'Contact') ?>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Legal -->
                    <div class="col-lg-3 col-md-6">
                        <h6 class="text-white fw-bold mb-3 text-uppercase small">
                            <?= t('footer_legal', 'Legal') ?>
                        </h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="privacy-policy.php" class="text-white-50 text-decoration-none footer-link">
                                    <?= t('footer_privacy', 'Privacy Policy') ?>
                                </a>
                            </li>
                            <li>
                                <a href="terms-of-service.php" class="text-white-50 text-decoration-none footer-link">
                                    <?= t('footer_terms', 'Terms of Service') ?>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Social Links -->
                    <div class="col-lg-3 col-md-6">
                        <h6 class="text-white fw-bold mb-3 text-uppercase small">
                            <?= t('footer_connect', 'Connect') ?>
                                </h6>
                                <div class="d-flex gap-3">
                                    <a href="#" class="text-white-50 text-decoration-none footer-social" aria-label="GitHub">
                                        <i class="bi bi-github fs-5"></i>
                                    </a>
                                    <a href="#" class="text-white-50 text-decoration-none footer-social" aria-label="Twitter">
                                        <i class="bi bi-twitter fs-5"></i>
                                    </a>
                                    <a href="#" class="text-white-50 text-decoration-none footer-social" aria-label="Facebook">
                                        <i class="bi bi-facebook fs-5"></i>
                                    </a>
                                    <a href="#" class="text-white-50 text-decoration-none footer-social" aria-label="LinkedIn">
                                        <i class="bi bi-linkedin fs-5"></i>
                                    </a>
                                </div>
                            </div>
                            </div>

                <!-- Footer Divider -->
                <hr class="border-secondary-emphasis my-4">

                <!-- Bottom Section -->
                <div class="row align-items-center">
                    <!-- Copyright -->
                    <div class="col-md-6 mb-3 mb-md-0">
                        <p class="text-white-50 mb-0 small">
                            &copy; <?= date('Y') ?> <?= SITE_AUTHOR ?>. <?= t('footer_rights', 'All rights reserved.') ?>
                        </p>
                    </div>
                
                    <!-- Settings -->
                    <div class="col-md-6 d-flex justify-content-md-end gap-3">
                        <!-- Language Switcher -->
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="<?= t('theme', 'Language') ?>">
                                <i class="bi bi-globe2" aria-hidden="true"></i>
                                <span class="fw-medium d-none d-sm-inline"><?= $available_languages[$current_language] ?></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                <?php foreach ($available_languages as $code => $name): ?>
                                <li>
                                        <a class="dropdown-item d-flex align-items-center <?= $code === $current_language ? 'active' : '' ?>"
                                            href="?lang=<?= $code ?>">
                                            <span><?= $name ?></span>
                                            <?php if ($code === $current_language): ?>
                                                <i class="bi bi-check2 ms-auto"></i>
                                            <?php endif; ?>
                                        </a>
                                        </li>
                                        <?php endforeach; ?>
                                        </ul>
                                        </div>
                                        
                                        <!-- Theme Toggle -->
                                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-2" id="bd-theme" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="<?= t('theme', 'Toggle theme') ?>">
                                <i class="bi bi-circle-half theme-icon-active" aria-hidden="true"></i>
                                <span class="fw-medium d-none d-sm-inline"><?= t('theme', 'Theme') ?></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="bd-theme">
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
                                        <i class="bi bi-sun-fill me-2"></i>
                                        <?= t('theme_light', 'Light') ?>
                                        <i class="bi bi-check2 ms-auto d-none"></i>
                                        </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
                                        <i class="bi bi-moon-stars-fill me-2"></i>
                                        <?= t('theme_dark', 'Dark') ?>
                                        <i class="bi bi-check2 ms-auto d-none"></i>
                                        </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto">
                                        <i class="bi bi-circle-half me-2"></i>
                                        <?= t('theme_auto', 'Auto') ?>
                                        <i class="bi bi-check2 ms-auto d-none"></i>
                                        </button>
                                        </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="<?= JS_PATH ?>app.js"></script>
    
    <!-- Connection Status Script -->
    <script>
        // Check connection status
        function checkConnection() {
            if (!navigator.onLine) {
                window.location.href = 'offline.php';
            }
        }
        
        window.addEventListener('offline', checkConnection);
        
        // Prevent copy-paste
        document.addEventListener('contextmenu', e => e.preventDefault());
        document.addEventListener('selectstart', e => e.preventDefault());
        document.addEventListener('dragstart', e => e.preventDefault());
        
        // Prevent keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Disable F12, Ctrl+Shift+I, Ctrl+Shift+J, Ctrl+U, Ctrl+S, Ctrl+A, Ctrl+C, Ctrl+V
            if (e.keyCode === 123 || 
                (e.ctrlKey && e.shiftKey && (e.keyCode === 73 || e.keyCode === 74)) ||
                (e.ctrlKey && (e.keyCode === 85 || e.keyCode === 83 || e.keyCode === 65 || e.keyCode === 67 || e.keyCode === 86))) {
                e.preventDefault();
                return false;
            }
        });
        
        // Prevent zoom
        document.addEventListener('wheel', function(e) {
            if (e.ctrlKey) {
                e.preventDefault();
            }
        }, { passive: false });
        
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && (e.keyCode === 61 || e.keyCode === 107 || e.keyCode === 173 || e.keyCode === 109 || e.keyCode === 187 || e.keyCode === 189)) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
