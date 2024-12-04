<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use Illuminate\Support\Facades\Auth;

class ReportesController extends Controller
{

    public function index(Request $request)  
    {
        $query = Reporte::with('usuario');
        
        if ($request->has('filter')) {
            $query->where('tipo_reporte', $request->filter);
        }
        
        $reportes = $query->paginate(10);
        return view('crudReportes', compact('reportes')); 
    }

    public function show(Reporte $reporte)
    {
        return view('reporte', compact('reporte'));
    }

    public function edit(Reporte $reporte)
    {
        return view('editarReporte', compact('reporte'));
    }

    public function create()
    {
        return view('agregarReporte');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_reporte' => 'required|in:vuelos,hoteles,clientes',
            'titulo_reporte' => 'required|max:255',
            'contenido_reporte' => 'required'
        ]);

        $reporte = new Reporte();
        $reporte->tipo_reporte = $validated['tipo_reporte'];
        $reporte->estado_reporte = 'pendiente';
        $reporte->titulo_reporte = $validated['titulo_reporte'];
        $reporte->contenido_reporte = $validated['contenido_reporte'];
        $reporte->save();

        return redirect()->back()->with('exito', 'Reporte generado exitosamente');
    }

    public function update(Request $request, Reporte $reporte)
    {
        $validated = $request->validate([
            'tipo_reporte' => 'required|in:vuelos,hoteles,clientes',
            'estado_reporte' => 'required|in:pendiente,resuelto',
            'titulo_reporte' => 'required|max:255',
            'contenido_reporte' => 'required'
        ]);

        $reporte->update($validated);
        return redirect()->route('reportes.index')->with('success', 'Reporte actualizado exitosamente');
    }

    public function destroy(Reporte $reporte)
    {
        $reporte->delete();
        return redirect()->route('reportes.index')->with('success', 'Reporte eliminado exitosamente');
    } 
}

