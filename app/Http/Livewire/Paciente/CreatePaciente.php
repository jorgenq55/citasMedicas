<?php

namespace App\Http\Livewire\Paciente;

use Livewire\Component;
use App\Models\Pacientes;
use Illuminate\Support\Facades\Hash;

class CreatePaciente extends Component
{
    public $name = '';
    public $sexo = '';
    public $consultorio = '';
    public $documento = '';
    public $telefono = '';
    public $email = '';
    public $password = '';
    public $pacientes;
    public $consultorios;
    public $paciente = '';

    protected $rules = [
        'name' => 'required',
        'sexo' => 'required',
        'consultorio' => 'required',
        'telefono' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:3',
        'documento' => 'required|numeric',
    ];

    public function save()
    {

        $this->validate();

        Pacientes::create([
            'name' => $this->name,
            'email' => $this->email,
            'documento' => $this->documento,
            'telefono' => $this->telefono,
            'password' => Hash::make($this->password),
            'rol' => 'Paciente',
            'id_consultorio' => '0',
            'sexo' => $this->sexo  
        ]);


        session()->flash('message', 'Se Creó el doctor: '.$this->name);
        return redirect()->to('/Doctores');
    }

    public function render()
    {
        return view('livewire.paciente.create-paciente');
    }
}
