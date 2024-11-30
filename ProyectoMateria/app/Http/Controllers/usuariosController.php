<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\validarRegistro;

class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validarRegistro $request)
    {
        DB::table('usuarios')->insert([
            'nombre'=> $request->input('nombreRegistro'),
            'apellido'=> $request->input('apRegistro'),
            'email'=> $request->input('mailRegistro'),
            'telefono'=> $request->input('telRegistro'),
            'contra'=> bcrypt($request->input('pwdRegistro')),
            'two_factor'=> 0,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);

        session()->flash('exito', 'Excelente!, estamos a unos pasos de completar tu registro, usuario: '.$request->input('nombreRegistro'));
        return to_route('rutaValidacionRegistro');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
