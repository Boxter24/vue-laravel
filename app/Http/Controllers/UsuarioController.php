<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;        
        $user->apellido = $request->apellido;        
        $user->telefono = $request->telefono;        
        $user->direccion = $request->direccion;        
        $user->email = $request->email;        
        $user->password = $request->password; 
        $user->pais_id = $request->pais_id;  
        $user->estado_id = $request->estado_id;         
        $user->save();

        return $user;

        
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
        //
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
        $user = User::find($id);
        $user->name = $request->name;        
        $user->apellido = $request->apellido;        
        $user->telefono = $request->telefono;        
        $user->direccion = $request->direccion;        
        $user->email = $request->email;        
        $user->password = $request->password;  
        $user->pais_id = $request->pais_id;  
        $user->estado_id = $request->estado_id;        
        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
