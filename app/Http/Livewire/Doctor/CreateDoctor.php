<?php

namespace App\Http\Livewire\Doctor;

use Livewire\Component;
use App\Models\Doctores;
use Illuminate\Support\Facades\Hash;

class CreateDoctor extends Component
{
    public $name = '';
    public $sexo = '';
    public $consultorio = '';
    public $documento = '';
    public $telefono = '';
    public $email = '';
    public $password = '';
    public $consultorios;

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'sexo' => 'required',
        'consultorio' => 'required',
        'telefono' => 'required|min:3|max:13',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:3|max:13',
        'documento' => 'required|size:10',
    ];

    public function save()
    {

        $this->validate();

        Doctores::create([
            'name' => $this->name,
            'email' => $this->email,
            'documento' => $this->documento,
            'telefono' => $this->telefono,
            'password' => Hash::make($this->password),
            'rol' => 'Doctor',
            'id_consultorio' => $this->consultorio,
            'sexo' => $this->sexo  
        ]);


        session()->flash('message', 'Se Creó el doctor: '.$this->name);
        return redirect()->to('/Doctores');
    }

    public function render()
    {
        return view('livewire.doctor.create-doctor');
    }
}
