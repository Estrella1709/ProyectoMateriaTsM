<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\validarLogin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\usuario;

class AuthController extends Controller
{
    public function login(validarLogin $request){
        
        $user = DB::table('usuarios')->where('email', $request->input('correoLogin'))->first();
        $credentials = [
            'email' => $request->input('correoLogin'), 
            'password' => $request->input('pwdLogin')
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash('exito', 'Bienvenido: '. $user->nombre);
            return redirect()->route('rutaHoteles');
        }
 
        return back()->withErrors([
            'correoLogin' => 'The provided credentials do not match our records.',
        ])->onlyInput('correoLogin');


    }
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
