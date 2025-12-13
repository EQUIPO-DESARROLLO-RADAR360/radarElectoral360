@extends('layouts.app')

@section('title', 'Configuración - Radar Electoral 360')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="h3 mb-0">Configuración</h1>
        <p class="text-muted">Ajustes del sistema</p>
    </div>
</div>

<div class="row g-4">
    <!-- General Settings -->
    <div class="col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0">
                    <span class="material-icons-outlined me-2" style="font-size: 24px; vertical-align: middle;">settings</span>
                    Configuración General
                </h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="nombreSistema" class="form-label">Nombre del Sistema</label>
                        <input type="text" class="form-control" id="nombreSistema" value="Radar Electoral 360">
                    </div>
                    <div class="mb-3">
                        <label for="emailSistema" class="form-label">Email del Sistema</label>
                        <input type="email" class="form-control" id="emailSistema" value="sistema@radar360.com">
                    </div>
                    <div class="mb-3">
                        <label for="telefonoSistema" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefonoSistema" value="+1 234 567 890">
                    </div>
                    <div class="mb-3">
                        <label for="zonaHoraria" class="form-label">Zona Horaria</label>
                        <select class="form-select" id="zonaHoraria">
                            <option selected>America/Lima (GMT-5)</option>
                            <option>America/Mexico_City (GMT-6)</option>
                            <option>America/Bogota (GMT-5)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <span class="material-icons-outlined me-1" style="font-size: 18px; vertical-align: middle;">save</span>
                        Guardar Cambios
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Notification Settings -->
    <div class="col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0">
                    <span class="material-icons-outlined me-2" style="font-size: 24px; vertical-align: middle;">notifications</span>
                    Notificaciones
                </h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="notifEmail" checked>
                        <label class="form-check-label" for="notifEmail">
                            Notificaciones por Email
                        </label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="notifSMS" checked>
                        <label class="form-check-label" for="notifSMS">
                            Notificaciones por SMS
                        </label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="notifPush">
                        <label class="form-check-label" for="notifPush">
                            Notificaciones Push
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="frecuenciaNotif" class="form-label">Frecuencia de Notificaciones</label>
                        <select class="form-select" id="frecuenciaNotif">
                            <option selected>Diaria</option>
                            <option>Semanal</option>
                            <option>Mensual</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <span class="material-icons-outlined me-1" style="font-size: 18px; vertical-align: middle;">save</span>
                        Guardar Cambios
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Security Settings -->
    <div class="col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0">
                    <span class="material-icons-outlined me-2" style="font-size: 24px; vertical-align: middle;">security</span>
                    Seguridad
                </h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="passwordActual" class="form-label">Contraseña Actual</label>
                        <input type="password" class="form-control" id="passwordActual">
                    </div>
                    <div class="mb-3">
                        <label for="passwordNueva" class="form-label">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="passwordNueva">
                    </div>
                    <div class="mb-3">
                        <label for="passwordConfirmar" class="form-label">Confirmar Nueva Contraseña</label>
                        <input type="password" class="form-control" id="passwordConfirmar">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="autenticacion2FA">
                        <label class="form-check-label" for="autenticacion2FA">
                            Autenticación de Dos Factores (2FA)
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <span class="material-icons-outlined me-1" style="font-size: 18px; vertical-align: middle;">save</span>
                        Actualizar Contraseña
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Appearance Settings -->
    <div class="col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0">
                    <span class="material-icons-outlined me-2" style="font-size: 24px; vertical-align: middle;">palette</span>
                    Apariencia
                </h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="tema" class="form-label">Tema</label>
                        <select class="form-select" id="tema">
                            <option value="light">Claro</option>
                            <option value="dark">Oscuro</option>
                            <option value="auto">Automático</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="idioma" class="form-label">Idioma</label>
                        <select class="form-select" id="idioma">
                            <option selected>Español</option>
                            <option>English</option>
                            <option>Português</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="density" class="form-label">Densidad de Interfaz</label>
                        <select class="form-select" id="density">
                            <option selected>Comfortable</option>
                            <option>Compact</option>
                            <option>Spacious</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <span class="material-icons-outlined me-1" style="font-size: 18px; vertical-align: middle;">save</span>
                        Guardar Cambios
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


