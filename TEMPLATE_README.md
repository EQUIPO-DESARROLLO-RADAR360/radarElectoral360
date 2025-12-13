# Template Radar Electoral 360

Template completo con Material Design 3 y Bootstrap para Laravel 9.

## Características

- ✅ Material Design 3 integrado
- ✅ Bootstrap 5
- ✅ Modo claro/oscuro con toggle en navbar
- ✅ DataTables con procesamiento server-side
- ✅ 7 secciones completas: Dashboard, Gestión, Encuestas, Comunicación, Electoral, Eventos, Configuración
- ✅ Diseño responsive
- ✅ Iconos Material Icons
- ✅ Gráficos con Chart.js

## Estructura de Archivos

```
resources/
  views/
    layouts/
      app.blade.php          # Layout principal
    dashboard.blade.php       # Vista del dashboard
    gestion/
      index.blade.php         # Vista de gestión
    encuestas/
      index.blade.php         # Vista de encuestas
    comunicacion/
      index.blade.php         # Vista de comunicación
    electoral/
      index.blade.php         # Vista electoral
    eventos/
      index.blade.php         # Vista de eventos con DataTable
    configuracion/
      index.blade.php         # Vista de configuración

public/
  css/
    app.css                   # Estilos principales
    material-design.css       # Componentes Material Design 3
  js/
    app.js                    # JavaScript principal
    theme-toggle.js           # Toggle de tema claro/oscuro

app/
  Http/
    Controllers/
      EventosController.php   # Controlador para eventos con DataTable

routes/
  web.php                     # Rutas actualizadas
```

## Instalación

1. Copia todos los archivos a tu proyecto Laravel
2. Asegúrate de tener las siguientes dependencias en tu `composer.json`:
   - Laravel 9.x
   - PHP 8.0.2 o superior

3. Para DataTables server-side processing (opcional pero recomendado):
   ```bash
   composer require yajra/laravel-datatables-oracle
   ```

4. Publica los assets si es necesario:
   ```bash
   php artisan vendor:publish --tag=datatables
   ```

## Uso

### Rutas Disponibles

- `/dashboard` - Dashboard principal
- `/gestion` - Gestión de registros
- `/encuestas` - Gestión de encuestas
- `/comunicacion` - Campañas de comunicación
- `/electoral` - Procesos electorales
- `/eventos` - Eventos con DataTable server-side
- `/configuracion` - Configuración del sistema

### Toggle de Tema

El toggle de tema claro/oscuro está ubicado en el navbar. El tema seleccionado se guarda en localStorage y persiste entre sesiones.

### DataTable de Eventos

La tabla de eventos utiliza procesamiento server-side. El endpoint está en `/eventos/data` y devuelve datos en formato JSON compatible con DataTables.

Para personalizar los datos, edita el método `data()` en `EventosController.php` y reemplaza los datos de ejemplo con consultas a tu base de datos.

## Personalización

### Colores

Los colores principales están definidos en `public/css/app.css` usando variables CSS:

```css
:root {
    --md-primary: #6750A4;
    --md-secondary: #625B71;
    --md-tertiary: #7D5260;
    /* ... */
}
```

### Componentes Material Design 3

Los componentes Material Design 3 están en `public/css/material-design.css`. Incluye:
- Botones (filled, outlined, text)
- Cards (filled, outlined)
- Text fields
- Chips
- Dividers
- List items
- Progress indicators
- Snackbars

## Notas

- Los datos mostrados en las vistas son ejemplos. Reemplázalos con datos reales de tu base de datos.
- El controlador de Eventos incluye datos de ejemplo. Debes implementar la lógica de base de datos según tus necesidades.
- Los gráficos en Dashboard y Electoral utilizan Chart.js. Asegúrate de tener conexión a internet para cargar la librería desde CDN.

## Soporte

Para más información sobre Material Design 3, visita: https://m3.material.io/
Para DataTables, visita: https://datatables.net/

## Licencia

Este template es parte del proyecto Radar Electoral 360.


