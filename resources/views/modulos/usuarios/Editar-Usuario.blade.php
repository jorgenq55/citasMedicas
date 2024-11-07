@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">

            <h1 class="titulo">EDITOR DEL USUARIO: {{ $usuario->name }}</h1>

        </section>
        <section class="content">

            <div class="box">
                <div class="box-body">
                    @livewire('usuario.editar-usuario', ['usuario' => $usuario, 'consultorios' => $consultorios])
                </div>
            </div>
        </section>
    </div>
@endsection
