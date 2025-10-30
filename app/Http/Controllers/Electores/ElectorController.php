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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:electores,email',
            'dni' => 'required|unique:electores,dni',
        ]);

        // Crear el nuevo elector
        $elector = Electores::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'dni' => $validated['dni'],
        ]);

        // Redirigir después de guardar el elector
        return redirect()->route('electores.create')->with('success', 'Registro exitoso');
    }
}
