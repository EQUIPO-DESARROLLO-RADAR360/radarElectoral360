@extends('layouts.app')

@section('title', 'Encuestas - Radar Electoral 360')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="h3 mb-0">Encuestas</h1>
        <p class="text-muted">Gestión de encuestas y sondeos</p>
    </div>
</div>

<!-- Statistics -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Encuestas</h6>
                        <h2 class="mb-0 text-primary">45</h2>
                    </div>
                    <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                        <span class="material-icons text-primary" style="font-size: 32px;">poll</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Activas</h6>
                        <h2 class="mb-0 text-success">28</h2>
                    </div>
                    <div class="bg-success bg-opacity-10 rounded-circle p-3">
                        <span class="material-icons text-success" style="font-size: 32px;">check_circle</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Respuestas</h6>
                        <h2 class="mb-0 text-info">12,456</h2>
                    </div>
                    <div class="bg-info bg-opacity-10 rounded-circle p-3">
                        <span class="material-icons text-info" style="font-size: 32px;">how_to_vote</span>
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
            Nueva Encuesta
        </button>
        <button class="btn btn-outline-secondary">
            <span class="material-icons-outlined me-1" style="font-size: 18px; vertical-align: middle;">download</span>
            Exportar Datos
        </button>
    </div>
</div>

<!-- Encuestas List -->
<div class="row g-4">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h5 class="card-title mb-1">Encuesta de Satisfacción</h5>
                        <span class="badge bg-success">Activa</span>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-link" type="button" data-bs-toggle="dropdown">
                            <span class="material-icons-outlined">more_vert</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><span class="material-icons-outlined me-2" style="font-size: 18px;">edit</span>Editar</a></li>
                            <li><a class="dropdown-item" href="#"><span class="material-icons-outlined me-2" style="font-size: 18px;">visibility</span>Ver Resultados</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><span class="material-icons-outlined me-2" style="font-size: 18px;">delete</span>Eliminar</a></li>
                        </ul>
                    </div>
                </div>
                <p class="text-muted small mb-3">Encuesta sobre satisfacción ciudadana con los servicios públicos.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Respuestas: <strong>1,234</strong></small>
                    </div>
                    <div>
                        <small class="text-muted">Fecha: 15/01/2024</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h5 class="card-title mb-1">Preferencias Electorales</h5>
                        <span class="badge bg-success">Activa</span>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-link" type="button" data-bs-toggle="dropdown">
                            <span class="material-icons-outlined">more_vert</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><span class="material-icons-outlined me-2" style="font-size: 18px;">edit</span>Editar</a></li>
                            <li><a class="dropdown-item" href="#"><span class="material-icons-outlined me-2" style="font-size: 18px;">visibility</span>Ver Resultados</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><span class="material-icons-outlined me-2" style="font-size: 18px;">delete</span>Eliminar</a></li>
                        </ul>
                    </div>
                </div>
                <p class="text-muted small mb-3">Sondeo sobre preferencias políticas y candidatos.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Respuestas: <strong>2,456</strong></small>
                    </div>
                    <div>
                        <small class="text-muted">Fecha: 14/01/2024</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h5 class="card-title mb-1">Opinión sobre Propuestas</h5>
                        <span class="badge bg-warning">Pendiente</span>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-link" type="button" data-bs-toggle="dropdown">
                            <span class="material-icons-outlined">more_vert</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><span class="material-icons-outlined me-2" style="font-size: 18px;">edit</span>Editar</a></li>
                            <li><a class="dropdown-item" href="#"><span class="material-icons-outlined me-2" style="font-size: 18px;">visibility</span>Ver Resultados</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><span class="material-icons-outlined me-2" style="font-size: 18px;">delete</span>Eliminar</a></li>
                        </ul>
                    </div>
                </div>
                <p class="text-muted small mb-3">Encuesta sobre opinión ciudadana respecto a nuevas propuestas.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Respuestas: <strong>567</strong></small>
                    </div>
                    <div>
                        <small class="text-muted">Fecha: 13/01/2024</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


