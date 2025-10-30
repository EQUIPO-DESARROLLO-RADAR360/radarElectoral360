<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro</title>
  <!-- Incluir el archivo CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="{{ asset('css/registro.css') }}" rel="stylesheet" />
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="w-100" style="max-width: 450px;">
      <div class="d-flex justify-content-between align-items-center">
        <div class="text-left"><span>Paso 1 de 3</span></div>
        <div class="text-right"><span>33%</span></div>
      </div>
      <div class="progress">
        <div class="progress-bar w-33" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

      <div class="card">
        <!-- Paso 1 -->
        <div id="step1" class="step active">
          <div class="step-header padding-20">
            <i class="bi bi-card-list icon"></i>
            <h3>Regístrate con tu DNI</h3>
            <span>Ingresa tu DNI para continuar</span>
          </div>
          <div class="step-content">
            <label class="color-fuerte padding-10">Número de DNI</label>
            <input type="text" id="dni" class="form-control" placeholder="12345678" maxlength="8" />
            <div id="dniError" class="text-danger" style="display: none;">Ingresa un DNI válido (8 dígitos).</div>
            <button id="nextBtn" class="btn btn-custom w-100 mt-3" onclick="nextStep(1)" disabled>Siguiente</button>
          </div>
        </div>

        <!-- Paso 2 -->
        <div id="step2" class="step">
          <div class="step-header">
            <i class="bi bi-person-check icon"></i>
            <h3 id="nameStep2">¿Eres Juan Pérez?</h3> <!-- El nombre será reemplazado aquí -->
            <span>Hemos encontrado este nombre con tu DNI</span>
          </div>
          <div class="step-content">
            <div class="d-flex gap-3">
              <button class="btn btn-custom w-50" onclick="confirmIdentity(true)">Sí, soy yo</button>
              <button class="btn btn-custom w-50" onclick="goBackToStep1()">No soy</button>
            </div>
            <button class="btn btn-custom w-100 mt-3" onclick="searchManually()">No encontraron mi nombre</button>
          </div>
        </div>

        <!-- Paso 3: Formulario adicional si no encuentra el DNI -->
        <div id="step3" class="step">
          <div class="step-header">
            <i class="bi bi-person-plus icon"></i>
            <h3>Completa tus datos</h3>
          </div>
          <div class="step-content">
            <input type="text" id="nombre" class="form-control mt-3" placeholder="Nombre" />
            <input type="text" id="apellidoPaterno" class="form-control mt-3" placeholder="Apellido Paterno" />
            <input type="text" id="apellidoMaterno" class="form-control mt-3" placeholder="Apellido Materno" />
            <input type="text" id="region" class="form-control mt-3" placeholder="Región" />
            <input type="text" id="provincia" class="form-control mt-3" placeholder="Provincia" />
            <input type="text" id="distrito" class="form-control mt-3" placeholder="Distrito" />
            <input type="text" id="direccion" class="form-control mt-3" placeholder="Dirección" />
            <button class="btn btn-custom w-100 mt-3" onclick="continueRegistration()">Continuar</button>
          </div>
        </div>

        <div id="step3" class="step" style="display: none;">
            <div class="step-header">
                <h3>Completa tu registro</h3>
            </div>
            <div class="step-content">
                <input type="text" id="whatsapp" class="form-control" placeholder="Ej: +51 987654321">
                <input type="text" id="bingoCode" class="form-control mt-3" placeholder="Código alfanumérico">
                <div class="form-check mt-3">
                    <input type="checkbox" id="terms" class="form-check-input">
                    <label for="terms" class="form-check-label">Acepto los términos y condiciones</label>
                </div>
                <button id="finalizeBtn" class="btn btn-custom w-100 mt-3" onclick="finalizeRegistration()" disabled>Finalizar Registro</button>
            </div>
        </div>

        <!-- Paso 4: Confirmación final -->
        <div id="step4" class="step">
          <div class="step-header">
            <i class="bi bi-check-circle icon"></i>
            <h3>¡Gracias por participar!</h3>
          </div>
          <div class="step-content text-center">
            <p>Tu número de cartón es: <strong><span id="ticketNumber"></span></strong></p>
            <button class="btn btn-custom w-100 mt-3" onclick="restart()">Volver al inicio</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Incluir el archivo JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/registro.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
