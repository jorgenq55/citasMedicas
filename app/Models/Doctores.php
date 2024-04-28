<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctores extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable =['name', 'email', 'password', 'id_consultorio', 'sexo', 
    'documento', 'telefono', 'rol'];

    public $timestamp = false;

    public function consultorios(){
        return $this->belongsTo(Consultorios::class, 'id_consultorio');
    }

}
