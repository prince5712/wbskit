<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load config
require_once __DIR__ . '/@/config.php';

// Set page title and description
$page_title       = t('page_register_title', 'Register - WBS Kit');
$page_description = t('page_register_description', 'Create a new WBS Kit account');

// Handle registration form submission
$register_error = '';
$register_success = false;
$form_data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_data = [
        'fullname' => trim($_POST['fullname'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'password' => trim($_POST['password'] ?? ''),
        'confirm_password' => trim($_POST['confirm_password'] ?? ''),
        'agree_terms' => isset($_POST['agree_terms'])
    ];
    
    // Validate input
    if (empty($form_data['fullname'])) {
        $register_error = t('register_error_fullname', 'Full name is required');
    } elseif (strlen($form_data['fullname']) < 3) {
        $register_error = t('register_error_fullname_min', 'Full name must be at least 3 characters');
    } elseif (empty($form_data['email'])) {
        $register_error = t('register_error_email_required', 'Email address is required');
    } elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $register_error = t('register_error_invalid_email', 'Please enter a valid email address');
    } elseif (empty($form_data['password'])) {
        $register_error = t('register_error_password_required', 'Password is required');
    } elseif (strlen($form_data['password']) < 6) {
        $register_error = t('register_error_password_min', 'Password must be at least 6 characters');
    } elseif ($form_data['password'] !== $form_data['confirm_password']) {
        $register_error = t('register_error_password_mismatch', 'Passwords do not match');
    } elseif (!$form_data['agree_terms']) {
        $register_error = t('register_error_terms', 'You must agree to the terms and conditions');
    } else {
        // TODO: Implement actual registration logic with database
        // For now, show success message
        $_SESSION['user_email'] = $form_data['email'];
        $_SESSION['user_fullname'] = $form_data['fullname'];
        $_SESSION['user_registered'] = true;
        $register_success = true;
        
        // Redirect after 2 seconds
        header('Refresh: 2; url=login.php');
    }
}

// Include header
include __DIR__ . '/@/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-sm-8">
            <!-- Register Card -->
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4 p-md-5">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <i class="bi bi-person-plus display-6 text-primary mb-3"></i>
                        <h2 class="h3 fw-bold mb-2"><?= t('register_title', 'Create Account') ?></h2>
                        <p class="text-muted small">
                            <?= t('register_subtitle', 'Join us and start your journey') ?>
                        </p>
                    </div>

                    <!-- Success Message -->
                    <?php if ($register_success): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            <?= t('register_success', 'Registration successful! Redirecting to login...') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Error Message -->
                    <?php if ($register_error): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle me-2"></i>
                            <?= htmlspecialchars($register_error) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Register Form -->
                    <form method="POST" action="register.php" novalidate>
                        <!-- Full Name Field -->
                        <div class="mb-3">
                            <label for="fullname" class="form-label fw-semibold">
                                <?= t('form_fullname', 'Full Name') ?>
                            </label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="fullname" 
                                name="fullname" 
                                placeholder="<?= t('form_fullname_placeholder', 'Enter your full name') ?>"
                                required
                                value="<?= htmlspecialchars($form_data['fullname'] ?? '') ?>"
                            >
                            <small class="form-text text-muted">
                                <?= t('form_fullname_help', 'At least 3 characters') ?>
                            </small>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">
                                <?= t('form_email', 'Email Address') ?>
                            </label>
                            <input 
                                type="email" 
                                class="form-control" 
                                id="email" 
                                name="email" 
                                placeholder="<?= t('form_email_placeholder', 'Enter your email') ?>"
                                required
                                value="<?= htmlspecialchars($form_data['email'] ?? '') ?>"
                            >
                            <small class="form-text text-muted">
                                <?= t('form_email_help', 'We\'ll never share your email.') ?>
                            </small>
                        </div>

                        <!-- Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">
                                <?= t('form_password', 'Password') ?>
                            </label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password" 
                                name="password" 
                                placeholder="<?= t('form_password_placeholder', 'Enter your password') ?>"
                                required
                            >
                            <small class="form-text text-muted">
                                <?= t('register_password_help', 'Minimum 6 characters') ?>
                            </small>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label fw-semibold">
                                <?= t('register_confirm_password', 'Confirm Password') ?>
                            </label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="confirm_password" 
                                name="confirm_password" 
                                placeholder="<?= t('register_confirm_password_placeholder', 'Confirm your password') ?>"
                                required
                            >
                        </div>

                        <!-- Terms and Conditions Checkbox -->
                        <div class="form-check mb-4">
                            <input 
                                class="form-check-input" 
                                type="checkbox" 
                                id="agree_terms" 
                                name="agree_terms"
                                required
                            >
                            <label class="form-check-label" for="agree_terms">
                                <?= t('register_agree', 'I agree to the') ?>
                                <a href="#" class="text-decoration-none text-primary fw-semibold">
                                    <?= t('register_terms', 'Terms and Conditions') ?>
                                </a>
                                <?= t('register_and', 'and') ?>
                                <a href="#" class="text-decoration-none text-primary fw-semibold">
                                    <?= t('register_privacy', 'Privacy Policy') ?>
                                </a>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold mb-3">
                            <i class="bi bi-person-plus me-2"></i>
                            <?= t('register_button', 'Create Account') ?>
                        </button>

                        <!-- Divider -->
                        <div class="d-flex align-items-center my-3">
                            <hr class="flex-grow-1">
                            <span class="px-3 text-muted small"><?= t('register_or', 'or') ?></span>
                            <hr class="flex-grow-1">
                        </div>

                        <!-- Social Register Options -->
                        <div class="d-grid gap-2 mb-3">
                            <button type="button" class="btn btn-outline-secondary py-2">
                                <i class="bi bi-google me-2"></i>
                                <?= t('register_google', 'Sign up with Google') ?>
                            </button>
                            <button type="button" class="btn btn-outline-secondary py-2">
                                <i class="bi bi-facebook me-2"></i>
                                <?= t('register_facebook', 'Sign up with Facebook') ?>
                            </button>
                        </div>
                    </form>

                    <!-- Login Link -->
                    <div class="text-center pt-3 border-top">
                        <p class="text-muted mb-0">
                            <?= t('register_have_account', 'Already have an account?') ?>
                            <a href="login.php" class="text-decoration-none fw-semibold">
                                <?= t('register_login', 'Login here') ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <p class="text-center text-muted small mt-4">
                <i class="bi bi-shield-check me-1"></i>
                <?= t('register_secure', 'Your account is secure and encrypted') ?>
            </p>
        </div>
    </div>
</div>

<?php include __DIR__ . '/@/footer.php'; ?>
