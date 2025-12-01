<?php
// Set HTTP status code
http_response_code(400);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load config
require_once __DIR__ . '/../@/config.php';

// Set page title and description
$page_title = t('error_400_title', '400 Bad Request');
$page_description = t('error_400_description', 'The request could not be understood by the server.');

// Include header
include __DIR__ . '/../@/header.php';
?>

<section class="py-5 text-center flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Error Code -->
                <div class="mb-4">
                    <h1 class="display-1 fw-bold text-danger">400</h1>
                    <h2 class="h4 mb-3"><?= t('error_400_title', 'Bad Request') ?></h2>
                </div>

                <!-- Error Message -->
                <p class="lead mb-4 text-muted">
                    <?= t('error_400_message', 'The request could not be understood or was malformed. Please check your request and try again.') ?>
                </p>

                <!-- Additional Info -->
                <div class="alert alert-warning" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <?= t('error_check_syntax', 'Please verify that your request syntax is correct.') ?>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-2 justify-content-center flex-wrap">
                    <a href="<?= SITE_URL ?>" class="btn btn-primary">
                        <i class="bi bi-house me-2"></i><?= t('back_home', 'Back to Home') ?>
                    </a>
                    <a href="javascript:history.back()" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i><?= t('go_back', 'Go Back') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../@/footer.php'; ?>
<!-- App JavaScript for theme management -->
<script src="<?= JS_PATH ?>app.js" defer></script>
