<?php

use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\SecretariasController;
use App\Http\Livewire\AgregaConsultorio;
use App\Http\Livewire\Paciente\CreatePaciente;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('modulos.Seleccionar');
});

Route::get('/Ingresar', function () {
    return view('modulos.Ingresar');
});

Auth::routes();



Route::get('Inicio', [InicioController::class, 'index']);
Route::get('Mis-Datos', [InicioController::class, 'DatosCreate']);
//Route::post('Mis-Datos', 'InicioController@DatosUpdate');
Route::post('Mis-Datos', [InicioController::class, 'DatosUpdate']);

Route::get('Inicio-Editar', [InicioController::class, 'edit']);
Route::put('Inicio-Editar', [InicioController::class, 'update']);


Route::get('/agrega-consultorio', AgregaConsultorio::class);
Route::post('Consultorios', [ConsultoriosController::class, 'store']);
Route::PUT('Consultorio/{id}', [ConsultoriosController::class, 'update']);
Route::get('Consultorios', [ConsultoriosController::class, 'index']);
Route::delete('borrar-Consultorio/{id}', [ConsultoriosController::class, 'destroy']);

// Ver Consultorios como Paciente
Route::get('Ver-Consultorios', [ConsultoriosController::class, 'verConsultorios']);

Route::get('Doctores', [DoctoresController::class, 'index']);
Route::post('Doctores', [DoctoresController::class, 'store']);
Route::get('Eliminar-Doctor/{id}', [DoctoresController::class, 'destroy']);

//Ver Doctores como Paciente
Route::get('Ver-Doctores/{id}', [DoctoresController::class, 'verDoctores']);

Route::get('Pacientes', [PacientesController::class, 'index']);
Route::get('Crear-Paciente', [PacientesController::class, 'create']);
Route::post('Crear-Paciente', [PacientesController::class, 'store']);
Route::get('Editar-Paciente/{id}', [PacientesController::class, 'edit']);
Route::put('actualizar-Paciente/{paciente}', [PacientesController::class, 'update']);
Route::get('Eliminar-Paciente/{id}', [PacientesController::class, 'destroy']);

Route::get('Citas/{id}', [CitasController::class, 'index']);
Route::post('Horario', [CitasController::class, 'HorarioDoctor']);
Route::put('editar-horario/{id}', [CitasController::class, 'EditarHorario']);
Route::post('Citas/{id_doctor}', [CitasController::class, 'CrearCita']);
Route::delete('borrar-cita', [CitasController::class, 'destroy']);

//Historial de paciente
Route::get('Historial', [CitasController::class, 'historial']);
Route::get('Secretarias', [SecretariasController::class, 'index']);
Route::post('Secretarias', [SecretariasController::class, 'store']);
Route::get('Eliminar-Secretaria/{id}', [SecretariasController::class, 'destroy']);
Route::get('Editar-Secretaria/{id}', [SecretariasController::class, 'show']);
Route::put('actualizar-secretaria/{id}', [SecretariasController::class, 'update']);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

