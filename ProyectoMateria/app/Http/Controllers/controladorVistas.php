<?php

namespace App\Http\Controllers;

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
}
