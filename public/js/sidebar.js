// Sidebar functionality
(function() {
    'use strict';

    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');
    const desktopSidebarToggle = document.getElementById('desktopSidebarToggle');
    const sidebarToggleIcon = document.getElementById('sidebarToggleIcon');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const COLLAPSE_STORAGE_KEY = 'radar360:sidebar-collapsed';

    if (!sidebar) {
        return;
    }

    function toggleSidebar() {
        sidebar.classList.toggle('active');
        sidebarOverlay.classList.toggle('active');
        document.body.classList.toggle('sidebar-open');
    }

    function closeSidebar() {
        sidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
        document.body.classList.remove('sidebar-open');
    }

    function applyCollapsedState(collapsed) {
        if (collapsed) {
            sidebar.classList.add('collapsed');
            document.body.classList.add('sidebar-collapsed');
            if (sidebarToggleIcon) sidebarToggleIcon.textContent = 'chevron_right';
            if (desktopSidebarToggle) desktopSidebarToggle.setAttribute('aria-label', 'Expandir barra lateral');
        } else {
            sidebar.classList.remove('collapsed');
            document.body.classList.remove('sidebar-collapsed');
            if (sidebarToggleIcon) sidebarToggleIcon.textContent = 'chevron_left';
            if (desktopSidebarToggle) desktopSidebarToggle.setAttribute('aria-label', 'Contraer barra lateral');
        }
    }

    function storeCollapsedState(collapsed) {
        localStorage.setItem(COLLAPSE_STORAGE_KEY, collapsed ? '1' : '0');
    }

    function toggleDesktopSidebar() {
        const willCollapse = !sidebar.classList.contains('collapsed');
        applyCollapsedState(willCollapse);
        storeCollapsedState(willCollapse);
    }

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', closeSidebar);
    }

    if (mobileSidebarToggle) {
        mobileSidebarToggle.addEventListener('click', toggleSidebar);
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeSidebar);
    }

    if (desktopSidebarToggle) {
        desktopSidebarToggle.addEventListener('click', toggleDesktopSidebar);
    }

    document.addEventListener('click', function(event) {
        if (!sidebar.contains(event.target) && mobileSidebarToggle && !mobileSidebarToggle.contains(event.target) && sidebar.classList.contains('active')) {
            closeSidebar();
        }
    });

    function initSidebar() {
        if (window.innerWidth >= 992) {
            sidebar.classList.add('active');
            const storedState = localStorage.getItem(COLLAPSE_STORAGE_KEY) === '1';
            applyCollapsedState(storedState);
        } else {
            sidebar.classList.remove('active');
            applyCollapsedState(false);
            closeSidebar();
        }
    }

    initSidebar();

    window.addEventListener('resize', function() {
        initSidebar();
    });
})();

