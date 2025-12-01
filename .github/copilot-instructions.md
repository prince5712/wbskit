# WBS Kit - AI Coding Agent Instructions

## Project Overview

WBS Kit is a modern PHP starter template built with Bootstrap 5, providing production-ready boilerplate code for responsive web applications. It emphasizes offline support, multi-language internationalization, dark mode theming, and progressive enhancement.

**Key Stack:** PHP 7.4+, Bootstrap 5, JavaScript (vanilla), HTML5

## Architecture & Data Flow

### Core Components

1. **Configuration Hub** (`@/config.php`):
   - Centralized definitions for site metadata, paths, and settings
   - Language management via sessions and GET parameters
   - Translation helper: `t($key, $default)` function for i18n
   - Navigation structure defined as array of menu items with translation keys

2. **Page Rendering**:
   - **Splash Screen** (`splash.php`): Initial loading experience with progress indicator; sets session flag `splash_shown`
   - **Header** (`@/header.php`): HTML document structure, meta tags, theme toggle SVG icons, security styles
   - **Footer** (`@/footer.php`): Social links, language switcher, legal links
   - **Content Pages**: `index.php`, `about.php`, `contact.php`, `services.php`, `login.php`, `register.php`
   - **Error Pages** (`error/`): 400, 401, 403, 404, 503 templates

3. **Session-Based Routing**:
   - First visit: redirects to `splash.php` (unless `skip_splash` param or session flag exists)
   - Post-splash: regular pages show normally with `splash_shown=true` in `$_SESSION`
   - Example in `index.php`: checks session before loading header

### Theme & Dark Mode System

**ThemeManager** (in `assets/js/app.js`):
- Stores preference in `localStorage` with key `'theme'`
- Values: `'light'`, `'dark'`, `'auto'`
- `auto` mode respects OS preference via `window.matchMedia('(prefers-color-scheme: dark)')`
- Updates `data-bs-theme` attribute on `<html>` element for Bootstrap CSS toggle
- Updates `<meta name="theme-color">` for browser address bar coloring

### Language System

1. **Selection Flow**:
   - Query param: `?lang=es` → stores in `$_SESSION['language']`
   - Session fallback → `DEFAULT_LANGUAGE` (defined as `'en'`)
   - Available: EN, ES, FR, DE, HI

2. **Translation Files** (`lang/*.php`):
   - Each returns an associative array: `'key' => 'translated text'`
   - Loaded via `loadLanguage()` function into `$translations` global
   - Called via helper: `t('key', 'fallback text')`

3. **Page Title/Description Pattern**:
   ```php
   $page_title = t('page_home_title', 'Home - WBS Kit');
   $page_description = t('page_home_description', 'Welcome...');
   include '/@/header.php'; // Uses these vars
   ```

### Connection Monitoring

**ConnectionMonitor** (in `assets/js/app.js`):
- Listens for `online` and `offline` events
- Periodic check via test fetch to `favicon.ico`
- Manages fallback to `offline.php` when no connection
- Updates UI status indicators

## Critical Developer Workflows

### Adding a New Page

1. Create file in root (e.g., `feature.php`)
2. Start with config and variables:
   ```php
   require_once __DIR__ . '/@/config.php';
   $page_title = t('page_feature_title', 'Feature - WBS Kit');
   $page_description = t('page_feature_description', 'Description...');
   include __DIR__ . '/@/header.php';
   ```
3. Add content in middle
4. Close with: `<?php include __DIR__ . '/@/footer.php'; ?>`
5. Add navigation item to `$nav_items` array in `config.php`
6. Add translation keys to all `lang/*.php` files

### Adding Language Support

1. Create new file in `lang/` (e.g., `pt.php`)
2. Return array matching structure of `lang/en.php`
3. Add entry to `$available_languages` in `config.php`
4. Language switcher in footer (`@/footer.php`) auto-detects available languages

### Styling & CSS Strategy

- **Bootstrap 5 CDN**: Primary framework (from cdnjs)
- **Bootstrap Icons CDN**: Icon library (from cdnjs)
- **Custom CSS** (`assets/css/custom.css`): Overrides and custom components
- **Responsive Breakpoints**: Mobile-first approach with media queries at 576px, 768px
- **Touch Optimization**: Hover effects disabled on touch devices via `@media (hover: none)` queries
- **Dark Mode CSS**: Bootstrap's native `data-bs-theme="dark"` handles most colors; custom variables use `var(--bs-body-bg)`, `var(--bs-border-color)`

### Security Features

- Copy-paste disabled via CSS (`user-select: none`) except on form inputs
- Zoom prevention on inputs (16px font-size minimum for iOS)
- Custom scrollbar styling respects theme colors
- Content Security headers should be set in server config

## Project-Specific Patterns

### Translation Key Naming Convention

- `nav_*`: Navigation items
- `page_*_title`/`page_*_description`: Page metadata
- `feature_*`: Feature descriptions
- `footer_*`: Footer content
- `theme_*`: Theme options
- All keys use snake_case

### Session Management

- Session starts in `config.php` if not already active
- Avoids multiple `session_start()` calls with check: `if (session_status() === PHP_SESSION_NONE)`
- Used for language preference and splash screen tracking

### Error Handling

- Error pages in `error/` directory (40x.php, 50x.php patterns)
- Configure in `.htaccess` or server config: `ErrorDocument 404 /error/404.php`
- Offline fallback: `offline.php` loads when connection lost

### HTML & SEO Meta Tags

**Always included in header**:
- `charset`, `viewport`, `X-UA-Compatible`
- `description`, `keywords`, `author`, `robots`
- Theme colors (light/dark media queries)
- Open Graph & Twitter Card tags
- Structured with proper semantic HTML

## Integration Points & External Dependencies

### CDN Resources

- **Bootstrap CSS**: `cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/`
- **Bootstrap Icons**: `cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/`
- **Bootstrap JS**: Included in footer of header.php

### JavaScript Libraries

- **Vanilla JS**: No jQuery or framework dependencies
- Modular pattern: Self-executing functions with namespace objects (e.g., `ThemeManager`, `ConnectionMonitor`)
- Event listeners on DOM elements with `data-bs-theme-value`, `data-bs-*` attributes

### File Paths & Constants

All paths defined in `config.php` as PHP constants:
- `BASE_PATH`: `@/` directory
- `ROOT_PATH`: Project root
- `ASSETS_PATH`, `CSS_PATH`, `JS_PATH`: Asset directories
- `LANG_PATH`: Language files location
- Use these constants in `include`/`require` and `<link>`, `<script>` tags

## Common Development Tasks

- **Modify Config**: Edit `@/config.php` for site info, nav items, language defaults
- **Update Translations**: Add keys to all files in `lang/`; search for usage in `*.php` files
- **Customize Styles**: Add to `assets/css/custom.css` (avoid modifying Bootstrap directly)
- **Debug Theme**: Check browser DevTools > Application > Storage > Local Storage for `theme` key
- **Test Offline**: Open DevTools > Network > Offline checkbox, or check `ConnectionMonitor` logic in `app.js`
- **Check Routing**: Verify page includes config, sets page title/description, includes header/footer

## Known Limitations & Considerations

- PHP sessions required; server must support cookies
- No database; queries or persistence require custom integration
- Bootstrap version pinned to 5.3.3; update via CDN URLs
- Copy-paste protection is CSS-based; determined users can bypass via DevTools
- Offline detection depends on network availability and periodic fetch success
