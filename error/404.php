<?php
// Set HTTP status code
http_response_code(404);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load config
require_once __DIR__ . '/../@/config.php';

// Set page title and description
$page_title = t('error_404_title', '404 Page Not Found');
$page_description = t('error_404_description', 'The page you are looking for could not be found.');

// Include header
include __DIR__ . '/../@/header.php';
?>

<section class="py-5 text-center flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Error Code -->
                <div class="mb-4">
                    <h1 class="display-1 fw-bold text-danger">404</h1>
                    <h2 class="h4 mb-3"><?= t('error_404_title', 'Page Not Found') ?></h2>
                </div>

                <!-- Error Message -->
                <p class="lead mb-4 text-muted">
                    <?= t('error_404_message', 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.') ?>
                </p>

                <!-- Additional Info -->
                <div class="alert alert-danger" role="alert">
                    <i class="bi bi-file-earmark-x me-2"></i>
                    <?= t('error_page_not_found', 'The requested resource does not exist.') ?>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-2 justify-content-center flex-wrap">
                    <a href="<?= SITE_URL ?>" class="btn btn-primary">
                        <i class="bi bi-house me-2"></i><?= t('back_home', 'Back to Home') ?>
                    </a>
                    <a href="<?= SITE_URL ?>/services.php" class="btn btn-outline-secondary">
                        <i class="bi bi-briefcase me-2"></i><?= t('explore_services', 'Explore Services') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../@/footer.php'; ?>
<!-- App JavaScript for theme management -->
<script src="<?= JS_PATH ?>app.js" defer></script>
