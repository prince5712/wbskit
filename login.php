<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load config
require_once __DIR__ . '/@/config.php';

// Set page title and description
$page_title       = t('page_login_title', 'Login - WBS Kit');
$page_description = t('page_login_description', 'Login to your WBS Kit account');

// Handle login form submission
$login_error = '';
$login_success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    // Validate input
    if (empty($email) || empty($password)) {
        $login_error = t('login_error_required', 'Email and password are required');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $login_error = t('login_error_invalid_email', 'Please enter a valid email address');
    } else {
        // TODO: Implement actual authentication logic
        // For now, show success message (replace with database verification)
        $_SESSION['user_email'] = $email;
        $_SESSION['user_logged_in'] = true;
        $login_success = true;
        
        // Redirect after 2 seconds
        header('Refresh: 2; url=index.php');
    }
}

// Include header
include __DIR__ . '/@/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-sm-8">
            <!-- Login Card -->
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4 p-md-5">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <i class="bi bi-box-arrow-in-right display-6 text-primary mb-3"></i>
                        <h2 class="h3 fw-bold mb-2"><?= t('login_title', 'Login') ?></h2>
                        <p class="text-muted small">
                            <?= t('login_subtitle', 'Sign in to your account to continue') ?>
                        </p>
                    </div>

                    <!-- Success Message -->
                    <?php if ($login_success): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            <?= t('login_success', 'Login successful! Redirecting...') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Error Message -->
                    <?php if ($login_error): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle me-2"></i>
                            <?= htmlspecialchars($login_error) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Login Form -->
                    <form method="POST" action="login.php" novalidate>
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
                                value="<?= htmlspecialchars($email ?? '') ?>"
                            >
                            <small class="form-text text-muted">
                                <?= t('form_email_help', 'We\'ll never share your email.') ?>
                            </small>
                        </div>

                        <!-- Password Field -->
                        <div class="mb-2">
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
                        </div>

                        <!-- Forgot Password Link -->
                        <div class="text-end mb-3">
                            <a href="#" class="text-decoration-none text-primary small fw-semibold">
                                <?= t('login_forgot_password', 'Forgot Password?') ?>
                            </a>
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-4">
                            <input 
                                class="form-check-input" 
                                type="checkbox" 
                                id="rememberMe" 
                                name="remember_me"
                            >
                            <label class="form-check-label" for="rememberMe">
                                <?= t('login_remember_me', 'Remember me') ?>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold mb-3">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            <?= t('login_button', 'Login') ?>
                        </button>

                        <!-- Divider -->
                        <div class="d-flex align-items-center my-3">
                            <hr class="flex-grow-1">
                            <span class="px-3 text-muted small"><?= t('login_or', 'or') ?></span>
                            <hr class="flex-grow-1">
                        </div>

                        <!-- Social Login Options -->
                        <div class="d-grid gap-2 mb-3">
                            <button type="button" class="btn btn-outline-secondary py-2">
                                <i class="bi bi-google me-2"></i>
                                <?= t('login_google', 'Login with Google') ?>
                            </button>
                            <button type="button" class="btn btn-outline-secondary py-2">
                                <i class="bi bi-facebook me-2"></i>
                                <?= t('login_facebook', 'Login with Facebook') ?>
                            </button>
                        </div>
                    </form>

                    <!-- Sign Up Link -->
                    <div class="text-center pt-3 border-top">
                        <p class="text-muted mb-0">
                            <?= t('login_no_account', 'Don\'t have an account?') ?>
                            <a href="register.php" class="text-decoration-none fw-semibold">
                                <?= t('login_sign_up', 'Sign up here') ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <p class="text-center text-muted small mt-4">
                <i class="bi bi-shield-check me-1"></i>
                <?= t('login_secure', 'Your login is secure and encrypted') ?>
            </p>
        </div>
    </div>
</div>

<?php include __DIR__ . '/@/footer.php'; ?>
