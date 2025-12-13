<template>
    <div class="space-y-6">
        <!-- Quick Filters -->
        <div class="flex flex-wrap gap-2">
            <button @click="filter = 'all'"
                :class="['px-6 py-2 text-sm font-semibold rounded-full transition-all duration-200 shadow-sm', filter === 'all' ? 'bg-blue-600 text-white shadow-blue-500/30 ring-2 ring-blue-500 ring-offset-2 ring-offset-gray-100 dark:ring-offset-slate-900' : 'bg-white dark:bg-slate-800 text-gray-500 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-slate-700 hover:text-gray-900 dark:hover:text-white border border-gray-200 dark:border-slate-700']">
                Todos
            </button>
            <button @click="filter = 'upcoming'"
                :class="['px-6 py-2 text-sm font-semibold rounded-full transition-all duration-200 shadow-sm', filter === 'upcoming' ? 'bg-blue-600 text-white shadow-blue-500/30 ring-2 ring-blue-500 ring-offset-2 ring-offset-gray-100 dark:ring-offset-slate-900' : 'bg-white dark:bg-slate-800 text-gray-500 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-slate-700 hover:text-gray-900 dark:hover:text-white border border-gray-200 dark:border-slate-700']">
                Próximos
            </button>
            <button @click="filter = 'active'"
                :class="['px-6 py-2 text-sm font-semibold rounded-full transition-all duration-200 shadow-sm', filter === 'active' ? 'bg-emerald-600 text-white shadow-emerald-500/30 ring-2 ring-emerald-500 ring-offset-2 ring-offset-gray-100 dark:ring-offset-slate-900' : 'bg-white dark:bg-slate-800 text-gray-500 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-slate-700 hover:text-gray-900 dark:hover:text-white border border-gray-200 dark:border-slate-700']">
                Activos
            </button>
            <button @click="filter = 'finished'"
                :class="['px-6 py-2 text-sm font-semibold rounded-full transition-all duration-200 shadow-sm', filter === 'finished' ? 'bg-slate-600 text-white shadow-slate-500/30 ring-2 ring-slate-500 ring-offset-2 ring-offset-gray-100 dark:ring-offset-slate-900' : 'bg-white dark:bg-slate-800 text-gray-500 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-slate-700 hover:text-gray-900 dark:hover:text-white border border-gray-200 dark:border-slate-700']">
                Finalizados
            </button>
        </div>

        <ServerSideTable :url="url" :columns="columns" :additionalParams="{ scope: filter }">
            
            <!-- Nombre del Evento -->
            <template #nombre="{ value }">
                <span class="font-semibold text-gray-900 dark:text-white tracking-wide">{{ value }}</span>
            </template>

            <!-- Registrados -->
            <template #registrados="{ value }">
                 <div class="flex justify-center">
                    <span class="inline-flex items-center justify-center h-8 w-12 text-xs font-bold text-white bg-blue-600 rounded-lg shadow-sm">
                        {{ value }}
                    </span>
                 </div>
            </template>

            <!-- Estado -->
            <template #estado="{ value }">
                <div class="flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full" 
                        :class="{
                            'bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]': value === 'Activo',
                            'bg-gray-400': value === 'Finalizado',
                            'bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.5)]': value === 'Cancelado',
                            'bg-blue-500 shadow-[0_0_8px_rgba(59,130,246,0.5)]': value === 'Programado'
                        }">
                    </span>
                    <span class="px-3 py-1 text-xs font-medium rounded-full border"
                        :class="{
                            'bg-emerald-100 text-emerald-700 border-emerald-200 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20': value === 'Activo',
                            'bg-gray-100 text-gray-600 border-gray-200 dark:bg-slate-700/50 dark:text-slate-400 dark:border-slate-600': value === 'Finalizado',
                            'bg-red-100 text-red-700 border-red-200 dark:bg-red-500/10 dark:text-red-400 dark:border-red-500/20': value === 'Cancelado',
                            'bg-blue-100 text-blue-700 border-blue-200 dark:bg-blue-500/10 dark:text-blue-400 dark:border-blue-500/20': value === 'Programado'
                        }">
                        {{ value }}
                    </span>
                </div>
            </template>

            <!-- Ubicación -->
            <template #ubicacion="{ value }">
                <div class="whitespace-normal break-words leading-tight" :title="value">
                    <span class="text-gray-600 dark:text-slate-300 text-sm">{{ value }}</span>
                </div>
            </template>

            <!-- Acciones -->
            <template #acciones="{ item }">
                <div class="flex items-center justify-start gap-2">
                    <a href="#" class="flex items-center justify-center w-8 h-8 rounded bg-blue-600 text-white hover:bg-blue-500 transition-colors shadow-lg shadow-blue-500/20" title="Ver">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </a>
                    <a href="#" class="flex items-center justify-center w-8 h-8 rounded bg-gray-100 text-gray-500 border border-gray-200 hover:bg-gray-200 hover:text-gray-700 dark:bg-slate-700 dark:text-slate-300 dark:hover:bg-slate-600 dark:hover:text-white dark:border-slate-600 transition-colors" title="Editar">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </a>
                    <button class="flex items-center justify-center w-8 h-8 rounded bg-red-600 text-white hover:bg-red-500 transition-colors shadow-lg shadow-red-500/20" title="Eliminar">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </div>
            </template>

            <!-- Mobile Card Layout -->
            <template #mobile-card="{ item }">
                <div class="flex flex-col space-y-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-bold text-gray-900 dark:text-white text-lg tracking-tight">{{ item.nombre }}</h3>
                            <div class="flex items-center gap-2 mt-1 text-sm text-gray-500 dark:text-slate-400">
                                <span class="bg-gray-100 dark:bg-slate-800 px-2 py-0.5 rounded text-xs border border-gray-200 dark:border-slate-700">{{ item.fecha }}</span>
                                <span class="text-gray-400 dark:text-slate-600">•</span>
                                <span>{{ item.hora }}</span>
                            </div>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium rounded border"
                            :class="{
                                'bg-emerald-500/10 text-emerald-400 border-emerald-500/20': item.estado === 'Activo',
                                'bg-slate-700/50 text-slate-400 border-slate-600': item.estado === 'Finalizado',
                                'bg-red-500/10 text-red-400 border-red-500/20': item.estado === 'Cancelado',
                                'bg-blue-500/10 text-blue-400 border-blue-500/20': item.estado === 'Programado'
                            }">
                            {{ item.estado }}
                        </span>
                    </div>
                    
                    <div class="text-sm text-gray-600 dark:text-slate-300 bg-gray-50 dark:bg-slate-800/50 p-3 rounded border border-gray-200 dark:border-slate-700/50 flex items-center gap-3">
                         <div class="p-2 bg-white dark:bg-slate-900 rounded text-gray-500 dark:text-slate-500 border border-gray-200 dark:border-transparent">
                             <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                         </div>
                         <span>{{ item.ubicacion }}</span>
                    </div>

                    <div class="flex justify-between items-center pt-3 border-t border-gray-200 dark:border-slate-800">
                        <div class="text-xs text-gray-500 dark:text-slate-500 uppercase tracking-wider font-semibold">
                            Registrados: <span class="ml-1 text-white bg-blue-600 px-2 py-0.5 rounded">{{ item.registrados }}</span>
                        </div>
                        <div class="flex gap-2">
                             <a href="#" class="bg-gray-100 dark:bg-slate-800 p-2 rounded text-gray-500 dark:text-slate-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-200 dark:hover:bg-slate-700 transition-colors border border-gray-200 dark:border-transparent"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></a>
                             <a href="#" class="bg-gray-100 dark:bg-slate-800 p-2 rounded text-gray-500 dark:text-slate-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-200 dark:hover:bg-slate-700 transition-colors border border-gray-200 dark:border-transparent"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a>
                        </div>
                    </div>
                </div>
            </template>
        </ServerSideTable>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import ServerSideTable from '../components/ServerSideTable.vue';

const props = defineProps({
    url: {
        type: String,
        required: true
    }
});

const filter = ref('all');

const columns = [
    { 
        key: 'nombre', 
        label: 'NOMBRE DEL EVENTO', 
        width: '20%',
        render: (data, type, row) => {
            return `<span class="font-semibold text-gray-900 dark:text-white tracking-wide">${data}</span>`;
        }
    },
    { key: 'fecha', label: 'FECHA', width: '10%' },
    { key: 'hora', label: 'HORA', width: '10%' },
    { 
        key: 'ubicacion', 
        label: 'UBICACIÓN', 
        width: '35%',
        render: (data) => {
             return `<div class="whitespace-normal break-words leading-tight" title="${data}"><span class="text-gray-600 dark:text-slate-300 text-sm">${data}</span></div>`;
        }
    },
    { 
        key: 'registrados', 
        label: 'REGISTRADOS', 
        width: '10%',
        render: (data) => {
            return `<div class="flex justify-center"><span class="inline-flex items-center justify-center h-8 w-12 text-xs font-bold text-white bg-blue-600 rounded-lg shadow-sm">${data}</span></div>`;
        }
    },
    { 
        key: 'estado', 
        label: 'ESTADO', 
        width: '15%',
        render: (data) => {
            let dotClass = '';
            let badgeClass = '';
            
            if (data === 'Activo') {
                dotClass = 'bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]';
                badgeClass = 'bg-emerald-100 text-emerald-700 border-emerald-200 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20';
            } else if (data === 'Finalizado') {
                dotClass = 'bg-gray-400';
                badgeClass = 'bg-gray-100 text-gray-600 border-gray-200 dark:bg-slate-700/50 dark:text-slate-400 dark:border-slate-600';
            } else if (data === 'Cancelado') {
                dotClass = 'bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.5)]';
                badgeClass = 'bg-red-100 text-red-700 border-red-200 dark:bg-red-500/10 dark:text-red-400 dark:border-red-500/20';
            } else if (data === 'Programado') {
                dotClass = 'bg-blue-500 shadow-[0_0_8px_rgba(59,130,246,0.5)]';
                badgeClass = 'bg-blue-100 text-blue-700 border-blue-200 dark:bg-blue-500/10 dark:text-blue-400 dark:border-blue-500/20';
            }

            return `
                <div class="flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full ${dotClass}"></span>
                    <span class="px-3 py-1 text-xs font-medium rounded-full border ${badgeClass}">${data}</span>
                </div>
            `;
        }
    },
    { 
        key: 'acciones', 
        label: 'ACCIONES', 
        width: '15%', 
        orderable: false, 
        searchable: false,
        render: (data, type, row) => {
            return `
                <div class="flex items-center justify-start gap-2">
                    <a href="#" class="flex items-center justify-center w-8 h-8 rounded bg-blue-600 text-white hover:bg-blue-500 transition-colors shadow-lg shadow-blue-500/20" title="Ver">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </a>
                    <a href="#" class="flex items-center justify-center w-8 h-8 rounded bg-gray-100 text-gray-500 border border-gray-200 hover:bg-gray-200 hover:text-gray-700 dark:bg-slate-700 dark:text-slate-300 dark:hover:bg-slate-600 dark:hover:text-white dark:border-slate-600 transition-colors" title="Editar">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </a>
                    <button class="flex items-center justify-center w-8 h-8 rounded bg-red-600 text-white hover:bg-red-500 transition-colors shadow-lg shadow-red-500/20" title="Eliminar">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </div>
            `;
        }
    }
];
</script>
