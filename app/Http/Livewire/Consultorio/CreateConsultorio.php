<?php

namespace App\Http\Livewire\Consultorio;

use Livewire\Component;
use App\Models\Consultorios;

class CreateConsultorio extends Component
{
    public $consultorio = '';
    public $message ='';
    public $consultorios ='';

    public function save()
    {
        Consultorios::create(['consultorio' => $this->consultorio]);
        $this->message = $this->consultorio;

        return redirect()->to('/Consultorios');
    }

    public function render()
    {
        return view('livewire.consultorio.create-consultorio');
    }
}
