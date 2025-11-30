<?php
// Start session for splash screen tracking
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/@/config.php';

// Check if splash should be skipped
$skip_splash = isset($_GET['skip_splash']) || (isset($_SESSION['splash_shown']) && $_SESSION['splash_shown'] === true);

if (!$skip_splash) {
    // Mark splash as shown in session
    $_SESSION['splash_shown'] = true;
}

// If splash should be skipped, redirect to home
if ($skip_splash && isset($_GET['skip_splash'])) {
    // Redirect to index without splash
    header('Location: index.php', true, 302);
    exit();
}

$page_title = t('splash_title', 'Loading - WBS Kit');
$page_description = t('splash_description', 'Loading WBS Kit application...');
?>
<!DOCTYPE html>
<html lang="<?= $current_language ?>" class="h-100" data-bs-theme="auto">

<head>
    <!-- Essential Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO Meta Tags -->
    <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
    <meta name="keywords" content="<?= SITE_KEYWORDS ?>">
    <meta name="author" content="<?= SITE_AUTHOR ?>">
    <meta name="robots" content="index, follow">

    <!-- Theme & PWA Meta Tags -->
    <meta name="theme-color" content="<?= THEME_COLOR_LIGHT ?>" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="<?= THEME_COLOR_DARK ?>" media="(prefers-color-scheme: dark)">

    <title><?= htmlspecialchars($page_title) ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= CSS_PATH ?>custom.css" rel="stylesheet">

    <!-- Splash Script -->
    <script src="<?= JS_PATH ?>splash.js" defer></script>
    <!-- Prevent Copy-Paste and Zoom -->
    <style>
        /* Disable text selection */
        * {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-touch-callout: none;
            -webkit-tap-highlight-color: transparent;
        }

        /* Allow selection for inputs and editable content */
        input,
        textarea,
        [contenteditable="true"] {
            -webkit-user-select: text;
            -moz-user-select: text;
            -ms-user-select: text;
            user-select: text;
        }

        /* Prevent zoom on iOS */
        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            font-size: 16px !important;
        }

        /* Custom scrollbar for dark mode */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bs-body-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--bs-border-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--bs-secondary);
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <!-- SVG Icons for Theme Toggle -->
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 0 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
        <symbol id="globe" viewBox="0 0 16 16">
            <path
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm.312-3.5h2.49c-.062-.89-.291-1.733-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z" />
        </symbol>
    </svg>

    <main class="flex-shrink-0" style="margin-top: 0;">

<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="text-center">
        <!-- Brand Logo -->
        <div class="mb-4">
            <i class="bi bi-bootstrap-fill display-1 text-primary"></i>
        </div>
        
        <!-- Loading Animation -->
        <div class="mb-4">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden"><?= t('loading', 'Loading...') ?></span>
            </div>
        </div>
        
        <!-- Brand Name -->
        <h2 class="h4 mb-3"><?= SITE_BRAND ?></h2>
        <p class="text-muted"><?= t('splash_message', 'Please wait while we load the application...') ?></p>
        
        <!-- Progress Bar -->
        <div class="progress mx-auto" style="width: 90%; max-width: 300px; height: 4px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated" 
                 role="progressbar" 
                 style="width: 0%" 
                 id="loadingProgress"></div>
        </div>
        
        <!-- Manual Continue Button (appears after delay) -->
        <button type="button" 
                class="btn btn-primary mt-4 d-none" 
                id="continueBtn" 
                onclick="continueToSite()">
            <?= t('continue', 'Continue') ?>
            <i class="bi bi-arrow-right ms-1"></i>
        </button>
    </div>
</div>

<script>
(function() {
    'use strict';
    
    let progress = 0;
    const progressBar = document.getElementById('loadingProgress');
    const continueBtn = document.getElementById('continueBtn');
    let isRedirecting = false;
    
    // Simulate loading progress
    const loadingInterval = setInterval(() => {
        if (isRedirecting) {
            clearInterval(loadingInterval);
            return;
        }
        
        progress += Math.random() * 15;
        if (progress > 95) progress = 95; // Stop at 95% until actual completion
        
        progressBar.style.width = progress + '%';
    }, 300);
    
    // Set timeout for splash to complete and redirect
    const splashTimeout = setTimeout(() => {
        clearInterval(loadingInterval);
        
        if (!isRedirecting) {
            progressBar.style.width = '100%';
            checkConnectionAndContinue();
        }
    }, 2000); // 2 second splash duration
    
    function checkConnectionAndContinue() {
        if (isRedirecting) return;
        isRedirecting = true;
        
        setTimeout(() => {
            if (navigator.onLine) {
                // Redirect to home with splash flag
                window.location.href = 'index.php?skip_splash=1';
            } else {
                // Show offline page
                window.location.href = 'offline.php';
            }
        }, 500);
        
        // Show manual continue button as fallback
        setTimeout(() => {
            if (!isRedirecting) {
                continueBtn.classList.remove('d-none');
            }
        }, 3000);
    }
    
    function continueToSite() {
        if (isRedirecting) return;
        isRedirecting = true;
        
        if (navigator.onLine) {
            window.location.href = 'index.php?skip_splash=1';
        } else {
            window.location.href = 'offline.php';
        }
    }
    
    // Expose function to global scope for button
    window.continueToSite = continueToSite;
    
    // Check if user is back online
    window.addEventListener('online', () => {
        if (!isRedirecting) {
            console.log('Connection restored during splash');
        }
    });
    
    // Fallback: redirect after max wait time
    setTimeout(() => {
        if (!isRedirecting) {
            isRedirecting = true;
            checkConnectionAndContinue();
        }
    }, 5000);
})();
</script>

    </main>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="<?= JS_PATH ?>app.js"></script>
    </body>
    
    </html>
