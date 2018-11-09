function registroUsuario(){

	/*=============================================
	VALIDANDO EL NOMBRE 
	=============================================*/

	var nombre = $("#nuevoNombre").val();

	if (nombre != "") {

		var expresion  = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if (!expresion.test(nombre)) {

			$("#nuevoNombre").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten números ni caractéres especiales en el nombre.</div>');
		
			return false;
		}

	}else{

		$("#nuevoNombre").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
		
		return false;
	}

	/*=============================================
	VALIDANDO EL USUARIO
	=============================================*/

	var usuario = $("#nuevoUsuario").val();

	if (usuario != "") {

		var expresion  = /^[a-zA-Z0-9]*$/;

		if (!expresion.test(usuario)) {

			$("#nuevoUsuario").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en el usuario.</div>');
		
			return false;
		}

	}else{

		$("#nuevoUsuario").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
		
		return false;
	}

	/*=============================================
	VALIDANDO LA CONTRASEÑA
	=============================================*/

	var password = $("#nuevoPassword").val();

	if (password != "") {

		var expresion  = /^[a-zA-Z0-9]+$/;

		if (!expresion.test(password)) {

			$("#nuevoPassword").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en la contraseña.</div>');
		
			return false;
		}

	}else{

		$("#nuevoPassword").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
		
		return false;
	}

}

function modificarUsuario(){

	/*=============================================
	VALIDANDO PARA MODIFICAR EL NOMBRE 
	=============================================*/

	var nombre = $("#editarNombre").val();

	if (nombre != "") {

		var expresion  = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if (!expresion.test(nombre)) {

			$("#editarNombre").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten números ni caractéres especiales en el nombre.</div>');
		
			return false;
		}

	}else{

		$("#editarNombre").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
		
		return false;
	}

	/*=============================================
	VALIDANDO PARA MODIFICAR LA CONTRASEÑA
	=============================================*/

	var password = $("#editarPassword").val();

	if (password != "") {

		var expresion  = /^[a-zA-Z0-9]+$/;

		if (!expresion.test(password)) {

			$("#editarPassword").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten espacios ni caractéres especiales en la contraseña.</div>');
		
			return false;
		}

	}


}


/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})


/*=============================================
EDITAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]);
			$("#fotoActual").val(respuesta["foto"]);

			$("#passwordActual").val(respuesta["password"]);

			if(respuesta["foto"] != ""){

				$(".previsualizar").attr("src", respuesta["foto"]);

			}

		}

	});

})


$("#editarPerfil").on("click", "#miPerfil", function(){

	var idUsuario = $("#idUsuario").val();
	console.log("idUsuario", idUsuario);

	alert("entro a usuarios .js: " +idUsuario);
	
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]);
			$("#fotoActual").val(respuesta["foto"]);

			$("#passwordActual").val(respuesta["password"]);

			if(respuesta["foto"] != ""){

				$(".previsualizar").attr("src", respuesta["foto"]);

			}

		}

	});
})

/*=============================================
ACTIVAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
 	datos.append("activarId", idUsuario);
  	datos.append("activarUsuario", estadoUsuario);

  	$.ajax({

	  url:"ajax/usuarios.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      }

  	})

  	if(estadoUsuario == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoUsuario',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoUsuario',0);

  	}

})

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoUsuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevoUsuario").val("");

	    	}

	    }

	})
})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEliminarUsuario", function(){

  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

    }

  })

})