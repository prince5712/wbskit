<?php 
$page_title = t('splash_title', 'Loading - WBS Kit');
$page_description = t('splash_description', 'Loading WBS Kit application...');
include '@/header.php'; 
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
        <div class="progress mx-auto" style="width: 300px; height: 4px;">
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
let progress = 0;
const progressBar = document.getElementById('loadingProgress');
const continueBtn = document.getElementById('continueBtn');

// Simulate loading progress
const loadingInterval = setInterval(() => {
    progress += Math.random() * 15;
    if (progress > 100) progress = 100;
    
    progressBar.style.width = progress + '%';
    
    if (progress >= 100) {
        clearInterval(loadingInterval);
        setTimeout(() => {
            checkConnectionAndContinue();
        }, 1000);
    }
}, 200);

function checkConnectionAndContinue() {
    if (navigator.onLine) {
        // Auto redirect after loading
        setTimeout(() => {
            window.location.href = 'index.php';
        }, 500);
    } else {
        // Show offline page if no connection
        window.location.href = 'offline.php';
    }
    
    // Show manual continue button after 3 seconds
    setTimeout(() => {
        continueBtn.classList.remove('d-none');
    }, 3000);
}

function continueToSite() {
    if (navigator.onLine) {
        window.location.href = 'index.php';
    } else {
        window.location.href = 'offline.php';
    }
}

// Check connection periodically
setInterval(() => {
    if (!navigator.onLine) {
        window.location.href = 'offline.php';
    }
}, 5000);
</script>

<?php include '@/footer.php'; ?>

<?php
