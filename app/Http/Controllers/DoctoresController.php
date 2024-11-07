<?php

namespace App\Http\Controllers;

use App\Models\Doctores;
use App\Models\Consultorios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DoctoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria"){
            return redirect('Inicio');
            }
            
            $consultorios = Consultorios::all();
            $doctores =  Doctores::all();
            return view('modulos.Doctores',  compact( 'consultorios', 'doctores'));
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
        
        $datos = request()->validate([
            'name' => ['required'],
            'id_consultorio' => ['required'],
            'password' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'sexo' => ['required'],


        ]);
        Doctores::create([
            'name'=>$datos['name'],
            'email'=>$datos['email'],
            'password'=>Hash::make($datos['password']),
            'id_consultorio'=>$datos['id_consultorio'],
            'sexo'=>$datos['sexo'],
            'documento'=>' ',
            'telefono'=>' ',
            'rol'=>'Doctor'
        ]);

        return redirect('Doctores')->with('registrado', 'Si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctores  $doctores
     * @return \Illuminate\Http\Response
     */
    public function show(Doctores $doctores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctores  $doctores
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctores $id)
    {
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria"){

            return redirect('Inicio');
    
            }
            //$valor=$id->id;
            //dd($id);
        $doctor= Doctores::find($id->id);
        $consultorios = Consultorios::all();
        
        return view('modulos.doctor.Editar-Doctor',  compact( 'consultorios', 'doctor')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctores  $doctores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctores $doctores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctores  $doctores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->whereId($id)->delete();
        return redirect('Doctores');
    }

    public function VerDoctores($id)
    {
        $consultorio = Consultorios::find($id);
        $doctores = DB::select('select * from users where id_consultorio='.$id);
        $horarios = DB::select('select * from horarios');
        return view('modulos.Ver-Doctores', compact('consultorio', 'doctores','horarios'));
    }
}
