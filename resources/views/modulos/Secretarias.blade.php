@extends('plantilla')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <h1>Gestor de Secretarias</h1>

        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">{{ session('message') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearSecretaria">
                        <i class="fa fa-external-link-square" aria-hidden="true"></i> 
                        Nueva Secretaria
                    </button>
                </div>
                <div class="box-body">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Documento</th>
                                <th>Teléfono</th>

                                <th>Editar / Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($secretarias as $secretaria)
                                <tr>
                                    <td>{{ $secretaria->id }}</td>
                                    <td>{{ $secretaria->name }}</td>
                                    <td>{{ $secretaria->email }}</td>

                                    @if ($secretaria->documento != '')
                                        <td>{{ $secretaria->documento }}</td>
                                    @else
                                        <td>No disponible.</td>
                                    @endif

                                    @if ($secretaria->telefono != '')
                                        <td>{{ $secretaria->telefono }}</td>
                                    @else
                                        <td>Aún no Registrado.</td>
                                    @endif

                                    <td>
                                        <a href= "Editar-Secretaria/{{ $secretaria->id }}">
                                            <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                        </a>


                                        <button class="btn btn-danger EliminarSecretaria" Sid="{{ $secretaria->id }}"><i
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
    
    <div id="CrearSecretaria" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <livewire:secretaria.create-secretaria  />
                </div>

            </div>

        </div>
    </div>
@endsection
