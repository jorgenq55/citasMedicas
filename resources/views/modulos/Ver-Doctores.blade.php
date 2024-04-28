@extends('plantilla')

@section('content')

<div class="content-wrapper">

    <section class="content-header">

        <h1>Doctores del Consultorio de:</h1>
        <b>{{$consultorio->consultorio}}</b>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-dordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombre y Apellido</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Horario</th>
                            <th>Opción</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($horarios as $hora)
                            @foreach($doctores as $doctor)
                                @if($hora->id_doctor == $doctor->id)
                                    <tr>
                                        <td>{{ $doctor->name}}</td>
                                        <td>{{ $doctor->email}}</td>
                                        @if($doctor->telefono != null)
                                            <td>{{ $doctor->telefono}}</td>
                                        @else
                                            <td>No disponible</td>
                                        @endif

                                        <td>{{ $hora->horaInicio }} - {{ $hora->horaFin }}</td>
                                        <td>
                                            <a href="{{ url('Citas/'.$doctor->id)}}">
                                                <button class="btn btn-primary">Agenda de Citas</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                         @endforeach
                    </tbody>
                </table>    
            </div>
        </div>
    </section>
</div>

@endsection