/**
 * Splash Screen Reset Utility
 * Allows users to manually reset and view the splash screen again
 */

function resetAndShowSplash() {
    // Make an AJAX call to reset the splash session
    fetch('reset-splash.php', {
        method: 'GET',
        credentials: 'same-origin'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirect to splash screen
            window.location.href = 'splash.php';
        } else {
            console.error('Failed to reset splash:', data.error);
            alert('Could not reset splash screen');
        }
    })
    .catch(error => {
        console.error('Error resetting splash:', error);
        // Fallback: directly redirect
        window.location.href = 'splash.php';
    });
}

// Make function available globally
window.resetAndShowSplash = resetAndShowSplash;
