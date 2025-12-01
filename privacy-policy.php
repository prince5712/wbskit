<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load configuration
require_once __DIR__ . '/@/config.php';

// Set page title and description
$page_title       = t('page_privacy_title', 'Privacy Policy - WBS Kit');
$page_description = t('page_privacy_description', 'Learn about how we handle your data and privacy.');

// Include header
include __DIR__ . '/@/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10">
            <!-- Page Header -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mb-3"><?= t('privacy_title', 'Privacy Policy') ?></h1>
                <p class="lead text-muted">
                    <?= t('privacy_subtitle', 'Your privacy is important to us. Learn how we collect, use, and protect your data.') ?>
                </p>
                <p class="text-muted small">
                    <?= t('privacy_last_updated', 'Last updated') ?>: <span class="fw-semibold"><?= date('F j, Y') ?></span>
                </p>
            </div>
        </div>
    </div>

    <!-- Privacy Content -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-lg-5">
                    <!-- Table of Contents -->
                    <div class="bg-light p-4 rounded mb-5 border-start border-primary border-4">
                        <h5 class="mb-3 fw-bold"><?= t('privacy_toc', 'Table of Contents') ?></h5>
                        <ul class="list-unstyled">
                            <li><a href="#intro" class="text-decoration-none text-primary">1. <?= t('privacy_intro', 'Introduction') ?></a></li>
                            <li><a href="#information-collect" class="text-decoration-none text-primary">2. <?= t('privacy_information_collect', 'Information We Collect') ?></a></li>
                            <li><a href="#how-use" class="text-decoration-none text-primary">3. <?= t('privacy_how_use', 'How We Use Your Information') ?></a></li>
                            <li><a href="#sharing" class="text-decoration-none text-primary">4. <?= t('privacy_sharing', 'Sharing of Information') ?></a></li>
                            <li><a href="#security" class="text-decoration-none text-primary">5. <?= t('privacy_security', 'Data Security') ?></a></li>
                            <li><a href="#cookies" class="text-decoration-none text-primary">6. <?= t('privacy_cookies', 'Cookies and Tracking') ?></a></li>
                            <li><a href="#rights" class="text-decoration-none text-primary">7. <?= t('privacy_rights', 'Your Rights') ?></a></li>
                            <li><a href="#retention" class="text-decoration-none text-primary">8. <?= t('privacy_retention', 'Data Retention') ?></a></li>
                            <li><a href="#contact" class="text-decoration-none text-primary">9. <?= t('privacy_contact', 'Contact Us') ?></a></li>
                        </ul>
                    </div>

                    <!-- Section 1: Introduction -->
                    <section id="intro" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">1. <?= t('privacy_intro', 'Introduction') ?></h3>
                        <p class="text-muted">
                            <?= t('privacy_intro_content', 'Welcome to WBS Kit ("we," "us," "our," or "Company"). WBS Kit is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website.') ?>
                        </p>
                        <p class="text-muted">
                            <?= t('privacy_intro_content2', 'Please read this Privacy Policy carefully. If you do not agree with our policies and practices, please do not use our website.') ?>
                        </p>
                    </section>

                    <!-- Section 2: Information We Collect -->
                    <section id="information-collect" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">2. <?= t('privacy_information_collect', 'Information We Collect') ?></h3>
                        
                        <h5 class="fw-semibold mb-3 mt-4"><?= t('privacy_personal_info', 'Personal Information') ?></h5>
                        <p class="text-muted">
                            <?= t('privacy_personal_info_content', 'We may collect personal information that you voluntarily provide to us, including:') ?>
                        </p>
                        <ul class="list-unstyled ms-3 mb-4">
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_name', 'Name and contact information') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_email', 'Email address') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_message', 'Messages and inquiries') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_account', 'Account information if you create an account') ?></li>
                        </ul>

                        <h5 class="fw-semibold mb-3 mt-4"><?= t('privacy_automatic_info', 'Automatically Collected Information') ?></h5>
                        <p class="text-muted">
                            <?= t('privacy_automatic_info_content', 'When you visit our website, we automatically collect certain information about your device and browsing activity, including:') ?>
                        </p>
                        <ul class="list-unstyled ms-3 mb-4">
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_ip_address', 'IP address') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_browser_type', 'Browser type and version') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_pages_visited', 'Pages visited and time spent') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_referral_source', 'Referral source') ?></li>
                        </ul>
                    </section>

                    <!-- Section 3: How We Use Your Information -->
                    <section id="how-use" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">3. <?= t('privacy_how_use', 'How We Use Your Information') ?></h3>
                        <p class="text-muted mb-3">
                            <?= t('privacy_how_use_content', 'We use the information we collect for various purposes, including:') ?>
                        </p>
                        <ul class="list-unstyled ms-3">
                            <li class="mb-2"><span class="badge bg-success me-2">•</span><?= t('privacy_purpose_1', 'Providing and maintaining our website') ?></li>
                            <li class="mb-2"><span class="badge bg-success me-2">•</span><?= t('privacy_purpose_2', 'Responding to your inquiries and requests') ?></li>
                            <li class="mb-2"><span class="badge bg-success me-2">•</span><?= t('privacy_purpose_3', 'Improving our services and user experience') ?></li>
                            <li class="mb-2"><span class="badge bg-success me-2">•</span><?= t('privacy_purpose_4', 'Sending administrative and promotional emails') ?></li>
                            <li class="mb-2"><span class="badge bg-success me-2">•</span><?= t('privacy_purpose_5', 'Analyzing website usage patterns') ?></li>
                            <li class="mb-2"><span class="badge bg-success me-2">•</span><?= t('privacy_purpose_6', 'Detecting and preventing fraud or security issues') ?></li>
                        </ul>
                    </section>

                    <!-- Section 4: Sharing of Information -->
                    <section id="sharing" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">4. <?= t('privacy_sharing', 'Sharing of Information') ?></h3>
                        <p class="text-muted">
                            <?= t('privacy_sharing_content', 'We do not sell, trade, or rent your personal information to third parties. We may share your information only with your consent or as required by law. We may share information with:') ?>
                        </p>
                        <ul class="list-unstyled ms-3 mt-3">
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_share_service', 'Service providers who assist us in operating our website') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_share_legal', 'Legal authorities when required by law') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_share_business', 'Business partners with your explicit consent') ?></li>
                        </ul>
                    </section>

                    <!-- Section 5: Data Security -->
                    <section id="security" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">5. <?= t('privacy_security', 'Data Security') ?></h3>
                        <p class="text-muted">
                            <?= t('privacy_security_content', 'We implement comprehensive security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet or electronic storage is completely secure. Therefore, we cannot guarantee absolute security.') ?>
                        </p>
                    </section>

                    <!-- Section 6: Cookies and Tracking -->
                    <section id="cookies" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">6. <?= t('privacy_cookies', 'Cookies and Tracking') ?></h3>
                        <p class="text-muted mb-3">
                            <?= t('privacy_cookies_content', 'Our website uses cookies to enhance your experience. Cookies are small files stored on your browser that help us:') ?>
                        </p>
                        <ul class="list-unstyled ms-3 mb-4">
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_cookie_1', 'Remember your preferences') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_cookie_2', 'Understand how you use our website') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('privacy_cookie_3', 'Improve our website functionality') ?></li>
                        </ul>
                        <p class="text-muted">
                            <?= t('privacy_cookies_control', 'You can control cookies through your browser settings. However, disabling cookies may affect some website functionality.') ?>
                        </p>
                    </section>

                    <!-- Section 7: Your Rights -->
                    <section id="rights" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">7. <?= t('privacy_rights', 'Your Rights') ?></h3>
                        <p class="text-muted mb-3">
                            <?= t('privacy_rights_content', 'You have certain rights regarding your personal information:') ?>
                        </p>
                        <ul class="list-unstyled ms-3">
                            <li class="mb-2"><span class="badge bg-info me-2">•</span><?= t('privacy_right_access', 'Right to access your personal data') ?></li>
                            <li class="mb-2"><span class="badge bg-info me-2">•</span><?= t('privacy_right_correct', 'Right to correct inaccurate data') ?></li>
                            <li class="mb-2"><span class="badge bg-info me-2">•</span><?= t('privacy_right_delete', 'Right to delete your data') ?></li>
                            <li class="mb-2"><span class="badge bg-info me-2">•</span><?= t('privacy_right_opt', 'Right to opt-out of marketing communications') ?></li>
                            <li class="mb-2"><span class="badge bg-info me-2">•</span><?= t('privacy_right_portability', 'Right to data portability') ?></li>
                        </ul>
                    </section>

                    <!-- Section 8: Data Retention -->
                    <section id="retention" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">8. <?= t('privacy_retention', 'Data Retention') ?></h3>
                        <p class="text-muted">
                            <?= t('privacy_retention_content', 'We retain your personal information for as long as necessary to provide our services and comply with legal obligations. When you request deletion, we will remove your data within a reasonable timeframe, except where we are required to retain it by law.') ?>
                        </p>
                    </section>

                    <!-- Section 9: Contact Us -->
                    <section id="contact" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">9. <?= t('privacy_contact', 'Contact Us') ?></h3>
                        <p class="text-muted mb-3">
                            <?= t('privacy_contact_content', 'If you have questions about this Privacy Policy or our privacy practices, please contact us at:') ?>
                        </p>
                        <div class="alert alert-info border-start border-info border-4" role="alert">
                            <p class="mb-2"><strong><?= t('contact_us', 'Contact Us') ?></strong></p>
                            <p class="mb-0">
                                <a href="contact.php" class="alert-link"><?= t('form_email_placeholder', 'your.email@example.com') ?></a>
                            </p>
                        </div>
                        <p class="text-muted small">
                            <?= t('privacy_contact_response', 'We will respond to your privacy inquiries within 30 days.') ?>
                        </p>
                    </section>

                    <!-- Policy Changes -->
                    <div class="bg-light p-4 rounded border-start border-warning border-4 mt-5">
                        <h5 class="mb-3 fw-bold"><?= t('privacy_changes', 'Changes to This Policy') ?></h5>
                        <p class="text-muted mb-0">
                            <?= t('privacy_changes_content', 'WBS Kit reserves the right to modify this Privacy Policy at any time. Changes will be effective when posted on the website. Your continued use of the website following the posting of changes means you accept the updated Privacy Policy.') ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to home button -->
    <div class="text-center mt-5">
        <a href="index.php" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-2"></i><?= t('go_home', 'Go to Home') ?>
        </a>
    </div>
</div>

<?php include __DIR__ . '/@/footer.php'; ?>
