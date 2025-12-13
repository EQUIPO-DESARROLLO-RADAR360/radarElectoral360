@extends('layouts.app')

@section('title', 'Electoral - Radar Electoral 360')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="h3 mb-0">Electoral</h1>
        <p class="text-muted">Gestión de procesos y datos electorales</p>
    </div>
</div>

<!-- Statistics -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Mesas Electorales</h6>
                        <h2 class="mb-0 text-primary">1,234</h2>
                    </div>
                    <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                        <span class="material-icons text-primary" style="font-size: 32px;">how_to_vote</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Votantes Registrados</h6>
                        <h2 class="mb-0 text-success">456,789</h2>
                    </div>
                    <div class="bg-success bg-opacity-10 rounded-circle p-3">
                        <span class="material-icons text-success" style="font-size: 32px;">people</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Participación</h6>
                        <h2 class="mb-0 text-info">78.5%</h2>
                    </div>
                    <div class="bg-info bg-opacity-10 rounded-circle p-3">
                        <span class="material-icons text-info" style="font-size: 32px;">bar_chart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Candidatos</h6>
                        <h2 class="mb-0 text-warning">45</h2>
                    </div>
                    <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                        <span class="material-icons text-warning" style="font-size: 32px;">person</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Actions -->
<div class="row mb-4">
    <div class="col-12">
        <button class="btn btn-primary">
            <span class="material-icons-outlined me-1" style="font-size: 18px; vertical-align: middle;">add</span>
            Nuevo Proceso Electoral
        </button>
        <button class="btn btn-outline-primary">
            <span class="material-icons-outlined me-1" style="font-size: 18px; vertical-align: middle;">upload</span>
            Importar Datos
        </button>
        <button class="btn btn-outline-secondary">
            <span class="material-icons-outlined me-1" style="font-size: 18px; vertical-align: middle;">download</span>
            Exportar Reporte
        </button>
    </div>
</div>

<!-- Electoral Data -->
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-transparent border-0 py-3">
                <h5 class="mb-0 fw-semibold">
                    <span class="material-icons-outlined me-2" style="font-size: 24px; vertical-align: middle;">bar_chart</span>
                    Resultados por Región
                </h5>
            </div>
            <div class="card-body">
                <div style="height: 300px; position: relative;">
                    <canvas id="electoralChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-transparent border-0 py-3">
                <h5 class="mb-0 fw-semibold">
                    <span class="material-icons-outlined me-2" style="font-size: 24px; vertical-align: middle;">emoji_events</span>
                    Top Candidatos
                </h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item border-0 px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Juan Pérez</h6>
                                <small class="text-muted">Partido A</small>
                            </div>
                            <div class="text-end">
                                <strong class="text-primary">45.2%</strong>
                                <div class="progress mt-1" style="height: 4px; width: 60px;">
                                    <div class="progress-bar bg-primary" style="width: 45.2%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item border-0 px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">María García</h6>
                                <small class="text-muted">Partido B</small>
                            </div>
                            <div class="text-end">
                                <strong class="text-success">32.8%</strong>
                                <div class="progress mt-1" style="height: 4px; width: 60px;">
                                    <div class="progress-bar bg-success" style="width: 32.8%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item border-0 px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Carlos López</h6>
                                <small class="text-muted">Partido C</small>
                            </div>
                            <div class="text-end">
                                <strong class="text-info">22.0%</strong>
                                <div class="progress mt-1" style="height: 4px; width: 60px;">
                                    <div class="progress-bar bg-info" style="width: 22.0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-2">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-transparent border-0 py-3">
                <h5 class="mb-0 fw-semibold">
                    <span class="material-icons-outlined me-2" style="font-size: 24px; vertical-align: middle;">how_to_vote</span>
                    Procesos Electorales
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Proceso</th>
                                <th>Tipo</th>
                                <th>Fecha</th>
                                <th>Mesas</th>
                                <th>Votantes</th>
                                <th>Participación</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Elecciones Generales 2024</td>
                                <td><span class="badge bg-primary">General</span></td>
                                <td>15/01/2024</td>
                                <td>1,234</td>
                                <td>456,789</td>
                                <td>78.5%</td>
                                <td><span class="badge bg-success">Finalizado</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" title="Ver Detalles">
                                        <span class="material-icons-outlined" style="font-size: 18px;">visibility</span>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary" title="Editar">
                                        <span class="material-icons-outlined" style="font-size: 18px;">edit</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Elecciones Municipales 2024</td>
                                <td><span class="badge bg-info">Municipal</span></td>
                                <td>20/02/2024</td>
                                <td>856</td>
                                <td>234,567</td>
                                <td>-</td>
                                <td><span class="badge bg-warning">Programado</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" title="Ver Detalles">
                                        <span class="material-icons-outlined" style="font-size: 18px;">visibility</span>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary" title="Editar">
                                        <span class="material-icons-outlined" style="font-size: 18px;">edit</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    // Convert hex to RGB
    function hexToRgba(hex) {
        const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : {r: 103, g: 80, b: 164};
    }

    // Get theme colors from CSS variables
    function getThemeColors() {
        const root = getComputedStyle(document.documentElement);
        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        return {
            text: root.getPropertyValue('--color-text-primary').trim() || (isDark ? '#F1F5F9' : '#212B36'),
            grid: root.getPropertyValue('--color-border').trim() || (isDark ? '#334155' : '#E5E8EB'),
            primary: root.getPropertyValue('--color-primary').trim() || '#1D4E89',
            primaryLight: root.getPropertyValue('--color-primary-light').trim() || '#3E7CC4',
            secondary: root.getPropertyValue('--color-secondary').trim() || '#F9B233',
            success: root.getPropertyValue('--color-success').trim() || '#28A745',
            info: root.getPropertyValue('--color-info').trim() || '#17A2B8',
            warning: root.getPropertyValue('--color-warning').trim() || '#FFC107',
            accent: root.getPropertyValue('--color-accent').trim() || '#D72638'
        };
    }

    const ctx = document.getElementById('electoralChart');
    let electoralChart = null;
    if (ctx) {
        const colors = getThemeColors();
        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        const primaryRgb = hexToRgba(colors.primary);
        const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, `rgba(${primaryRgb.r}, ${primaryRgb.g}, ${primaryRgb.b}, 0.8)`);
        gradient.addColorStop(1, `rgba(${primaryRgb.r}, ${primaryRgb.g}, ${primaryRgb.b}, 0.4)`);

        electoralChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Norte', 'Sur', 'Este', 'Oeste', 'Centro'],
                datasets: [{
                    label: 'Votos',
                    data: [120000, 95000, 85000, 78000, 65000],
                    backgroundColor: gradient,
                    borderColor: colors.primary,
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: isDark ? 'rgba(30, 41, 59, 0.95)' : 'rgba(255, 255, 255, 0.95)',
                        titleColor: colors.text,
                        bodyColor: colors.text,
                        borderColor: colors.primary,
                        borderWidth: 1,
                        padding: 12,
                        cornerRadius: 8,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return 'Votos: ' + context.parsed.y.toLocaleString('es-ES');
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: colors.grid,
                            drawBorder: false
                        },
                        ticks: {
                            color: colors.text,
                            font: {
                                size: 12
                            },
                            callback: function(value) {
                                return value.toLocaleString('es-ES');
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            color: colors.text,
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });

        // Listen for theme changes
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'data-theme') {
                    const colors = getThemeColors();
                    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
                    const primaryRgb = hexToRgba(colors.primary);
                    const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 400);
                    gradient.addColorStop(0, `rgba(${primaryRgb.r}, ${primaryRgb.g}, ${primaryRgb.b}, 0.8)`);
                    gradient.addColorStop(1, `rgba(${primaryRgb.r}, ${primaryRgb.g}, ${primaryRgb.b}, 0.4)`);
                    
                    electoralChart.data.datasets[0].backgroundColor = gradient;
                    electoralChart.data.datasets[0].borderColor = colors.primary;
                    electoralChart.options.scales.y.grid.color = colors.grid;
                    electoralChart.options.scales.y.ticks.color = colors.text;
                    electoralChart.options.scales.x.ticks.color = colors.text;
                    const tooltipBg = isDark ? 'rgba(30, 41, 59, 0.95)' : 'rgba(255, 255, 255, 0.95)';
                    electoralChart.options.plugins.tooltip.backgroundColor = tooltipBg;
                    electoralChart.options.plugins.tooltip.titleColor = colors.text;
                    electoralChart.options.plugins.tooltip.bodyColor = colors.text;
                    electoralChart.update('none');
                }
            });
        });

        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['data-theme']
        });
    }
</script>
@endpush

