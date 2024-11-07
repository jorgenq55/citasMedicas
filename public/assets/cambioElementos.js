
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
              "first": " Primero ",
              "last": " Ultimo ",
              "next": " -→ ",
              "previous": " ←- "
            }
      },
     
  });
  
    $('#select2').select2();

    $('.table').on('click', '.EliminarDoctor', function(){
      
        var Did = $(this).attr('Did');
      
        Swal.fire({
          title: 'Eliminar Doctor',
          text: 'Seguro que Desea Elimnar el registro?',
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

      $('.table').on('click', '.EliminarPaciente', function(){

        var Pid = $(this).attr('Pid');
        var Paciente = $(this).attr('Paciente');
        
        Swal.fire({
        
        
          title: 'Eliminar Paciente',
          text: 'Seguro que Desea Elimnar el Paciente: '+Paciente+'?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          CancelButtonText: 'Cancelar',
          confirmButtonText: 'Eliminar!'
          
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Borrado!',
              'Registro Borrado.',
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
              'Registro Borrado.',
              'success'
              
            )
            
            window.location = "Eliminar-Secretaria/"+Sid;
          } 
        })
        })
jQuery(function($)
{
    $("#boti").click(function(){
        console.log("sssss");
      });
     
      $('#formEditDatosPersonales').on('submit',function(event){
        event.preventDefault();
        let form = this;
        let formData = new FormData(form);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/Mis-Datos",
            type:"POST",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success:function(response){   
                //cargadoGuardar('guardarBoton');        
                console.log(data);     
                if(!alert(response.success)){location.reload();} 
            },
            error :function( data ) {
                console.log(data);
                //cargadoGuardar('guardarBoton');
            },
        });
    });
    
});
