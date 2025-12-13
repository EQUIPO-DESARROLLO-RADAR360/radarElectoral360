@extends('layouts.app')

@section('title', 'Gestión - Radar Electoral 360')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="h3 mb-0">Gestión</h1>
        <p class="text-muted">Administración de registros y usuarios</p>
    </div>
</div>

<!-- Filters -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Tipo de Registro</label>
                <select class="form-select">
                    <option>Todos</option>
                    <option>Electores</option>
                    <option>Ciudadanos</option>
                    <option>Afiliados</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Estado</label>
                <select class="form-select">
                    <option>Todos</option>
                    <option>Activo</option>
                    <option>Inactivo</option>
                    <option>Pendiente</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Fecha Desde</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Fecha Hasta</label>
                <input type="date" class="form-control">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <button class="btn btn-primary">
                    <span class="material-icons-outlined me-1" style="font-size: 18px; vertical-align: middle;">search</span>
                    Buscar
                </button>
                <button class="btn btn-outline-secondary">
                    <span class="material-icons-outlined me-1" style="font-size: 18px; vertical-align: middle;">refresh</span>
                    Limpiar
                </button>
                <button class="btn btn-success float-end">
                    <span class="material-icons-outlined me-1" style="font-size: 18px; vertical-align: middle;">add</span>
                    Nuevo Registro
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Table -->
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 py-3">
        <h5 class="mb-0">Lista de Registros</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Completo</th>
                        <th>DNI</th>
                        <th>Tipo</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Fecha Registro</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#001</td>
                        <td>Juan Pérez García</td>
                        <td>12345678</td>
                        <td><span class="badge bg-primary">Elector</span></td>
                        <td>juan.perez@example.com</td>
                        <td>987654321</td>
                        <td>2024-01-15</td>
                        <td><span class="badge bg-success">Activo</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" title="Editar">
                                <span class="material-icons-outlined" style="font-size: 18px;">edit</span>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="Eliminar">
                                <span class="material-icons-outlined" style="font-size: 18px;">delete</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#002</td>
                        <td>María García López</td>
                        <td>87654321</td>
                        <td><span class="badge bg-success">Ciudadano</span></td>
                        <td>maria.garcia@example.com</td>
                        <td>987654322</td>
                        <td>2024-01-14</td>
                        <td><span class="badge bg-success">Activo</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" title="Editar">
                                <span class="material-icons-outlined" style="font-size: 18px;">edit</span>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="Eliminar">
                                <span class="material-icons-outlined" style="font-size: 18px;">delete</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#003</td>
                        <td>Carlos López Martínez</td>
                        <td>11223344</td>
                        <td><span class="badge bg-info">Afiliado</span></td>
                        <td>carlos.lopez@example.com</td>
                        <td>987654323</td>
                        <td>2024-01-13</td>
                        <td><span class="badge bg-warning">Pendiente</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" title="Editar">
                                <span class="material-icons-outlined" style="font-size: 18px;">edit</span>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="Eliminar">
                                <span class="material-icons-outlined" style="font-size: 18px;">delete</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mt-3">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Anterior</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Siguiente</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection


