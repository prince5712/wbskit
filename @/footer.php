
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-5 bg-dark text-white border-top">
        <div class="container">
            <!-- Main Footer Content -->
            <div class="row gy-4">
                <!-- Brand Section -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="mb-3 text-white fw-bold"><?= SITE_BRAND ?></h5>
                    <p class="mb-3 text-light-emphasis">
                        <?= t('footer_description', 'A modern PHP starter kit with Bootstrap integration.') ?>
                    </p>
                </div>

                <!-- Social Links Section -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="mb-3 text-white fw-bold"><?= t('footer_connect', 'Connect With Us') ?></h5>
                    <div class="d-flex gap-3" aria-label="Social links">
                        <a href="#" class="link-light fs-5 hover-opacity" aria-label="GitHub">
                            <i class="bi bi-github" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="link-light fs-5 hover-opacity" aria-label="Twitter">
                            <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="link-light fs-5 hover-opacity" aria-label="Facebook">
                            <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="link-light fs-5 hover-opacity" aria-label="LinkedIn">
                            <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <!-- Legal & Settings Section -->
                <div class="col-lg-4 col-md-12">
                    <h5 class="mb-3 text-white fw-bold"><?= t('footer_legal', 'Legal') ?></h5>
                    <div class="d-flex flex-column gap-2">
                        <a href="#" class="link-light text-decoration-none hover-opacity"
                            title="<?= t('footer_privacy', 'Privacy Policy') ?>">
                            <?= t('footer_privacy', 'Privacy Policy') ?>
                        </a>
                        <a href="#" class="link-light text-decoration-none hover-opacity" title="<?= t('footer_terms', 'Terms of Service') ?>">
                            <?= t('footer_terms', 'Terms of Service') ?>
                        </a>
                        
                        <!-- Settings Section -->
                        <div class="d-flex gap-2 mt-3">
                            <!-- Language Switcher -->
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-light dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-globe2 me-2" aria-hidden="true"></i>
                                    <span class="fw-medium"><?= $available_languages[$current_language] ?></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <?php foreach ($available_languages as $code => $name): ?>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center <?= $code === $current_language ? 'active' : '' ?>"
                                                href="?lang=<?= $code ?>">
                                                <span class="me-2"><?= $name ?></span>
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
                                    <button class="btn btn-sm btn-outline-light dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" aria-label="Toggle theme">
                                        <i class="bi bi-circle-half me-2 theme-icon-active" aria-hidden="true"></i>
                                        <span class="fw-medium"><?= t('theme', 'Theme') ?></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme">
                                        <li>
                                            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
                                                <i class="bi bi-sun-fill me-2 opacity-75"></i>
                                                <?= t('theme_light', 'Light') ?>
                                                <i class="bi bi-check2 ms-auto d-none"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
                                                <i class="bi bi-moon-stars-fill me-2 opacity-75"></i>
                                                <?= t('theme_dark', 'Dark') ?>
                                                <i class="bi bi-check2 ms-auto d-none"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto">
                                                <i class="bi bi-circle-half me-2 opacity-75"></i>
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
                                
                                <!-- Copyright Section -->
                                <div class="row mt-5 pt-4 border-top border-secondary">
                                    <div class="col-12">
                                        <p class="text-light-emphasis text-center mb-0">
                                            &copy; <?= date('Y') ?> <?= SITE_AUTHOR ?>. <?= t('footer_rights', 'All rights reserved.') ?>
                                        </p>
                                    </div>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <?php foreach ($available_languages as $code => $name): ?>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center <?= $code === $current_language ? 'active' : '' ?>"
                                            href="?lang=<?= $code ?>">
                                            <span class="me-2"><?= $name ?></span>
                                            <?php if ($code === $current_language): ?>
                                                <i class="bi bi-check2 ms-auto"></i>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
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
