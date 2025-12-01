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
$form_data = [
    'fullname' => '',
    'email' => '',
    'password' => '',
    'confirm_password' => '',
    'agree_terms' => false
];

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
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($current_language) ?>" data-bs-theme="<?= isset($_COOKIE['theme']) ? htmlspecialchars($_COOKIE['theme']) : 'auto' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= htmlspecialchars($page_title) ?> - <?= SITE_TITLE ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
    <meta name="keywords" content="<?= SITE_KEYWORDS ?>">
    <meta name="author" content="<?= SITE_AUTHOR ?>">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="<?= THEME_COLOR_LIGHT ?>" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="<?= THEME_COLOR_DARK ?>" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            align-items: stretch;
        }
        .auth-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }
        .auth-branding {
            display: none;
            width: 50%;
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: white;
            padding: 3rem;
            flex-direction: column;
            justify-content: center;
        }
        .auth-branding.show {
            display: flex;
        }
        .auth-form-wrapper {
            width: 100%;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
        }
        @media (min-width: 768px) {
            .auth-form-wrapper {
                width: 50%;
                padding: 3rem;
            }
        }
        .brand-logo {
            font-size: 3rem;
            margin-bottom: 2rem;
        }
        .brand-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .brand-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }
        .auth-form-container {
            max-width: 450px;
            margin: 0 auto;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="auth-container">
    <!-- Branding Section -->
    <div class="auth-branding show">
        <div>
            <div class="brand-logo">
                <i class="bi bi-rocket-takeoff"></i>
            </div>
            <h1 class="brand-title"><?= SITE_BRAND ?></h1>
                    <p class="brand-subtitle">
                        <?= t('auth_brand_description', 'Powerful PHP starter template with Bootstrap, dark mode, multi-language support, and offline capabilities.') ?>
                    </p>
                </div>
            </div>

    <!-- Form Section -->
    <div class="auth-form-wrapper">
        <div class="auth-form-container">
            <!-- Header -->
            <div class="text-center mb-4">
                <i class="bi bi-person-plus display-6 text-primary mb-3"></i>
                <h2 class="h3 fw-bold mb-2"><?= t('register_title', 'Create Account') ?></h2>
                <p class="text-muted">
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
                    <input type="text"
                        class="form-control form-control-lg" 
                        id="fullname" 
                        name="fullname" 
                        placeholder="<?= t('form_fullname_placeholder', 'John Doe') ?>"
                        required
                        value="<?= htmlspecialchars($form_data['fullname']) ?>"
                    >
                </div>

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">
                        <?= t('form_email', 'Email Address') ?>
                    </label>
                    <input type="email"
                        class="form-control form-control-lg" 
                        id="email" 
                        name="email" 
                        placeholder="<?= t('form_email_placeholder', 'you@example.com') ?>"
                        required
                        value="<?= htmlspecialchars($form_data['email']) ?>"
                    >
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">
                        <?= t('form_password', 'Password') ?>
                    </label>
                    <input type="password"
                        class="form-control form-control-lg" 
                        id="password" 
                        name="password" 
                        placeholder="<?= t('form_password_placeholder', 'Enter your password') ?>"
                        required
                    >
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3">
                    <label for="confirm_password" class="form-label fw-semibold">
                        <?= t('register_confirm_password', 'Confirm Password') ?>
                    </label>
                    <input type="password"
                        class="form-control form-control-lg" 
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
                        <?= $form_data['agree_terms'] ? 'checked' : '' ?>
                    >
                    <label class="form-check-label" for="agree_terms">
                        <?= t('register_agree', 'I agree to the') ?>
                        <a href="#" class="text-decoration-none text-primary fw-semibold">
                            <?= t('register_terms', 'Terms and Conditions') ?>
                        </a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold mb-3">
                    <?= t('register_button', 'Create Account') ?>
                    </button>

                <!-- Divider -->
                <div class="d-flex align-items-center my-3">
                    <hr class="flex-grow-1">
                    <span class="px-3 text-muted small"><?= t('register_or', 'OR') ?></span>
                    <hr class="flex-grow-1">
                    </div>

                <!-- Social Register Options -->
                <div class="d-grid gap-2 mb-3">
                    <button type="button" class="btn btn-outline-secondary py-2">
                        <i class="bi bi-google me-2"></i>
                        <?= t('register_google', 'Sign up with Google') ?>
                    </button>
                </div>
            </form>

            <!-- Login Link -->
            <div class="text-center pt-3 border-top">
                <p class="text-muted small mb-0">
                    <?= t('register_have_account', 'Already have an account?') ?>
                    <a href="login.php" class="text-decoration-none fw-semibold">
                        <?= t('register_login', 'Login') ?>
                        </a>
                        </p>
                        </div>
                        </div>
                        </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<!-- App JS -->
<script src="assets/js/app.js"></script>
</body>
</html>

