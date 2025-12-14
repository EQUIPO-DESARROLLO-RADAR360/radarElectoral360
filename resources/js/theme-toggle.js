const getTheme = () => localStorage.getItem('theme') || 'dark';

const updateThemeIcon = (theme) => {
  const icon = document.getElementById('themeIcon');
  if (!icon) return;
  icon.textContent = theme === 'dark' ? 'light_mode' : 'dark_mode';
};

const setTheme = (theme) => {
  document.documentElement.setAttribute('data-theme', theme);
  if (theme === 'dark') {
    document.documentElement.classList.add('dark');
  } else {
    document.documentElement.classList.remove('dark');
  }
  localStorage.setItem('theme', theme);
  updateThemeIcon(theme);
};

const applyThemeToCharts = () => {
  if (typeof Chart === 'undefined') {
    return;
  }
  Chart.helpers.each(Chart.instances, (instance) => {
    const isDark = getTheme() === 'dark';
    const textColor = isDark ? '#E2E8F0' : '#1E293B';
    const gridColor = isDark ? '#334155' : '#CBD5F5';

    if (instance?.config?.options?.plugins?.legend?.labels) {
      instance.config.options.plugins.legend.labels.color = textColor;
    }

    if (instance?.config?.options?.scales) {
      Object.values(instance.config.options.scales).forEach((scale) => {
        if (scale.ticks) scale.ticks.color = textColor;
        if (scale.grid) scale.grid.color = gridColor;
      });
    }

    instance.update('none');
  });
};

const initTheme = () => {
  const initialTheme = getTheme();
  setTheme(initialTheme);
  applyThemeToCharts();
};

const toggleTheme = () => {
  const currentTheme = getTheme();
  const nextTheme = currentTheme === 'dark' ? 'light' : 'dark';
  setTheme(nextTheme);
  applyThemeToCharts();
};

const registerSystemThemeListener = () => {
  if (!window.matchMedia) return;
  const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
  mediaQuery.addEventListener('change', (event) => {
    if (!localStorage.getItem('theme')) {
      setTheme(event.matches ? 'dark' : 'light');
      applyThemeToCharts();
    }
  });
};

document.addEventListener('DOMContentLoaded', () => {
  initTheme();

  const toggleButton = document.getElementById('themeToggle');
  if (toggleButton) {
    toggleButton.addEventListener('click', toggleTheme);
  }

  registerSystemThemeListener();
});
