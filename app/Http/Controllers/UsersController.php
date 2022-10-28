<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $users = Users::all();
        return view('users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $users = new Users();


        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->password = bcrypt($request->input('password'));
        $users->rol = $request->get('rol');


        $users->save();

        return redirect('/users');

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
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function edit($id)
    {
        $users = Users::find($id);

        return view('users.edit')->with('user',$users);
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
        $users = Users::find($id);

        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->password = $request->get('password');
        $users->rol = $request->get('rol');

        $users->save();

        return redirect('/users');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Users = Users::find($id);
        $Users->delete();
        return redirect('/users');
    }

}

