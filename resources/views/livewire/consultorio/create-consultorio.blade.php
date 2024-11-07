<div>
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
                        @if ($message != '')
                            <div class="alert alert-success" role="alert">
                                <p>{{ _('Se agregó el consultorio:  ' . $message . ' con exito!') }}</p>

                            </div>
                        @endif
                        <div class="row">
                            <form wire:submit.prevent="save">

                                {{-- @csrf method="post" --}}

                                <div class="col-md-6 col-xs-12">

                                    <input type="text" class="form-control input-lg" name="consultorio"
                                        placeholder="Ingrese Nuevo Consultorio" wire:model="consultorio" required>

                                </div>

                                <button type="submit" class="btn btn-primary">Agregar Consultorio</button>

                            </form>
                        </div>
                        <br>

                        <div class="row" >
                            @foreach ($consultorios as $consultorio)
                            
                                <div class="col-md-6 ">
                                    <form method="post" action="{{ url('Consultorio/' . $consultorio->id) }}">

                                        @csrf
                                        @method('put')

                                        <div class="col-md-8">

                                            <input type="text" name="consultorioE" class="form-control input-lg "
                                                value="{{ $consultorio->consultorio }}">
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-success" type="submit">Guardar</button>
                                        </div>

                                    </form>


                                    <div class="col-md-2">
                                        <form method="post" action="{{ url('borrar-Consultorio/' . $consultorio->id) }}">

                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger">borrar</button>
                                        </form>
                                    </div>
                                </div>
                               
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection

</div>
