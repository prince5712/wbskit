# WBS Kit - AI Assistant Instructions

This document provides essential context for AI assistants working with WBS Kit codebase.

## Project Overview

WBS Kit is a PHP-based web application boilerplate focused on progressive enhancement with offline support, internationalization, and modern UI features.

### Key Architecture Points

- Entry point is `index.php` with initialization in `@/config.php`
- `@/` directory contains core components (header.php, footer.php)
- Internationalization handled through `lang/*.php` files
- Assets structured in `assets/{css,js}` with main application logic in `app.js`

## Development Workflows

### Adding New Features

1. Core PHP components go in `@/` directory
2. JavaScript enhancements belong in `assets/js/app.js` (uses module pattern)
3. Custom styles should be added to `assets/css/custom.css`
4. Always update language files in `lang/` for new UI strings

### Internationalization Pattern

Language files follow this structure (example from `lang/en.php`):
```php
$lang = [
    'key' => 'Translation',
    // ...
];
```

### Theme Management

Theme system uses HTML data attributes and localStorage:
- Default theme controlled by `DEFAULT_THEME` in `config.php`
- Runtime switching handled by `ThemeManager` in `app.js`
- CSS variables in `custom.css` for theme-aware styling

## Common Integration Points

1. **Header Injection**: Add meta tags/resources in `@/header.php`
2. **Footer Scripts**: Place scripts before `@/footer.php` closing
3. **Offline Support**: Update service worker paths in `offline.php`

## Project-Specific Conventions

1. Use `SITE_*` constants from `config.php` for global settings
2. Follow the `@/` prefix convention for core components
3. Use data attributes for JavaScript hooks (e.g., `data-theme-toggle`)
4. Maintain progressive enhancement - core functionality in PHP, enhanced with JS