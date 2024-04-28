<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Clínica </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://127.0.0.1:8000/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://127.0.0.1:8000/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://127.0.0.1:8000/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://127.0.0.1:8000/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://127.0.0.1:8000/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="http://127.0.0.1:8000/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="http://127.0.0.1:8000/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="http://127.0.0.1:8000/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://127.0.0.1:8000/bower_components/bootstrap-daterangepicker/daterangepicker.css">
 
  <link rel="stylesheet" href="http://127.0.0.1:8000/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="http://127.0.0.1:8000/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css" >

  {{-- FullCalendar --}}
  <link rel="stylesheet" href="http://127.0.0.1:8000/bower_components/fullcalendar\dist\fullcalendar.min.css">
  <link rel="stylesheet" href="http://127.0.0.1:8000/bower_components/fullcalendar\dist\fullcalendar.print.min.css" media="print">

  {{-- FullCalendar --}}
  <link rel="stylesheet" href="http://127.0.0.1:8000/bower_components/select2/dist/css/select2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini login-page">
  

 


@if(Auth::user())
  <div class="wrapper">
    @include('modulos.cabecera')
    
    @if(Auth::user()->rol =="Secretaria")
    @include('modulos.menuSecretaria')

    @elseif(Auth::user()->rol =="Doctor")
    @include('modulos.menuDoctor')

    @elseif(Auth::user()->rol =="Paciente")
    @include('modulos.menuPaciente')

    @else
    @include('modulos.menuAdministrador')

    @endif
    
    @yield('content')
  </div>
@else

@yield('contenido')

@endif



<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://127.0.0.1:8000/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://127.0.0.1:8000/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
{{-- <script>
  $.widget.bridge('uibutton', $.ui.button);
</script> --}}
<!-- Bootstrap 3.3.7 -->
<script src="http://127.0.0.1:8000/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="http://127.0.0.1:8000/bower_components/raphael/raphael.min.js"></script>
<script src="http://127.0.0.1:8000/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="http://127.0.0.1:8000/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="http://127.0.0.1:8000/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="http://127.0.0.1:8000/bower_components/moment/min/moment.min.js"></script>
<script src="http://127.0.0.1:8000/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="http://127.0.0.1:8000/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="http://127.0.0.1:8000/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://127.0.0.1:8000/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://127.0.0.1:8000/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="http://127.0.0.1:8000/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://127.0.0.1:8000/dist/js/demo.js"></script>

<script src="http://127.0.0.1:8000/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

{{-- DataTables --}}
<script src="http://127.0.0.1:8000/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://127.0.0.1:8000/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="http://127.0.0.1:8000/bower_components/datatables.net/js/dataTables.bootstrap.min.js"></script>

{{-- FullCalendar --}}
<script src="http://127.0.0.1:8000/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="http://127.0.0.1:8000/bower_components/fullcalendar/dist/locale/es.js"></script>
<script src="http://127.0.0.1:8000/bower_components/moment/dist/moment.js"></script>

{{-- Select 2 --}}
<script src="http://127.0.0.1:8000/bower_components/select2/dist/js/select2.js"></script>

  <script>
  $(".table").DataTable({
  
  language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          }
    },
   
});

  $('#select2').select2();

  </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('registrado') ==  'Si')

<script type="text/javascript">

Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'El doctor a sido registrado',
  showConfirmButton: false,
  timer: 1500
})

</script>

@endif



<script type="text/javascript">

$('.table').on('click', '.EliminarDoctor', function(){

  var Did = $(this).attr('Did');

  Swal.fire({


    title: 'Eliminar Doctor',
    text: 'Seguro que Desea Elimnar este Doctor?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    CancelButtonText: 'Cancelar',
    confirmButtonText: 'Eliminar!'
    
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        
      )
      
      window.location = "Eliminar-Doctor/"+Did;
    } 
  })
})
</script>

@if(session('paciente') ==  'Si')

<script type="text/javascript">
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'El Paciente a sido creado',
  showConfirmButton: false,
  timer: 1500
})
</script>

@elseif(session('actualizadoP') ==  'Si')

<script type="text/javascript">
  
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'El Paciente a sido actualizado',
  showConfirmButton: false,
  timer: 1500
})
</script>

@elseif(session('SecretariaCreada') ==  'Si')

<script type="text/javascript">
  
Swal.fire(
  'La Secretaria ha sido Registrada',
  '',
  'success'
)
</script>

@endif



<script type="text/javascript">
$('.table').on('click', '.EliminarPaciente', function(){

var Pid = $(this).attr('Pid');
var Paciente = $(this).attr('Paciente');

Swal.fire({


  title: 'Eliminar Paciente',
  text: 'Seguro que Desea Elimnar el Paciente'+Paciente+'?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  CancelButtonText: 'Cancelar',
  confirmButtonText: 'Eliminar!'
  
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
      
    )
    
    window.location = "Eliminar-Paciente/"+Pid;
  } 
})
})

$('.table').on('click', '.EliminarSecretaria', function(){
var Sid = $(this).attr('Sid');

Swal.fire({


  title: '¿Seguro',
  text: 'Seguro que Desea Elimnar la secretaria?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  CancelButtonText: 'Cancelar',
  confirmButtonText: 'Eliminar!'
  
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
      
    )
    
    window.location = "Eliminar-Secretaria/"+Sid;
  } 
})
})

  
</script>

<?php
  $exp = explode("/", $_SERVER["REQUEST_URI"]);
?>

@if($exp[1] =="Editar-Secretaria")
  
  <script type="text/javascript">
    $(document).ready(function(){
      $('#EditarSecretaria').modal('toggle');
    })
  </script>

@endif

@if( $exp[1] == "Citas")

<script type="text/javascript">

  $('#calendario').fullCalendar({
    defaultView: 'agendaWeek',
    hiddenDays: [0,6],

    events:[

      @foreach($citas as $cita)
        @if(auth()->user()->rol == "Doctor")
          {
            id: '{{$cita->id}}',
            title: '{{$cita->PAC->name}}',
            start:  '{{$cita->FyHinicio}}',
            end: '{{$cita->FyHfinal}}'
          },

        @elseif(auth()->user()->rol == "Paciente")

          @if($cita->id_paciente == auth()->user()->id)
            {
                id: '{{$cita->id}}',
                title: '{{$cita->PAC->name}}',
                start:  '{{$cita->FyHinicio}}',
                end: '{{$cita->FyHfinal}}'
              },
          @else
              {
                id: '{{$cita->id}}',
                title: 'No disponible',
                start:  '{{$cita->FyHinicio}}',
                end: '{{$cita->FyHfinal}}'
              },
          @endif
        @endif

      @endforeach
    ],
    
    @if($horarios != null)
      scrollTime: "{{$hora->horaInicio}}",
      minTime: "{{$hora->horaInicio}}",
      maxTime: "{{$hora->horaFin}}",
    @else
      scrollTime: null,
      minTime: null,
      maxTime: null,
    @endisset

    dayClick: function(date, jsEvent, view){

      var fecha = date.format();
      var hora = ("01:00:00").split(":");
      fecha = fecha.split("T");

      var hora1 = (fecha[1].split(":"));

      HI = parseFloat(hora1[0]);
      HA = parseFloat(hora[0]);
      var horaFinal = HI + HA;

      if (horaFinal < 10 && horaFinal > 0) {
        var HF = "0"+horaFinal+":00:00";
      }
      else var HF = horaFinal+":00:00";

      n = new Date();
      d = n.getDate(),
      m = n.getMonth()+1,
      y = n.getFullYear();

      if(m< 10){
        M= "0"+m;
        if(d<10){
          D = "0"+d;
          diaActual = y+"-"+M+"-"+D;
        }
        else{
          diaActual = y+"-"+M+"-"+d;
        }
      }
      else{
        diaActual = y+"-"+m+"-"+d;
      }

      if(diaActual <= fecha[0]){
        if("{{ auth()->user()->rol}}" == "Doctor")
        $('#CitaModal').modal();
        else if("{{ auth()->user()->rol}}" == "Paciente")
        $('#Cita').modal();
      }

      
      $('#Fecha').val(fecha[0]);
      $('#Hora').val(hora1[0]+":00:00");
      $('#FyHinicio').val(fecha[0]+" "+hora1[0]+":00:00");
      $('#FyHfinal').val(fecha[0]+" "+HF);

      $('#FechaP').val(fecha[0]);
      $('#HoraP').val(hora1[0]+":00:00");
      $('#FyHinicioP').val(fecha[0]+" "+hora1[0]+":00:00");
      $('#FyHfinalP').val(fecha[0]+" "+HF);
    },

    eventClick:function(calEvent,jsEvent,view){
      if("{{ auth()->user()->rol}}" == "Doctor"){
        $('#EventoModal').modal();
      }
      $('#paciente').html(calEvent.title);
      $('#idCita').val(calEvent.id);
    }
    
  });

  @endif

</script>

</body>
</html>
