<?php 
require_once __DIR__ . '/@/config.php';
$page_title = t('offline_title', 'No Internet Connection - WBS Kit');
$page_description = t('offline_description', 'You are currently offline. Please check your internet connection.');
include __DIR__ . '/@/header.php';
?>

<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="text-center">
        <!-- Offline Icon -->
        <div class="mb-4">
            <i class="bi bi-wifi-off display-1 text-danger"></i>
        </div>
        
        <!-- Error Message -->
        <h1 class="h2 mb-3"><?= t('offline_heading', 'No Internet Connection') ?></h1>
        <p class="lead text-muted mb-4">
            <?= t('offline_message', 'It looks like you\'re offline. Please check your internet connection and try again.') ?>
        </p>
        
        <!-- Connection Status -->
        <div class="alert alert-warning" role="alert" id="connectionStatus">
            <i class="bi bi-exclamation-triangle me-2"></i>
            <span id="statusText"><?= t('offline_status', 'You are currently offline') ?></span>
        </div>
        
        <!-- Action Buttons -->
        <div class="d-grid gap-2 d-md-block">
            <button type="button" class="btn btn-primary" onclick="checkConnection()">
                <i class="bi bi-arrow-clockwise me-2"></i>
                <?= t('retry', 'Try Again') ?>
            </button>
            <button type="button" class="btn btn-outline-secondary" onclick="goToSplash()">
                <i class="bi bi-house me-2"></i>
                <?= t('go_home', 'Go to Home') ?>
            </button>
        </div>
        
        <!-- Tips -->
        <div class="mt-5">
            <h5><?= t('troubleshooting', 'Troubleshooting Tips:') ?></h5>
            <ul class="list-unstyled text-muted">
                <li><i class="bi bi-check me-2"></i><?= t('tip_wifi', 'Check your Wi-Fi connection') ?></li>
                <li><i class="bi bi-check me-2"></i><?= t('tip_mobile', 'Try switching to mobile data') ?></li>
                <li><i class="bi bi-check me-2"></i><?= t('tip_router', 'Restart your router or modem') ?></li>
                <li><i class="bi bi-check me-2"></i><?= t('tip_airplane', 'Turn airplane mode off and on') ?></li>
            </ul>
        </div>
    </div>
</div>

<script>
const statusAlert = document.getElementById('connectionStatus');
const statusText = document.getElementById('statusText');

function checkConnection() {
    if (navigator.onLine) {
        statusAlert.className = 'alert alert-success';
        statusText.innerHTML = '<i class="bi bi-wifi me-2"></i><?= t("online_status", "Connection restored! Redirecting...") ?>';
        
        setTimeout(() => {
            window.location.href = 'index.php';
        }, 1500);
    } else {
        statusAlert.className = 'alert alert-danger';
        statusText.innerHTML = '<i class="bi bi-wifi-off me-2"></i><?= t("still_offline", "Still offline. Please check your connection.") ?>';
        
        // Animate the retry button
        const retryBtn = document.querySelector('.btn-primary');
        retryBtn.classList.add('disabled');
        setTimeout(() => {
            retryBtn.classList.remove('disabled');
        }, 2000);
    }
}

function goToSplash() {
    window.location.href = 'splash.php';
}

// Monitor connection status
window.addEventListener('online', () => {
    statusAlert.className = 'alert alert-success';
    statusText.innerHTML = '<i class="bi bi-wifi me-2"></i><?= t("connection_restored", "Connection restored! Click \'Try Again\' to continue.") ?>';
});

window.addEventListener('offline', () => {
    statusAlert.className = 'alert alert-danger';
    statusText.innerHTML = '<i class="bi bi-wifi-off me-2"></i><?= t("connection_lost", "Connection lost again.") ?>';
});

// Auto-check connection every 10 seconds
setInterval(() => {
    if (navigator.onLine) {
        checkConnection();
    }
}, 10000);
</script>

<?php include '@/footer.php'; ?>

<?php
