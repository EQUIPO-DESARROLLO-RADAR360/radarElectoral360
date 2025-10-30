<?php

namespace App\Http\Controllers\Electores;

use App\Http\Controllers\Controller;
use App\Models\Electores;
use Illuminate\Http\Request;

class ElectorController extends Controller
{
    // Muestra el formulario de registro
    public function create()
    {
        return view('electores.register'); // Vista que debes crear en resources/views/electores/register.blade.php
    }

    // Guarda los datos del registro
    public function store(Request $request)
    {
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
            'ocupacion' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'bingoCode' => 'required|string|max:255',
            'terms' => 'accepted',
        ]);

        // Convertir el valor de "terms" a un booleano
        $termsAccepted = $request->has('terms') ? 1 : 0;

        // Crear el nuevo elector
        $elector = Electores::create([
            'dni' => $validated['dni'],
            'nombres' => $validated['nombre'],
            'apellidP' => $validated['apellidoPaterno'],
            'apellidoM' => $validated['apellidoMaterno'],
            'region' => $validated['region'],
            'provincia' => $validated['provincia'],
            'distrito' => $validated['distrito'],
            'direccion' => $validated['direccion'],
            'ocupacion' => $validated['ocupacion'],
            'whatsapp' => $validated['whatsapp'],
            'ticked' => $validated['bingoCode'],
            'terms_accepted' => $termsAccepted,
        ]);

        // Redirigir después de guardar el elector
        return redirect()->route('electores.success', ['nombre' => $validated['nombre']])
        ->with('success', 'Registro exitoso');
        //return $request;
    }

    public function success($nombre)
    {
        return view('electores.success', compact('nombre'));
    }
}
