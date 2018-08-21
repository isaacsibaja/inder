/*=============================================
 //Date picker NUEVO PLAZO
=============================================*/

$('#nuevoPlazo').datepicker({
	format: "yy-mm-dd",
    startDate: '-3d',
    language: "es"
});

/*=============================================
 //Date picker NUEVO PLAZO AÑO NUEVO
=============================================*/

$('#nuevoPlazoAnoNuevo').datepicker({
  format: "yy-mm-dd",
    startDate: '-3d',
    language: "es"
});

/*=============================================
 //Date picker EDITAR FECHA
=============================================*/

$('#editarFecha').datepicker({
  format: "yy-mm-dd",
    startDate: '-60d',
    language: "es"
});

/*=============================================
 //Date picker EDITAR PLAZO
=============================================*/

$('#editarPlazo').datepicker({
  format: "yy-mm-dd",
    startDate: '-3d',
    language: "es"
});



/*=============================================
  VALIDANDO INSERTAR OFICIO
  =============================================*/

function registroOficio(){

  /*=============================================
  VALIDANDO LA FECHA
  =============================================*/

  var fecha = $("#nuevaFecha").val();

  if (fecha != "") {

    var expresion  = /^[-a-zA-Z0-9 ]+$/;

    if (!expresion.test(fecha)) {

      $("#nuevaFecha").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en la fecha.</div>');
    
      return false;
    }

  }else{

    $("#nuevaFecha").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO EL OFICIO
  =============================================*/

  var oficio = $("#nuevoOficio").val();

  if (oficio != "") {

    var expresion  = /^[0-9 ]+$/;

    if (!expresion.test(oficio)) {

      $("#nuevoOficio").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el oficio.</div>');
    
      return false;
    }

  }else{

    $("#nuevoOficio").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO DIRIGIDO
  =============================================*/

  var dirigido = $("#nuevoDirigido").val();

  if (dirigido != "") {

    var expresion  = /^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(dirigido)) {

      $("#nuevoDirigido").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en dirigido.</div>');
    
      return false;
    }

  }else{

    $("#nuevoDirigido").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO EL NUEVO ASUNTO
  =============================================*/

  var asunto = $("#nuevoAsunto").val();

  if (asunto != "") {

    var expresion  = /^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(asunto)) {

      $("#nuevoAsunto").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en asunto.</div>');
    
      return false;
    }

  }else{

    $("#nuevoAsunto").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO ENVIADO POR  
  =============================================*/

  var enviado = $("#nuevoEnviado").val();

  if (enviado != "") {

    var expresion  = /^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(enviado)) {

      $("#nuevoEnviado").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en enviado.</div>');
    
      return false;
    }

  }

  /*=============================================
  VALIDANDO NUEVO PLAZO DE RESPUESTA
  =============================================*/

  var plazo = $("#nuevoPlazo").val();

  if (plazo != "") {

    var expresion  = /^[-0-9 ]+$/;

    if (!expresion.test(plazo)) {

      $("#nuevoPlazo").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en plazo respuesta.</div>');
    
      return false;
    }

  }else{

    $("#nuevoPlazo").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO EL ESTADO DEL OFICIO
  =============================================*/

  var estado = $("#nuevoEstado").val();

  if (estado != "") {

    var expresion  = /^[a-zA-Z0-9 ]+$/;

    if (!expresion.test(estado)) {

      $("#nuevoEstado").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el estado.</div>');
    
      return false;
    }

  }

}






/*=============================================
  VALIDANDO INSERTAR OFICIO ANO NUEVO
  =============================================*/

function registroOficioAnual(){

  /*=============================================
  VALIDANDO LA FECHA
  =============================================*/

  var fecha = $("#nuevaFechaAnoNuevo").val();

  if (fecha != "") {

    var expresion  = /^[-a-zA-Z0-9 ]+$/;

    if (!expresion.test(fecha)) {

      $("#nuevaFechaAnoNuevo").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en la fecha.</div>');
    
      return false;
    }

  }else{

    $("#nuevaFechaAnoNuevo").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO EL OFICIO
  =============================================*/

  var oficio = $("#nuevoOficioAnoNuevo").val();

  if (oficio != "") {

    var expresion  = /^[0-9 ]+$/;

    if (!expresion.test(oficio)) {

      $("#nuevoOficioAnoNuevo").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el oficio.</div>');
    
      return false;
    }

  }else{

    $("#nuevoOficioAnoNuevo").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO DIRIGIDO
  =============================================*/

  var dirigido = $("#nuevoDirigidoAnoNuevo").val();

  if (dirigido != "") {

    var expresion  = /^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(dirigido)) {

      $("#nuevoDirigidoAnoNuevo").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en dirigido.</div>');
    
      return false;
    }

  }else{

    $("#nuevoDirigidoAnoNuevo").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO EL NUEVO ASUNTO
  =============================================*/

  var asunto = $("#nuevoAsuntoAnoNuevo").val();

  if (asunto != "") {

    var expresion  = /^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(asunto)) {

      $("#nuevoAsuntoAnoNuevo").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en asunto.</div>');
    
      return false;
    }

  }else{

    $("#nuevoAsuntoAnoNuevo").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO ENVIADO POR  
  =============================================*/

  var enviado = $("#nuevoEnviadoAnoNuevo").val();

  if (enviado != "") {

    var expresion  = /^[-a-zA-Z0-9 ]+$/;

    if (!expresion.test(enviado)) {

      $("#nuevoEnviadoAnoNuevo").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el teléfono.</div>');
    
      return false;
    }

  }

  /*=============================================
  VALIDANDO NUEVO PLAZO DE RESPUESTA
  =============================================*/

  var plazo = $("#nuevoPlazoAnoNuevo").val();

  if (plazo != "") {

    var expresion  = /^[-0-9 ]+$/;

    if (!expresion.test(plazo)) {

      $("#nuevoPlazoAnoNuevo").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en plazo respuesta.</div>');
    
      return false;
    }

  }else{

    $("#nuevoPlazoAnoNuevo").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO EL ESTADO DEL OFICIO
  =============================================*/

  var estado = $("#nuevoEstadoAnoNuevo").val();

  if (estado != "") {

    var expresion  = /^[a-zA-Z0-9 ]+$/;

    if (!expresion.test(estado)) {

      $("#nuevoEstadoAnoNuevo").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el estado.</div>');
    
      return false;
    }

  }

}






/*=============================================
  VALIDANDO MODIFICACION DE OFICIO
=============================================*/
  
function modificarOficio(){

 /*=============================================
  VALIDANDO LA FECHA
  =============================================*/

  var fecha = $("#editarFecha").val();

  if (fecha != "") {

    var expresion  = /^[-a-zA-Z0-9 ]+$/;

    if (!expresion.test(fecha)) {

      $("#editarFecha").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en la fecha.</div>');
    
      return false;
    }

  }else{

    $("#editarFecha").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO EL OFICIO
  =============================================*/

  var oficio = $("#editarOficio").val();

  if (oficio != "") {

    var expresion  = /^[0-9 ]+$/;

    if (!expresion.test(oficio)) {

      $("#editarOficio").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el oficio.</div>');
    
      return false;
    }

  }else{

    $("#editarOficio").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO DIRIGIDO
  =============================================*/

  var dirigido = $("#editarDirigido").val();

  if (dirigido != "") {

    var expresion  = /^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(dirigido)) {

      $("#editarDirigido").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en dirigido.</div>');
    
      return false;
    }

  }else{

    $("#editarDirigido").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO EL NUEVO ASUNTO
  =============================================*/

  var asunto = $("#editarAsunto").val();

  if (asunto != "") {

    var expresion  = /^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(asunto)) {

      $("#editarAsunto").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en asunto.</div>');
    
      return false;
    }

  }else{

    $("#editarAsunto").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO ENVIADO POR  
  =============================================*/

  var enviado = $("#editarEnviado").val();

  if (enviado != "") {

    var expresion  = /^[-a-zA-Z0-9 ]+$/;

    if (!expresion.test(enviado)) {

      $("#editarEnviado").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el teléfono.</div>');
    
      return false;
    }

  }

  /*=============================================
  VALIDANDO NUEVO PLAZO DE RESPUESTA
  =============================================*/

  var plazo = $("#editarPlazo").val();

  if (plazo != "") {

    var expresion  = /^[-0-9 ]+$/;

    if (!expresion.test(plazo)) {

      $("#editarPlazo").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en plazo respuesta.</div>');
    
      return false;
    }

  }else{

    $("#editarPlazo").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO EL ESTADO DEL OFICIO
  =============================================*/

  var estado = $("#editarEstado").val();

  if (estado != "") {

    var expresion  = /^[a-zA-Z0-9 ]+$/;

    if (!expresion.test(estado)) {

      $("#editarEstado").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el estado.</div>');
    
      return false;
    }

  }


}



/*=============================================
EDITAR OFICIO
=============================================*/
$(".tablas").on("click", ".btnEditarOficio", function(){

	var idOficio = $(this).attr("idOficio");

	var datos = new FormData();
    datos.append("idOficio", idOficio);

    $.ajax({

      url:"ajax/oficios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",

      success:function(respuesta){

      	 $("#idOficio").val(respuesta["id"]);
	       $("#editarFecha").val(respuesta["fecha"]);
	       $("#editarOficio").val(respuesta["oficio"]);
	       $("#editarDirigido").val(respuesta["dirigidoA"]);
	       $("#editarAsunto").val(respuesta["asunto"]);
	       $("#editarEnviado").val(respuesta["enviadoPor"]);
	       $("#editarPlazo").val(respuesta["plazoRespuesta"]);
	       $("#editarEstado").val(respuesta["idEstado"]);
	  }

  	})

})

/*=============================================
ELIMINAR OFICIO
=============================================*/
$(".tablas").on("click", ".btnEliminarOficio", function(){

	var idOficio = $(this).attr("idOficio");
	
	swal({
        title: '¿Está seguro de borrar el oficio?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar oficio!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=oficios&idOficio="+idOficio;
        }

  })

})