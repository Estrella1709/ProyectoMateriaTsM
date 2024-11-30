<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\validarRegistro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Inserta y obtiene el id del usuario
        $userId = DB::table('usuarios')->insertGetId([
            'nombre' => $request->input('nombreRegistro'),
            'apellido' => $request->input('apRegistro'),
            'email' => $request->input('mailRegistro'),
            'telefono' => $request->input('telRegistro'),
            'password' => bcrypt($request->input('pwdRegistro')),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        // Info del usuario recien registrado
        $usuario=DB::table('usuarios')->where('id_usuarios', $userId)->first();

        // Inicia la sesion de nuestro usuario
        Auth::loginUsingId($userId);

        event(new Registered($usuario));

        session()->flash('exito', 'Excelente!, estamos a unos pasos de completar tu registro, usuario: ' . $request->input('nombreRegistro'));
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

    public function verifyNotice() {
        return view('validacionRegistro');
    }

    public function verifyEmail(EmailVerificationRequest $request) {
        $request->fulfill();
     
        return redirect('/vuelos');
    }

    public function verifyHandler(Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return to_route('validacionRegistro')->with('message', 'Verification link sent!');
    }
}
