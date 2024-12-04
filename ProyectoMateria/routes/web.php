<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\ReservasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorVistas;
use App\Http\Controllers\PoliticasController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', [controladorVistas::class, 'inicioSesion'])->name('login');
Route::get('/validacionRegistro', [controladorVistas::class, 'validacionRegistro'])->name('rutaValidacionRegistro');
Route::get('/recuperacionCuenta', [controladorVistas::class, 'recuperacionCuenta'])->name('rutaRecuperacionCuenta');
Route::get('/detalleshotel', [controladorVistas::class, 'detalleshotel'])->name('rutaDetallesHotel');
Route::get('/reservahotel', [controladorVistas::class, 'reservahotel'])->name('rutaReservaHotel');
Route::get('/vuelos', [controladorVistas::class, 'vuelos'])->middleware('auth')->name('rutaVuelos');
Route::get('/hoteles', [controladorVistas::class, 'hoteles'])->name('rutaHoteles');
Route::get('/detallesvuelo', [controladorVistas::class, 'detallesvuelo'])->name('rutaDetallesVuelo');
Route::get('/reservavuelo', [controladorVistas::class, 'reservavuelo'])->name('rutaReservavuelo');
Route::get('/CRUDusuarios', [controladorVistas::class, 'CRUDusuarios'])->name('rutaCRUDusuarios');
Route::get('/CRUDhoteles', [HotelController::class, 'CRUDhoteles'])->name('rutaCRUDhoteles');
Route::get('/CRUDreportes', [controladorVistas::class, 'CRUDreportes'])->name('rutaCRUDreportes');
Route::get('/detallesreportes', [controladorVistas::class, 'detallesreportes'])->name('rutaDetallesReportes');
Route::get('/agregarReporte', [ReportesController::class, 'create'])->name('reportes.create');
Route::get('/notificaciones', [controladorVistas::class, 'notificaciones'])->name('rutaNotificaciones');
Route::get('/editarnoti', [controladorVistas::class, 'editarnoti'])->name('rutaEditarNoti');
Route::get('/politicas', [PoliticasController::class, 'index'])->name('rutaPoliticas');
Route::get('/editarpoliticas/{id}', [PoliticasController::class, 'edit'])->name('rutaEditarPolitica');
Route::put('/editarpoliticas/{id}', [PoliticasController::class, 'update'])->name('rutaActualizarPolitica');
Route::get('/editarUsuarios', [controladorVistas::class, 'editarUsuarios'])->name('rutaEditarUsuarios');
Route::get('/editarReservaH', [controladorVistas::class, 'editarReservaH'])->name('rutaEditarReservaH');
Route::get('/CRUDvuelos', [VueloController::class, 'adminIndex'])->name('vuelos.admin');


//Rutas para validaciones con formularios
Route::post('/envValReg', [controladorVistas::class, 'procesarValReg'])->name('envValReg');
Route::post('/envNuevapwd', [controladorVistas::class, 'procesarNuevapwd'])->name('envNuevapwd');
Route::post('/envEditResH', [controladorVistas::class, 'procEditResH'])->name('envEditResH');
Route::post('/envEditUsuarios', [controladorVistas::class, 'procEditUsuarios'])->name('envEditUsuarios');
Route::post('/envEditPoli', [controladorVistas::class, 'procEditPoli'])->name('envEditPoli');
Route::post('/envEditNoti', [controladorVistas::class, 'procEditNoti'])->name('envEditNoti');
Route::post('/envReservaH', [controladorVistas::class, 'procReservaH'])->name('envReservaH');
Route::post('/envReservaV', [controladorVistas::class, 'procReservaV'])->name('envReservaV');
Route::post('/envAgrRep', [ReportesController::class, 'store'])->name('reportes.store');


//Rutas de usuarios
Route::resource('usuario', UsuarioController::class);
Route::post('/envLogin', [AuthController::class, 'login'])->name('envLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function(){
    Route::get('/two-factor', [AuthController::class, 'index'])->name('two-factor.index');
    Route::post('/two-factor', [AuthController::class, 'verify'])->name('two-factor.verify'); 
});


//Resource type routes
Route::resource('vuelos', VueloController::class);


//Rutas para la validacion del registro
//Esto poner las rutas en un grupo, todas en el grupo tienen el middleware auth
Route::middleware('auth')->group(function(){

    //NO CAMBIAR EL NOMBRE DE ESTA RUTA | Verification Notice
    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');

    //NO CAMBIAR EL NOMBRE DE ESTA RUTA | Verification handler
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
    ->middleware( 'signed')->name('verification.verify');

    //NO CAMBIAR EL NOMBRE DE ESTA RUTA | Volver a enviar el mail de verificacion 
    Route::post('/email/verification-notification', [AuthController::class, 'verifyHandler'])
    ->middleware('throttle:6,1')->name('verification.send');

});

//Rutas por si el usuario olvido su contraseña
//Esto poner las rutas en un grupo
Route::middleware('guest')->group(
    function() {

        //Ruta que muestra la vista para escribir el correo
        Route::get('/forgot-password', function () {
            return view('auth.forgot-password');
        })->name('password.request');

        //Ruta de tipo handler para mandar el correo 
        Route::post('/forgot-password', [ResetPassword::class, 'passwordEmail' ])->name('password.email');

        //Ruta para que el usuario vea la segunda vista de confirmacion del correo, debe incluir el ken que esta en la funcion en resetpassword controller
        Route::get('/reset-password/{token}', [ResetPassword::class, 'passwordReset'])->name('password.reset');

        Route::post('/reset-password', [ResetPassword::class, 'passwordUpdate'])->name('password.update');
    }
);

Route::middleware('auth')->group(function(){

    Route::resource('hoteles', HotelController::class);
    //Rutas de reservas
    Route::get('/hoteles/{id}/detalles', [ReservasController::class, 'mostrarDetalles'])->name('detalleshotel');
    Route::post('/hoteles/{id_hotel}/reservar', [ReservasController::class, 'crearReservacion'])->name('reservacion.crear')->middleware('auth');

    Route::get('/vuelos/{id}/detalles', [ReservasController::class, 'detalles'])->name('vuelos.detalles');
    Route::post('/vuelos/{id_vuelo}/reservar', [ReservasController::class, 'crearReservacionVuelo'])->name('reservar.vuelo');

    Route::get('/prereserva', [ReservasController::class, 'mostrarPreReservas'])->name('prereserva');
    Route::delete('/reservas/quitar/{id_reservacion}', [ReservasController::class, 'quitarReserva'])->name('reservas.quitar');
    
    Route::post('/envReservaH', [ReservasController::class, 'actualizarEstadoReservas'])->name('reservas.actualizarEstado');
    Route::get('/reservas', [ReservasController::class, 'mostrarReservasR'])->name('reservas.mostrar');
    Route::delete('/reservas/{id}', [ReservasController::class, 'cancelarReservacion'])->name('reservas.cancelar');

});




