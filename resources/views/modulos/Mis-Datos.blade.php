@extends('plantilla')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <h1 class="titulo">Mis Datos Personales</h1>

        </section>
        <section class="content">
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                <p>{{ _(session('message')) }}</p>

            </div>
        @endif
            <div class="box">
                <div class="box-body">

                    <form method="post" role="form" action="{{ url('Mis-Datos') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">

                                <h2>Nombre y Apellido</h2>
                                <input type="text" class="form-control input-lg" name="name"
                                    value="{{ auth()->user()->name }}">
                                @error('name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <h2>Email</h2>
                                <input type="email" class="form-control input-lg" name="email" readonly
                                    value="{{ auth()->user()->email }}">

                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Teléfono</h2>
                                <input type="text" class="form-control input-lg" name="telefono"
                                    value="{{ auth()->user()->telefono }}">
                                @error('telefono')
                                    <span class="error">{{ $message }}</span>
                                @enderror


                            </div>
                            <div class="col-md-6">
                                <h2>Documento</h2>
                                <input type="text" class="form-control input-lg" name="documento"
                                    value="{{ auth()->user()->documento }}">
                                @error('documento')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4"> </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
                                <div class="col-md-4"> </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="box">
                <form method="post" role="form" action="{{ url('Mis-Datos-contraseña') }}">
                    @csrf
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-6">
                            <h2>Cambiar Contraseña</h2>
                            <input type="password" class="form-control input-lg" name="password" placeholder="Ingresa la nueva contraseña" value="">
                            @error('password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <br><br><br>

                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                    </div>
                </div>
            </form>
            </div>
        </section>
    </div>
@endsection
