<?php

namespace App\Http\Controllers;

use App\Models\Medicion;
use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
     public function __construct(){
         $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        #$articulos = Medicion::where('estado', '=', 'Cotizado')->get();
        $articulos = Medicion::whereNotIn('estado',  ['Pendiente','Medido','Cancelado']  )->get();
        $confirmados = Medicion::where('estado', '=', 'Confirmado')->get();
        $pendientesInstalacion = Medicion::where('estado', '=', 'Pendiente Instalacion')->get();
        $pendientesPago = Medicion::where('estado', '=', 'Instalado Pendiente Pago')->get();
        $cancelados = Medicion::where('estado', '=', 'Cancelado')->get();

        return view('articulo.index', compact('articulos','confirmados','pendientesInstalacion','pendientesPago','cancelados'));
    }

    public function indexCancelado(){
        $cancelados = Medicion::where('estado', '=', 'Cancelado')->get();
        return view('cancelado.index', compact('cancelados'));
    }

    public function indexConfirmado(){
        $confirmados = Medicion::where('estado', '=', 'Confirmado')->get();
        return view('confirmado.index', compact('confirmados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulos = new Articulo();

        $articulos->codigo = $request->get('codigo');
        $articulos->descripcion = $request->get('descripcion');
        $articulos->cantidad = $request->get('cantidad');
        $articulos->precio = $request->get('precio');

        $articulos->save();

        return redirect('/articulos');

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
        $articulo = Articulo::find($id);
        return view('articulo.edit')->with('articulo',$articulo);
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
        $articulo = Articulo::find($id);

        $articulo->codigo = $request->get('codigo');
        $articulo->descripcion = $request->get('descripcion');
        $articulo->cantidad = $request->get('cantidad');
        $articulo->precio = $request->get('precio');

        $articulo->save();

        return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();
        return redirect('/articulos');
    }
}
