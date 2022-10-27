<?php

namespace App\Http\Controllers;

use App\Models\Medicion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $medidos = Medicion::where('estado', 'Medido')->count();
        $cotizados = Medicion::where('estado', 'Cotizado')->count();
        $pendientes = Medicion::where('estado', 'Pendiente')->count();

        $confirmados = Medicion::where('estado', 'Confirmado')->count();
        $pendientePago = Medicion::where('estado', 'Instalado Pendiente Pago')->count();
        $cancelados = Medicion::where('estado', 'Cancelado')->count();

        return view ('home.index', compact('medidos','cotizados','pendientes', 'confirmados','pendientePago','cancelados'));
    }
}
