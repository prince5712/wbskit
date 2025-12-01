<?php
// Set HTTP status code
http_response_code(503);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load config
require_once __DIR__ . '/../@/config.php';

// Set page title and description
$page_title = t('error_503_title', '503 Service Unavailable');
$page_description = t('error_503_description', 'The service is temporarily unavailable.');

// Include header
include __DIR__ . '/../@/header.php';
?>

<section class="py-5 text-center flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Error Code -->
                <div class="mb-4">
                    <h1 class="display-1 fw-bold text-warning">503</h1>
                    <h2 class="h4 mb-3"><?= t('error_503_title', 'Service Unavailable') ?></h2>
                </div>

                <!-- Error Message -->
                <p class="lead mb-4 text-muted">
                    <?= t('error_503_message', 'The server is temporarily unable to handle the request. This is usually a temporary condition.') ?>
                </p>

                <!-- Additional Info -->
                <div class="alert alert-warning" role="alert">
                    <i class="bi bi-hourglass-split me-2"></i>
                    <?= t('error_try_again', 'Please try again in a few moments.') ?>
                </div>

                <!-- Status & Retry Info -->
                <div class="card bg-light mb-4">
                    <div class="card-body">
                        <p class="card-text mb-0">
                            <small class="text-muted">
                                <i class="bi bi-clock-history me-2"></i><?= t('error_maintenance', 'We are performing scheduled maintenance or experiencing high traffic.') ?>
                            </small>
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-2 justify-content-center flex-wrap">
                    <a href="javascript:location.reload()" class="btn btn-primary">
                        <i class="bi bi-arrow-clockwise me-2"></i><?= t('retry', 'Retry') ?>
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
