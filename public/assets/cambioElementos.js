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
