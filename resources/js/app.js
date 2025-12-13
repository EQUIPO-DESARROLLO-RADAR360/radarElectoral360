import './bootstrap';
import 'flowbite';
import 'flowbite/dist/flowbite.min.js';
import $ from 'jquery';
import DataTable from 'datatables.net-dt';
import 'datatables.net-dt/css/jquery.dataTables.css';
import './theme-toggle';
import './sidebar';


window.$ = $;
window.jQuery = $;
// DataTable(window, $); // Legacy init removed to fix TypeError

import { createApp } from 'vue';
import EventosIndex from './pages/EventosIndex.vue';

const app = createApp({});
app.component('eventos-index', EventosIndex);

if (document.getElementById('app')) {
    app.mount('#app');
}

// Keep jQuery logic only if needed for other pages, but wrap it to not conflict
$(document).ready(function () {
    // Legacy DataTables initialization removed for Eventos to avoid conflicts or double init.
    // If other pages use DataTables, we should target them specifically.
});
