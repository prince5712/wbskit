<?php
/**
 * Reset Splash Screen Session
 * Clears the splash_shown flag to show splash again on next page load
 */

header('Content-Type: application/json');

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {
    // Clear splash shown flag
    unset($_SESSION['splash_shown']);
    
    // Return success response
    echo json_encode([
        'success' => true,
        'message' => 'Splash screen reset successfully'
    ]);
} catch (Exception $e) {
    // Return error response
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>
