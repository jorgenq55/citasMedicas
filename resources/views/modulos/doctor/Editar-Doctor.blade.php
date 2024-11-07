@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">

            <h1 class="titulo">EDITOR DEL DOCTOR: {{ $doctor->name }}</h1>

        </section>
        <section class="content">

            <div class="box">
                <div class="box-body">
                    @livewire('doctor.editar-doctor', ['doctor' => $doctor, 'consultorios' => $consultorios])
                </div>
            </div>
        </section>
    </div>
@endsection
