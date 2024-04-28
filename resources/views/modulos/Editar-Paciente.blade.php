@extends('plantilla')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Editar el Paciente: {{$paciente->name}}</h1>

        </section>

        <section class="content">
            <div class="box">

                <div class="box-header">
                    <a href="{{ url('Pacientes')}}">
                    <button class="btn btn-primary">Volver a Pacientes</button>
                    </a>
                </div>

            </div>

            <div class="box-body">

                <form method="post" action="{{ url('actualizar-Paciente/'.$paciente->id)}}">

                    @csrf
                    @method('put')

                    <h2>Nombre y Apellido:</h2>
                    <input type="text" class="form-control input-lg" name="name"
                    value="{{$paciente->name}}" >

                    <h2>Documento:</h2>
                    <input type="text" class="form-control input-lg" name="documento"
                    value="{{$paciente->documento}}" >

                    <h2>Email:</h2>
                    <input type="text" class="form-control input-lg" name="email"
                    value="{{$paciente->email}}" >

                    <h2>Nueva Contraseña</h2>
                    <input type="text" class="form-control input-lg" name="passwordN"
                    value="" >

                    <input type="hidden" class="form-control input-lg" name="password"
                    value="{{$paciente->password}}" >

                    
                    <h2>Teléfono:</h2>
                    <input type="text" class="form-control input-lg" name="telefono"
                    value="{{$paciente->telefono}}" >

                    <br><br>

                    <button class="btn btn-success" type="submit">Actualizar</button>
                </form>

            </div>
        </section>
    </div>

@endsection