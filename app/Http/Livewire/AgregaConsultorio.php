<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Consultorios;

class AgregaConsultorio extends Component
{
    public $consultorio = '';

    public function save()
    {
        Consultorios::create(['consultorio' => $this->consultorio]);

        return redirect()->to('/Consultorios')
             ->with('status', 'Post created!');
    }

    public function render()
    {
        return view('livewire.agrega-consultorio');
    }
}
