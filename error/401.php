<?php
// Set HTTP status code
http_response_code(401);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load config
require_once __DIR__ . '/../@/config.php';

// Set page title and description
$page_title = t('error_401_title', '401 Unauthorized');
$page_description = t('error_401_description', 'Authentication is required to access this resource.');

// Include header
include __DIR__ . '/../@/header.php';
?>

<section class="py-5 text-center flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Error Code -->
                <div class="mb-4">
                    <h1 class="display-1 fw-bold text-warning">401</h1>
                    <h2 class="h4 mb-3"><?= t('error_401_title', 'Unauthorized') ?></h2>
                </div>

                <!-- Error Message -->
                <p class="lead mb-4 text-muted">
                    <?= t('error_401_message', 'You are not authenticated. Please log in to access this resource.') ?>
                </p>

                <!-- Additional Info -->
                <div class="alert alert-info" role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    <?= t('error_login_required', 'Authentication is required to continue.') ?>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-2 justify-content-center flex-wrap">
                    <a href="<?= SITE_URL ?>/login.php" class="btn btn-primary">
                        <i class="bi bi-box-arrow-in-right me-2"></i><?= t('login', 'Login') ?>
                    </a>
                    <a href="<?= SITE_URL ?>" class="btn btn-outline-secondary">
                        <i class="bi bi-house me-2"></i><?= t('back_home', 'Back to Home') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../@/footer.php'; ?>
<!-- App JavaScript for theme management -->
<script src="<?= JS_PATH ?>app.js" defer></script>
