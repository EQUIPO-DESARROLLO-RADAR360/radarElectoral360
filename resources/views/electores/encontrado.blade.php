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

      <div class="card">

        <!-- Success-->
        <div id="step1" class="step active">
          <div class="step-header color-fuerte">
            <div class="padding-20">
              <i class="bi bi-check-circle icon"></i>
              <h3>Gracias por participar</h3>
              <h4>"{{ $nombre }}"</h2>
            </div>
            <div class="row">
              <span class="">Lugar y fecha</i></span>
              <div class="col-12">
                <span><i class="bi bi-calendar"> Sábado 8 de noviembre</i></span>
              </div>
              <div class="col-12">
                <span><i class="bi bi-geo-alt"> Plaza 9 de octubre</i></span>
              </div>
            </div>
          </div>
          <div class="step-content">

          <div class="row text-center color-fuerte">
            <div class="col-12">
              <span> Número de ticked</i></span>
            </div>
            <div class="col-12">
              <span class="form-control color-ticked"> {{ $ticket }}</i></span>
            </div>
          </div>

          <a href="{{ route('electores.create') }}" class="btn btn-custom w-100 mt-3">
              <span id="nextBtnText">Ir a inicio</span>
          </a>

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
