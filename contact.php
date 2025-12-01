<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Config लोड करना ज़रूरी है
require_once __DIR__ . '/@/config.php';

// Contact form message handling
$form_submitted = false;
$form_message = '';
$form_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
    $subject = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : '';
    $message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

    // Validate form
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $form_error = t('form_error_required', 'Please fill in all required fields.');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $form_error = t('form_error_email', 'Please enter a valid email address.');
    } else {
        // Process the form (send email, save to database, etc.)
        // For now, we'll just set a success message
        $form_submitted = true;
        $form_message = t('form_success', 'Thank you for your message! We will get back to you soon.');
    }
}

// पेज के लिए टाइटल और डिस्क्रिप्शन सेट करें
$page_title       = t('page_contact_title', 'Contact Us - WBS Kit');
$page_description = t('page_contact_description', 'Get in touch with our team. We are here to help and answer any question.');

// हेडर शामिल करें
include __DIR__ . '/@/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <!-- Page Header -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mb-3"><?= t('contact_us', 'Contact Us') ?></h1>
                <p class="lead text-muted">
                    <?= t('contact_subtitle', 'We would love to hear from you. Send us a message and we will respond as soon as possible.') ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Information Section -->
    <div class="row g-4 mb-5">
        <!-- Email -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">
                    <i class="bi bi-envelope-fill display-5 text-primary mb-3"></i>
                    <h5 class="card-title fw-bold mb-2"><?= t('contact_email', 'Email') ?></h5>
                    <p class="card-text">
                        <a href="mailto:info@example.com" class="text-decoration-none">
                            info@example.com
                        </a>
                    </p>
                    <p class="text-muted small">
                        <?= t('contact_email_response', 'Response within 24 hours') ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Phone -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">
                    <i class="bi bi-telephone-fill display-5 text-success mb-3"></i>
                    <h5 class="card-title fw-bold mb-2"><?= t('contact_phone', 'Phone') ?></h5>
                    <p class="card-text">
                        <a href="tel:+1234567890" class="text-decoration-none">
                            +1 (234) 567-890
                        </a>
                    </p>
                    <p class="text-muted small">
                        <?= t('contact_phone_hours', 'Mon - Fri, 9am - 6pm') ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Location -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">
                    <i class="bi bi-geo-alt-fill display-5 text-warning mb-3"></i>
                    <h5 class="card-title fw-bold mb-2"><?= t('contact_location', 'Location') ?></h5>
                    <p class="card-text">
                        123 Business Street<br>
                        New York, NY 10001
                    </p>
                    <p class="text-muted small">
                        <?= t('contact_office', 'Our main office') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <h3 class="card-title fw-bold mb-4"><?= t('send_message', 'Send us a Message') ?></h3>

                    <!-- Success Message -->
                    <?php if ($form_submitted): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            <?= $form_message ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="<?= t('close', 'Close') ?>"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Error Message -->
                    <?php if (!empty($form_error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <?= $form_error ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="<?= t('close', 'Close') ?>"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Contact Form -->
                    <form method="POST" action="contact.php" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-bold">
                                    <?= t('form_name', 'Full Name') ?>
                                    <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="name" 
                                    name="name" 
                                    required
                                    placeholder="<?= t('form_name_placeholder', 'Enter your full name') ?>"
                                >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold">
                                    <?= t('form_email', 'Email Address') ?>
                                    <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="email" 
                                    class="form-control" 
                                    id="email" 
                                    name="email" 
                                    required
                                    placeholder="<?= t('form_email_placeholder', 'your.email@example.com') ?>"
                                >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label fw-bold">
                                    <?= t('form_phone', 'Phone Number') ?>
                                </label>
                                <input 
                                    type="tel" 
                                    class="form-control" 
                                    id="phone" 
                                    name="phone"
                                    placeholder="<?= t('form_phone_placeholder', '+1 (234) 567-890') ?>"
                                >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="subject" class="form-label fw-bold">
                                    <?= t('form_subject', 'Subject') ?>
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="subject" name="subject" required>
                                    <option value=""><?= t('form_select_subject', 'Select a subject') ?></option>
                                    <option value="<?= t('inquiry_general', 'General Inquiry') ?>"><?= t('inquiry_general', 'General Inquiry') ?></option>
                                    <option value="<?= t('inquiry_project', 'Project Discussion') ?>"><?= t('inquiry_project', 'Project Discussion') ?></option>
                                    <option value="<?= t('inquiry_support', 'Technical Support') ?>"><?= t('inquiry_support', 'Technical Support') ?></option>
                                    <option value="<?= t('inquiry_feedback', 'Feedback') ?>"><?= t('inquiry_feedback', 'Feedback') ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label fw-bold">
                                <?= t('form_message', 'Message') ?>
                                <span class="text-danger">*</span>
                            </label>
                            <textarea 
                                class="form-control" 
                                id="message" 
                                name="message" 
                                rows="5" 
                                required
                                placeholder="<?= t('form_message_placeholder', 'Tell us more about your inquiry...') ?>"
                            ></textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <input 
                                type="checkbox" 
                                class="form-check-input" 
                                id="privacy" 
                                required
                            >
                            <label class="form-check-label" for="privacy">
                                <?= t('form_privacy', 'I agree to the privacy policy and terms of service') ?>
                                <span class="text-danger">*</span>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-send me-2"></i>
                            <?= t('form_submit', 'Send Message') ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="row mb-5 pt-5 border-top">
        <div class="col-12 my-5">
            <h2 class="fw-bold mb-4 text-center"><?= t('faq_title', 'Frequently Asked Questions') ?></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="accordion" id="faqAccordion">
                <!-- FAQ 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            <?= t('faq_q1', 'How long does a typical project take?') ?>
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?= t('faq_a1', 'Project timelines vary based on complexity and scope. Small projects typically take 4-8 weeks, while larger projects may take 3-6 months.') ?>
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            <?= t('faq_q2', 'What is your support availability?') ?>
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?= t('faq_a2', 'We provide email support Monday to Friday, 9am to 6pm. Enterprise clients receive 24/7 support.') ?>
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            <?= t('faq_q3', 'Do you offer maintenance packages?') ?>
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?= t('faq_a3', 'Yes, we offer flexible maintenance packages tailored to your needs, including regular updates, security patches, and performance monitoring.') ?>
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            <?= t('faq_q4', 'What is your refund policy?') ?>
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?= t('faq_a4', 'We are confident in our services. If you are not satisfied, we offer a 30-day money-back guarantee.') ?>
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                            <?= t('faq_q5', 'Can you help with existing websites?') ?>
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?= t('faq_a5', 'Absolutely! We can help improve, redesign, or maintain your existing website. Contact us for a free consultation.') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// फुटर शामिल करें
include __DIR__ . '/@/footer.php';
?>
