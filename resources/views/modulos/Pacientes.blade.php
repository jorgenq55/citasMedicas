@extends('plantilla')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <h1>Gestor de Pacientes</h1>

        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">{{ session('message') }}
                        </div>
                    @endif
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearPaciente">
                        Nuevo Paciente
                    </button>


                </div>

                <div class="box-body">

                    <table class="table table-bordered table-hover table-striped dt-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre y Apellido</th>
                                <th>Documento</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Editar / Borrar</th>
                            </tr>

                        </thead>
                        <tbody>

                            @foreach ($pacientes as $paciente)
                                <tr>
                                    <td>{{ $paciente->id }}</td>
                                    <td>{{ $paciente->name }}</td>
                                    <td>{{ $paciente->documento }}</td>
                                    <td>{{ $paciente->email }}</td>

                                    @if ($paciente->telefono != '')
                                        <td>{{ $paciente->telefono }}</td>
                                    @else
                                        <td>No disponible</td>
                                    @endif
                                    <td>

                                        <a href= "Editar-Paciente/{{ $paciente->id }}">
                                            <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                        </a>
                                        <button class="btn btn-danger EliminarPaciente" Pid="{{ $paciente->id }}"
                                            Paciente="{{ $paciente->name }}"><i class="fa fa-trash"></i></button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>
            </div>
        </section>
    </div>

    <div id="CrearPaciente" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <livewire:paciente.create-paciente  :consultorios="$consultorios"/>
                </div>

            </div>

        </div>
    </div>
@endsection
