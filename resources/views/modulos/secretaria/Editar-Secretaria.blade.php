@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">

            <h1 class="titulo">EDITOR EL/LA SECRETARI@: {{ $secretaria->name }}</h1>

        </section>
        <section class="content">

            <div class="box">
                <div class="box-body">
                    @livewire('secretaria.editar-secretaria', ['secretaria' => $secretaria])
                </div>
            </div>
        </section>
    </div>
@endsection
