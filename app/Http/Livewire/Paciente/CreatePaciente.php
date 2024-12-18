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
        'name' => 'required|min:3|max:50',
        'sexo' => 'required',
        'telefono' => 'required|min:3|max:13',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:3|max:13',
        'documento' => 'required|size:10',
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
        return redirect()->to('/Pacientes');
    }

    public function render()
    {
        return view('livewire.paciente.create-paciente');
    }
}
