/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarTipoTramite", function(){

	var idTipoTramite = $(this).attr("idTipoTramite");

	var datos = new FormData();
    datos.append("idTipoTramite", idTipoTramite);

    $.ajax({

      url:"ajax/tipotramite.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	 $("#idTipoTramite").val(respuesta["id"]);
	       $("#editarTipo").val(respuesta["tipo"]);
	       $("#editarRespuesta").val(respuesta["respuesta"]);
	       
	  }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarTipoTramite", function(){

	var idTipoTramite = $(this).attr("idTipoTramite");
	
	swal({
        title: '¿Está seguro de borrar el tipo de trámite?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar tipo trámite!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=tipotramite&idTipoTramite="+idTipoTramite;
        }

  })

})