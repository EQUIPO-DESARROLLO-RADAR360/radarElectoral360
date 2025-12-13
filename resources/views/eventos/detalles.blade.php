@extends('layouts.app')

@section('title', 'Detalles del Evento - Radar Electoral 360')
@section('page_title', 'Detalle del evento')
@section('page_subtitle', 'Accede a la información completa del encuentro y seguimiento de asistentes')

@php($totalElectores = $evento->electores_count ?? $electores->count())

@section('content')
<div class="space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-3">
        <a href="{{ route('eventos.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-600 transition-colors duration-200 hover:bg-slate-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 dark:border-slate-700 dark:bg-slate-800/60 dark:text-gray-200 dark:hover:bg-slate-700/80">
            <span class="material-symbols-rounded text-base">arrow_back</span>
            Volver a eventos
        </a>
        <button type="button" data-modal-target="evento-modal" data-modal-toggle="evento-modal" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white transition-transform duration-200 hover:scale-[1.01] hover:bg-blue-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
            <span class="material-symbols-rounded text-base">event</span>
            Resumen del evento
        </button>
    </div>

    <section class="rounded-xl border border-slate-200 bg-white text-slate-900 shadow-md shadow-slate-200/60 transition-colors duration-300 dark:border-slate-800/60 dark:bg-slate-900/70 dark:text-gray-100 dark:shadow-slate-900/30">
        <div class="flex items-center gap-3 border-b border-slate-200 px-6 py-4 transition-colors duration-300 dark:border-slate-800/60">
            <span class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-600 text-white shadow-lg shadow-blue-600/30">
                <span class="material-symbols-rounded text-2xl">insights</span>
            </span>
            <div class="space-y-1">
                <h2 class="text-lg font-semibold text-slate-900 transition-colors duration-300 dark:text-gray-100">Información general</h2>
                <p class="text-sm text-slate-500 transition-colors duration-300 dark:text-gray-400">Datos clave para coordinar la logística y la asistencia.</p>
            </div>
        </div>
        <div class="px-6 py-5">
            <dl class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <div class="rounded-lg border border-slate-200 bg-white px-4 py-3 transition-colors duration-300 dark:border-slate-800/60 dark:bg-slate-900/70">
                    <dt class="text-xs uppercase tracking-wide text-slate-500">Nombre</dt>
                    <dd class="mt-1 text-sm font-medium text-slate-900 dark:text-gray-100">{{ $evento->nombreEvento }}</dd>
                </div>
                <div class="rounded-lg border border-slate-200 bg-white px-4 py-3 transition-colors duration-300 dark:border-slate-800/60 dark:bg-slate-900/70">
                    <dt class="text-xs uppercase tracking-wide text-slate-500">Fecha</dt>
                    <dd class="mt-1 text-sm font-medium text-slate-900 dark:text-gray-100">{{ $evento->fecha->format('d/m/Y') }}</dd>
                </div>
                <div class="rounded-lg border border-slate-200 bg-white px-4 py-3 transition-colors duration-300 dark:border-slate-800/60 dark:bg-slate-900/70">
                    <dt class="text-xs uppercase tracking-wide text-slate-500">Hora</dt>
                    <dd class="mt-1 text-sm font-medium text-slate-900 dark:text-gray-100">{{ date('H:i', strtotime($evento->hora)) }} h</dd>
                </div>
                <div class="rounded-lg border border-slate-200 bg-white px-4 py-3 transition-colors duration-300 dark:border-slate-800/60 dark:bg-slate-900/70 sm:col-span-2 lg:col-span-1">
                    <dt class="text-xs uppercase tracking-wide text-slate-500">Ubicación</dt>
                    <dd class="mt-1 text-sm font-medium text-slate-900 dark:text-gray-100">{{ $evento->ubicacion }}</dd>
                </div>
                <div class="rounded-lg border border-slate-200 bg-white px-4 py-3 transition-colors duration-300 dark:border-slate-800/60 dark:bg-slate-900/70">
                    <dt class="text-xs uppercase tracking-wide text-slate-500">Estado</dt>
                    <dd class="mt-2">
                        @php
                            $badgeClass = match($evento->estado) {
                                'Activo' => 'bg-green-500/15 text-green-600 ring-green-500/30 dark:bg-green-600/20 dark:text-green-200',
                                'Finalizado' => 'bg-slate-300/30 text-slate-600 ring-slate-500/30 dark:bg-slate-600/20 dark:text-slate-200',
                                'Cancelado' => 'bg-red-500/15 text-red-600 ring-red-500/30 dark:bg-red-600/20 dark:text-red-200',
                                default => 'bg-amber-500/15 text-amber-600 ring-amber-500/30 dark:bg-amber-500/20 dark:text-amber-200',
                            };
                        @endphp
                        <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-sm font-medium ring-1 ring-inset {{ $badgeClass }}">
                            <span class="material-symbols-rounded text-sm">radio_button_checked</span>
                            {{ $evento->estado }}
                        </span>
                    </dd>
                </div>
                <div class="rounded-lg border border-slate-200 bg-white px-4 py-3 transition-colors duration-300 dark:border-slate-800/60 dark:bg-slate-900/70">
                    <dt class="text-xs uppercase tracking-wide text-slate-500">Total de asistentes</dt>
                    <dd class="mt-2">
                        <span class="inline-flex items-center gap-2 rounded-full bg-blue-500/15 px-3 py-1 text-sm font-semibold text-blue-600 ring-1 ring-blue-500/20 dark:bg-blue-600/20 dark:text-blue-200">
                            <span class="material-symbols-rounded text-sm">people</span>
                            {{ number_format($totalElectores) }}
                        </span>
                    </dd>
                </div>
            </dl>
        </div>
    </section>

    <section class="rounded-xl border border-slate-200 bg-white text-slate-900 shadow-md shadow-slate-200/60 transition-colors duration-300 dark:border-slate-800/60 dark:bg-slate-900/70 dark:text-gray-100 dark:shadow-slate-900/30">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200 px-6 py-4 transition-colors duration-300 dark:border-slate-800/60">
            <div class="space-y-1">
                <h3 class="text-lg font-semibold text-slate-900 transition-colors duration-300 dark:text-gray-100">Electores registrados</h3>
                <p class="text-sm text-slate-500 transition-colors duration-300 dark:text-gray-400">Listado detallado con información de contacto y estado de asistencia.</p>
            </div>
        </div>
        <div class="px-2 pb-6 pt-4 sm:px-6">
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-md shadow-slate-200/60 transition-colors duration-300 dark:border-slate-800/60 dark:bg-slate-900/80 dark:shadow-slate-900/30">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 text-left text-sm text-slate-700 transition-colors duration-300 dark:divide-slate-800 dark:text-gray-200">
                        <thead class="bg-slate-100 text-xs uppercase text-slate-600 transition-colors duration-300 dark:bg-slate-800 dark:text-gray-100">
                            <tr>
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">DNI</th>
                                <th class="px-4 py-3">Nombre completo</th>
                                <th class="px-4 py-3">Región</th>
                                <th class="px-4 py-3">Provincia</th>
                                <th class="px-4 py-3">Distrito</th>
                                <th class="px-4 py-3">WhatsApp</th>
                                <th class="px-4 py-3 text-center">Asistió</th>
                                <th class="px-4 py-3 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 transition-colors duration-300 dark:divide-slate-800">
                            @forelse ($electores as $elector)
                                <tr class="transition-colors hover:bg-slate-50 dark:hover:bg-slate-800/60">
                                    <td class="px-4 py-3 font-medium text-slate-900 dark:text-gray-100">{{ $elector->id }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $elector->dni }}</td>
                                    <td class="px-4 py-3">{{ $elector->nombres }} {{ $elector->apellidP }} {{ $elector->apellidoM }}</td>
                                    <td class="px-4 py-3">{{ $elector->region }}</td>
                                    <td class="px-4 py-3">{{ $elector->provincia }}</td>
                                    <td class="px-4 py-3">{{ $elector->distrito }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        @if ($elector->whatsapp)
                                            <a href="https://wa.me/{{ preg_replace('/\D+/', '', $elector->whatsapp) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 text-blue-600 transition-colors duration-150 hover:text-blue-500 dark:text-blue-300 dark:hover:text-blue-200">
                                                <span class="material-symbols-rounded text-base">chat</span>
                                                {{ $elector->whatsapp }}
                                            </a>
                                        @else
                                            <span class="text-slate-400 dark:text-gray-500">Sin número</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        @php
                                            $asistio = optional($elector->pivot)->asistio;
                                            $badge = $asistio
                                                ? 'bg-green-500/15 text-green-600 ring-green-500/30 dark:bg-green-500/20 dark:text-green-200'
                                                : 'bg-amber-500/15 text-amber-600 ring-amber-500/30 dark:bg-amber-500/20 dark:text-amber-200';
                                            $label = $asistio ? 'Sí asistió' : 'Pendiente';
                                        @endphp
                                        <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold ring-1 ring-inset {{ $badge }}">
                                            <span class="material-symbols-rounded text-sm">{{ $asistio ? 'check_circle' : 'schedule' }}</span>
                                            {{ $label }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-center gap-2">
                                            <button type="button" class="btn-icon bg-slate-600 text-white hover:bg-slate-500" title="Marcar asistencia" aria-label="Marcar asistencia">
                                                <span class="material-symbols-rounded text-base">how_to_reg</span>
                                            </button>
                                            <button type="button" class="btn-icon bg-red-600 text-white hover:bg-red-500" title="Eliminar registro" aria-label="Eliminar registro">
                                                <span class="material-symbols-rounded text-base">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-6 py-8 text-center text-sm text-slate-500 dark:text-gray-400">No hay electores registrados para este evento.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Flowbite Modal -->
<div id="evento-modal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 hidden overflow-y-auto overflow-x-hidden">
    <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-xl rounded-xl border border-slate-200 bg-white text-slate-900 shadow-2xl shadow-slate-200/80 transition-colors duration-300 dark:border-slate-800/60 dark:bg-slate-900/95 dark:text-gray-100 dark:shadow-slate-900/40" role="dialog" aria-modal="true">
            <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4 transition-colors duration-300 dark:border-slate-800/70">
                <div class="flex items-center gap-3">
                    <span class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-600 text-white shadow-lg shadow-blue-600/30">
                        <span class="material-symbols-rounded text-2xl">calendar_month</span>
                    </span>
                    <div>
                        <h4 class="text-lg font-semibold text-slate-900 transition-colors duration-300 dark:text-gray-100">Resumen del evento</h4>
                        <p class="text-sm text-slate-500 transition-colors duration-300 dark:text-gray-400">Revisa los datos clave antes de continuar.</p>
                    </div>
                </div>
                <button type="button" data-modal-hide="evento-modal" class="inline-flex items-center justify-center rounded-lg border border-transparent bg-slate-200 p-2 text-slate-600 transition-colors duration-200 hover:bg-slate-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 dark:bg-slate-800/70 dark:text-gray-300 dark:hover:bg-slate-700" aria-label="Cerrar modal">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <div class="space-y-4 px-6 py-5">
                <div class="grid gap-4 md:grid-cols-2">
                    <div class="space-y-1">
                        <span class="text-xs uppercase tracking-wide text-gray-500">Nombre</span>
                        <p class="text-sm font-medium text-gray-100">{{ $evento->nombreEvento }}</p>
                    </div>
                    <div class="space-y-1">
                        <span class="text-xs uppercase tracking-wide text-gray-500">Estado</span>
                        <p class="text-sm font-medium text-gray-100">{{ $evento->estado }}</p>
                    </div>
                    <div class="space-y-1">
                        <span class="text-xs uppercase tracking-wide text-gray-500">Fecha</span>
                        <p class="text-sm font-medium text-gray-100">{{ $evento->fecha->format('d/m/Y') }}</p>
                    </div>
                    <div class="space-y-1">
                        <span class="text-xs uppercase tracking-wide text-gray-500">Hora</span>
                        <p class="text-sm font-medium text-gray-100">{{ date('H:i', strtotime($evento->hora)) }} h</p>
                    </div>
                    <div class="space-y-1 md:col-span-2">
                        <span class="text-xs uppercase tracking-wide text-gray-500">Ubicación</span>
                        <p class="text-sm font-medium text-gray-100">{{ $evento->ubicacion }}</p>
                    </div>
                    <div class="space-y-1 md:col-span-2">
                        <span class="text-xs uppercase tracking-wide text-gray-500">Asistentes registrados</span>
                        <p class="inline-flex items-center gap-2 rounded-full bg-blue-600/20 px-3 py-1 text-sm font-semibold text-blue-200 ring-1 ring-blue-500/30">{{ number_format($totalElectores) }} electores</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-3 border-t border-slate-800/70 px-6 py-4">
                <button type="button" data-modal-hide="evento-modal" class="inline-flex items-center gap-2 rounded-lg bg-slate-700 px-4 py-2 text-sm font-medium text-gray-100 transition-transform duration-200 hover:scale-105 hover:bg-slate-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

