<?php

namespace App\Http\Controllers\Ciudadanos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ciudadanos;

class CiudadanosController extends Controller
{
    // Muestra el formulario de registro
    public function create()
    {
        return view('ciudadanos.register'); // Vista que debes crear en resources/views/electores/register.blade.php
    }

    // Guarda los datos del registro
    public function store(Request $request)
    {
        //return $request;
        // Validar los datos
        $validated = $request->validate([
            'dni' => 'required|string|max:255',    
            'nombre' => 'required|string|max:255',
            'apellidoPaterno' => 'required|string|max:255',
            'apellidoMaterno' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'distrito' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'terms' => 'accepted',
        ]);

        // Convertir el valor de "terms" a un booleano
        $termsAccepted = $request->has('terms') ? 1 : 0;

        // return $request;

        // Crear el nuevo elector
        $elector = Ciudadanos::create([
            'dni' => $validated['dni'],
            'nombres' => $validated['nombre'],
            'apellidP' => $validated['apellidoPaterno'],
            'apellidoM' => $validated['apellidoMaterno'],
            'region' => $validated['region'],
            'provincia' => $validated['provincia'],
            'distrito' => $validated['distrito'],
            'direccion' => $validated['direccion'],
            'whatsapp' => $validated['whatsapp'],
            'terms_accepted' => $termsAccepted,
        ]);

        // Redirigir después de guardar el elector, pasando nombre y ticket
        return redirect()->route('ciudadano.success', [
            'nombre' => $validated['nombre'],
            'ticked' => $validated['apellidoPaterno'],
        ]);
    }

    public function success($nombre, $ticked)
    {
        return view('ciudadanos.success', compact('nombre', 'ticked'));
    }

    public function verificarDni($dni)
    {
        $exists = Ciudadanos::where('dni', $dni)->exists(); // Verifica si el DNI ya está registrado
        return response()->json(['exists' => $exists]);
    }

    public function encontrado($dni)
    {
        // Buscar el elector por su DNI
        $elector = Ciudadanos::where('dni', $dni)->first();

        // Verificar si el elector existe
        if ($elector) {
            // Retornar vista con el nombre y el ticket
            return view('ciudadanos.encontrado', [
                'nombre' => $elector->nombres,
                'apellidP' => $elector->apellidP, // Asegúrate de que el campo "ticked" exista en tu base de datos
            ]);
        } else {
            // Si el elector no se encuentra, puedes redirigir a otra página o mostrar un mensaje de error
            return redirect()->route('ciudadanos.register');
        }
    }
}
