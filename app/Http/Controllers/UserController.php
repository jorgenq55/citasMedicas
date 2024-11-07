<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Consultorios;
use Illuminate\Support\Facades\DB; 
use App\Http\Requests\Perfil\DatosRequest;
use App\Http\Requests\Perfil\PassRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->rol != 'Administrador'){
            return redirect('Inicio');
        }

        $consultorios = Consultorios::all();
        $users =  User::all();
        return view('modulos.usuarios.Usuarios',  compact( 'consultorios', 'users'));
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
        //
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
    public function edit(User $id)
    {
        if(auth()->user()->rol != "Administrador"){

            return redirect('Inicio');
    
            }
            //$valor=$id->id;
            //dd($id->id);
        $usuario= User::find($id->id);
        $consultorios = Consultorios::all();
        return view('modulos.usuarios.Editar-Usuario',  compact( 'usuario', 'consultorios')); 
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
        //
    }

    public function DatosContraseñaUpdate(PassRequest $request)
    {        
            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['password'=>Hash::make(request('password'))]);

            return redirect('Usuarios')->with(['message' => 'Contraseña actualizado exitosamente.']);;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
