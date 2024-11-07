<?php

use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\SecretariasController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\AgregaConsultorio;
use App\Http\Livewire\Paciente\CreatePaciente;
use App\Http\Livewire\Paciente\EditarPaciente;
use App\Http\Livewire\Doctor\EditarDoctor;
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

/* Route::get('/', function () {
    return view('modulos.Seleccionar');
}); */

Route::get('/Ingresar', function () {
    return view('modulos.Ingresar');
});

Auth::routes();


//-------Rutas para manejar el inicio-------------------
Route::get('/', [InicioController::class, 'index']);
Route::get('Inicio-Editar', [InicioController::class, 'edit']);
Route::put('Inicio-Editar', [InicioController::class, 'update']);
//-------------------------------------------------------

//-------Rutas para manejar los datos del perfil---------
Route::get('Mis-Datos', [InicioController::class, 'DatosCreate']);
Route::post('Mis-Datos', [InicioController::class, 'DatosUpdate']);
Route::post('Mis-Datos-contraseña', [InicioController::class, 'DatosContraseñaUpdate']);
//-------------------------------------------------------

//-------Rutas para manejar los consultorios-------------
Route::get('/agrega-consultorio', AgregaConsultorio::class);
Route::post('Consultorios', [ConsultoriosController::class, 'store']);
Route::PUT('Consultorio/{id}', [ConsultoriosController::class, 'update']);
Route::get('Consultorios', [ConsultoriosController::class, 'index']);
Route::delete('borrar-Consultorio/{id}', [ConsultoriosController::class, 'destroy']);
Route::get('Ver-Consultorios', [ConsultoriosController::class, 'verConsultorios']);
//-------------------------------------------------------

//-------Rutas para manejar los doctores-------------
Route::get('Doctores', [DoctoresController::class, 'index']);
Route::post('Doctores', [DoctoresController::class, 'store']);
Route::get('Editar-Doctor/{id}', [DoctoresController::class, 'edit']);
Route::get('Eliminar-Doctor/{id}', [DoctoresController::class, 'destroy']);
Route::get('Ver-Doctores/{id}', [DoctoresController::class, 'verDoctores']);
//-------------------------------------------------------

//-------Rutas para manejar los pacientes-------------
Route::get('Pacientes', [PacientesController::class, 'index']);
Route::get('Crear-Paciente', [PacientesController::class, 'create']);
Route::post('Crear-Paciente', [PacientesController::class, 'store']);
Route::get('Editar-Paciente/{id}', [PacientesController::class, 'edit']);
Route::put('actualizar-Paciente/{paciente}', [PacientesController::class, 'update']);
Route::get('Eliminar-Paciente/{id}', [PacientesController::class, 'destroy']);
//-------------------------------------------------------

//-------Rutas para manejar los horarios y citas---------
Route::get('Citas/{id}', [CitasController::class, 'index']);
Route::post('Horario', [CitasController::class, 'HorarioDoctor']);
Route::put('editar-horario/{id}', [CitasController::class, 'EditarHorario']);
Route::post('Citas/{id_doctor}', [CitasController::class, 'CrearCita']);
Route::delete('borrar-cita', [CitasController::class, 'destroy']);
//-------------------------------------------------------

//-------Rutas para manejar los historiales---------
Route::get('Historial', [CitasController::class, 'historial']);
Route::get('Secretarias', [SecretariasController::class, 'index']);
Route::post('Secretarias', [SecretariasController::class, 'store']);
Route::get('Eliminar-Secretaria/{id}', [SecretariasController::class, 'destroy']);
Route::get('Editar-Secretaria/{id}', [SecretariasController::class, 'edit']);
Route::put('actualizar-secretaria/{id}', [SecretariasController::class, 'update']);
//-------------------------------------------------------

//-------Rutas para manejar los usuarios---------
Route::get('Usuarios', [UserController::class, 'index']);
Route::get('Editar-Usuario/{id}', [UserController::class, 'edit']);
Route::post('Usuario-contraseña', [UserController::class, 'DatosContraseñaUpdate']);
//-------------------------------------------------------

//-------Rutas para Sesión-----------------------------
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//-------------------------------------------------------
