<?php

namespace App\Http\Livewire\Doctor;

use Livewire\Component;
use App\Models\Consultorios;
use App\Models\Doctores;

class EditarDoctor extends Component
{
    public $consultorios;
    public $consultorio;
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
        $doctores = Doctores::where('email', $this->email)
            ->where('id', '!=', $this->identi)
            ->get()
            ->toArray();
        
        if (count($doctores) > 0) {
            $this->addError('email', 'Correo repetido.');
        } else {
            Doctores::find($this->identi)->update([
                'name' => $this->name,
                'email' => $this->email,
                'documento' => $this->documento,
                'telefono' => $this->telefono,
                'id_consultorio' => $this->consultorio,
            ]);

            session()->flash('messageActualiza', 'Se Actualió al doctor: ' . $this->name);
        }
    }

    public function regresar()
    {

        return redirect()->to('/Doctores');
    }

    public function mount($doctor)
    {
        $this->identi = $doctor->id;
        $this->name = $doctor->name;
        $this->documento = $doctor->documento;
        $this->email = $doctor->email;
        $this->telefono = $doctor->telefono;
        $this->consultorio = $doctor->consultorio;
    }

    public function render()
    {
        return view('livewire.doctor.editar-doctor');
    }
}
