# WBS Kit

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-purple.svg)
![License](https://img.shields.io/badge/license-MIT-green.svg)

A modern, responsive, and feature-rich web application boilerplate built with PHP and Bootstrap 5. WBS Kit provides a solid foundation for building progressive web applications with built-in support for offline functionality, multi-language capabilities, and modern UI/UX features.

## ✨ Features

- 🚀 **Optimized Loading** - Splash screen with progress indicator and connection monitoring
- 🌐 **Offline Support** - Graceful fallback with offline page for no-internet scenarios
- 🌍 **Internationalization** - Built-in support for multiple languages (EN, ES, FR, DE, HI)
- 🎨 **Theme Support** - Automatic light/dark mode with manual toggle and persistence
- 📱 **Responsive Design** - Fully responsive layout using Bootstrap 5 grid system
- 🔒 **Security Enhanced** - Copy-paste protection and other security features
- ♿ **Accessibility** - WCAG compliant with accessibility features built-in
- 🎯 **SEO Optimized** - Proper meta tags and semantic HTML structure
- 📊 **Performance** - Built-in performance monitoring and optimization

## 📁 Project Structure

```
/
├── @/
│   ├── config.php          # Central configuration
│   ├── header.php          # Common header with navigation
│   ├── footer.php          # Common footer
│   └── components/         # Reusable UI components
├── assets/
│   ├── css/
│   │   └── custom.css      # Custom styles
│   └── js/
│       └── app.js          # Main JavaScript application
├── lang/
│   ├── en.php             # English translations
│   ├── es.php             # Spanish translations
│   ├── fr.php             # French translations
│   ├── de.php             # German translations
│   └── hi.php             # Hindi translations
├── index.php              # Main homepage
├── splash.php             # Loading/splash screen
└── offline.php            # Offline fallback page
```

## 🚀 Quick Start

### Prerequisites

- PHP 7.4 or higher
- Web server (Apache/Nginx)
- mod_rewrite enabled (for Apache)

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/prince5712/wbskit.git
   ```

2. Upload all files to your web server

3. Ensure proper file permissions:
   ```bash
   chmod 755 -R /path/to/wbskit
   ```

4. Access the application through splash.php

5. Configure your application in `@/config.php`

## ⚙️ Configuration

### Basic Configuration

Edit `@/config.php` to customize:
- Site branding and metadata
- Navigation menu items
- Default language
- Security settings
- Theme preferences

### Language Configuration

Add or modify translations in the `lang/` directory:
```php
return [
    'key' => 'Translation text',
    // Add more translations
];
```

### Styling

Customize the appearance in `assets/css/custom.css`:
- Override Bootstrap variables
- Add custom components
- Modify responsive breakpoints
- Define theme-specific styles

## 🌐 Browser Support

- Chrome/Edge 88+
- Firefox 85+
- Safari 14+
- Mobile browsers with ES6 support

## 🔒 Security Features

- XSS Protection
- CSRF Protection
- Content Security Policy
- Copy-paste protection (configurable)
- Secure cookie handling

## 🎯 Performance

- Minified assets
- Lazy loading images
- Optimized resource loading
- Browser caching
- Performance monitoring

## 📱 Progressive Web App Features

- Offline functionality
- Add to home screen
- Background sync
- Push notifications (configurable)
- Service worker support

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request. For major changes, please open an issue first to discuss what you would like to change.

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**prinsberwa**

## 📞 Support

For support, please create an issue in the GitHub repository or contact the author directly.

---

Made with ❤️ using WBS Kit