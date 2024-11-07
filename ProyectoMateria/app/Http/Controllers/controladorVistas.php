<?php

namespace App\Http\Controllers;

use App\Http\Requests\validarLogin;
use App\Http\Requests\validarRegistro;
use App\Http\Requests\validarValReg;
use App\Http\Requests\validarNuevapwd;
use App\Http\Requests\validarEditResH;
use App\Http\Requests\validarEditUsuarios;
use App\Http\Requests\validarEditPoliticas;
use App\Http\Requests\validarEditNotis;
use App\Http\Requests\validarResVyH;
use App\Http\Requests\validarAgrRep;
use Illuminate\Http\Request;

class controladorVistas extends Controller
{
    public function inicioSesion(){
        return view('inicioSesion');
    }

    public function registro(){
        return view('registro');
    }

    public function validacionRegistro(){
        return view('validacionRegistro');
    }

    public function recuperacionCuenta(){
        return view('recuperacionCuenta');
    }

    public function hoteles(){
        return view('hoteles');
    }

    public function detalleshotel(){
        return view('detalleshotel');
    }

    public function reservahotel(){
        return view('reservahotel');
    }

    public function vuelos(){
        return view('vuelos');
    }

    public function detallesvuelo(){
        return view('detallesvuelo');
    }

    public function reservavuelo(){
        return view('reservavuelo');
    }

    public function CRUDusuarios(){
        return view('CRUDusuarios');
    }

    public function CRUDhoteles(){
        return view('CRUDhoteles');
    }

    public function CRUDvuelos(){
        return view('CRUDvuelos');
    }

    public function CRUDreportes(){
        return view('CRUDreportes');
    }

    public function detallesreportes(){
        return view('detallesreportes');
    }

    public function agregarReporte(){
        return view('agregarReporte');
    }

    public function notificaciones(){
        return view('notificaciones');
    }

    public function editarnoti(){
        return view('editarnoti');
    }

    public function politicas(){
        return view('politicas');
    }

    public function editarpoliticas(){
        return view('editarpoliticas');
    }

    public function editarUsuarios(){
        return view('editarUsuarios');
    }

    public function editarReservaH(){
        return view('editarReservaH');
    }

    //Inicio de funciones para validaciones 
    public function procesarLogin(validarLogin $peticion){
        session()->flash('exito', 'Se ha iniciado sesión correctamente');
        return to_route('rutaHoteles');
    }

    public function procesarRegistro(validarRegistro $peticion){
        session()->flash('exito', 'Excelente!, estamos a unos pasos de completar tu registro');
        return to_route('rutaValidacionRegistro');
    }

    public function procesarValReg(validarValReg $peticion){
        session()->flash('exito', 'Se ha validado correctamente tu registro. Bienvenido!');
        return to_route('rutaInicioSesion');
    }

    public function procesarNuevapwd(validarNuevapwd $peticion){

        $pwd1=$peticion->input('pwdnueva');
        $pwd2=$peticion->input('confnueva');

        if ($pwd1==$pwd2) {
            session()->flash('exito', 'Tu contraseña ha sido actualizada correctamente!');
            return to_route('rutaHoteles');
        } else {
            session()->flash('diferentes', 'Las contraseñas no coinciden');
            return to_route('rutaRecuperacionCuenta');
        }

    }

    public function procEditResH(validarEditResH $peticion){
        session()->flash('exito', 'Se ha editado correctamente tu reserva');
        return to_route('rutaCRUDhoteles');
    }

    
    public function procEditUsuarios(validarEditUsuarios $peticion){
        session()->flash('exito', 'Se ha editado correctamente tu Usuario');
        return to_route('rutaCRUDusuarios');
    }

    public function procEditPoli(validarEditPoliticas $peticion){
        session()->flash('exito', 'Se han editado correctamente las políticas');
        return to_route('rutaPoliticas');
    }

    public function procEditNoti(validarEditNotis $peticion){
        session()->flash('exito', 'Se ha editado correctamente el mensaje de tu notificación');
        return to_route('rutaNotificaciones');
    }

    public function procReservaH(validarResVyH $peticion)
    {
        $mes = $peticion->input('mes_exp');
        $year = $peticion->input('year_exp');

        if ($mes != 12 && $year == 24) {
            session()->flash('expirado', 'Su tarjeta está expirada');
            return to_route('rutaReservaHotel');
        }

        session()->flash('exito', 'Se ha hecho la reserva correctamente');
        return to_route('rutaHoteles');
    }


    public function procReservaV(validarResVyH $peticion){
        
        $mes=$peticion->input('mes_exp');
        $year=$peticion->input('year_exp');
        if ($mes!=12 && $year==24) {
            session()->flash('expirado', 'Su tarjeta está expirada');
            return to_route('rutaReservavuelo');
        }

        session()->flash('exito', 'Se ha hecho la reserva correctamente');
        return to_route('rutaVuelos');
    }

    public function procAgrRep(validarAgrRep $peticion){
        session()->flash('exito', 'El reporte se agrego correctamente');
        return to_route('rutaAgregarReporte');
    }
}
