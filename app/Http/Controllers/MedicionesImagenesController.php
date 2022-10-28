<?php

namespace App\Http\Controllers;

use App\Models\MedicionesImagenes;
use Illuminate\Http\Request;

class MedicionesImagenesController extends Controller
{
    public function store(Request $request,$id_medicion){

        $imagen = $request->file('file')->getRealPath();
        $imagen = file_get_contents($imagen);
        $imagen = base64_encode($imagen);

        $imagen_medicion = new MedicionesImagenes();
        $imagen_medicion->imagen = $imagen;
        $imagen_medicion->id_medicion = $id_medicion;
        $imagen_medicion->save();

    }

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function view($id_medicion){
        $imagenes = MedicionesImagenes::where('id_medicion', $id_medicion)->get();

        return view('imagenes.index', compact('imagenes'));
    }
}
