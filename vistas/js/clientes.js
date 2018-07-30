/*=============================================
	VALIDANDO INSERTAR CLIENTE
	=============================================*/

function registroCliente(){

	/*=============================================
	VALIDANDO EL NOMBRE 
	=============================================*/

	var nombre = $("#nuevoCliente").val();

	if (nombre != "") {

		var expresion  = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if (!expresion.test(nombre)) {

			$("#nuevoCliente").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten números ni caractéres especiales en el nombre.</div>');
		
			return false;
		}

	}else{

		$("#nuevoCliente").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
		
		return false;
	}

	/*=============================================
	VALIDANDO DOCUMENTO ID O CEDULA
	=============================================*/

	var cedula = $("#nuevoDocumentoId").val();

	if (cedula != "") {

		var expresion  = /^[-a-zA-Z0-9]+$/;

		if (!expresion.test(cedula)) {

			$("#nuevoDocumentoId").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en la cédula.</div>');
		
			return false;
		}

	}else{

		$("#nuevoDocumentoId").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
		
		return false;
	}

	/*=============================================
	VALIDANDO EL EMAIL
	=============================================*/

	var email = $("#nuevoEmail").val();

	if (email != "") {

		var expresion  = /^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/;

		if (!expresion.test(email)) {

			$("#nuevoEmail").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el email.</div>');
		
			return false;
		}

	}

	/*=============================================
	VALIDANDO EL TELEFONO UNO O TELEFONO FIJO 
	=============================================*/

	var telefono = $("#nuevoTelefono").val();

	if (telefono != "") {

		var expresion  = /^[()\-0-9 ]+$/;

		if (!expresion.test(telefono)) {

			$("#nuevoTelefono").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el teléfono.</div>');
		
			return false;
		}

	}

	/*=============================================
	VALIDANDO EL TELEFONO DOS O TELEFONO MOVIL 
	=============================================*/

	var telefono2 = $("#nuevoTelefono2").val();

	if (telefono2 != "") {

		var expresion  = /^[()\-0-9 ]+$/;

		if (!expresion.test(telefono2)) {

			$("#nuevoTelefono2").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el teléfono.</div>');
		
			return false;
		}

	}

	/*=============================================
	VALIDANDO LA DIRECCION
	=============================================*/

	var direccion = $("#nuevaDireccion").val();

	if (direccion != "") {

		var expresion  = /^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

		if (!expresion.test(direccion)) {

			$("#nuevaDireccion").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en la dirección.</div>');
		
			return false;
		}

	}else{

		$("#nuevaDireccion").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
		
		return false;
	}


	/*=============================================
	VALIDANDO LA FECHA DE NACIMIENTO 
	=============================================*/

	var fechaNacimiento = $("#nuevaFechaNacimiento").val();

	if (fechaNacimiento != "") {

		var expresion  = /^[()\-0-9 ]+$/;

		if (!expresion.test(fechaNacimiento)) {

			$("#nuevaFechaNacimiento").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en la fecha nacimiento.</div>');
		
			return false;
		}

	}

	/*=============================================
	VALIDANDO OBSERVACION 
	=============================================*/

	var observacion = $("#nuevaObservacion").val();

	if (observacion != "") {

		var expresion  = /^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

		if (!expresion.test(observacion)) {

			$("#nuevaObservacion").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en la observación.</div>');
		
			return false;
		}

	}


}


/*=============================================
	VALIDANDO MODIFICACION DE CLIENTE
=============================================*/
	
function modificarCliente(){

	/*=============================================
	VALIDANDO EL NOMBRE 
	=============================================*/

	var nombre = $("#editarCliente").val();

	if (nombre != "") {

		var expresion  = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if (!expresion.test(nombre)) {

			$("#editarCliente").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten números ni caractéres especiales en el nombre.</div>');
		
			return false;
		}

	}else{

		$("#editarCliente").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
		
		return false;
	}

	/*=============================================
	VALIDANDO DOCUMENTO ID O CEDULA
	=============================================*/

	var cedula = $("#editarDocumentoId").val();

	if (cedula != "") {

		var expresion  = /^[-a-zA-Z0-9]+$/;

		if (!expresion.test(cedula)) {

			$("#editarDocumentoId").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en la cédula.</div>');
		
			return false;
		}

	}else{

		$("#editarDocumentoId").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
		
		return false;
	}

	/*=============================================
	VALIDANDO EL EMAIL
	=============================================*/

	var email = $("#editarEmail").val();

	if (email != "") {

		var expresion  = /^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/;

		if (!expresion.test(email)) {

			$("#editarEmail").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el email.</div>');
		
			return false;
		}

	}

	/*=============================================
	VALIDANDO EL TELEFONO UNO O TELEFONO FIJO 
	=============================================*/

	var telefono = $("#editarTelefono").val();

	if (telefono != "") {

		var expresion  = /^[()\-0-9 ]+$/;

		if (!expresion.test(telefono)) {

			$("#editarTelefono").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el teléfono.</div>');
		
			return false;
		}

	}

	/*=============================================
	VALIDANDO EL TELEFONO DOS O TELEFONO MOVIL 
	=============================================*/

	var telefono2 = $("#editarTelefono2").val();

	if (telefono2 != "") {

		var expresion  = /^[()\-0-9 ]+$/;

		if (!expresion.test(telefono2)) {

			$("#editarTelefono2").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el teléfono.</div>');
		
			return false;
		}

	}

	/*=============================================
	VALIDANDO LA DIRECCION
	=============================================*/

	var direccion = $("#editarDireccion").val();

	if (direccion != "") {

		var expresion  = /^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

		if (!expresion.test(direccion)) {

			$("#editarDireccion").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en la dirección.</div>');
		
			return false;
		}

	}else{

		$("#editarDireccion").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
		
		return false;
	}


	/*=============================================
	VALIDANDO LA FECHA DE NACIMIENTO 
	=============================================*/

	var fechaNacimiento = $("#editarFechaNacimiento").val();

	if (fechaNacimiento != "") {

		var expresion  = /^[()\-0-9 ]+$/;

		if (!expresion.test(fechaNacimiento)) {

			$("#editarFechaNacimiento").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en la fecha nacimiento.</div>');
		
			return false;
		}

	}

	/*=============================================
	VALIDANDO OBSERVACION 
	=============================================*/

	var observacion = $("#editarObservacion").val();

	if (observacion != "") {

		var expresion  = /^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

		if (!expresion.test(observacion)) {

			$("#editarObservacion").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en la observación.</div>');
		
			return false;
		}

	}


}


/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	//console.log("respuesta", respuesta);

      	   $("#idCliente").val(respuesta["id"]);
	       $("#editarCliente").val(respuesta["nombre"]);
	       $("#editarDocumentoId").val(respuesta["documento"]);
	       $("#editarEmail").val(respuesta["email"]);
	       $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarTelefono2").val(respuesta["telefono2"]);
	       $("#editarDireccion").val(respuesta["direccion"]);
	       $("#editarObservacion").val(respuesta["observacion"]);
           $("#editarFechaNacimiento").val(respuesta["fecha_nacimiento"]);
	  }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	
	swal({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=clientes&idCliente="+idCliente;
        }

  })

})