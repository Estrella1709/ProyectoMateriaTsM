<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use Illuminate\Support\Facades\Auth;

class ReportesController extends Controller
{
    public function create()
    {
        return view('agregarReporte');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_reporte' => 'required|in:vuelos,hoteles,clientes',
            'titulo_reporte' => 'required|max:255',
            'contenido_reporte' => 'required'
        ]);

        $reporte = new Reporte();
        $reporte->id_usuario = Auth::id();
        $reporte->tipo_reporte = $request->tipo_reporte;
        $reporte->estado_reporte = 'pendiente';
        $reporte->titulo_reporte = $request->titulo_reporte;
        $reporte->contenido_reporte = $request->contenido_reporte;
        $reporte->save();

        return redirect()->back()->with('exito', 'Reporte generado exitosamente');
    }
}
