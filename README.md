# WBS Kit

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-purple.svg)
![License](https://img.shields.io/badge/license-MIT-green.svg)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.3-purple.svg)

A modern, responsive, and feature-rich web application boilerplate built with PHP and Bootstrap 5. WBS Kit provides a solid foundation for building progressive web applications with built-in support for offline functionality, multi-language capabilities, and modern UI/UX features.

## ✨ Key Features

- 🚀 **Optimized Loading** - Splash screen with auto-refresh and connection monitoring
- 🌐 **Offline Support** - Graceful fallback with offline page for no-internet scenarios
- 🌍 **Internationalization** - Built-in support for 5 languages (EN, ES, FR, DE, HI) with easy expansion
- 🎨 **Smart Theme System** - Automatic light/dark mode detection with manual toggle and localStorage persistence
- 📱 **Responsive Design** - Fully responsive layout using Bootstrap 5 grid system optimized for all devices
- 🔒 **Security Enhanced** - Copy-paste protection, zoom prevention on inputs, and secure cookie handling
- ♿ **Accessibility** - WCAG compliant with semantic HTML and ARIA labels
- 🎯 **SEO Optimized** - Comprehensive meta tags, Open Graph, and Twitter Card support
- ⚡ **Performance Ready** - CDN-based assets, lazy loading ready, and connection monitoring

## 📁 Project Structure

```
wbskit/
├── @/                          # Core application components
│   ├── config.php              # Central configuration hub (paths, translations, settings)
│   ├── header.php              # HTML head + navigation (includes Bootstrap, meta tags)
│   └── footer.php              # Footer with language switcher & social links
├── assets/
│   ├── css/
│   │   └── custom.css          # Custom styles, responsive rules, theme overrides
│   ├── js/
│   │   ├── app.js              # ThemeManager, ConnectionMonitor, event handlers
│   │   └── splash.js           # Splash screen auto-redirect logic
├── lang/
│   ├── en.php                  # English translations (key => value pairs)
│   ├── es.php                  # Spanish
│   ├── fr.php                  # French
│   ├── de.php                  # German
│   └── hi.php                  # Hindi
├── error/
│   ├── 400.php, 403.php        # Error page templates
│   ├── 404.php, 503.php
├── index.php                   # Homepage (checks splash, includes header/footer)
├── about.php, contact.php      # Content pages (same structure as index)
├── services.php, login.php     # Auth-ready pages
├── register.php                # Registration template
├── splash.php                  # Splash/loading screen (first visit redirect)
├── offline.php                 # Offline fallback page
├── reset-splash.php            # AJAX endpoint to reset splash session
├── README.md                   # This file
├── LICENSE                     # MIT License
└── .github/
    └── copilot-instructions.md # AI agent development guide
```

## 🎯 Application Flow

```
User visits → Session check → First time? → Yes → Splash screen (splash.php)
                                             ↓
                                        Show progress, auto-redirect
                                             ↓
                                        Index page (session marked as shown)
                                             
                                        No → Regular page load
```

## 🚀 Quick Start

### Prerequisites

- **PHP 7.4+** (8.0+ recommended)
- **Web server** with Apache/Nginx (with mod_rewrite for .htaccess support)
- **Browser** with ES6 and localStorage support

### Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/prince5712/wbskit.git
   cd wbskit
   ```

2. **Upload to your server** or run locally with:
   ```bash
   # Using PHP built-in server (development only)
   php -S localhost:8000
   ```

3. **Set proper file permissions** (if on Linux/Unix):
   ```bash
   chmod 755 -R /path/to/wbskit
   chmod 644 -R /path/to/wbskit/*.php
   ```

4. **Configure the application**:
   - Edit `@/config.php` for site settings
   - Update site title, description, author
   - Configure navigation items in `$nav_items` array
   - Set default language and theme

5. **Access the application**:
   ```
   http://localhost:8000/
   ```
   First visit will show the splash screen, subsequent visits skip it.

## ⚙️ Configuration & Customization

### Basic Configuration (`@/config.php`)

The configuration file is the central hub for all settings:

```php
// Site metadata
define('SITE_TITLE', 'WBS Kit - Web Boilerplate Starter');
define('SITE_DESCRIPTION', '...');
define('SITE_AUTHOR', 'prinsberwa');

// Navigation menu items with translation keys
$nav_items = [
    ['title' => 'nav_home', 'href' => 'index.php', 'active' => false],
    ['title' => 'nav_about', 'href' => 'about.php', 'active' => false],
];

// Available languages (add or remove as needed)
$available_languages = [
    'en' => 'English',
    'es' => 'Español',
    'hi' => 'Hindi',
    'fr' => 'Français',
    'de' => 'Deutsch'
];

define('DEFAULT_LANGUAGE', 'en');
define('DEFAULT_THEME', 'auto');  // 'auto', 'light', or 'dark'
```

### Adding a New Page

1. **Create a new PHP file** (e.g., `features.php`):
   ```php
   <?php
   // Check for splash on first visit
   if (!isset($_GET['skip_splash']) && !isset($_SESSION['splash_shown'])) {
       if (session_status() === PHP_SESSION_NONE) session_start();
       header('Location: splash.php', true, 302);
       exit();
   }
   
   if (session_status() === PHP_SESSION_NONE) session_start();
   $_SESSION['splash_shown'] = true;
   
   // Load config and set page metadata
   require_once __DIR__ . '/@/config.php';
   $page_title = t('page_features_title', 'Features - WBS Kit');
   $page_description = t('page_features_description', 'Explore our features...');
   
   include __DIR__ . '/@/header.php';
   ?>
   
   <!-- Your content here -->
   
   <?php include __DIR__ . '/@/footer.php'; ?>
   ```

2. **Add translations** to all `lang/*.php` files:
   ```php
   'page_features_title' => 'Features - WBS Kit',
   'page_features_description' => 'Explore our features...',
   ```

3. **Update navigation** in `@/config.php`:
   ```php
   $nav_items = [
       // ... existing items
       ['title' => 'nav_features', 'href' => 'features.php', 'active' => false],
   ];
   ```

### Language Configuration

#### Adding a New Language

1. **Create translation file** `lang/pt.php`:
   ```php
   <?php
   return [
       'nav_home' => 'Início',
       'nav_about' => 'Sobre',
       'page_home_title' => 'Início - WBS Kit',
       // ... all keys from lang/en.php translated
   ];
   ?>
   ```

2. **Update config** in `@/config.php`:
   ```php
   $available_languages = [
       'en' => 'English',
       'pt' => 'Português',  // Add this
       // ...
   ];
   ```

3. **Language switching**: Users can change language via dropdown in footer or with `?lang=pt` query parameter.

### Styling & CSS Customization

#### Key Features

- **Mobile-first responsive** design with Bootstrap 5 breakpoints (576px, 768px, 992px, 1200px)
- **Dark mode support** via Bootstrap's `data-bs-theme` attribute
- **Custom CSS** in `assets/css/custom.css` (never modify Bootstrap directly)

#### Common Customizations

```css
/* Override Bootstrap colors */
:root {
    --bs-primary: #your-color;
}

/* Custom components */
.card-hover {
    transition: transform 0.3s, box-shadow 0.3s;
}

.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,0.2);
}

/* Mobile optimization */
@media (max-width: 576px) {
    .display-4 { font-size: 2rem; }
    .py-5 { padding: 1.5rem !important; }
}

/* Touch device optimization (disable hover on mobile) */
@media (hover: none) {
    .card:hover { transform: none; }
}
```

#### Theme Variables

Bootstrap provides these CSS variables in dark mode:
- `--bs-body-bg` - Background color
- `--bs-body-color` - Text color
- `--bs-border-color` - Border color
- `--bs-secondary-bg` - Secondary background

## 🔒 Security Features

### Built-in Security Measures

1. **Copy-Paste Protection** (CSS-based, configurable)
   - Disabled by default on form inputs
   - Can be removed by editing header security styles

2. **Zoom Prevention on Inputs**
   - Inputs have 16px minimum font size (prevents iOS zoom)
   - Improves mobile UX while preventing unintended zoom

3. **Secure Cookie Handling**
   - Session cookies use PHP's default secure settings
   - Configure in `.htaccess` or `php.ini` as needed

4. **HTTPS Ready**
   - No mixed content warnings
   - All CDN resources use https://

### Recommended Server Configuration

#### Apache (.htaccess)
```apache
# Security headers
<IfModule mod_headers.c>
    Header set X-Content-Type-Options "nosniff"
    Header set X-Frame-Options "SAMEORIGIN"
    Header set X-XSS-Protection "1; mode=block"
    Header set Referrer-Policy "strict-origin-when-cross-origin"
</IfModule>

# Disable directory listing
<IfModule mod_autoindex.c>
    Options -Indexes
</IfModule>

# Compress assets
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/css text/javascript
</IfModule>
```

#### PHP (php.ini)
```ini
session.cookie_httponly = On
session.cookie_secure = On
session.use_strict_mode = On
```

## 🌐 Browser Support

| Browser | Minimum Version | Status |
|---------|-----------------|--------|
| Chrome | 88+ | ✅ Full Support |
| Edge | 88+ | ✅ Full Support |
| Firefox | 85+ | ✅ Full Support |
| Safari | 14+ | ✅ Full Support |
| Mobile Safari (iOS) | 14+ | ✅ Full Support |
| Chrome Mobile | 88+ | ✅ Full Support |

## ⚡ Performance

### Optimization Features

- **CDN-based assets** - Bootstrap and Icons served from cdnjs
- **localStorage persistence** - Theme preference cached locally
- **Connection monitoring** - Automatic offline detection
- **CSS media queries** - Responsive design without JS overhead
- **Minimal JavaScript** - Vanilla JS, no framework dependencies

### Metrics

- **First Load**: ~1-2 seconds (with splash screen)
- **Repeat Visit**: <500ms (splash skipped, cached assets)
- **Offline**: Graceful fallback with offline.php
- **Theme Toggle**: Instant (no page reload)

## 🎯 Features in Detail

### Splash Screen

The first-time user experience:
- Bootstrap spinner animation
- Auto-redirects after ~3 seconds
- Can be skipped with `?skip_splash` parameter
- Reset via `reset-splash.php` AJAX endpoint
- Session-based tracking to show only once

```php
// Skip splash permanently
http://localhost:8000/?skip_splash

// Check session flag
if (isset($_SESSION['splash_shown'])) { ... }
```

### Theme System

**Automatic Detection + Manual Control**:
- localStorage key: `'theme'` stores user preference
- Values: `'light'`, `'dark'`, or `'auto'`
- Auto mode respects OS preference via `prefers-color-scheme` media query
- Bootstrap handles all color switching via `data-bs-theme` attribute
- Theme toggle buttons in header use SVG icons

```javascript
// Check current theme
localStorage.getItem('theme')  // Returns 'light', 'dark', or 'auto'

// OS preference detection
window.matchMedia('(prefers-color-scheme: dark)').matches
```

### Offline Support

**Connection Monitoring**:
- Listens for `online` and `offline` browser events
- Periodic fetch to `favicon.ico` for validation
- Automatic redirect to `offline.php` when disconnected
- Message indicators in UI (when connection lost)

### Language System

**5 Languages Built-in** (easily expandable):
- English, Spanish, French, German, Hindi
- URL parameter: `?lang=es` switches language
- Session persistence: Choice remembered across pages
- Fallback to English if translation missing
- Helper function: `t('key', 'default')`

```php
// Get translated text
<?= t('nav_home', 'Home') ?>

// Set language via URL
http://localhost:8000/?lang=es

// Current language stored in
$_SESSION['language']  // e.g., 'es'
```

## 📚 Development Guide

### Adding Features

#### Example: Add a Newsletter Signup

1. **Update config** (`@/config.php`):
   ```php
   define('NEWSLETTER_ENABLED', true);
   ```

2. **Add translations** to all `lang/*.php`:
   ```php
   'newsletter_title' => 'Subscribe to our newsletter',
   'newsletter_email' => 'Enter your email',
   'newsletter_subscribe' => 'Subscribe',
   ```

3. **Create component** or add to page:
   ```html
   <section class="newsletter-signup py-5 bg-light">
       <div class="container">
           <h3><?= t('newsletter_title') ?></h3>
           <form method="POST">
               <input type="email" placeholder="<?= t('newsletter_email') ?>" required>
               <button><?= t('newsletter_subscribe') ?></button>
           </form>
       </div>
   </section>
   ```

4. **Test in all languages** via footer language switcher

### Debugging Tips

- **Theme issues**: Check `localStorage` in DevTools > Application > Local Storage
- **Language not switching**: Verify `$_SESSION['language']` in config
- **Splash showing every time**: Check session cookie settings, clear browser cache
- **Offline detection not working**: Test network connectivity, check favicon.ico accessibility
- **Console errors**: Open DevTools, check for 404s on CDN resources

### Path Constants

All file paths defined as PHP constants in `@/config.php`:
```php
BASE_PATH      // '@/' directory
ROOT_PATH      // Project root
ASSETS_PATH    // 'assets/' directory
CSS_PATH       // 'assets/css/' for stylesheets
JS_PATH        // 'assets/js/' for scripts
LANG_PATH      // 'lang/' for translations
```

Use these in includes:
```php
include ROOT_PATH . 'other-file.php';
<link href="<?= CSS_PATH ?>custom.css" rel="stylesheet">
```

## 🤝 Contributing

Contributions are welcome! Follow these steps:

1. **Fork the repository** on GitHub
2. **Create a feature branch**: `git checkout -b feature/your-feature`
3. **Make your changes** and test thoroughly
4. **Commit with clear messages**: `git commit -m "Add feature description"`
5. **Push to your fork**: `git push origin feature/your-feature`
6. **Open a Pull Request** with description of changes

### Guidelines

- Follow existing code style (PHP PSR-2, vanilla JS conventions)
- Update translations in all `lang/*.php` files if adding UI text
- Test in multiple browsers and screen sizes
- Update README if adding new features or configuration options

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

```
MIT License

Copyright (c) 2024 prinsberwa

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.
```

## 👨‍💻 Author & Support

**Created by**: [@prinsberwa](https://github.com/prinsberwa)

### Getting Help

- **Issues**: [GitHub Issues](https://github.com/prince5712/wbskit/issues) - Report bugs or request features
- **Discussions**: [GitHub Discussions](https://github.com/prince5712/wbskit/discussions) - Ask questions
- **Documentation**: See `.github/copilot-instructions.md` for AI agent development guide

### Roadmap

- [ ] PWA manifest & service worker templates
- [ ] Database integration examples
- [ ] API authentication patterns
- [ ] Form validation utilities
- [ ] Email template system
- [ ] Admin panel boilerplate

## 🎁 Credits

- **Bootstrap 5** - CSS framework
- **Bootstrap Icons** - Icon library
- **Font family** - System fonts (no external dependencies)

## ⭐ Show Your Support

If this project helps you, please consider:
- Starring the repository ⭐
- Sharing with others
- Contributing improvements
- Reporting issues and bugs

---

**Made with ❤️ using Bootstrap and PHP**