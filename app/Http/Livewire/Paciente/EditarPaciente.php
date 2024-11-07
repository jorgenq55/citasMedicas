<?php

namespace App\Http\Livewire\Paciente;

use Livewire\Component;
use App\Models\Pacientes;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Perfil\DatosRequest;

class EditarPaciente extends Component
{
    public $paciente;
    public $identi;
    public $name;
    public $documento;
    public $email;
    public $telefono;

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'telefono' => 'required|min:3|max:13',
        'email' => 'required|email',
        'documento' => 'required|size:10',
    ];

    public function regresar()
    {
        return redirect()->to('/Pacientes');
    }

    public function update()
    {
        $this->validate();
        $pacientes=Pacientes::where('email',$this->email)->where('id', '!=' , $this->identi)->get()->toArray();

        if(count($pacientes) > 0) $this->addError('email', 'Correo repetido.');
        else{
        
        Pacientes::find($this->identi)->update([
            'name' => $this->name,
            'email' => $this->email,
            'documento' => $this->documento,
            'telefono' => $this->telefono,
        ]);

        session()->flash('messageActualiza', 'Se Actualió al paciente: '.$this->name);
    }
        
    }

    public function mount($paciente)
    {
        $this->identi = $paciente->id;
        $this->name = $paciente->name;
        $this->documento = $paciente->documento;
        $this->email = $paciente->email;
        $this->telefono = $paciente->telefono;
        
    }

    public function render()
    {
        return view('livewire.paciente.editar-paciente');
    }
}
