@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">

            <h1 class="titulo">EDITOR DEL PACIENTE: {{ $paciente->name }}</h1>

        </section>
        <section class="content">

            <div class="box">
                <div class="box-body">
                    <livewire:paciente.editar-paciente  :paciente="$paciente"/>

                </div>
            </div>
        </section>
    </div>
@endsection
