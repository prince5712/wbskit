<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Config लोड करना ज़रूरी है
require_once __DIR__ . '/@/config.php';

// पेज के लिए टाइटल और डिस्क्रिप्शन सेट करें
$page_title       = t('page_about_title', 'About Us - WBS Kit');
$page_description = t('page_about_description', 'Learn more about WBS Kit - A modern PHP starter template with Bootstrap integration.');

// हेडर शामिल करें
include __DIR__ . '/@/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <!-- Page Header -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mb-3"><?= t('about_us', 'About Us') ?></h1>
                <p class="lead text-muted">
                    <?= t('about_subtitle', 'Discover the story behind WBS Kit and our mission to provide exceptional web solutions.') ?>
                </p>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="row mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 p-lg-5">
                    <h3 class="card-title fw-bold mb-3">
                        <i class="bi bi-lightbulb text-warning me-2"></i>
                        <?= t('our_vision', 'Our Vision') ?>
                    </h3>
                    <p class="card-text text-muted">
                        <?= t('vision_description', 'We envision a world where building modern web applications is simple, efficient, and accessible to everyone. Our WBS Kit represents our commitment to empowering developers with powerful tools and clean, maintainable code.') ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 p-lg-5">
                    <h3 class="card-title fw-bold mb-3">
                        <i class="bi bi-target text-primary me-2"></i>
                        <?= t('our_mission', 'Our Mission') ?>
                    </h3>
                    <p class="card-text text-muted">
                        <?= t('mission_description', 'To create and maintain a modern, responsive PHP starter kit that reduces development time, improves code quality, and provides a solid foundation for web projects of all sizes.') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Features Section -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="fw-bold mb-4 text-center"><?= t('why_choose_us', 'Why Choose WBS Kit?') ?></h2>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center p-3 p-lg-4">
                    <i class="bi bi-phone display-5 text-success mb-3"></i>
                    <h5 class="card-title fw-bold"><?= t('feature_responsive', 'Responsive Design') ?></h5>
                    <p class="card-text text-muted small">
                        <?= t('responsive_desc', 'Perfect experience on all devices') ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center p-3 p-lg-4">
                    <i class="bi bi-palette display-5 text-primary mb-3"></i>
                    <h5 class="card-title fw-bold"><?= t('dark_mode', 'Dark Mode') ?></h5>
                    <p class="card-text text-muted small">
                        <?= t('dark_mode_desc', 'Automatic theme detection') ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center p-3 p-lg-4">
                    <i class="bi bi-globe2 display-5 text-warning mb-3"></i>
                    <h5 class="card-title fw-bold"><?= t('multi_language', 'Multi-Language') ?></h5>
                    <p class="card-text text-muted small">
                        <?= t('multi_lang_desc', 'Support for 5+ languages') ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center p-3 p-lg-4">
                    <i class="bi bi-shield-lock display-5 text-danger mb-3"></i>
                    <h5 class="card-title fw-bold"><?= t('security', 'Secure') ?></h5>
                    <p class="card-text text-muted small">
                        <?= t('security_desc', 'Built-in security features') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="fw-bold mb-4 text-center"><?= t('our_team', 'Our Team') ?></h2>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">
                    <div class="avatar mb-3">
                        <i class="bi bi-person-circle display-1 text-primary"></i>
                    </div>
                    <h5 class="card-title fw-bold"><?= t('team_member1', 'John Developer') ?></h5>
                    <p class="text-muted mb-2"><?= t('team_role1', 'Lead Developer') ?></p>
                    <p class="card-text small">
                        <?= t('team_bio1', 'Passionate about clean code and best practices') ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">
                    <div class="avatar mb-3">
                        <i class="bi bi-person-circle display-1 text-success"></i>
                    </div>
                    <h5 class="card-title fw-bold"><?= t('team_member2', 'Sarah Designer') ?></h5>
                    <p class="text-muted mb-2"><?= t('team_role2', 'UI/UX Designer') ?></p>
                    <p class="card-text small">
                        <?= t('team_bio2', 'Creating beautiful and intuitive user experiences') ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">
                    <div class="avatar mb-3">
                        <i class="bi bi-person-circle display-1 text-warning"></i>
                    </div>
                    <h5 class="card-title fw-bold"><?= t('team_member3', 'Mike Manager') ?></h5>
                    <p class="text-muted mb-2"><?= t('team_role3', 'Project Manager') ?></p>
                    <p class="card-text small">
                        <?= t('team_bio3', 'Ensuring projects succeed on time and budget') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="row mt-5 pt-5">
        <div class="col-lg-8 mx-auto">
            <div class="card bg-primary text-white border-0">
                <div class="card-body p-5 text-center">
                    <h3 class="card-title fw-bold mb-3"><?= t('ready_start', 'Ready to Get Started?') ?></h3>
                    <p class="card-text mb-4">
                        <?= t('start_description', 'Join thousands of developers using WBS Kit') ?>
                    </p>
                    <a href="services.php" class="btn btn-light fw-bold">
                        <?= t('explore_services', 'Explore Our Services') ?>
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
