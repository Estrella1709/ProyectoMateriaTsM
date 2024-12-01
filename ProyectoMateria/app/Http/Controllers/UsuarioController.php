<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\validarRegistro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class UsuarioController extends Controller
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

        $addUsuario = new usuario();
        
        $addUsuario->nombre=$request->input('nombreRegistro');
        $addUsuario->apellido=$request->input('apRegistro');
        $addUsuario->email=$request->input('mailRegistro');
        $addUsuario->telefono=$request->input('telRegistro');
        $addUsuario->password=bcrypt($request->input('pwdRegistro'));

        $addUsuario->save();

        session()->flash('exito', 'Excelente!, estamos a unos pasos de completar tu registro, ' . $request->input('nombreRegistro'));
        return to_route('rutaValidacionRegistro');
    }

    /**
     * Display the specified resource.
     */
    public function show(usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuario $usuario)
    {
        //
    }
}
