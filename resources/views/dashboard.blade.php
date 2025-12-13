@extends('layouts.app')

@section('title', 'Dashboard - Radar Electoral 360')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="h3 mb-0">Dashboard</h1>
        <p class="text-muted">Vista general del sistema</p>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div class="flex-grow-1">
                    <div class="stat-card-label">Total Electores</div>
                    <div class="stat-card-value text-primary">12,345</div>
                    <div class="stat-card-change positive">
                        <span class="material-symbols-rounded" style="font-size: 16px;">trending_up</span>
                        +12.5%
                    </div>
                </div>
                <div class="stat-card-icon" style="background: rgba(29, 78, 137, 0.1); color: var(--color-primary);">
                    <span class="material-symbols-rounded">people</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div class="flex-grow-1">
                    <div class="stat-card-label">Ciudadanos</div>
                    <div class="stat-card-value text-success">8,234</div>
                    <div class="stat-card-change positive">
                        <span class="material-symbols-rounded" style="font-size: 16px;">trending_up</span>
                        +8.2%
                    </div>
                </div>
                <div class="stat-card-icon" style="background: rgba(40, 167, 69, 0.1); color: var(--color-success);">
                    <span class="material-symbols-rounded">person</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div class="flex-grow-1">
                    <div class="stat-card-label">Afiliados</div>
                    <div class="stat-card-value" style="color: var(--color-info);">5,678</div>
                    <div class="stat-card-change positive">
                        <span class="material-symbols-rounded" style="font-size: 16px;">trending_up</span>
                        +5.1%
                    </div>
                </div>
                <div class="stat-card-icon" style="background: rgba(23, 162, 184, 0.1); color: var(--color-info);">
                    <span class="material-symbols-rounded">groups</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div class="flex-grow-1">
                    <div class="stat-card-label">Eventos</div>
                    <div class="stat-card-value text-warning">234</div>
                    <div class="stat-card-change positive">
                        <span class="material-symbols-rounded" style="font-size: 16px;">trending_up</span>
                        +3.4%
                    </div>
                </div>
                <div class="stat-card-icon" style="background: rgba(255, 193, 7, 0.1); color: var(--color-warning);">
                    <span class="material-symbols-rounded">event</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts and Tables -->
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-transparent border-0 py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold">
                    <span class="material-icons-outlined me-2" style="font-size: 24px; vertical-align: middle;">show_chart</span>
                    Actividad Reciente
                </h5>
            </div>
            <div class="card-body">
                <div style="height: 300px; position: relative;">
                    <canvas id="activityChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-transparent border-0 py-3">
                <h5 class="mb-0 fw-semibold">
                    <span class="material-icons-outlined me-2" style="font-size: 24px; vertical-align: middle;">pie_chart</span>
                    Distribución por Región
                </h5>
            </div>
            <div class="card-body">
                <div style="height: 300px; position: relative;">
                    <canvas id="regionChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-2">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-transparent border-0 py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold">
                    <span class="material-icons-outlined me-2" style="font-size: 24px; vertical-align: middle;">list_alt</span>
                    Registros Recientes
                </h5>
                <a href="{{ route('gestion.index') }}" class="btn btn-sm btn-primary">
                    Ver todos
                    <span class="material-icons-outlined" style="font-size: 18px; vertical-align: middle;">arrow_forward</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Tipo</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#001</td>
                                <td>Juan Pérez</td>
                                <td>12345678</td>
                                <td><span class="badge bg-primary">Elector</span></td>
                                <td>2024-01-15</td>
                                <td><span class="badge bg-success">Activo</span></td>
                            </tr>
                            <tr>
                                <td>#002</td>
                                <td>María García</td>
                                <td>87654321</td>
                                <td><span class="badge bg-success">Ciudadano</span></td>
                                <td>2024-01-14</td>
                                <td><span class="badge bg-success">Activo</span></td>
                            </tr>
                            <tr>
                                <td>#003</td>
                                <td>Carlos López</td>
                                <td>11223344</td>
                                <td><span class="badge bg-info">Afiliado</span></td>
                                <td>2024-01-13</td>
                                <td><span class="badge bg-success">Activo</span></td>
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

    // Activity Chart with modern gradient
    const ctx1 = document.getElementById('activityChart');
    let activityChart = null;
    if (ctx1) {
        const colors = getThemeColors();
        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        const gradient = ctx1.getContext('2d').createLinearGradient(0, 0, 0, 400);
        // Convert hex to rgba
        const primaryRgb = hexToRgba(colors.primary);
        gradient.addColorStop(0, `rgba(${primaryRgb.r}, ${primaryRgb.g}, ${primaryRgb.b}, 0.3)`);
        gradient.addColorStop(1, `rgba(${primaryRgb.r}, ${primaryRgb.g}, ${primaryRgb.b}, 0.05)`);

        activityChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago'],
                datasets: [{
                    label: 'Registros',
                    data: [12, 19, 15, 25, 22, 30, 28, 35],
                    borderColor: colors.primary,
                    backgroundColor: gradient,
                    borderWidth: 3,
                    tension: 0.4,
                    fill: true,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: colors.primary,
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: colors.primary,
                    pointHoverBorderWidth: 3
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
                                return 'Registros: ' + context.parsed.y;
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
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });
    }

    // Region Chart with modern style
    const ctx2 = document.getElementById('regionChart');
    let regionChart = null;
    if (ctx2) {
        const colors = getThemeColors();
        regionChart = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Norte', 'Sur', 'Este', 'Oeste', 'Centro'],
                datasets: [{
                    data: [30, 25, 20, 15, 10],
                    backgroundColor: [
                        colors.primary,
                        colors.success,
                        colors.info,
                        colors.warning,
                        colors.secondary
                    ],
                    borderWidth: 0,
                    hoverOffset: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: colors.text,
                            padding: 15,
                            font: {
                                size: 12,
                                weight: '500'
                            },
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        backgroundColor: isDark ? 'rgba(30, 41, 59, 0.95)' : 'rgba(255, 255, 255, 0.95)',
                        titleColor: colors.text,
                        bodyColor: colors.text,
                        borderColor: colors.primary,
                        borderWidth: 1,
                        padding: 12,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((value / total) * 100).toFixed(1);
                                return label + ': ' + value + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
        });
    }

    // Listen for theme changes
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'data-theme') {
                const colors = getThemeColors();
                const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
                
                // Update activity chart
                if (activityChart) {
                    const gradient = ctx1.getContext('2d').createLinearGradient(0, 0, 0, 400);
                    const primaryRgb = hexToRgba(colors.primary);
                    gradient.addColorStop(0, `rgba(${primaryRgb.r}, ${primaryRgb.g}, ${primaryRgb.b}, 0.3)`);
                    gradient.addColorStop(1, `rgba(${primaryRgb.r}, ${primaryRgb.g}, ${primaryRgb.b}, 0.05)`);
                    
                    activityChart.data.datasets[0].borderColor = colors.primary;
                    activityChart.data.datasets[0].backgroundColor = gradient;
                    activityChart.data.datasets[0].pointBackgroundColor = colors.primary;
                    activityChart.options.scales.y.grid.color = colors.grid;
                    activityChart.options.scales.y.ticks.color = colors.text;
                    activityChart.options.scales.x.ticks.color = colors.text;
                    const tooltipBg = isDark ? 'rgba(30, 41, 59, 0.95)' : 'rgba(255, 255, 255, 0.95)';
                    activityChart.options.plugins.tooltip.backgroundColor = tooltipBg;
                    activityChart.options.plugins.tooltip.titleColor = colors.text;
                    activityChart.options.plugins.tooltip.bodyColor = colors.text;
                    activityChart.update('none');
                }
                
                // Update region chart
                if (regionChart) {
                    regionChart.data.datasets[0].backgroundColor = [
                        colors.primary,
                        colors.success,
                        colors.info,
                        colors.warning,
                        colors.secondary
                    ];
                    regionChart.options.plugins.legend.labels.color = colors.text;
                    const tooltipBg = isDark ? 'rgba(30, 41, 59, 0.95)' : 'rgba(255, 255, 255, 0.95)';
                    regionChart.options.plugins.tooltip.backgroundColor = tooltipBg;
                    regionChart.options.plugins.tooltip.titleColor = colors.text;
                    regionChart.options.plugins.tooltip.bodyColor = colors.text;
                    regionChart.update('none');
                }
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['data-theme']
    });
</script>
@endpush

