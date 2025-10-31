<?php
/**
 * WBS Kit Configuration File
 * Central configuration for the entire application
 */

// Site Configuration
define('SITE_TITLE', 'WBS Kit - Web Boilerplate Starter');
define('SITE_DESCRIPTION', 'WBS Kit – A responsive PHP starter template using Bootstrap, supporting light/dark mode, multi-language, and offline handling.');
define('SITE_KEYWORDS', 'PHP, Bootstrap, Starter Kit, Responsive, Dark Mode, Offline, Template');
define('SITE_AUTHOR', 'prinsberwa');
define('SITE_URL', 'https://example.com');
define('THEME_COLOR_LIGHT', '#ffffff');
define('THEME_COLOR_DARK', '#000000');

// Paths Configuration
define('ASSETS_PATH', 'assets/');
define('CSS_PATH', ASSETS_PATH . 'css/');
define('JS_PATH', ASSETS_PATH . 'js/');
define('LANG_PATH', 'lang/');
define('INCLUDES_PATH', '@/');

// Default Settings
define('DEFAULT_LANGUAGE', 'en');
define('DEFAULT_THEME', 'auto');

// Available Languages
$available_languages = [
    'en' => 'English',
    'es' => 'Español',
    'hi' => 'Hindi',
    'fr' => 'Français',
    'de' => 'Deutsch'
];

// Site Brand
define('SITE_BRAND', 'WBS Kit');

// Navigation Configuration
$nav_items = [
    ['title' => 'nav_home', 'href' => 'index.php', 'active' => false],
    ['title' => 'nav_about', 'href' => '#', 'active' => false],
    ['title' => 'nav_services', 'href' => '#', 'active' => false],
    ['title' => 'nav_contact', 'href' => '#', 'active' => false]
];

// Language Management
session_start();
$current_language = $_SESSION['language'] ?? $_GET['lang'] ?? DEFAULT_LANGUAGE;
if (isset($_GET['lang']) && array_key_exists($_GET['lang'], $available_languages)) {
    $_SESSION['language'] = $_GET['lang'];
    $current_language = $_GET['lang'];
}

// Load Language File
function loadLanguage($lang = null) {
    global $current_language;
    $lang = $lang ?? $current_language;
    $lang_file = LANG_PATH . $lang . '.php';
    
    if (file_exists($lang_file)) {
        return include $lang_file;
    }
    
    // Fallback to English
    return include LANG_PATH . 'en.php';
}

$translations = loadLanguage();

// Translation Helper Function
function t($key, $default = '') {
    global $translations;
    return $translations[$key] ?? $default;
}
?>
