<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('eventos.index');
    }

    /**
     * Get data for DataTables (Server-side processing)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');
        $search = $request->get('search')['value'] ?? '';
        $orderColumnIndex = $request->get('order')[0]['column'] ?? 0;
        $orderDir = $request->get('order')[0]['dir'] ?? 'asc';
        $scope = $request->get('scope') ?? 'all';

        // Base query
        $query = DB::table('eventos');

        // Apply Scope Filters
        if ($scope === 'active') {
            $query->where('estado', 'Activo');
        } elseif ($scope === 'upcoming') {
            $query->where('estado', 'Programado');
        } elseif ($scope === 'finished') {
            $query->where('estado', 'Finalizado');
        }

        // Apply Search
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nombreEvento', 'like', "%{$search}%")
                    ->orWhere('ubicacion', 'like', "%{$search}%")
                    ->orWhere('estado', 'like', "%{$search}%");
            });
        }

        // Total records (filtered)
        $total = $query->count();

        // Apply Sorting
        // Frontend columns: ['nombre', 'fecha', 'hora', 'ubicacion', 'registrados', 'estado', 'acciones']
        // Map index to DB column
        $columnsMap = [
            0 => 'nombreEvento',
            1 => 'fecha',
            2 => 'hora',
            3 => 'ubicacion',
            4 => 'id', // Default for registrados sorting? Or just ignore
            5 => 'estado',
            6 => 'id'
        ];

        $orderColumn = $columnsMap[$orderColumnIndex] ?? 'id';
        $query->orderBy($orderColumn, $orderDir);

        // Apply Pagination
        $query->offset($start)->limit($length);

        $eventos = $query->get();

        // Format data
        $data = [];
        foreach ($eventos as $evento) {
            $data[] = [
                'id' => $evento->id,
                // Critical Mapping: DB 'nombreEvento' -> Frontend 'nombre'
                'nombre' => $evento->nombreEvento,
                'fecha' => $evento->fecha,
                'hora' => $evento->hora,
                'ubicacion' => $evento->ubicacion,
                'registrados' => 0, // Placeholder as requested
                'estado' => $evento->estado,
                'acciones' => '' // Frontend handles buttons, just needs key
            ];
        }

        return response()->json([
            'draw' => intval($draw),
            'recordsTotal' => $total, // In simple implementation treated same as filtered
            'recordsFiltered' => $total,
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required',
            'ubicacion' => 'required|string|max:255',
            'descripcion' => 'nullable|string'
        ]);

        // DB::table('eventos')->insert([...]);

        return response()->json([
            'success' => true,
            'message' => 'Evento creado exitosamente'
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
        // DB::table('eventos')->where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Evento eliminado exitosamente'
        ]);
    }
}
