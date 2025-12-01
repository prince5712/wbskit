<?php
// Check if this is first visit - if so, show splash screen
if (!isset($_GET['skip_splash']) && !isset($_SESSION['splash_shown'])) {
    // Start session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Preserve language parameter if present
    $lang_param = isset($_GET['lang']) ? '?lang=' . urlencode($_GET['lang']) : '';

    // Redirect to splash screen on first visit
    header('Location: splash.php' . $lang_param, true, 302);
    exit();
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Mark that we've gone past the splash
$_SESSION['splash_shown'] = true;

// Config लोड करना ज़रूरी है ताकि t() और बाकी डिफ़ाइन किए गए कांस्टैंट्स मिलें
require_once __DIR__ . '/@/config.php';

// पेज के लिए टाइटल और डिस्क्रिप्शन सेट करें
$page_title       = t('page_home_title', 'Home - WBS Kit');
$page_description = t('page_home_description', 'Welcome to WBS Kit - A modern PHP starter template with Bootstrap integration.');

// हेडर शामिल करें
include __DIR__ . '/@/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Hero Section -->
            <div class="text-center mb-4 mb-md-5">
                <i class="bi bi-bootstrap-fill display-1 text-primary mb-3"></i>
                <h1 class="display-4 fw-bold mb-3"><?= t('welcome_title', 'Welcome to WBS Kit') ?></h1>
                <p class="lead text-muted px-2">
                    <?= t('welcome_subtitle', 'A comprehensive PHP starter template with Bootstrap 5, multi-language support, and modern features.') ?>
                </p>
            </div>

            <!-- Features Grid -->
            <div class="row g-3 g-md-4 mb-4 mb-md-5">
                <div class="col-sm-12 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-3 p-md-4">
                            <i class="bi bi-phone display-6 text-success mb-2 mb-md-3"></i>
                            <h5 class="card-title h6 h5-md"><?= t('feature_responsive', 'Fully Responsive') ?></h5>
                            <p class="card-text text-muted small">
                                <?= t('feature_responsive_desc', 'Works perfectly on all devices - smartphones, tablets, and desktops.') ?>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-moon-stars display-6 text-warning mb-3"></i>
                            <h5 class="card-title"><?= t('feature_darkmode', 'Dark Mode') ?></h5>
                            <p class="card-text text-muted">
                                <?= t('feature_darkmode_desc', 'Automatic light/dark mode detection with manual toggle option.') ?>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-translate display-6 text-info mb-3"></i>
                            <h5 class="card-title"><?= t('feature_multilang', 'Multi-Language') ?></h5>
                            <p class="card-text text-muted">
                                <?= t('feature_multilang_desc', 'Built-in support for multiple languages with easy switching.') ?>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-wifi-off display-6 text-danger mb-3"></i>
                            <h5 class="card-title"><?= t('feature_offline', 'Offline Support') ?></h5>
                            <p class="card-text text-muted">
                                <?= t('feature_offline_desc', 'Graceful handling of offline states with custom offline pages.') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center">
                <div class="alert alert-primary" role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    <?= t('info_message', 'This template includes splash screen, offline handling, SEO optimization, and security features out of the box.') ?>
                </div>
                
                <div class="d-grid gap-2 d-md-block">
                    <button type="button" class="btn btn-primary btn-lg" onclick="testOffline()">
                        <i class="bi bi-wifi-off me-2"></i>
                        <?= t('test_offline', 'Test Offline Mode') ?>
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#aboutModal">
                        <i class="bi bi-info-circle me-2"></i>
                        <?= t('learn_more', 'Learn More') ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Modal -->
<div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aboutModalLabel">
                    <i class="bi bi-info-circle me-2"></i>
                    <?= t('about_wbs_kit', 'About WBS Kit') ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6><?= t('features_included', 'Features Included:') ?></h6>
                <ul class="list-unstyled">
                    <li><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_list_splash', 'Splash screen with auto-refresh') ?></li>
                    <li><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_list_offline', 'Offline detection and handling') ?></li>
                    <li><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_list_multilang', 'Multi-language support') ?></li>
                    <li><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_list_theme', 'Auto light/dark theme') ?></li>
                    <li><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_list_security', 'Security features (no copy/paste/zoom)') ?></li>
                    <li><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_list_responsive', 'Fully responsive Bootstrap design') ?></li>
                    <li><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_list_seo', 'SEO optimized meta tags') ?></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= t('close', 'Close') ?></button>
            </div>
        </div>
    </div>
</div>

<script>
function testOffline() {
    // Simulate offline mode by redirecting to offline page
    window.location.href = 'offline.php';
}
</script>

<?php include '@/footer.php'; ?>

<?php
