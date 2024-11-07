<?php

namespace App\Http\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUsuario extends Component
{
    public $name = '';
    public $sexo = '';
    public $consultorio = '';
    public $documento = '';
    public $telefono = '';
    public $email = '';
    public $rol = '';
    public $password = '';
    public $consultorios;

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

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'documento' => $this->documento,
            'telefono' => $this->telefono,
            'password' => Hash::make($this->password),
            'rol' => $this->rol,
            'id_consultorio' => $this->consultorio,
            'sexo' => $this->sexo  
        ]);


        session()->flash('message', 'Se Creó el usuario: '.$this->name);
        return redirect()->to('/Usuarios');
    }

    public function render()
    {
        return view('livewire.usuario.create-usuario');
    }
}
