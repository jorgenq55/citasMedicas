<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;
use App\Models\Consultorios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria" 
        && auth()->user()->rol != "Doctor"){

            return redirect('Inicio');
    
            }

            $pacientes = DB::select('select * from users where rol = "Paciente"');
            $consultorios = Consultorios::all();

            return view('modulos.Pacientes',  compact( 'consultorios', 'pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria" 
        && auth()->user()->rol != "Doctor"){

            return redirect('Inicio');
    
            }
            return view('modulos.Crear-Paciente');

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
            'documento' => ['required'],
            'password' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'unique:users'],

/*             'sexo' => ['required'],

 */
        ]);
        
        Pacientes::create([
            'name'=>$datos['name'],
            'email'=>$datos['email'],
            'sexo'=>" ",
            'documento'=>$datos['documento'],
            'id_consultorio'=>0,
            'telefono'=>' ',
            'rol'=>'Paciente',
            'password'=>Hash::make($datos['password'])

        ]);

        

        return redirect('Pacientes')->with('registrado', 'Si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function show(Pacientes $pacientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Pacientes $id)
    {
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria" 
        && auth()->user()->rol != "Doctor"){

            return redirect('Inicio');
    
            }
            //$valor=$id->id;
            //dd($id);
        $paciente= Pacientes::find($id->id);
        return view('modulos.Editar-Paciente')->with('paciente',$paciente);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pacientes $paciente)
    {
        //dd($paciente["id"]);
        if($paciente["email"] != request('email') && request('passwordN') != ""){

            $datos = request()->validate([
                'name' =>['required'],
                'documento' =>['required'],
                'passwordN' =>['required','string','min:3'],
                'email' =>['required','string', 'email', 'unique:users']
            ]);

            DB::table('users')->where('id',$paciente['id'])
            ->update(['name' => $datos['name']], ['email' => $datos['email']],
            ['documento' => $datos['documento']], ['password' => Hash::make($datos["passwordN"])]);
        }


        else if($paciente["email"] != request('email') && request('passwordN') == ""){
            $datos = request()->validate([
                'name' =>['required'],
                'documento' =>['required'],
                'password' =>['required','string','min:3'],
                'email' =>['required','string', 'email', 'unique:users']
            ]);
            
            DB::table('users')->where('id',$paciente['id'])
            ->update(['name' => $datos['name'], 'email' => $datos['email'],
            'documento' => $datos['documento'], 'password' => Hash::make($datos["password"])]);
        }
        else if($paciente["email"] == request('email') && request('passwordN') != ""){
            $datos = request()->validate([
                'name' =>['required'],
                'documento' =>['required'],
                'passwordN' =>['required','string','min:3'],
                'email' =>['required','string', 'email']
            ]);

            DB::table('users')->where('id',$paciente['id'])
            ->update(['name' => $datos['name'], 'email' => $datos['email'],
            'documento' => $datos['documento'], 'password' => Hash::make($datos["passwordN"])]);
        }
        else{
            $datos = request()->validate([
                'name' =>['required'],
                'documento' =>['required'],
                'password' =>['required','string','min:3'],
                'email' =>['required','string', 'email'],
                'telefono' =>['string']
            ]);
            //dd($datos);
            DB::table('users')->where('id',$paciente['id'])->update(['name' => $datos['name'],
            'documento' => $datos['documento'], 'password' => Hash::make($datos["password"]),'telefono' => $datos['telefono']]);
        }
        
        return redirect('Pacientes')->with('actualizadoP','Si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pacientes::destroy($id);

        return redirect('Pacientes');
    }
}
