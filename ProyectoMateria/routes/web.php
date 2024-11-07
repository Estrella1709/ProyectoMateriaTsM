<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorVistas;

Route::get('/', [controladorVistas::class, 'inicioSesion'])->name('rutaInicioSesion');
Route::get('/registro', [controladorVistas::class, 'registro'])->name('rutaRegistro');
Route::get('/validacionRegistro', [controladorVistas::class, 'validacionRegistro'])->name('rutaValidacionRegistro');
Route::get('/recuperacionCuenta', [controladorVistas::class, 'recuperacionCuenta'])->name('rutaRecuperacionCuenta');
Route::get('/hoteles', [controladorVistas::class, 'hoteles'])->name('rutaHoteles');
Route::get('/detalleshotel', [controladorVistas::class, 'detalleshotel'])->name('rutaDetallesHotel');
Route::get('/reservahotel', [controladorVistas::class, 'reservahotel'])->name('rutaReservaHotel');
Route::get('/vuelos', [controladorVistas::class, 'vuelos'])->name('rutaVuelos');
Route::get('/detallesvuelo', [controladorVistas::class, 'detallesvuelo'])->name('rutaDetallesVuelo');
Route::get('/reservavuelo', [controladorVistas::class, 'reservavuelo'])->name('rutaReservavuelo');
Route::get('/CRUDusuarios', [controladorVistas::class, 'CRUDusuarios'])->name('rutaCRUDusuarios');
Route::get('/CRUDhoteles', [controladorVistas::class, 'CRUDhoteles'])->name('rutaCRUDhoteles');
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
Route::post('/envLogin', [controladorVistas::class, 'procesarLogin'])->name('envLogin');
Route::post('/envRegistro', [controladorVistas::class, 'procesarRegistro'])->name('envRegistro');
Route::post('/envValReg', [controladorVistas::class, 'procesarValReg'])->name('envValReg');
Route::post('/envNuevapwd', [controladorVistas::class, 'procesarNuevapwd'])->name('envNuevapwd');
Route::post('/envEditResH', [controladorVistas::class, 'procEditResH'])->name('envEditResH');
Route::post('/envEditUsuarios', [controladorVistas::class, 'procEditUsuarios'])->name('envEditUsuarios');
Route::post('/envEditPoli', [controladorVistas::class, 'procEditPoli'])->name('envEditPoli');
Route::post('/envEditNoti', [controladorVistas::class, 'procEditNoti'])->name('envEditNoti');
Route::post('/envReservaH', [controladorVistas::class, 'procReservaH'])->name('envReservaH');
Route::post('/envReservaV', [controladorVistas::class, 'procReservaV'])->name('envReservaV');
Route::post('/envAgrRep', [controladorVistas::class, 'procAgrRep'])->name('envAgrRep');