@extends('plantilla')

@section('content')

<div class="content-wrapper">

    <section class="content-header">

        <h1>Crear Paciente</h1>

    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <h2>Nombre y Apellido</h2>
                        <input type="text" name="name" class="form-control input-lg">
                    </div>

                    <div class="form-group">
                        <h2>Documento</h2>
                        <input type="text" name="documento" class="form-control input-lg" required>
                    </div>

                    <div class="form-group">
                        <h2>Email</h2>
                        <input type="email" class="form-control input-lg" name="email" value="">

                        @error('email')
                            <div class="alert alert-danger">El Email ya Existe.</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <h2>Constraseña:</h2>
                        <input type="text" class="form-control input-lg" name="password" value="" required>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary btn-lg">Agregar</button>
            
                </form>
            </div>
        </div>
    </section>
</div>

@endsection