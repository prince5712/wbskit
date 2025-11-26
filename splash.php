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
include __DIR__ . '/@/header.php';
?>

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

<?php include __DIR__ . '/@/footer.php'; ?>
