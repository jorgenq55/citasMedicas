<?php

namespace App\Http\Livewire\Secretaria;

use App\Models\Secretarias;
use Livewire\Component;

class EditarSecretaria extends Component
{
    public $doctor;
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

    public function update()
    { 
        $this->validate();
        $doctores = Secretarias::where('email', $this->email)
            ->where('id', '!=', $this->identi)
            ->get()
            ->toArray();
        
        if (count($doctores) > 0) {
            $this->addError('email', 'Correo repetido.');
        } else {
            Secretarias::find($this->identi)->update([
                'name' => $this->name,
                'email' => $this->email,
                'documento' => $this->documento,
                'telefono' => $this->telefono,
            ]);

            session()->flash('messageActualiza', 'Se Actualió el/la Secretari@: ' . $this->name);
        }
    }

    public function regresar()
    {

        return redirect()->to('/Secretarias');
    }

    public function mount($secretaria)
    {
        $this->identi = $secretaria->id;
        $this->name = $secretaria->name;
        $this->documento = $secretaria->documento;
        $this->email = $secretaria->email;
        $this->telefono = $secretaria->telefono;
    }

    public function render()
    {
        return view('livewire.secretaria.editar-secretaria');
    }
}
