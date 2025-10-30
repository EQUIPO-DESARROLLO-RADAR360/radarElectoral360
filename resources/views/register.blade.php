<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Electores</title>
</head>
<body>

    <h1>Registro de Electores</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="/register" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" required><br><br>

        <button type="submit">Registrar</button>
    </form>

</body>
</html>
