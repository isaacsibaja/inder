

/*=============================================
PREGUNTAR SI DESEA ENVIAR UNA RESPUESTA

$('#editarSolicitudRespuesta').on('change', function(){
   this.value = this.checked ? 1 : 0;
   alert(this.value);
}).change();
=============================================*/

/*=============================================
VALIDANDO INSERTAR TRAMITE
=============================================*/

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

    var expresion  = /^[#.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

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

    var expresion  = /^[-,.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

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

  var tramite = $("#nuevoTipoTramite").val();

  if (tramite != "") {

    var expresion  = /^[0-9]+$/;

    if (!expresion.test(tramite)) {

      $("#nuevoTipoTramite").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el tipo trámite.</div>');
    
      return false;
    }

  }else{

    $("#nuevoTipoTramite").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO SOLICITUD RESPUESTA

    var solicitud = $("#nuevaSolicitudRespuesta").val();

  if (solicitud != "") { 
  ///^[.a-zA-Z0-9 ]+$/;
  
    var expresion  = /^[0-9]+$/;

    if (!expresion.test(solicitud)) {

      $("#idNuevaSolicitudRespuesta").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en solicitud respuesta.</div>');
    
      window.alert(solicitud);

      return false;
    }

  }else{

    $("#idNuevaSolicitudRespuesta").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Solicitud respuesta es un campo obligatorio.</div>');
    
    return false;
  }
  =============================================*/


  /*=============================================
  VALIDANDO LA RESPUESTA
  =============================================*/

  var respuesta = $("#nuevaRespuesta").val();

  if (respuesta != "") {

    var expresion  = /^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(respuesta)) {

      $("#nuevaRespuesta").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en la respuesta.</div>');
    
      return false;
    }

  }else{

    $("#nuevaRespuesta").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
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

    var expresion  = /^[-,.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

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

  var tramite = $("#editarTipoTramite").val();

  if (tramite != "") {

    var expresion  = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(tramite)) {

      $("#editarTipoTramite").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el tramite.</div>');
    
      return false;
    }

  }else{

    $("#editarTipoTramite").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
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

  var enviado = $("#editarRespuesta").val();

  if (enviado != "") {

    var expresion  = /^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(enviado)) {

      $("#editarRespuesta").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en enviado por.</div>');
    
      return false;
    }

  }else{

    $("#editarRespuesta").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo (enviado por) es obligatorio</div>');
    
    return false;
  }

 /*=============================================
  VALIDANDO SOLICITUD RESPUESTA
  =============================================*/

  var solicitud = $("#editarSolicitudRespuesta").val();

  if (solicitud != "") {

    var expresion  = /^[0-9]+$/;

    if (!expresion.test(solicitud)) {

      $("#idEditarSolicitudRespuesta").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en solicitud respuesta.</div>');

      window.alert(solicitud);

      return false;
    }

  }else{

    $("#idEditarSolicitudRespuesta").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Solicitud respuesta es un campo obligatorio.</div>');
    
    return false;
  }




  /*=============================================
  VALIDANDO EL ENVIADO

  var estado = $("#editarEnviado").val();

  if (estado != "") {

    var expresion  = /^[0-9]+$/;

    if (!expresion.test(estado)) {

      $("#editarEnviado").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el estado.</div>');
    
      return false;
    }

  }else{

    $("#editarEnviado").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }
  =============================================*/

  

  //fin modificarTramite()


}


/*=============================================
EDITAR TRAMITE
=============================================*/
$(".tablas").on("click", ".btnEditarTramite", function(){

	var idTramite = $(this).attr("idTramite");
  //var idSolicitudRespuesta = $(this).attr("idSolicitudRespuesta");

	var datos = new FormData();
    datos.append("idTramite", idTramite);
    //datos.append("idSolicitudRespuesta", idSolicitudRespuesta);

    $.ajax({

      url:"ajax/tramites.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
        console.log("respuesta", respuesta);

        	 $("#idTramite").val(respuesta["id"]);
           $("#idSolicitudRespuesta").val(respuesta["solicitudRespuesta"]);
  	       $("#editarFecha").val(respuesta["fecha"]);
  	       $("#editarSolicitante").val(respuesta["idCliente"]);
  	       $("#editarAsentamiento").val(respuesta["asentamiento"]);
  	       $("#editarPredio").val(respuesta["predio"]);

           $("#editarTipoTramite").val(respuesta["idTipoTramite"]);
  	       $("#editarObservacion").val(respuesta["observacion"]);
  	       $("#editarEstado").val(respuesta["idEstado"]);
           $("#editarEnviado").val(respuesta["idUsuario"]);
           $("#editarRespuesta").val(respuesta["respuesta"]);

           //$("#editarSolicitudRespuesta").val(respuestas["solicitudRespuesta"]);

           //Eliminando el valor del radio buttom selecionado anteriormente

           $("#siT").removeAttr("checked");
           $("#noT").removeAttr("checked");

           //BOTON DE SEGUIMIENTOS

           if (respuesta["solicitudRespuesta"] == "1") {

            $("#siT").attr("checked", respuesta["solicitudRespuesta"]);

           }else{
            
              $("#noT").attr("checked", respuesta["solicitudRespuesta"]);
           }

    	  }

  	})

})

/*=============================================
ELIMINAR TRAMITE
=============================================*/
$(".tablas").on("click", ".btnEliminarTramite", function(){

	var idTramite = $(this).attr("idTramite");
	
	swal({
        title: '¿Está seguro de borrar el trámite?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar trámite!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=tramites&idTramite="+idTramite;
        }

  })

})




/*=============================================
IMPRIMIR TRAMITE PDF
=============================================*/


$(".tablas").on("click", ".btnImprimirTramite", function(){

  var id = $(this).attr("codigoTramite");

  window.open("extensiones/tcpdf/pdf/tramite.php?id="+id, "_blank");

})