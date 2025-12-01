<?php
// Set HTTP status code
http_response_code(403);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load config
require_once __DIR__ . '/../@/config.php';

// Set page title and description
$page_title = t('error_403_title', '403 Forbidden');
$page_description = t('error_403_description', 'You do not have permission to access this resource.');

// Include header
include __DIR__ . '/../@/header.php';
?>

<section class="py-5 text-center flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Error Code -->
                <div class="mb-4">
                    <h1 class="display-1 fw-bold text-danger">403</h1>
                    <h2 class="h4 mb-3 text-body"><?= t('error_403_title', 'Forbidden') ?></h2>
                </div>

                <!-- Error Message -->
                <p class="lead mb-4 text-body-secondary">
                    <?= t('error_403_message', 'You do not have permission to access this resource. Your access has been denied.') ?>
                </p>

                <!-- Additional Info -->
                <div class="alert alert-warning border-warning" role="alert">
                    <i class="bi bi-shield-exclamation me-2"></i>
                    <?= t('error_permission_denied', 'Access to this resource is restricted.') ?>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-2 justify-content-center flex-wrap">
                    <a href="<?= SITE_URL ?>" class="btn btn-primary">
                        <i class="bi bi-house me-2"></i><?= t('back_home', 'Back to Home') ?>
                    </a>
                    <a href="<?= SITE_URL ?>/contact.php" class="btn btn-outline-secondary">
                        <i class="bi bi-envelope me-2"></i><?= t('contact_us', 'Contact Us') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../@/footer.php'; ?>
<!-- App JavaScript for theme management -->
<script src="<?= JS_PATH ?>app.js" defer></script>
