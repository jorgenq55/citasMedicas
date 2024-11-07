<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Inicio;
use App\Http\Requests\Perfil\DatosRequest;
use App\Http\Requests\Perfil\PassRequest;


class InicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inicio = Inicio::find(1);
        return view('modulos.Inicio')->with('inicio', $inicio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function DatosCreate()
    {
        return view('modulos.Mis-Datos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function DatosUpdate(DatosRequest $request)
    {        
            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['name' => request('name'),  'telefono' => request('telefono'), 'documento' => request('documento')]);
            return redirect('Mis-Datos')->with(['message' => 'Perfil actualizado exitosamente.']);;
    }

    public function DatosContraseñaUpdate(PassRequest $request)
    {        
            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['password'=>Hash::make(request('password'))]);

            return redirect('Mis-Datos')->with(['message' => 'Contraseña actualizado exitosamente.']);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $inicio = Inicio::find(1);

        return view('modulos.Inicio-Editar')->with('inicio', $inicio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $datos = request();
        $inicio = Inicio::find(1);
        $inicio->dias = $datos['dias'];
        $inicio->horaInicio = $datos['horaInicio'];
        $inicio->horaFin = $datos['horaFin'];
        $inicio->direccion = $datos['direccion'];
        $inicio->telefono = $datos['telefono'];
        $inicio->email = $datos['email'];

        if (request('logoN')) {
            Storage::delete('public/' . $inicio->logo);
            $rutaImg = $request['logoN']->store('inicio', 'public');
            $inicio->logo = $rutaImg;
        }
        $inicio->save();

        return redirect('Inicio-Editar');
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
