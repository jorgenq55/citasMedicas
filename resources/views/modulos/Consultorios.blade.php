@extends('plantilla')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>Gestor de Consultorios</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-body">
                <br>
                <livewire:consultorio.create-consultorio />
                <br>

                    @foreach ($consultorios as $consultorio)
                        <div class="row">

                            <form method="post" action="{{ url('Consultorio/' . $consultorio->id) }}">

                                @csrf
                                @method('put')

                                <div class="col-md-4">

                                    <input type="text" name="consultorioE" class="form-control"
                                        value="{{ $consultorio->consultorio }}">
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-success" type="submit">Guardar</button>
                                </div>

                            </form>

                            <div class="col-md-1">
                                <form method="post" action="{{ url('borrar-Consultorio/' . $consultorio->id) }}">

                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger">borrar</button>
                                </form>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
