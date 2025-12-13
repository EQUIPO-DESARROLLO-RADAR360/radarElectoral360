// Theme Toggle Functionality

(function() {
    'use strict';

    // Get theme from localStorage or default to light
    const getTheme = () => {
        return localStorage.getItem('theme') || 'light';
    };

    // Set theme
    const setTheme = (theme) => {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        updateThemeIcon(theme);
    };

    // Update theme icon
    const updateThemeIcon = (theme) => {
        const themeIcon = document.getElementById('themeIcon');
        if (themeIcon) {
            if (theme === 'dark') {
                themeIcon.textContent = 'light_mode';
            } else {
                themeIcon.textContent = 'dark_mode';
            }
        }
    };

    // Initialize theme on page load
    const initTheme = () => {
        const currentTheme = getTheme();
        setTheme(currentTheme);
    };

    // Toggle theme
    const toggleTheme = () => {
        const currentTheme = getTheme();
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        setTheme(newTheme);
        
        // Refresh DataTables if they exist
        if (typeof $.fn.DataTable !== 'undefined') {
            $('.dataTable').each(function() {
                const table = $(this).DataTable();
                if (table) {
                    // Redraw table to apply new theme styles
                    setTimeout(() => {
                        table.columns.adjust().draw();
                    }, 100);
                }
            });
        }
        
        // Update Chart.js charts if they exist
        if (typeof Chart !== 'undefined') {
            Chart.helpers.each(Chart.instances, function(instance) {
                const ctx = instance.ctx;
                const canvas = ctx.canvas;
                const theme = getTheme();
                
                // Update chart colors based on theme
                if (instance.config && instance.config.data) {
                    const isDark = theme === 'dark';
                    const textColor = isDark ? '#E6E1E5' : '#1C1B1F';
                    const gridColor = isDark ? '#49454F' : '#E7E0EC';
                    
                    if (instance.config.options) {
                        if (!instance.config.options.scales) {
                            instance.config.options.scales = {};
                        }
                        
                        // Update text colors
                        if (instance.config.options.plugins) {
                            if (instance.config.options.plugins.legend) {
                                instance.config.options.plugins.legend.labels = instance.config.options.plugins.legend.labels || {};
                                instance.config.options.plugins.legend.labels.color = textColor;
                            }
                        }
                        
                        // Update scales
                        Object.keys(instance.config.options.scales).forEach(scaleId => {
                            const scale = instance.config.options.scales[scaleId];
                            if (scale.ticks) {
                                scale.ticks.color = textColor;
                            }
                            if (scale.grid) {
                                scale.grid.color = gridColor;
                            }
                        });
                    }
                    
                    instance.update('none');
                }
            });
        }
    };

    // Event listener for theme toggle button
    document.addEventListener('DOMContentLoaded', function() {
        initTheme();

        const themeToggle = document.getElementById('themeToggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', toggleTheme);
        }
    });

    // Listen for system theme changes
    if (window.matchMedia) {
        const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
        
        // Only apply system theme if user hasn't manually set a preference
        if (!localStorage.getItem('theme')) {
            mediaQuery.addEventListener('change', (e) => {
                if (!localStorage.getItem('theme')) {
                    setTheme(e.matches ? 'dark' : 'light');
                }
            });
        }
    }
})();

