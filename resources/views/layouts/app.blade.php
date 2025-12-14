<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Radar Electoral 360')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-design.css') }}" rel="stylesheet">
    <link href="{{ asset('css/design-system.css') }}" rel="stylesheet">

    @stack('styles')

    <style>
        /* CRITICAL: Force Header Dark Mode Global Override */
        [data-theme='dark'] .top-header,
        html.dark .top-header {
            background-color: #0f172a !important;
            /* bg-slate-900 */
            border-bottom-color: #1e293b !important;
            /* border-slate-800 */
            color: #f1f5f9 !important;
            /* text-slate-100 */
        }

        [data-theme='dark'] .top-header .material-icons-outlined,
        html.dark .top-header .material-icons-outlined,
        [data-theme='dark'] .top-header button,
        html.dark .top-header button {
            color: #e2e8f0 !important;
            /* text-slate-200 */
        }

        [data-theme='dark'] .top-header button:hover,
        html.dark .top-header button:hover {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        /* CRITICAL: Force Sidebar Consistency Globally */
        #sidebar {
            width: 256px !important;
            min-width: 256px !important;
            max-width: 256px !important;
            flex: 0 0 256px !important;
            box-sizing: border-box !important;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidebar w-64 min-w-[16rem] shrink-0" id="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('dashboard') }}" class="sidebar-brand">
                    <span class="material-icons-outlined me-2">radar</span>
                    <span class="brand-text">Radar Electoral 360</span>
                </a>
                <button class="sidebar-toggle d-lg-none" id="sidebarToggle" type="button">
                    <span class="material-icons-outlined">close</span>
                </button>
            </div>

            <nav class="sidebar-nav">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <span class="nav-icon material-symbols-rounded"
                                style="font-variation-settings: 'FILL' {{ request()->routeIs('dashboard') ? '1' : '0' }}">space_dashboard</span>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gestion.*') ? 'active' : '' }}"
                            href="{{ route('gestion.index') }}">
                            <span class="nav-icon material-symbols-rounded"
                                style="font-variation-settings: 'FILL' {{ request()->routeIs('gestion.*') ? '1' : '0' }}">supervisor_account</span>
                            <span class="nav-text">Gestión</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('encuestas.*') ? 'active' : '' }}"
                            href="{{ route('encuestas.index') }}">
                            <span class="nav-icon material-symbols-rounded"
                                style="font-variation-settings: 'FILL' {{ request()->routeIs('encuestas.*') ? '1' : '0' }}">poll</span>
                            <span class="nav-text">Encuestas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('comunicacion.*') ? 'active' : '' }}"
                            href="{{ route('comunicacion.index') }}">
                            <span class="nav-icon material-symbols-rounded"
                                style="font-variation-settings: 'FILL' {{ request()->routeIs('comunicacion.*') ? '1' : '0' }}">forum</span>
                            <span class="nav-text">Comunicación</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('electoral.*') ? 'active' : '' }}"
                            href="{{ route('electoral.index') }}">
                            <span class="nav-icon material-symbols-rounded"
                                style="font-variation-settings: 'FILL' {{ request()->routeIs('electoral.*') ? '1' : '0' }}">how_to_vote</span>
                            <span class="nav-text">Electoral</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('eventos.*') ? 'active' : '' }}"
                            href="{{ route('eventos.index') }}">
                            <span class="nav-icon material-symbols-rounded"
                                style="font-variation-settings: 'FILL' {{ request()->routeIs('eventos.*') ? '1' : '0' }}">event</span>
                            <span class="nav-text">Eventos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('configuracion.*') ? 'active' : '' }}"
                            href="{{ route('configuracion.index') }}">
                            <span class="nav-icon material-symbols-rounded"
                                style="font-variation-settings: 'FILL' {{ request()->routeIs('configuracion.*') ? '1' : '0' }}">settings</span>
                            <span class="nav-text">Configuración</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="main-wrapper flex-1 min-w-0 overflow-x-hidden">
            <!-- Top Header -->
            <header
                class="top-header flex items-center justify-between px-6 py-3 bg-white border-b border-gray-200 dark:bg-slate-900 dark:border-slate-800 transition-colors duration-300">
                <div class="header-left">
                    <button class="sidebar-toggle d-lg-none" id="mobileSidebarToggle" type="button">
                        <span class="material-icons-outlined">menu</span>
                    </button>
                </div>
                <div class="header-right ms-auto flex items-center gap-3">
                    <button class="header-btn" id="themeToggle" type="button" title="Cambiar tema">
                        <span class="material-icons-outlined" id="themeIcon">dark_mode</span>
                    </button>
                    <div class="dropdown">
                        <button class="header-btn dropdown-toggle" type="button" id="userDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="material-icons-outlined">account_circle</span>
                            <span class="d-none d-md-inline ms-2">Usuario</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">
                                    <span class="material-icons-outlined me-2"
                                        style="font-size: 20px; vertical-align: middle;">person</span>
                                    Perfil
                                </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">
                                    <span class="material-icons-outlined me-2"
                                        style="font-size: 20px; vertical-align: middle;">logout</span>
                                    Cerrar Sesión
                                </a></li>
                        </ul>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="main-content">
                <div class="container-fluid py-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Overlay for mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/theme-toggle.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>

    @stack('scripts')
</body>

</html>