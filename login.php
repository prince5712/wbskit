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
$email = '';

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
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($current_language) ?>" data-bs-theme="auto" class="h-100">
<head>
    <!-- Essential Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
    <meta name="keywords" content="<?= SITE_KEYWORDS ?>">
    <meta name="author" content="<?= SITE_AUTHOR ?>">
    <meta name="robots" content="noindex, nofollow">
    
    <!-- Theme & PWA Meta Tags -->
    <meta name="theme-color" content="<?= THEME_COLOR_LIGHT ?>" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="<?= THEME_COLOR_DARK ?>" media="(prefers-color-scheme: dark)">
    
    <title><?= htmlspecialchars($page_title) ?></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= CSS_PATH ?>custom.css" rel="stylesheet">
    
    <style>
        html, body {
            height: 100%;
            width: 100%;
        }
        body {
            display: flex;
            align-items: stretch;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .auth-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }
        .auth-branding {
            display: none;
            width: 50%;
            background: linear-gradient(135deg, #ec4899 0%, #8b5cf6 100%);
            color: white;
            padding: 2rem;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .auth-form-wrapper {
            width: 100%;
            max-width: 100%;
            padding: 1.5rem 1rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
            box-sizing: border-box;
        }
        @media (min-width: 576px) {
            .auth-form-wrapper {
                padding: 2rem 1.5rem;
            }
        }
        @media (min-width: 768px) {
            .auth-form-wrapper {
                width: 50%;
                padding: 3rem;
            }
            .auth-branding {
                display: flex;
            }
        }
        .brand-logo {
            font-size: 3.5rem;
            margin-bottom: 2rem;
            line-height: 1;
        }
        .brand-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        @media (min-width: 576px) {
            .brand-title {
                font-size: 1.75rem;
            }
        }
        @media (min-width: 768px) {
            .brand-title {
                font-size: 2rem;
            }
        }
        .brand-subtitle {
            font-size: 0.95rem;
            opacity: 0.9;
            line-height: 1.6;
            margin: 0;
        }
        .auth-form-container {
            max-width: 400px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }
        /* Text sizing improvements */
        .auth-form-container h2 {
            font-size: 1.5rem;
        }
        @media (min-width: 576px) {
            .auth-form-container h2 {
                font-size: 1.75rem;
            }
        }
        .form-label {
            font-size: 0.95rem;
        }
        .form-control-lg {
            font-size: 1rem;
            padding: 0.75rem 1rem;
        }
        small.text-muted {
            font-size: 0.85rem;
        }
        .btn {
            font-size: 1rem;
        }
    </style>
</head>
<body>
<div class="auth-container">
    <!-- Branding Section (Hidden on Mobile) -->
    <div class="auth-branding">
        <div>
            <div class="brand-logo">
                <i class="bi bi-box-arrow-in-right"></i>
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
                <div class="mb-3" style="font-size: 3rem; color: var(--bs-primary);">
                    <i class="bi bi-shield-lock"></i>
                </div>
                <h2 class="h4 fw-bold mb-2"><?= t('login_title', 'Login') ?></h2>
                <p class="text-muted mb-0">
                    <?= t('login_subtitle', 'Sign in to your account to continue') ?>
                </p>
            </div>

            <!-- Success Message -->
            <?php if ($login_success): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    <strong><?= t('success', 'Success!') ?></strong> <?= t('login_success', 'Login successful! Redirecting...') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Error Message -->
            <?php if ($login_error): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    <strong><?= t('error', 'Error!') ?></strong> <?= htmlspecialchars($login_error) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form method="POST" action="login.php" novalidate>
                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-medium">
                        <?= t('form_email', 'Email Address') ?>
                    </label>
                    <input type="email"
                        class="form-control form-control-lg" 
                        id="email" 
                        name="email" 
                        placeholder="<?= t('form_email_placeholder', 'you@example.com') ?>"
                        required
                        value="<?= htmlspecialchars($email) ?>"
                    >
                    <small class="text-muted d-block mt-1">
                        <?= t('form_email_help', 'We\'ll never share your email with anyone else.') ?>
                    </small>
                </div>

                <!-- Password Field -->
                <div class="mb-2">
                    <label for="password" class="form-label fw-medium">
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

                <!-- Forgot Password Link -->
                <div class="text-end mb-3">
                    <a href="#" class="text-decoration-none text-primary small fw-medium">
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
                <div class="d-flex align-items-center my-4">
                    <hr class="flex-grow-1">
                    <span class="px-3 text-muted small"><?= t('login_or', 'or') ?></span>
                    <hr class="flex-grow-1">
                </div>

                <!-- Social Login Options -->
                <div class="d-grid gap-2 mb-3">
                    <button type="button" class="btn btn-outline-secondary py-2">
                        <i class="bi bi-google me-2"></i>
                        <?= t('login_google', 'Sign in with Google') ?>
                    </button>
                    </div>
                    </form>

            <!-- Sign Up Link -->
            <div class="text-center pt-3 border-top">
                <p class="text-muted small mb-0">
                    <?= t('login_no_account', 'Don\'t have an account?') ?>
                    <a href="register.php" class="text-decoration-none fw-medium text-primary">
                        <?= t('login_sign_up', 'Sign up here') ?>
                    </a>
                    </p>
                    </div>

            <!-- Language Switcher (Mobile-friendly) -->
            <div class="text-center mt-4 pt-3 border-top">
                <div class="btn-group" role="group" aria-label="Language">
          <?php foreach ($available_languages as $lang_code => $lang_name): ?>
            <a href="?lang=<?= htmlspecialchars($lang_code) ?>"
                class="btn btn-sm <?= $current_language === $lang_code ? 'btn-primary' : 'btn-outline-secondary' ?>"
                title="<?= htmlspecialchars($lang_name) ?>">
                <?= htmlspecialchars(substr($lang_code, 0, 2)) ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<!-- Theme Indicator -->
<div class="text-center mt-3">
    <small class="text-muted">
        <i class="bi bi-palette me-1"></i>
        <?= t('theme', 'Theme') ?>: <span id="theme-indicator"><?= t('theme_auto', 'Auto') ?></span>
    </small>
</div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<!-- App JS -->
<script src="<?= JS_PATH ?>app.js"></script>
<script>
    // Update theme indicator
    document.addEventListener('DOMContentLoaded', function () {
        const themeIndicator = document.getElementById('theme-indicator');
        const currentTheme = document.documentElement.getAttribute('data-bs-theme') || 'auto';

        let themeName = '<?= t('theme_auto', 'Auto') ?>';
        if (currentTheme === 'light') {
            themeName = '<?= t('theme_light', 'Light') ?>';
        } else if (currentTheme === 'dark') {
            themeName = '<?= t('theme_dark', 'Dark') ?>';
        }

        if (themeIndicator) {
            themeIndicator.textContent = themeName;
        }
    });
</script>
</body>
</html>

