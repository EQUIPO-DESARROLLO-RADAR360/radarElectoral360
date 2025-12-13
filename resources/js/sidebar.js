const sidebar = document.getElementById('sidebar');
const desktopToggle = document.getElementById('desktopSidebarToggle');
const mobileToggle = document.getElementById('mobileSidebarToggle');
const closeToggle = document.getElementById('sidebarToggle');
const sidebarOverlay = document.getElementById('sidebarOverlay');
const sidebarToggleIcon = document.getElementById('sidebarToggleIcon');

const STORAGE_KEY = 'radar360:sidebar-collapsed';

const applyCollapsedState = (collapsed) => {
  if (!sidebar) return;
  if (collapsed) {
    sidebar.classList.add('collapsed');
    document.body.classList.add('sidebar-collapsed');
    if (sidebarToggleIcon) sidebarToggleIcon.textContent = 'chevron_right';
  } else {
    sidebar.classList.remove('collapsed');
    document.body.classList.remove('sidebar-collapsed');
    if (sidebarToggleIcon) sidebarToggleIcon.textContent = 'chevron_left';
  }
};

const setCollapsedState = (collapsed) => {
  applyCollapsedState(collapsed);
  localStorage.setItem(STORAGE_KEY, collapsed ? '1' : '0');
};

const openSidebar = () => {
  if (!sidebar) return;
  sidebar.classList.add('active');
  if (sidebarOverlay) sidebarOverlay.classList.add('active');
  document.body.classList.add('sidebar-open');
};

const closeSidebar = () => {
  if (!sidebar) return;
  sidebar.classList.remove('active');
  if (sidebarOverlay) sidebarOverlay.classList.remove('active');
  document.body.classList.remove('sidebar-open');
};

const toggleDesktopSidebar = () => {
  if (!sidebar) return;
  const collapsed = !sidebar.classList.contains('collapsed');
  setCollapsedState(collapsed);
};

const toggleMobileSidebar = () => {
  if (!sidebar) return;
  if (sidebar.classList.contains('active')) {
    closeSidebar();
  } else {
    openSidebar();
  }
};

const initSidebar = () => {
  const storedState = localStorage.getItem(STORAGE_KEY) === '1';
  applyCollapsedState(storedState);

  if (sidebarOverlay) {
    sidebarOverlay.addEventListener('click', closeSidebar);
  }

  if (desktopToggle) {
    desktopToggle.addEventListener('click', toggleDesktopSidebar);
  }

  if (mobileToggle) {
    mobileToggle.addEventListener('click', toggleMobileSidebar);
  }

  if (closeToggle) {
    closeToggle.addEventListener('click', closeSidebar);
  }

  document.addEventListener('click', (event) => {
    if (!sidebar) return;
    if (window.innerWidth >= 1024) return;
    const target = event.target;
    const clickedInside = sidebar.contains(target);
    const clickedToggle = mobileToggle && mobileToggle.contains(target);
    if (!clickedInside && !clickedToggle) {
      closeSidebar();
    }
  });

  window.addEventListener('resize', () => {
    if (!sidebar) return;
    if (window.innerWidth >= 1024) {
      sidebar.classList.add('active');
      if (sidebarOverlay) sidebarOverlay.classList.remove('active');
      document.body.classList.remove('sidebar-open');
    } else {
      sidebar.classList.remove('active');
      applyCollapsedState(false);
      closeSidebar();
    }
  });
};

document.addEventListener('DOMContentLoaded', initSidebar);


