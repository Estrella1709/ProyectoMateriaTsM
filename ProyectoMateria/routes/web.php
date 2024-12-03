<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VueloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorVistas;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', [controladorVistas::class, 'inicioSesion'])->name('rutaInicioSesion');
Route::get('/validacionRegistro', [controladorVistas::class, 'validacionRegistro'])->name('rutaValidacionRegistro');
Route::get('/recuperacionCuenta', [controladorVistas::class, 'recuperacionCuenta'])->name('rutaRecuperacionCuenta');
Route::get('/hoteles', [controladorVistas::class, 'hoteles'])->name('rutaHoteles');
Route::get('/detalleshotel', [controladorVistas::class, 'detalleshotel'])->name('rutaDetallesHotel');
Route::get('/reservahotel', [controladorVistas::class, 'reservahotel'])->name('rutaReservaHotel');
Route::get('/vuelos', [controladorVistas::class, 'vuelos'])->middleware('verified')->name('rutaVuelos');
Route::get('/detallesvuelo', [controladorVistas::class, 'detallesvuelo'])->name('rutaDetallesVuelo');
Route::get('/reservavuelo', [controladorVistas::class, 'reservavuelo'])->name('rutaReservavuelo');
Route::get('/CRUDusuarios', [controladorVistas::class, 'CRUDusuarios'])->name('rutaCRUDusuarios');
Route::get('/CRUDhoteles', [HotelController::class, 'CRUDhoteles'])->name('rutaCRUDhoteles');
Route::get('/CRUDvuelos', [controladorVistas::class, 'CRUDvuelos'])->name('rutaCRUDvuelos');
Route::get('/CRUDreportes', [controladorVistas::class, 'CRUDreportes'])->name('rutaCRUDreportes');
Route::get('/detallesreportes', [controladorVistas::class, 'detallesreportes'])->name('rutaDetallesReportes');
Route::get('/agregarReporte', [controladorVistas::class, 'agregarReporte'])->name('rutaAgregarReporte');
Route::get('/notificaciones', [controladorVistas::class, 'notificaciones'])->name('rutaNotificaciones');
Route::get('/editarnoti', [controladorVistas::class, 'editarnoti'])->name('rutaEditarNoti');
Route::get('/politicas', [controladorVistas::class, 'politicas'])->name('rutaPoliticas');
Route::get('/editarpoliticas', [controladorVistas::class, 'editarpoliticas'])->name('rutaEditarPoliticas');
Route::get('/editarUsuarios', [controladorVistas::class, 'editarUsuarios'])->name('rutaEditarUsuarios');
Route::get('/editarReservaH', [controladorVistas::class, 'editarReservaH'])->name('rutaEditarReservaH');



//Rutas para validaciones con formularios
Route::post('/envValReg', [controladorVistas::class, 'procesarValReg'])->name('envValReg');
Route::post('/envNuevapwd', [controladorVistas::class, 'procesarNuevapwd'])->name('envNuevapwd');
Route::post('/envEditResH', [controladorVistas::class, 'procEditResH'])->name('envEditResH');
Route::post('/envEditUsuarios', [controladorVistas::class, 'procEditUsuarios'])->name('envEditUsuarios');
Route::post('/envEditPoli', [controladorVistas::class, 'procEditPoli'])->name('envEditPoli');
Route::post('/envEditNoti', [controladorVistas::class, 'procEditNoti'])->name('envEditNoti');
Route::post('/envReservaH', [controladorVistas::class, 'procReservaH'])->name('envReservaH');
Route::post('/envReservaV', [controladorVistas::class, 'procReservaV'])->name('envReservaV');
Route::post('/envAgrRep', [controladorVistas::class, 'procAgrRep'])->name('envAgrRep');


//Rutas de usuarios
Route::resource('usuario', UsuarioController::class);
Route::post('/envLogin', [AuthController::class, 'login'])->name('envLogin');

//Resource type routes
Route::resource('vuelos', VueloController::class);
Route::resource('hoteles', HotelController::class);


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