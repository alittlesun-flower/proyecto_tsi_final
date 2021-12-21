<?php

namespace App\Http\Controllers;

use App\Models\{Usuario,Rol};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Gate;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        $roles = Rol::all();
        return view('usuarios.index',compact('usuarios','roles'));
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
        
        $usuario = new Usuario();
        $usuario->email = $request->email;
        $usuario->nombre = $request->nombre;
        $usuario->password = Hash::make($request->password);
        $usuario->rol_id = $request->rol;
        $data = request()->validate([
            'email' => 'email|unique:usuarios,email,'.$usuario->id,
        ]);
        $usuario->save();
        return redirect()->route('home.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->nombre = $request->nombre;
        $usuario->rol_id = $request->rol;
        $usuario->save();
        return redirect()->route('home.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }

    public function login(Request $request){
        //$credenciales = $request->only('email','password');
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            //credenciales correctas
            $usuario = Usuario::where('email',$request->email)->first();
            $usuario->registrarUltimoLogin();
            
            return redirect()->route('home.index');
        }else{
            //credenciales incorrectas
            return back()->withErrors('Credenciales incorrectas o cuenta no registrada');
        }
    }

    public function logout(){
        Auth::logout();
        //return redirect()->route('/');
        return redirect()->to('/login');
    }

    public function activar(Usuario $usuario){
        $usuario->activo = $usuario->activo?0:1;
        $usuario->save();
        return redirect()->route('usuarios.index');
    }
}
