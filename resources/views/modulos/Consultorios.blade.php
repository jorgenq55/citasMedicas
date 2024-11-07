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
                <livewire:consultorio.create-consultorio :consultorios="$consultorios" />
            
                </div>
            </div>
        </section>
    </div>
@endsection
