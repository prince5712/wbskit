<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Config लोड करना ज़रूरी है
require_once __DIR__ . '/@/config.php';

// पेज के लिए टाइटल और डिस्क्रिप्शन सेट करें
$page_title       = t('page_services_title', 'Services - WBS Kit');
$page_description = t('page_services_description', 'Explore our comprehensive services and solutions for web development.');

// हेडर शामिल करें
include __DIR__ . '/@/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <!-- Page Header -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mb-3"><?= t('our_services', 'Our Services') ?></h1>
                <p class="lead text-muted">
                    <?= t('services_subtitle', 'Comprehensive solutions tailored to meet your web development needs') ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Main Services Grid -->
    <div class="row g-4 mb-5">
        <!-- Service 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 service-card">
                <div class="card-body p-4">
                    <i class="bi bi-code-square display-5 text-primary mb-3"></i>
                    <h4 class="card-title fw-bold mb-2"><?= t('service_development', 'Web Development') ?></h4>
                    <p class="card-text text-muted mb-3">
                        <?= t('service_dev_desc', 'Custom web applications built with modern PHP, responsive design, and best practices.') ?>
                    </p>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_php', 'PHP Development') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_responsive', 'Responsive Design') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_database', 'Database Design') ?></li>
                    </ul>
                </div>
                <div class="card-footer bg-white border-top p-3">
                    <small class="text-muted">
                        <i class="bi bi-clock me-1"></i> <?= t('service_duration', '4-12 weeks') ?>
                    </small>
                </div>
            </div>
        </div>

        <!-- Service 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 service-card">
                <div class="card-body p-4">
                    <i class="bi bi-palette display-5 text-success mb-3"></i>
                    <h4 class="card-title fw-bold mb-2"><?= t('service_design', 'UI/UX Design') ?></h4>
                    <p class="card-text text-muted mb-3">
                        <?= t('service_design_desc', 'Beautiful, intuitive interfaces that engage users and drive conversions.') ?>
                    </p>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_wireframe', 'Wireframing') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_mockup', 'Mockups') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_usability', 'Usability Testing') ?></li>
                    </ul>
                </div>
                <div class="card-footer bg-white border-top p-3">
                    <small class="text-muted">
                        <i class="bi bi-clock me-1"></i> <?= t('service_duration', '2-6 weeks') ?>
                    </small>
                </div>
            </div>
        </div>

        <!-- Service 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 service-card">
                <div class="card-body p-4">
                    <i class="bi bi-tools display-5 text-warning mb-3"></i>
                    <h4 class="card-title fw-bold mb-2"><?= t('service_maintenance', 'Maintenance & Support') ?></h4>
                    <p class="card-text text-muted mb-3">
                        <?= t('service_maint_desc', 'Ongoing support, updates, and maintenance to keep your site running smoothly.') ?>
                    </p>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_updates', 'Regular Updates') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_monitoring', 'Monitoring') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_backups', 'Backups') ?></li>
                    </ul>
                </div>
                <div class="card-footer bg-white border-top p-3">
                    <small class="text-muted">
                        <i class="bi bi-clock me-1"></i> <?= t('service_ongoing', 'Ongoing') ?>
                    </small>
                </div>
            </div>
        </div>

        <!-- Service 4 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 service-card">
                <div class="card-body p-4">
                    <i class="bi bi-gear display-5 text-danger mb-3"></i>
                    <h4 class="card-title fw-bold mb-2"><?= t('service_optimization', 'Performance Optimization') ?></h4>
                    <p class="card-text text-muted mb-3">
                        <?= t('service_opt_desc', 'Speed up your website and improve user experience with advanced optimization.') ?>
                    </p>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_speed', 'Speed Optimization') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_seo', 'SEO Optimization') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_analytics', 'Analytics') ?></li>
                    </ul>
                </div>
                <div class="card-footer bg-white border-top p-3">
                    <small class="text-muted">
                        <i class="bi bi-clock me-1"></i> <?= t('service_duration', '1-3 weeks') ?>
                    </small>
                </div>
            </div>
        </div>

        <!-- Service 5 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 service-card">
                <div class="card-body p-4">
                    <i class="bi bi-shield-lock display-5 text-info mb-3"></i>
                    <h4 class="card-title fw-bold mb-2"><?= t('service_security', 'Security Audit') ?></h4>
                    <p class="card-text text-muted mb-3">
                        <?= t('service_sec_desc', 'Comprehensive security review to protect your application and data.') ?>
                    </p>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_vulnerability', 'Vulnerability Assessment') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_penetration', 'Penetration Testing') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_report', 'Detailed Report') ?></li>
                    </ul>
                </div>
                <div class="card-footer bg-white border-top p-3">
                    <small class="text-muted">
                        <i class="bi bi-clock me-1"></i> <?= t('service_duration', '2-4 weeks') ?>
                    </small>
                </div>
            </div>
        </div>

        <!-- Service 6 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 service-card">
                <div class="card-body p-4">
                    <i class="bi bi-book-half display-5 text-secondary mb-3"></i>
                    <h4 class="card-title fw-bold mb-2"><?= t('service_training', 'Training & Consulting') ?></h4>
                    <p class="card-text text-muted mb-3">
                        <?= t('service_train_desc', 'Expert guidance and training for your team on best practices and tools.') ?>
                    </p>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_workshop', 'Workshops') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_onsite', 'On-site Training') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_documentation', 'Documentation') ?></li>
                    </ul>
                </div>
                <div class="card-footer bg-white border-top p-3">
                    <small class="text-muted">
                        <i class="bi bi-clock me-1"></i> <?= t('service_custom', 'Custom') ?>
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="row mb-5 pt-5 border-top">
        <div class="col-12 my-5">
            <h2 class="fw-bold mb-4 text-center"><?= t('pricing_plans', 'Pricing Plans') ?></h2>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <!-- Starter Plan -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h4 class="card-title fw-bold mb-1"><?= t('plan_starter', 'Starter') ?></h4>
                    <p class="text-muted mb-3"><?= t('plan_starter_desc', 'Perfect for small projects') ?></p>
                    <div class="mb-4">
                        <span class="display-6 fw-bold">$</span><span class="display-5 fw-bold">999</span>
                        <span class="text-muted">/<?= t('plan_monthly', 'month') ?></span>
                    </div>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_pages', '5 Pages') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_email_support', 'Email Support') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_free_updates', '6 Months Updates') ?></li>
                    </ul>
                    <a href="contact.php" class="btn btn-outline-primary w-100">
                        <?= t('get_started', 'Get Started') ?>
                    </a>
                </div>
            </div>
        </div>

        <!-- Professional Plan -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 position-relative">
                <div class="badge bg-primary position-absolute top-0 start-50 translate-middle-x">
                    <?= t('plan_popular', 'Popular') ?>
                </div>
                <div class="card-body p-4 mt-3">
                    <h4 class="card-title fw-bold mb-1"><?= t('plan_professional', 'Professional') ?></h4>
                    <p class="text-muted mb-3"><?= t('plan_prof_desc', 'For growing businesses') ?></p>
                    <div class="mb-4">
                        <span class="display-6 fw-bold">$</span><span class="display-5 fw-bold">1999</span>
                        <span class="text-muted">/<?= t('plan_monthly', 'month') ?></span>
                    </div>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_unlimited_pages', 'Unlimited Pages') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_priority_support', 'Priority Support') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_one_year', '1 Year Updates') ?></li>
                    </ul>
                    <a href="contact.php" class="btn btn-primary w-100">
                        <?= t('get_started', 'Get Started') ?>
                    </a>
                </div>
            </div>
        </div>

        <!-- Enterprise Plan -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h4 class="card-title fw-bold mb-1"><?= t('plan_enterprise', 'Enterprise') ?></h4>
                    <p class="text-muted mb-3"><?= t('plan_ent_desc', 'Custom solutions') ?></p>
                    <div class="mb-4">
                        <span class="h4 fw-bold text-muted"><?= t('plan_custom_pricing', 'Custom Pricing') ?></span>
                    </div>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_everything', 'Everything in Pro') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_dedicated', 'Dedicated Support') ?></li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><?= t('feature_sla', 'SLA Agreement') ?></li>
                    </ul>
                    <a href="contact.php" class="btn btn-outline-primary w-100">
                        <?= t('contact_us', 'Contact Us') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="row mt-5 pt-5">
        <div class="col-lg-8 mx-auto">
            <div class="card bg-success text-white border-0">
                <div class="card-body p-5 text-center">
                    <h3 class="card-title fw-bold mb-3"><?= t('ready_discuss', 'Ready to Discuss Your Project?') ?></h3>
                    <p class="card-text mb-4">
                        <?= t('contact_description', 'Let us help you find the perfect solution') ?>
                    </p>
                    <a href="contact.php" class="btn btn-light fw-bold">
                        <?= t('contact_now', 'Contact Us Now') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// फुटर शामिल करें
include __DIR__ . '/@/footer.php';
?>
