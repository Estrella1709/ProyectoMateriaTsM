<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
    public function login(validarLogin $request)
    {

        $user = DB::table('usuarios')->where('email', $request->input('correoLogin'))->first();
        $credentials = [
            'email' => $request->input('correoLogin'),
            'password' => $request->input('pwdLogin')
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash('exito', 'Bienvenido: ' . $user->nombre);

            return redirect()->route('two-factor.index');
        }

        return back()->withErrors([
            'correoLogin' => 'The provided credentials do not match our records.',
        ])->onlyInput('correoLogin');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Debes iniciar sesión primero.']);
        }

        $code = rand(100000, 999999);
        $user->two_factor_code = $code;
        $user->save();

        Mail::raw("Tu codigo de uso único es " . $code, function ($message) use ($user) {
            $message->to($user->email)->subject('Código de inicio de sesión');
        });

        return view('auth.two-factor');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|integer | digits:6 ',
        ]);

        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Debes iniciar sesión primero.']);
        }

        if ($user->two_factor_code == $request->code) {
            session(['two_factor_athenticated' => true]);
            if ($user->id_rol == 1) {
                return redirect()->intended('/vuelos');
            } elseif ($user->id_rol == 2) {
                return redirect()->intended('/CRUDhoteles');
            }
        }

        return redirect()->route('two-factor.index')->withErrors(['code' => 'El código esta incorrecto']);

    }

    //Funciones para la verificacion por correo del usuario
    public function verifyNotice()
    {
        return view('validacionRegistro');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/hoteles');
    }

    public function verifyHandler(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Link de verificación enviado');
    }
}
