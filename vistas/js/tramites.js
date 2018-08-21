/*=============================================
 //Date picker EDITAR FECHA
=============================================*/

$('#editarFecha').datepicker({
  format: "yyyy-mm-dd",
    startDate: '-3d',
    language: "es"
});



function registroTramite(){

  /*=============================================
  VALIDANDO EL NOMBRE 
  =============================================*/

  var fecha = $("#nuevaFecha").val();

  if (fecha != "") {

    var expresion  = /^[-0-9]+$/;

    if (!expresion.test(fecha)) {

      $("#nuevaFecha").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en la fecha.</div>');
    
      return false;
    }

  }else{

    $("#nuevaFecha").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO EL CLIENTE O SOLICITANTE 
  =============================================*/

  var solicitante = $("#nuevoSolicitante").val();

  if (solicitante != "") {

    var expresion  = /^[0-9]+$/;

    if (!expresion.test(solicitante)) {

      $("#nuevoSolicitante").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el nombre.</div>');
    
      return false;
    }

  }else{

    $("#nuevoSolicitante").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO EL ASENTAMIENTO 
  =============================================*/

  var asentamiento = $("#nuevoAsentamiento").val();

  if (asentamiento != "") {

    var expresion  = /^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(asentamiento)) {

      $("#nuevoAsentamiento").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el asentamiento.</div>');
    
      return false;
    }

  }else{

    $("#nuevoAsentamiento").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO EL PREDIO 
  =============================================*/

  var predio = $("#nuevoPredio").val();

  if (predio != "") {

    var expresion  = /^[-,.a-zA-Z0-9 ]+$/;

    if (!expresion.test(predio)) {

      $("#nuevoPredio").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el predio.</div>');
    
      return false;
    }

  }else{

    $("#nuevoPredio").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO EL TRAMITE 
  =============================================*/

  var tramite = $("#nuevoTramite").val();

  if (tramite != "") {

    var expresion  = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(tramite)) {

      $("#nuevoTramite").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el tramite.</div>');
    
      return false;
    }

  }else{

    $("#nuevoTramite").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO LA OBSERVACION 
  =============================================*/

  var observacion = $("#nuevaObservacion").val();

  if (observacion != "") {

    var expresion  = /^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(observacion)) {

      $("#nuevaObservacion").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en la observación.</div>');
    
      return false;
    }

  }


  /*=============================================
  VALIDANDO EL ESTADO 
  =============================================*/

  var estado = $("#nuevoEstado").val();

  if (estado != "") {

    var expresion  = /^[0-9]+$/;

    if (!expresion.test(estado)) {

      $("#nuevoEstado").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el estado.</div>');
    
      return false;
    }

  }else{

    $("#nuevoEstado").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO ENVIADO POR 
  =============================================*/

  var enviado = $("#nuevoEnviado").val();

  if (enviado != "") {

    var expresion  = /^[0-9]+$/;

    if (!expresion.test(enviado)) {

      $("#nuevoEnviado").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en enviado por.</div>');
    
      return false;
    }

  }else{

    $("#nuevoEnviado").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo (enviado por) es obligatorio</div>');
    
    return false;
  }

  //fin registroTramites()

}



function modificarTramite(){

  /*=============================================
  VALIDANDO EL NOMBRE 
  =============================================*/

  var fecha = $("#editarFecha").val();

  if (fecha != "") {

    var expresion  = /^[-0-9]+$/;

    if (!expresion.test(fecha)) {

      $("#editarFecha").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en la fecha.</div>');
    
      return false;
    }

  }else{

    $("#editarFecha").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO EL CLIENTE O SOLICITANTE 
  =============================================*/

  var solicitante = $("#editarSolicitante").val();

  if (solicitante != "") {

    var expresion  = /^[0-9]+$/;

    if (!expresion.test(solicitante)) {

      $("#editarSolicitante").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el nombre.</div>');
    
      return false;
    }

  }else{

    $("#editarSolicitante").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO EL ASENTAMIENTO 
  =============================================*/

  var asentamiento = $("#editarAsentamiento").val();

  if (asentamiento != "") {

    var expresion  = /^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(asentamiento)) {

      $("#editarAsentamiento").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el asentamiento.</div>');
    
      return false;
    }

  }else{

    $("#editarAsentamiento").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO EL PREDIO 
  =============================================*/

  var predio = $("#editarPredio").val();

  if (predio != "") {

    var expresion  = /^[-,.a-zA-Z0-9 ]+$/;

    if (!expresion.test(predio)) {

      $("#editarPredio").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el predio.</div>');
    
      return false;
    }

  }else{

    $("#editarPredio").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO EL TRAMITE 
  =============================================*/

  var tramite = $("#editarTramite").val();

  if (tramite != "") {

    var expresion  = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(tramite)) {

      $("#editarTramite").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el tramite.</div>');
    
      return false;
    }

  }else{

    $("#editarTramite").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO LA OBSERVACION 
  =============================================*/

  var observacion = $("#editarObservacion").val();

  if (observacion != "") {

    var expresion  = /^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(observacion)) {

      $("#editarObservacion").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en la observación.</div>');
    
      return false;
    }

  }


  /*=============================================
  VALIDANDO EL ESTADO 
  =============================================*/

  var estado = $("#editarEstado").val();

  if (estado != "") {

    var expresion  = /^[0-9]+$/;

    if (!expresion.test(estado)) {

      $("#editarEstado").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el estado.</div>');
    
      return false;
    }

  }else{

    $("#editarEstado").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO ENVIADO POR 
  =============================================*/

  var enviado = $("#editarEnviado").val();

  if (enviado != "") {

    var expresion  = /^[0-9]+$/;

    if (!expresion.test(enviado)) {

      $("#editarEnviado").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en enviado por.</div>');
    
      return false;
    }

  }else{

    $("#editarEnviado").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo (enviado por) es obligatorio</div>');
    
    return false;
  }

  //fin modificarTramite()


}


/*=============================================
EDITAR TRAMITE
=============================================*/
$(".tablas").on("click", ".btnEditarTramite", function(){

	var idTramite = $(this).attr("idTramite");

	var datos = new FormData();
    datos.append("idTramite", idTramite);

    $.ajax({

      url:"ajax/tramites.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	//console.log("respuesta", respuesta);

      	   $("#idTramite").val(respuesta["id"]);
	       $("#editarFecha").val(respuesta["fecha"]);
	       $("#editarSolicitante").val(respuesta["idCliente"]);
	       $("#editarAsentamiento").val(respuesta["asentamiento"]);
	       $("#editarPredio").val(respuesta["predio"]);
	       $("#editarTramite").val(respuesta["tramite"]);
	       $("#editarObservacion").val(respuesta["observacion"]);
	       $("#editarEstado").val(respuesta["idEstado"]);
           $("#editarEnviado").val(respuesta["idUsuario"]);
	  }

  	})

})

/*=============================================
ELIMINAR TRAMITE
=============================================*/
$(".tablas").on("click", ".btnEliminarTramite", function(){

	var idTramite = $(this).attr("idTramite");
	
	swal({
        title: '¿Está seguro de borrar el tramite?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar tramite!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=tramites&idTramite="+idTramite;
        }

  })

})