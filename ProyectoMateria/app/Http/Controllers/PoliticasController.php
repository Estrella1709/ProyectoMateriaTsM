<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PoliticasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todos los registros de la tabla 'politicas'
        $politicas = DB::table('politicas')->get();

        // Pasa los datos a la vista
        return view('politicas', ['politicas' => $politicas]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $politica = new politica();

        $politica->descripcion=$request->input('descripoli');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) 
    {
        $politica = DB::table('politicas')->where('id_politica', $id)->first();

        if (!$politica) {
            abort(404, 'Política no encontrada');
        }

        return view('editarpoliticas', compact('politica'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'txtpoliticas' => 'required', 
        ]);
    
        DB::table('politicas')
            ->where('id_politica', 1)
            ->update(['descripcion' => $request->input('txtpoliticas')]);
    
        return redirect()->route('rutaPoliticas')->with('exito', 'La política ha sido actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
