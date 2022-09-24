<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicion;

class medicionesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mediciones = Medicion::whereIn('estado', ['Pendiente','Medido'] )->get();
        return view('Medicion.index')->with('mediciones',$mediciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Medicion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mediciones = new Medicion();

        $mediciones->nombre = $request->get('nombre');
        $mediciones->telefono = $request->get('telefono');
        $mediciones->direccion = $request->get('direccion');
        $mediciones->descripcion = $request->get('descripcion');

        $mediciones->save();

        return redirect('/mediciones');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Medicion = Medicion::find($id);

        return view('medicion.edit')->with('medicion',$Medicion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Medicion = medicion::find($id);

        $Medicion->nombre = $request->get('nombre');
        $Medicion->telefono = $request->get('telefono');
        $Medicion->direccion = $request->get('direccion');
        $Medicion->descripcion = $request->get('descripcion');
        $Medicion->estado = $request->get('estado');
        $Medicion->detalleTrabajo = $request->detalleTrabajo;
        $Medicion->precio = $request->precio;

        $Medicion->save();

        return redirect('/mediciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Medicion = Medicion::find($id);
        $Medicion->delete();
        return redirect('/mediciones');
    }


    public function cambiarEstatus($id, $estado){
        $medicion = Medicion::find($id);
        $medicion->estado = $estado;
        $medicion->save();

        return redirect('/articulos');
    }
}
