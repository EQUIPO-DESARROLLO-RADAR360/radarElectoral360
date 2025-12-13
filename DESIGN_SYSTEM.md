# 🎨 Design System - Radar Electoral 360

## Paleta de Colores

### Colores Principales
- **Primary**: `#1D4E89` - Azul institucional (barra de navegación, botones principales)
- **Primary Light**: `#3E7CC4` - Azul claro (hover, acentos)
- **Secondary**: `#F9B233` - Amarillo cálido (énfasis, módulos activos)
- **Accent**: `#D72638` - Rojo (acciones electorales, alertas)

### Colores de Estado
- **Success**: `#28A745` - Verde
- **Warning**: `#FFC107` - Amarillo
- **Info**: `#17A2B8` - Azul información
- **Danger**: `#DC3545` - Rojo peligro

### Superficies
- **Background**: `#F4F6FA` - Fondo principal
- **Surface**: `#FFFFFF` - Tarjetas, paneles
- **Surface Hover**: `#F8F9FA` - Hover states

### Texto
- **Text Primary**: `#212B36` - Títulos, KPIs
- **Text Secondary**: `#5C6C7D` - Etiquetas, placeholders
- **Text Muted**: `#9EAAB5` - Texto deshabilitado
- **Text Inverse**: `#FFFFFF` - Texto sobre fondos oscuros

### Bordes
- **Border**: `#E5E8EB` - Bordes y divisores

## Sistema de Iconos

### Material Symbols Rounded
- Tamaño estándar: 24px
- Inactivo: outline (FILL: 0)
- Activo: filled (FILL: 1)
- Color según módulo activo

### Iconos por Módulo
| Módulo | Icono | Color Activo |
|--------|-------|--------------|
| Dashboard | `space_dashboard` | `#1D4E89` |
| Gestión | `supervisor_account` | `#35495E` |
| Encuestas | `poll` | `#F9B233` |
| Comunicación | `forum` | `#00BFA6` |
| Electoral | `how_to_vote` | `#D72638` |
| Eventos | `event` | `#7B68EE` |
| Configuración | `settings` | `#9EAAB5` |

## Tipografía

### Fuentes
- **Body**: Inter (300, 400, 500, 600, 700)
- **Headings**: Poppins (300, 400, 500, 600, 700)

### Escala de Tamaños
- **H1**: 32px
- **H2**: 28px
- **H3**: 24px
- **H4**: 20px
- **H5**: 18px
- **H6**: 16px
- **Body**: 14px
- **Small**: 12px

## Componentes

### Cards
- Border radius: 8px
- Shadow: `0 2px 6px rgba(0, 0, 0, 0.08)`
- Hover: `translateY(-2px)` + shadow aumentada
- Padding: 24px

### Botones
- Border radius: 8px
- Primary: fondo `#1D4E89`, texto blanco
- Hover: `#3E7CC4` + ligera elevación
- Padding: 8px 16px

### Tablas
- Border radius: 8px
- Header: fondo `#F4F6FA`
- Hover: fondo `#F4F6FA`
- Bordes sutiles

### Sidebar
- Fondo: gradiente azul (`#1D4E89` → `#1a4a7a`)
- Ancho: 280px
- Enlaces activos: fondo blanco + borde izquierdo de color del módulo

## Espaciado

Escala: 4px, 8px, 16px, 24px, 32px, 48px

## Sombras

- **SM**: `0 1px 2px rgba(0, 0, 0, 0.05)`
- **MD**: `0 2px 6px rgba(0, 0, 0, 0.08)`
- **LG**: `0 4px 12px rgba(0, 0, 0, 0.1)`
- **XL**: `0 8px 24px rgba(0, 0, 0, 0.12)`

## Modo Oscuro

Todos los colores se adaptan automáticamente usando variables CSS y el atributo `[data-theme="dark"]`.

## Uso en CSS

```css
/* Usar variables CSS */
.element {
    background-color: var(--color-primary);
    color: var(--color-text-primary);
    border-radius: var(--radius-md);
    padding: var(--spacing-md);
    box-shadow: var(--shadow-md);
}
```

## Uso en JavaScript

```javascript
// Obtener colores del tema
const root = getComputedStyle(document.documentElement);
const primary = root.getPropertyValue('--color-primary').trim();
```



