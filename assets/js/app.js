
/**
 * WBS Kit - Main JavaScript Application
 * Handles theme switching, connection monitoring, and UI interactions
 */

(function() {
    'use strict';

    // Theme Management
    const ThemeManager = {
        init() {
            this.setupThemeToggle();
            this.setInitialTheme();
        },

        getStoredTheme() {
            return localStorage.getItem('theme');
        },

        setStoredTheme(theme) {
            localStorage.setItem('theme', theme);
        },

        getPreferredTheme() {
            const storedTheme = this.getStoredTheme();
            if (storedTheme) {
                return storedTheme;
            }
            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        },

        setTheme(theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark');
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme);
            }
            
            // Update theme color meta tag
            const themeColorMeta = document.querySelector('meta[name="theme-color"]');
            if (themeColorMeta) {
                const isDark = theme === 'dark' || (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);
                themeColorMeta.setAttribute('content', isDark ? '#000000' : '#ffffff');
            }
        },

        showActiveTheme(theme) {
            const activeThemeIcon = document.querySelector('.theme-icon-active use');
            const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`);
            
            if (!activeThemeIcon || !btnToActive) return;

            const svgOfActiveBtn = btnToActive.querySelector('svg use').getAttribute('href');

            document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                element.classList.remove('active');
                element.setAttribute('aria-pressed', 'false');
            });

            btnToActive.classList.add('active');
            btnToActive.setAttribute('aria-pressed', 'true');
            activeThemeIcon.setAttribute('href', svgOfActiveBtn);
            
            const themeSwitcherLabel = `Toggle theme (${btnToActive.textContent.trim()})`;
            document.querySelector('#bd-theme').setAttribute('aria-label', themeSwitcherLabel);
        },

        setInitialTheme() {
            const theme = this.getPreferredTheme();
            this.setTheme(theme);
            this.showActiveTheme(theme);
        },

        setupThemeToggle() {
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                const storedTheme = this.getStoredTheme();
                if (storedTheme !== 'light' && storedTheme !== 'dark') {
                    this.setTheme(this.getPreferredTheme());
                }
            });

            document.querySelectorAll('[data-bs-theme-value]').forEach(toggle => {
                toggle.addEventListener('click', () => {
                    const theme = toggle.getAttribute('data-bs-theme-value');
                    this.setStoredTheme(theme);
                    this.setTheme(theme);
                    this.showActiveTheme(theme);
                });
            });
        }
    };

    // Connection Monitor
    const ConnectionMonitor = {
        init() {
            this.setupConnectionEvents();
            this.startPeriodicCheck();
        },

        setupConnectionEvents() {
            window.addEventListener('online', this.handleOnline.bind(this));
            window.addEventListener('offline', this.handleOffline.bind(this));
        },

        handleOnline() {
            console.log('Connection restored');
            this.showConnectionStatus('online');
        },

        handleOffline() {
            console.log('Connection lost');
            this.showConnectionStatus('offline');
            
            // Redirect to offline page if not already there
            if (!window.location.pathname.includes('offline.php')) {
                setTimeout(() => {
                    window.location.href = 'offline.php';
                }, 2000);
            }
        },

        showConnectionStatus(status) {
            // Create or update connection toast
            let toast = document.getElementById('connectionToast');
            if (!toast) {
                toast = this.createConnectionToast();
            }
            
            const toastBody = toast.querySelector('.toast-body');
            const toastIcon = toast.querySelector('.toast-icon');
            
            if (status === 'online') {
                toast.className = 'toast align-items-center text-bg-success border-0';
                toastIcon.innerHTML = '<i class="bi bi-wifi"></i>';
                toastBody.textContent = 'Connection restored';
            } else {
                toast.className = 'toast align-items-center text-bg-danger border-0';
                toastIcon.innerHTML = '<i class="bi bi-wifi-off"></i>';
                toastBody.textContent = 'Connection lost';
            }
            
            const bsToast = new bootstrap.Toast(toast);
            bsToast.show();
        },

        createConnectionToast() {
            const toastContainer = document.createElement('div');
            toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
            toastContainer.style.zIndex = '1200';
            
            const toast = document.createElement('div');
            toast.id = 'connectionToast';
            toast.className = 'toast align-items-center border-0';
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.setAttribute('aria-atomic', 'true');
            
            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-icon me-2"></div>
                    <div class="toast-body"></div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            `;
            
            toastContainer.appendChild(toast);
            document.body.appendChild(toastContainer);
            
            return toast;
        },

        startPeriodicCheck() {
            setInterval(() => {
                if (!navigator.onLine && !window.location.pathname.includes('offline.php')) {
                    this.handleOffline();
                }
            }, 30000); // Check every 30 seconds
        }
    };

    // UI Enhancements
    const UIEnhancements = {
        init() {
            this.setupAnimations();
            this.setupFormValidation();
            this.setupAccessibility();
        },

        setupAnimations() {
            // Add fade-in animation to cards
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('fade-in-up');
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        },

        setupFormValidation() {
            // Bootstrap form validation
            const forms = document.querySelectorAll('.needs-validation');
            forms.forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        },

        setupAccessibility() {
            // Improve keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Tab') {
                    document.body.classList.add('keyboard-navigation');
                }
            });

            document.addEventListener('mousedown', () => {
                document.body.classList.remove('keyboard-navigation');
            });

            // Skip to main content link
            const skipLink = document.createElement('a');
            skipLink.href = '#main-content';
            skipLink.className = 'visually-hidden-focusable btn btn-primary position-absolute top-0 start-0 m-2';
            skipLink.textContent = 'Skip to main content';
            skipLink.style.zIndex = '2000';
            document.body.insertBefore(skipLink, document.body.firstChild);
        }
    };

    // Security Features
    const SecurityFeatures = {
        init() {
            this.preventCopyPaste();
            this.preventZoom();
            this.preventDevTools();
        },

        preventCopyPaste() {
            // Prevent copy-paste (already handled in footer.php, but adding extra protection)
            document.addEventListener('copy', e => e.preventDefault());
            document.addEventListener('paste', e => e.preventDefault());
            document.addEventListener('cut', e => e.preventDefault());
        },

        preventZoom() {
            // Prevent zoom via keyboard and mouse (already handled in footer.php)
            document.addEventListener('touchstart', function(e) {
                if (e.touches.length > 1) {
                    e.preventDefault();
                }
            }, { passive: false });

            let lastTouchEnd = 0;
            document.addEventListener('touchend', function(e) {
                const now = (new Date()).getTime();
                if (now - lastTouchEnd <= 300) {
                    e.preventDefault();
                }
                lastTouchEnd = now;
            }, false);
        },

        preventDevTools() {
            // Additional dev tools prevention
            setInterval(() => {
                if (window.outerWidth - window.innerWidth > 160 || window.outerHeight - window.innerHeight > 160) {
                    console.clear();
                }
            }, 500);
        }
    };

    // Language Switcher
    const LanguageSwitcher = {
        init() {
            this.setupLanguageEvents();
        },

        setupLanguageEvents() {
            const langSwitcher = document.querySelectorAll('[href*="?lang="]');
            langSwitcher.forEach(link => {
                link.addEventListener('click', (e) => {
                    // Show loading indicator
                    const spinner = document.createElement('div');
                    spinner.className = 'spinner-border spinner-border-sm me-2';
                    spinner.setAttribute('role', 'status');
                    link.insertBefore(spinner, link.firstChild);
                });
            });
        }
    };

    // Performance Monitor
    const PerformanceMonitor = {
        init() {
            this.logPerformanceMetrics();
        },

        logPerformanceMetrics() {
            window.addEventListener('load', () => {
                setTimeout(() => {
                    const perfData = performance.getEntriesByType('navigation')[0];
                    if (perfData) {
                        console.log('Page Load Time:', perfData.loadEventEnd - perfData.loadEventStart, 'ms');
                        console.log('DOM Content Loaded:', perfData.domContentLoadedEventEnd - perfData.domContentLoadedEventStart, 'ms');
                    }
                }, 1000);
            });
        }
    };

    // Initialize all modules when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        ThemeManager.init();
        ConnectionMonitor.init();
        UIEnhancements.init();
        SecurityFeatures.init();
        LanguageSwitcher.init();
        PerformanceMonitor.init();
        
        console.log('WBS Kit initialized successfully');
    });

    // Expose global functions for inline event handlers
    window.WBSKit = {
        checkConnection: () => ConnectionMonitor.handleOnline(),
        testOffline: () => window.location.href = 'offline.php',
        setTheme: (theme) => ThemeManager.setStoredTheme(theme)
    };

})();

