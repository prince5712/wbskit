
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-4 bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><?= SITE_BRAND ?></h5>
                    <p class="text-muted mb-0"><?= t('footer_description', 'A modern PHP starter kit with Bootstrap integration.') ?></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 text-muted">
                        &copy; <?= date('Y') ?> <?= SITE_AUTHOR ?>. <?= t('footer_rights', 'All rights reserved.') ?>
                    </p>
                    <div class="mt-2">
                        <a href="#" class="text-muted me-3" title="<?= t('footer_privacy', 'Privacy Policy') ?>">
                            <?= t('footer_privacy', 'Privacy') ?>
                        </a>
                        <a href="#" class="text-muted" title="<?= t('footer_terms', 'Terms of Service') ?>">
                            <?= t('footer_terms', 'Terms') ?>
                        </a>
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
