@extends('plantilla')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <h1>Administración de Usuarios</h1>

        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">{{ session('message') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearUsuario">
                        <i class="fa fa-external-link-square " aria-hidden="true"></i> 
                        Nuevo Usuario
                    </button>

                </div>

                <div class="box-body">

                    <table class="table table-bordered table-hover table-striped dt-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre y Apellido</th>
                                <th>Email</th>
                                <th>Documento</th>
                                <th>Rol</th>
                                <th>Opciones</th>
                            </tr>

                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        
                                        <td>{{ $user->email }}</td>

                                        @if ($user->documento != ' ')
                                            <td>{{ $user->documento }}</td>
                                        @else
                                            <td>No se dispone de documento</td>
                                        @endif

                                        @if ($user->rol != ' ')
                                            <td>{{ $user->rol }}</td>
                                        @else
                                            <td>No se dispone de Telefono</td>
                                        @endif

                                        <td>
                                            <a href= "Editar-Usuario/{{ $user->id }}">
                                                <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                            </a>

                                            <button class="btn btn-danger EliminarDoctor" Did={{ $user->id }}><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                            @endforeach


                        </tbody>

                    </table>

                </div>
            </div>
        </section>

    </div>

    <div id="CrearUsuario" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <livewire:usuario.create-usuario :consultorios="$consultorios" />
                </div>

            </div>

        </div>
    </div>
@endsection
