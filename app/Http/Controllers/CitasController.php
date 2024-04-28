<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Pacientes;
use App\Models\Doctores;
use App\Models\User;
use App\Models\Consultorios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        if(auth()->user()->rol == 'Doctor' && $id != auth()->user()->id){
            return redirect('Inicio');
        }

        $horarios = DB::select('select * from horarios where id_doctor = '.$id);
        $pacientes = Pacientes::all();

        $citas = Citas::all()->where('id_doctor',$id);
        $doctor = Doctores::find($id);

        return view('modulos.Citas',compact( 'horarios', 'pacientes','citas', 'doctor'));
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

    public function HorarioDoctor(Request $request)
    {
        $datos = request();

        DB::table('horarios')->insert(['id_doctor' => auth()->user()->id, 'horaInicio' => $datos["horaInicio"], 'horaFin'
        => $datos["horaFin"]]);

        return redirect('Citas/'.auth()->user()->id);
    }

    public function EditarHorario(Request $request)
    {
        $datos = request();

        DB::table('horarios')->where('id', $datos["id"])->update(['horaInicio' => $datos["horaInicioE"], 'horaFin'
        => $datos["horaFinE"]]);

        return redirect('Citas/'.auth()->user()->id);
    }

    public function CrearCita(Request $request)
    {
        //dd(request()); metodo para obtener request
        Citas::create(['id_doctor' => request('id_doctor'), 'id_paciente' => request('id_paciente'), 'FyHinicio' => 
        request('FyHinicio'), 'FyHfinal'=> request('FyHfinal')]);

        return redirect('Citas/'.request('id_doctor'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function show(Citas $citas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit(Citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citas $citas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citas $citas)
    {
      
        DB::table('citas')->whereId(request('idCita'))->delete();

        return redirect('Citas/'.request('idDoctor'));
    }

    public function historial()
    {
        if(auth()->user()->rol != "Paciente"){
            return view('modulos.Inicio');
        }
        else{
            $citas = Citas::all()->where('id_paciente', auth()->user()->id);
            $doctores = User::all()->where('rol', 'Doctor');
            $consultorios = Consultorios::all();
            return view('modulos.Historial', compact('citas','doctores', 'consultorios'));
        }
        
    }
}
