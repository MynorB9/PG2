<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{

    public function index()
    {
        $empleados = Empleados::all();
        return view('Empleado.index')->with('empleados',$empleados);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $empleados = new Empleados();

        $imagen = $request->file('imagen')->getRealPath();
        $imagen = file_get_contents($imagen);
        $imagen = base64_encode($imagen);
        $empleados->nombre = $request->get('nombre');
        $empleados->telefono = $request->get('telefono');
        $empleados->direccion = $request->get('direccion');
        $empleados->puesto = $request->get('puesto');
        $empleados->sueldo = $request->get('sueldo');
        $empleados->imagen = $imagen;

        $empleados->save();

        return redirect('/empleados');

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

    public function edit($id)
    {
        $Empleado = Empleados::find($id);

        return view('empleado.edit')->with('empleado',$Empleado);
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
        $Empleado = Empleados::find($id);

        $Empleado->nombre = $request->get('nombre');
        $Empleado->telefono = $request->get('telefono');
        $Empleado->direccion = $request->get('direccion');
        $Empleado->puesto = $request->get('puesto');
        $Empleado->sueldo = $request->get('sueldo');
        $Empleado->imagen = $request->get('imagen');

        $Empleado->save();

        return redirect('/empleados');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Empleado = Empleados::find($id);
        $Empleado->delete();
        return redirect('/empleados');
    }

}

