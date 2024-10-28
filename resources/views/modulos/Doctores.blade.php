@extends('plantilla')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <h1>Gestor de Doctores</h1>

        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">{{ session('message') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearDoctor">
                        Nuevo Doctor
                    </button>

                </div>

                <div class="box-body">

                    <table class="table table-bordered table-hover table-striped dt-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre y Apellido</th>
                                <th>Consultorio</th>
                                <th>Email</th>
                                <th>Documento</th>
                                <th>Teléfono</th>
                                <th>Opciones</th>
                            </tr>

                        </thead>
                        <tbody>

                            @foreach ($doctores as $doctor)
                                @if ($doctor->rol == 'Doctor')
                                    <tr>
                                        <td>{{ $doctor->id }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->consultorios->consultorio }}</td>
                                        <td>{{ $doctor->email }}</td>

                                        @if ($doctor->documento != ' ')
                                            <td>{{ $doctor->documento }}</td>
                                        @else
                                            <td>No se dispone de documento</td>
                                        @endif

                                        @if ($doctor->telefono != ' ')
                                            <td>{{ $doctor->telefono }}</td>
                                        @else
                                            <td>No se dispone de Telefono</td>
                                        @endif

                                        <td>
                                            <button class="btn btn-danger EliminarDoctor" Did={{ $doctor->id }}><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach


                        </tbody>

                    </table>

                </div>
            </div>
        </section>

    </div>

    <div id="CrearDoctor" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <livewire:doctor.create-doctor  :consultorios="$consultorios" />
                </div>

            </div>

        </div>
    </div>
@endsection
