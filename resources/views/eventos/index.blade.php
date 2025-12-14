@extends('layouts.app')

@section('title', 'Eventos - Radar Electoral 360')
@section('page_title', 'Eventos')
@section('page_subtitle', 'Gestiona la agenda, asistentes y comunicación de cada encuentro en tiempo real')

<!-- Ensure Vite assets are loaded for Vue and Tailwind -->
@push('styles')
    @vite(['resources/css/app.css', 'resources/js/eventos-app.js'])
@endpush

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-xl font-bold text-gray-900 dark:text-slate-100">Listado general de eventos</h2>
                <p class="text-sm text-gray-500 dark:text-slate-400">Controle estados, asistentes y logística desde un solo
                    panel.</p>
            </div>

            <div class="flex items-center gap-3">
                <!-- Refresh Button (Optional visual) -->
                <button type="button" onclick="window.location.reload()"
                    class="inline-flex items-center gap-2 rounded-lg border border-gray-200 dark:border-white/10 bg-white dark:bg-slate-900/40 px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-200 transition-all hover:bg-gray-50 dark:hover:bg-white/5 hover:text-gray-900 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-slate-600 shadow-sm">
                    <span class="material-symbols-rounded text-base">refresh</span>
                    Actualizar
                </button>

                <!-- New Event Button -->
                <button type="button" data-modal-target="nuevoEventoModal" data-modal-toggle="nuevoEventoModal"
                    class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white transition-transform hover:scale-105 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/30">
                    <span class="material-symbols-rounded text-base">add</span>
                    Nuevo evento
                </button>
            </div>
        </div>

        <!-- Vue Component Mount Point -->
        <div id="app">
            <eventos-index url="{{ route('eventos.data') }}"></eventos-index>
        </div>
    </div>

    <!-- Modal Include -->
    <!-- Placed strictly at the end of the content to function correctly with Flowbite JS and z-indexes -->
    @include('eventos.partials.modal-create')

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.body.classList.add('theme-eventos');
            });
            // Cleanup not strictly necessary as navigating away reloads, but good practice if using Pjax later (which we aren't).
        </script>
    @endpush
@endsection