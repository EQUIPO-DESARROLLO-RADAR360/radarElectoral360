import './bootstrap';
import { createApp } from 'vue';
import EventosIndex from './pages/EventosIndex.vue';

// Initialize Vue App specifically for Eventos
// We DO NOT import theme-toggle or sidebar here to avoid conflicts with the layout scripts
if (document.getElementById('app')) {
    const app = createApp({});
    app.component('eventos-index', EventosIndex);
    app.mount('#app');
}
