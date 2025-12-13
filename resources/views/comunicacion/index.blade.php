@extends('layouts.app')

@section('title', 'Comunicación - Radar Electoral 360')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="h3 mb-0">Comunicación</h1>
        <p class="text-muted">Gestión de campañas y mensajes</p>
    </div>
</div>

<!-- Statistics -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Campañas Activas</h6>
                        <h2 class="mb-0 text-primary">12</h2>
                    </div>
                    <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                        <span class="material-icons text-primary" style="font-size: 32px;">campaign</span>
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
                        <h6 class="text-muted mb-2">Mensajes Enviados</h6>
                        <h2 class="mb-0 text-success">45,678</h2>
                    </div>
                    <div class="bg-success bg-opacity-10 rounded-circle p-3">
                        <span class="material-icons text-success" style="font-size: 32px;">send</span>
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
                        <h6 class="text-muted mb-2">Tasa de Apertura</h6>
                        <h2 class="mb-0 text-info">68.5%</h2>
                    </div>
                    <div class="bg-info bg-opacity-10 rounded-circle p-3">
                        <span class="material-icons text-info" style="font-size: 32px;">visibility</span>
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
                        <h6 class="text-muted mb-2">Tasa de Clics</h6>
                        <h2 class="mb-0 text-warning">12.3%</h2>
                    </div>
                    <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                        <span class="material-icons text-warning" style="font-size: 32px;">touch_app</span>
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
            Nueva Campaña
        </button>
        <button class="btn btn-outline-primary">
            <span class="material-icons-outlined me-1" style="font-size: 18px; vertical-align: middle;">email</span>
            Enviar Mensaje
        </button>
        <button class="btn btn-outline-secondary">
            <span class="material-icons-outlined me-1" style="font-size: 18px; vertical-align: middle;">schedule</span>
            Programar Mensaje
        </button>
    </div>
</div>

<!-- Campaigns -->
<div class="row g-4">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0">Campañas de Comunicación</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Destinatarios</th>
                                <th>Enviados</th>
                                <th>Apertura</th>
                                <th>Clics</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Campaña de Bienvenida</td>
                                <td><span class="badge bg-primary">Email</span></td>
                                <td>5,000</td>
                                <td>4,987</td>
                                <td>3,456 (69.2%)</td>
                                <td>567 (11.4%)</td>
                                <td><span class="badge bg-success">Activa</span></td>
                                <td>15/01/2024</td>
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
                                <td>Recordatorio de Votación</td>
                                <td><span class="badge bg-success">SMS</span></td>
                                <td>8,000</td>
                                <td>7,923</td>
                                <td>N/A</td>
                                <td>1,234 (15.6%)</td>
                                <td><span class="badge bg-success">Activa</span></td>
                                <td>14/01/2024</td>
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
                                <td>Información Electoral</td>
                                <td><span class="badge bg-info">Push</span></td>
                                <td>12,000</td>
                                <td>11,876</td>
                                <td>8,234 (69.4%)</td>
                                <td>2,345 (19.8%)</td>
                                <td><span class="badge bg-warning">Pausada</span></td>
                                <td>13/01/2024</td>
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


