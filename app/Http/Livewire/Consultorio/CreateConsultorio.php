<?php

namespace App\Http\Livewire\Consultorio;

use Livewire\Component;
use App\Models\Consultorios;

class CreateConsultorio extends Component
{
    public $consultorio = '';
    public $message ='';

    public function save()
    {
        
        Consultorios::create(['consultorio' => $this->consultorio]);
        $this->message = $this->consultorio;
        
       /*  return redirect()->to('/Consultorios')
             ->with('status', 'Post created!'); */
    }

    public function render()
    {
        return view('livewire.consultorio.create-consultorio');
    }
}
