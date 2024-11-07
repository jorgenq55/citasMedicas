<?php

namespace App\Http\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;
use App\Models\Consultorios;
use Illuminate\Support\Facades\Hash;

class EditarUsuario extends Component
{
    public $consultorios;
    public $consultorio;
    public $identi;
    public $name;
    public $documento;
    public $email;
    public $telefono;
    public $usuario;
    public $rol;
    public $sexo;

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'telefono' => 'required|min:3|max:13',
        'email' => 'required|email',
        'documento' => 'required|size:10',
        'sexo' => 'required',
    ];


    public function update()
    { 
        $this->validate();
        $usuarios = User::where('email', $this->email)
            ->where('id', '!=', $this->identi)
            ->get()
            ->toArray();
        
        if (count($usuarios) > 0) {
            $this->addError('email', 'Correo repetido.');
        } else {
            User::find($this->identi)->update([
                'name' => $this->name,
                'email' => $this->email,
                'documento' => $this->documento,
                'telefono' => $this->telefono,
                'rol' => $this->rol,
                'sexo' => $this->sexo,
                'id_consultorio' => $this->consultorio,
            ]);

            session()->flash('messageActualiza', 'Se Actualió el usuario: ' . $this->name);
        }
    }

    public function regresar()
    {

        return redirect()->to('/Usuarios');
    }

    public function mount($usuario)
    {
        $this->identi = $usuario->id;
        $this->name = $usuario->name;
        $this->documento = $usuario->documento;
        $this->email = $usuario->email;
        $this->telefono = $usuario->telefono;
        $this->consultorio = $usuario->consultorio;
        $this->sexo = $usuario->sexo;
    }

    public function render()
    {
        return view('livewire.usuario.editar-usuario');
    }
}
