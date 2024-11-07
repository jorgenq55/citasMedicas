<?php

namespace App\Http\Livewire\Secretaria;

use Livewire\Component;
use App\Models\Secretarias;
use Illuminate\Support\Facades\Hash;

class CreateSecretaria extends Component
{
    public $name = '';
    public $sexo = '';
    public $documento = '';
    public $telefono = '';
    public $email = '';
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

        Secretarias::create([
            'name' => $this->name,
            'email' => $this->email,
            'documento' => $this->documento,
            'telefono' => $this->telefono,
            'password' => Hash::make($this->password),
            'rol' => 'Secretaria',
            'sexo' => $this->sexo  
        ]);


        session()->flash('message', 'Se Creó el/la Secretari@: '.$this->name);
        return redirect()->to('/Secretarias');
    }

    public function render()
    {
        return view('livewire.secretaria.create-secretaria');
    }
}
