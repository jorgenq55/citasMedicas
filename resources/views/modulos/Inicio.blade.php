@extends('plantilla')

@section('content')

<div class="content-wrapper">

    <section class="content-header">

        <h1>Inicio</h1>

    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="col-md-6 bg-primary">
                    <h1>Bienvenidos</h1>
                    <hr>
                    <h2>Días: </h2>
                    @isset($inicio->dias)
                    <h3>{{ $inicio->dias }}</h3>
                    @endisset
                    <hr>
                    <h2>Horarios: </h2>
                    @isset($inicio->horaInicio)
                    <h3>Desde: {{ $inicio->horaInicio }}</h3>
                    <h3>Hasta: {{ $inicio->horaFin }}</h3>
                    @endisset
                    <hr>
                    <h2>Dirección:</h2>
                    @isset($inicio->direccion)
                    <h3>{{ $inicio->direccion }}</h3>
                    @endisset
                    <hr>
                    <h2>Contactos</h2>
                    @isset($inicio->telefono)
                    <h3>Teléfono: {{ $inicio->telefono }} <br>
                    @endisset
                    @isset($inicio->email)
                        Correo: {{ $inicio->email }}</h3>
                        @endisset
                </div>
                <div class="col-md-6">
                    @isset($inicio->logo)
                    <img src="storage/{{$inicio->logo}}" width="200px" class="img-responsive">
                    @endisset
                </div>
            </div>

            @if(auth()->user()->rol == "Administrador")
            <div class="box-footer">
                <a href="{{ url('Inicio-Editar')}}">
                    <button class="btn btn-success btn-lg">Editar</button>
                </a>
            </div>
            @endif

        </div>
    </section>
</div>

@endsection