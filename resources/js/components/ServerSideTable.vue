<template>
    <div class="w-full">
        <!-- Controls -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
            <div class="flex items-center space-x-3">
                <label class="text-sm font-medium text-gray-700 dark:text-slate-400">Mostrar</label>
                <div class="relative">
                    <select v-model="length" @change="updateLength" :disabled="loading"
                        class="appearance-none bg-white dark:bg-slate-900/40 border border-gray-300 dark:border-white/10 text-gray-900 dark:text-slate-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-3 pr-8 py-2 transition-all hover:bg-gray-50 dark:hover:bg-white/5 hover:border-gray-400 dark:hover:border-white/20 disabled:opacity-50 disabled:cursor-wait">
                        <option :value="10" class="dark:bg-slate-900">10</option>
                        <option :value="25" class="dark:bg-slate-900">25</option>
                        <option :value="50" class="dark:bg-slate-900">50</option>
                        <option :value="100" class="dark:bg-slate-900">100</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-400">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                    </div>
                </div>
            </div>
            
            <div class="relative w-full md:w-80">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-slate-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" v-model="search" @input="updateSearch"
                    class="block w-full p-2.5 pl-10 text-sm text-gray-900 dark:text-slate-200 border border-gray-300 dark:border-white/10 rounded-lg bg-white dark:bg-slate-900/40 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 dark:placeholder-slate-400 transition-all hover:bg-gray-50 dark:hover:bg-white/5 hover:border-gray-400 dark:hover:border-white/20 disabled:opacity-50 disabled:cursor-wait"
                    placeholder="Buscar...">
            </div>
        </div>

        <!-- Desktop View: Headless DataTable -->
        <div class="hidden md:block bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl shadow-xl overflow-hidden transition-colors duration-300 relative group">
            
            <!-- Loading Overlay -->
            <div v-if="loading" class="absolute inset-0 z-50 flex flex-col items-center justify-center bg-white/80 dark:bg-slate-900/80 backdrop-blur-sm transition-all duration-300">
                 <svg class="animate-spin h-10 w-10 text-blue-600 dark:text-blue-500 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-sm font-semibold text-gray-600 dark:text-slate-300 animate-pulse">Buscando registros...</span>
            </div>

            <div class="relative overflow-x-auto max-w-full">
                <table ref="tableRef" class="w-full text-sm text-left text-gray-500 dark:text-slate-400 table-fixed dataTable">
                    <thead class="text-xs text-gray-700 dark:text-slate-300 uppercase bg-gray-50 dark:bg-slate-950/50 border-b border-gray-200 dark:border-slate-800">
                        <!-- Header populated by DataTables -->
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-slate-800">
                        <!-- Body populated by DataTables -->
                    </tbody>
                </table>
            </div>
            
            <!-- Custom Pagination -->
            <div class="px-6 py-4 border-t border-gray-200 dark:border-slate-800 flex items-center justify-between bg-gray-50 dark:bg-slate-900 transition-colors duration-300" v-if="total > 0">
                <span class="text-sm text-gray-500 dark:text-slate-400">
                    Mostrando <span class="font-bold text-gray-900 dark:text-white">{{ from }}</span> a <span class="font-bold text-gray-900 dark:text-white">{{ to }}</span> de <span class="font-bold text-gray-900 dark:text-white">{{ total }}</span> entradas
                </span>
                <div class="inline-flex rounded-md shadow-sm">
                    <button @click="prevPage" :disabled="page === 1 || loading"
                        class="eventos-pagination-btn relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-l-lg border border-gray-300 dark:border-white/10 bg-white text-gray-700 hover:bg-gray-50 hover:text-gray-900 disabled:opacity-50 disabled:cursor-not-allowed transition-all">
                        Anterior
                    </button>
                    <button @click="nextPage" :disabled="to >= total || loading"
                        class="eventos-pagination-btn relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-r-lg border-t border-b border-r border-gray-300 dark:border-white/10 bg-white text-gray-700 hover:bg-gray-50 hover:text-gray-900 disabled:opacity-50 disabled:cursor-not-allowed transition-all">
                        Siguiente
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile View: Cards (Powered by synced data) -->
        <div class="md:hidden space-y-4">
            <div v-if="loading" class="text-center py-8 text-slate-500 flex flex-col items-center">
                 <svg class="animate-spin h-8 w-8 text-blue-500 mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Cargando...
            </div>
            <div v-else-if="mobileData.length === 0" class="text-center py-12 text-slate-500 bg-slate-900 rounded-lg border border-slate-800">
                No se encontraron registros
            </div>
            <div v-else v-for="(item, index) in mobileData" :key="index"
                class="bg-white dark:bg-slate-900 p-5 rounded-xl shadow-lg border border-gray-200 dark:border-slate-800 ring-1 ring-black/5 dark:ring-white/5">
                <slot name="mobile-card" :item="item">
                </slot>
            </div>
             <!-- Pagination Mobile -->
            <div class="flex flex-col items-center pt-4 gap-3">
                 <span class="text-sm text-slate-500">
                    {{ from }}-{{ to }} de {{ total }}
                </span>
                <div class="flex gap-2">
                    <button @click="prevPage" :disabled="page === 1" class="px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-300 disabled:opacity-50">Anterior</button>
                    <button @click="nextPage" :disabled="to >= total" class="px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-300 disabled:opacity-50">Siguiente</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, watch, onBeforeUnmount } from 'vue';
import DataTable from 'datatables.net-dt';
import 'datatables.net-dt/css/jquery.dataTables.css';
import { debounce } from 'lodash';
import $ from 'jquery';

const props = defineProps({
    url: { type: String, required: true },
    columns: { type: Array, required: true },
    additionalParams: { type: Object, default: () => ({}) }
});

const tableRef = ref(null);
const dtInstance = ref(null);

// UI State synced from DataTables
const loading = ref(true);
const search = ref('');
const length = ref(10);
const page = ref(1);
const total = ref(0);
const from = ref(0);
const to = ref(0);
const mobileData = ref([]);

const initDataTable = () => {
    // Transform columns to DataTables format
    // Map 'key' to 'data' and 'label' to 'title'
    // 'render' is passed through if verified in EventosIndex
    const dtColumns = props.columns.map(col => ({
        data: col.key,
        title: col.label,
        render: col.render || null,
        orderable: col.orderable !== false,
        searchable: col.searchable !== false,
        width: col.width
    }));

    dtInstance.value = new DataTable(tableRef.value, {
        dom: 't', // Headless mode: NO default UI elements
        serverSide: true,
        processing: false, // We handle loading state manually via events
        ajax: {
            url: props.url,
            data: (d) => {
                return { ...d, ...props.additionalParams };
            }
        },
        columns: dtColumns,
        paging: true,
        pageLength: length.value,
        ordering: true,
        searching: true,
        autoWidth: false,
        language: {
            zeroRecords: "No se encontraron registros",
            emptyTable: "No hay datos disponibles"
        }
    });

    // Event Listeners to Sync Vue State
    dtInstance.value.on('draw', () => {
        const info = dtInstance.value.page.info();
        page.value = info.page + 1;
        total.value = info.recordsTotal; 
        from.value = info.start + 1;
        to.value = info.end;
        
        // Sync data for Mobile View
        const json = dtInstance.value.ajax.json();
        if (json && json.data) {
            mobileData.value = json.data;
        }
        // NOTE: We don't set loading = false here anymore to avoid flicker,
        // we use 'xhr' event instead.
    });
    
    // Start Loading
    dtInstance.value.on('preXhr', () => {
        loading.value = true;
    });

    // End Loading (Success or Error)
    dtInstance.value.on('xhr', () => {
        loading.value = false;
    });
};

// Custom Controls connected to API
const updateSearch = debounce(() => {
    if (dtInstance.value) {
        dtInstance.value.search(search.value).draw();
    }
}, 300);

const updateLength = () => {
    if (dtInstance.value) {
        dtInstance.value.page.len(length.value).draw();
    }
};

const prevPage = () => {
    if (dtInstance.value) {
        dtInstance.value.page('previous').draw('page');
    }
};

const nextPage = () => {
    if (dtInstance.value) {
        dtInstance.value.page('next').draw('page');
    }
};

// Watchers
watch(() => props.additionalParams, () => {
    if (dtInstance.value) {
        dtInstance.value.ajax.reload();
    }
}, { deep: true });

onMounted(() => {
    initDataTable();
});

onBeforeUnmount(() => {
    if (dtInstance.value) {
        dtInstance.value.destroy();
    }
});
</script>

<style>
/* Ensure no legacy DataTables UI leaks */
.dataTables_wrapper .dataTables_paginate,
.dataTables_wrapper .dataTables_info,
.dataTables_wrapper .dataTables_filter,
.dataTables_wrapper .dataTables_length {
    display: none !important;
}
</style>
