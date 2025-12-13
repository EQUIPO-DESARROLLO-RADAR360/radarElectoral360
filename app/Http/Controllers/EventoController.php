<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::withCount('electores')
            ->orderByDesc('fecha')
            ->orderByDesc('created_at')
            ->get();

        return view('eventos.index', compact('eventos'));
    }

    public function getData(Request $request)
    {
        $query = Evento::query()
            ->selectRaw('eventos.*, eventos.nombreEvento as nombre')
            ->withCount('electores');

        return DataTables::eloquent($query)
            ->filterColumn('nombre', function ($query, $keyword) {
                $query->where('eventos.nombreEvento', 'like', "%{$keyword}%");
            })
            ->orderColumn('nombre', function ($query, $order) {
                $query->orderBy('eventos.nombreEvento', $order);
            })
            ->editColumn('fecha', fn(Evento $evento) => optional($evento->fecha)->format('d/m/Y'))
            ->editColumn('hora', fn(Evento $evento) => $evento->hora ? date('H:i', strtotime($evento->hora)) : '—')
            ->addColumn('registrados', fn(Evento $evento) => $evento->electores_count ?? 0)
            ->editColumn('estado', fn(Evento $evento) => $evento->estado ?? 'Finalizado')
            ->addColumn('acciones', fn(Evento $evento) => view('eventos.partials.actions', compact('evento'))->render())
            // Remove 'nombre' from rawColumns if it's just text, 'acciones' needs it for HTML
            ->rawColumns(['acciones'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombreEvento' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required',
            'ubicacion' => 'required|string|max:255',
            'estado' => 'nullable|string|max:255',
        ]);

        $evento = Evento::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Evento creado exitosamente',
            'evento' => $evento
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::with(['electores'])->withCount('electores')->findOrFail($id);
        $electores = $evento->electores;

        return view('eventos.detalles', compact('evento', 'electores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);

        $validated = $request->validate([
            'nombreEvento' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required',
            'ubicacion' => 'required|string|max:255',
            'estado' => 'nullable|string|max:255',
        ]);

        $evento->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Evento actualizado exitosamente',
            'evento' => $evento
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return response()->json([
            'success' => true,
            'message' => 'Evento eliminado exitosamente'
        ]);
    }
}
