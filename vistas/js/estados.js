/*=============================================
	VALIDANDO INSERTAR ESTADO
=============================================*/

function registroEstado(){

	/*=============================================
	VALIDANDO EL NOMBRE 
	=============================================*/

	var nombre = $("#nuevoEstado").val();

	if (nombre != "") {

		var expresion  = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if (!expresion.test(nombre)) {

			$("#nuevoEstado").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten números ni caractéres especiales en el estado.</div>');
		
			return false;
		}

	}else{

		$("#nuevoEstado").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
		
		return false;
	}

}


/*=============================================
	VALIDANDO INSERTAR ESTADO
=============================================*/

function ModificarEstado(){

	/*=============================================
	VALIDANDO EL NOMBRE 
	=============================================*/

	var nombre = $("#editarEstado").val();

	if (nombre != "") {

		var expresion  = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if (!expresion.test(nombre)) {

			$("#editarEstado").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten números ni caractéres especiales en el estado.</div>');
		
			return false;
		}

	}else{

		$("#editarEstado").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
		
		return false;
	}

}


/*=============================================
EDITAR ESTADO
=============================================*/
$(".tablas").on("click", ".btnEditarEstado", function(){

	var idEstado = $(this).attr("idEstado");

	var datos = new FormData();
	datos.append("idEstado", idEstado);

	$.ajax({
		url: "ajax/estados.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarEstado").val(respuesta["estado"]);
     		$("#idEstado").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR ESTADO
=============================================*/
$(".tablas").on("click", ".btnEliminarEstado", function(){

	 var idEstado = $(this).attr("idEstado");

	 swal({
	 	title: '¿Está seguro de borrar el estado?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar estado!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=estados&idEstado="+idEstado;

	 	}

	 })

})