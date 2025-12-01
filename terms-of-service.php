<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load configuration
require_once __DIR__ . '/@/config.php';

// Set page title and description
$page_title       = t('page_terms_title', 'Terms of Service - WBS Kit');
$page_description = t('page_terms_description', 'Read our terms of service and conditions of use.');

// Include header
include __DIR__ . '/@/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10">
            <!-- Page Header -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mb-3"><?= t('terms_title', 'Terms of Service') ?></h1>
                <p class="lead text-muted">
                    <?= t('terms_subtitle', 'Please read our terms of service carefully before using our website.') ?>
                </p>
                <p class="text-muted small">
                    <?= t('terms_last_updated', 'Last updated') ?>: <span class="fw-semibold"><?= date('F j, Y') ?></span>
                </p>
            </div>
        </div>
    </div>

    <!-- Terms Content -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-lg-5">
                    <!-- Table of Contents -->
                    <div class="bg-light p-4 rounded mb-5 border-start border-primary border-4">
                        <h5 class="mb-3 fw-bold"><?= t('terms_toc', 'Table of Contents') ?></h5>
                        <ul class="list-unstyled">
                            <li><a href="#acceptance" class="text-decoration-none text-primary">1. <?= t('terms_acceptance', 'Acceptance of Terms') ?></a></li>
                            <li><a href="#use-license" class="text-decoration-none text-primary">2. <?= t('terms_use_license', 'Use License') ?></a></li>
                            <li><a href="#disclaimer" class="text-decoration-none text-primary">3. <?= t('terms_disclaimer', 'Disclaimer') ?></a></li>
                            <li><a href="#limitations" class="text-decoration-none text-primary">4. <?= t('terms_limitations', 'Limitations of Liability') ?></a></li>
                            <li><a href="#accuracy" class="text-decoration-none text-primary">5. <?= t('terms_accuracy', 'Accuracy of Materials') ?></a></li>
                            <li><a href="#materials" class="text-decoration-none text-primary">6. <?= t('terms_materials', 'Materials and Content') ?></a></li>
                            <li><a href="#links" class="text-decoration-none text-primary">7. <?= t('terms_links', 'Links') ?></a></li>
                            <li><a href="#modifications" class="text-decoration-none text-primary">8. <?= t('terms_modifications', 'Modifications') ?></a></li>
                            <li><a href="#governing" class="text-decoration-none text-primary">9. <?= t('terms_governing', 'Governing Law') ?></a></li>
                        </ul>
                    </div>

                    <!-- Section 1: Acceptance of Terms -->
                    <section id="acceptance" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">1. <?= t('terms_acceptance', 'Acceptance of Terms') ?></h3>
                        <p class="text-muted">
                            <?= t('terms_acceptance_content', 'By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.') ?>
                        </p>
                        <p class="text-muted">
                            <?= t('terms_acceptance_content2', 'WBS Kit reserves the right to modify this agreement at any time without notice. Your continued use of the website following the posting of revised Terms of Service means you accept and agree to the changes.') ?>
                        </p>
                    </section>

                    <!-- Section 2: Use License -->
                    <section id="use-license" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">2. <?= t('terms_use_license', 'Use License') ?></h3>
                        <p class="text-muted mb-3">
                            <?= t('terms_license_granted', 'Permission is granted to temporarily download one copy of the materials (information or software) on WBS Kit website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:') ?>
                        </p>
                        <ul class="list-unstyled ms-3">
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('terms_license_1', 'Modifying or copying the materials') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('terms_license_2', 'Using the materials for any commercial purpose or for any public display') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('terms_license_3', 'Attempting to decompile or reverse engineer any software contained on the website') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('terms_license_4', 'Removing any copyright or proprietary notations from the materials') ?></li>
                            <li class="mb-2"><span class="badge bg-primary me-2">•</span><?= t('terms_license_5', 'Transferring the materials to another person or replicating the materials on any other server') ?></li>
                        </ul>
                    </section>

                    <!-- Section 3: Disclaimer -->
                    <section id="disclaimer" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">3. <?= t('terms_disclaimer', 'Disclaimer') ?></h3>
                        <p class="text-muted">
                            <?= t('terms_disclaimer_content', 'The materials on WBS Kit website are provided on an \'as is\' basis. WBS Kit makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.') ?>
                        </p>
                    </section>

                    <!-- Section 4: Limitations of Liability -->
                    <section id="limitations" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">4. <?= t('terms_limitations', 'Limitations of Liability') ?></h3>
                        <p class="text-muted">
                            <?= t('terms_limitations_content', 'In no event shall WBS Kit or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on WBS Kit, even if WBS Kit or an authorized representative has been notified orally or in writing of the possibility of such damage.') ?>
                        </p>
                    </section>

                    <!-- Section 5: Accuracy of Materials -->
                    <section id="accuracy" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">5. <?= t('terms_accuracy', 'Accuracy of Materials') ?></h3>
                        <p class="text-muted">
                            <?= t('terms_accuracy_content', 'The materials appearing on WBS Kit website could include technical, typographical, or photographic errors. WBS Kit does not warrant that any of the materials on its website are accurate, complete, or current. WBS Kit may make changes to the materials contained on its website at any time without notice.') ?>
                        </p>
                    </section>

                    <!-- Section 6: Materials and Content -->
                    <section id="materials" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">6. <?= t('terms_materials', 'Materials and Content') ?></h3>
                        <p class="text-muted">
                            <?= t('terms_materials_content', 'WBS Kit has not reviewed all of the sites linked to its website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by WBS Kit of the site. Use of any such linked website is at the user\'s own risk.') ?>
                        </p>
                    </section>

                    <!-- Section 7: Links -->
                    <section id="links" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">7. <?= t('terms_links', 'Links') ?></h3>
                        <p class="text-muted">
                            <?= t('terms_links_content', 'WBS Kit may revoke your authorization to visit our website at any time. Any downloaded materials or content from our website must be deleted from your computer systems. If you violate any of these Terms and Conditions, your permission to use our website automatically terminates.') ?>
                        </p>
                    </section>

                    <!-- Section 8: Modifications -->
                    <section id="modifications" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">8. <?= t('terms_modifications', 'Modifications') ?></h3>
                        <p class="text-muted">
                            <?= t('terms_modifications_content', 'WBS Kit may revise these Terms of Service for its website at any time without notice. By using this website, you are agreeing to be bound by the then-current version of these Terms of Service.') ?>
                        </p>
                    </section>

                    <!-- Section 9: Governing Law -->
                    <section id="governing" class="mb-5">
                        <h3 class="fw-bold mb-3 text-primary">9. <?= t('terms_governing', 'Governing Law') ?></h3>
                        <p class="text-muted">
                            <?= t('terms_governing_content', 'These conditions and terms are governed by and construed in accordance with the laws of your jurisdiction, and you irrevocably submit to the exclusive jurisdiction of the courts in that location.') ?>
                        </p>
                    </section>

                    <!-- Contact Section -->
                    <div class="bg-light p-4 rounded border-start border-success border-4 mt-5">
                        <h5 class="mb-3 fw-bold"><?= t('terms_contact', 'Have Questions?') ?></h5>
                        <p class="text-muted mb-3">
                            <?= t('terms_contact_content', 'If you have any questions about our Terms of Service, please contact us at:') ?>
                        </p>
                        <p class="mb-0">
                            <a href="contact.php" class="btn btn-primary btn-sm">
                                <i class="bi bi-envelope me-2"></i><?= t('contact_us', 'Contact Us') ?>
                            </a>
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
