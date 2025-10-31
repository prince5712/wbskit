
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-4 bg-body-tertiary">
        <div class="container">
            <div class="row align-items-center mb-3">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5 class="mb-1 text-body"><?= SITE_BRAND ?></h5>
                    <p class="mb-0 text-body-secondary">
                        <?= t('footer_description', 'A modern PHP starter kit with Bootstrap integration.') ?></p>
                </div>
            
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <!-- Social icons (Bootstrap Icons) -->
                    <div class="d-flex justify-content-center gap-3" aria-label="Social links">
                        <a href="#" class="link-body-emphasis fs-5" aria-label="GitHub">
                            <i class="bi bi-github" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="link-body-emphasis fs-5" aria-label="Twitter">
                            <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="link-body-emphasis fs-5" aria-label="Facebook">
                            <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="link-body-emphasis fs-5" aria-label="LinkedIn">
                            <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 text-md-end">
                    <p class="mb-0 text-body-secondary">
                        &copy; <?= date('Y') ?> <?= SITE_AUTHOR ?>. <?= t('footer_rights', 'All rights reserved.') ?>
                    </p>
                    <div class="mt-2 d-flex justify-content-md-end gap-3 align-items-center flex-wrap">
                        <div class="d-flex gap-3 align-items-center">
                            <a href="#" class="link-body-emphasis" title="<?= t('footer_privacy', 'Privacy Policy') ?>">
                                <?= t('footer_privacy', 'Privacy') ?>
                            </a>
                            <a href="#" class="link-body-emphasis" title="<?= t('footer_terms', 'Terms of Service') ?>">
                                <?= t('footer_terms', 'Terms') ?>
                            </a>
                        </div>

                        <!-- Language Switcher -->
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-globe2 me-2" aria-hidden="true"></i>
                                <span class="fw-medium"><?= $available_languages[$current_language] ?></span>
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
                        
                        <!-- Theme Toggle -->
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center" id="bd-theme"
                                type="button" data-bs-toggle="dropdown" aria-label="Toggle theme">
                                <i class="bi bi-circle-half me-2 theme-icon-active" aria-hidden="true"></i>
                                <span class="fw-medium"><?= t('theme', 'Theme') ?></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="bd-theme">
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
