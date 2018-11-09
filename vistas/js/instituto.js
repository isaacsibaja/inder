/*=============================================
  VALIDANDO INSERTAR INSTITUTO
  =============================================*/

function registroInstituto(){

  /*=============================================
  VALIDANDO EL NOMBRE 
  =============================================*/

  var nombre = $("#nuevoNombre").val();

  if (nombre != "") {

    var expresion  = /^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(nombre)) {

      $("#nuevoNombre").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el nombre.</div>');
    
      return false;
    }

  }else{

    $("#nuevoNombre").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO DIRECCION REGIONAL
  =============================================*/

  var direccion = $("#nuevaDireccion").val();

  if (direccion != "") {

    var expresion  = /^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(direccion)) {

      $("#nuevaDireccion").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en la dirección regional.</div>');
    
      return false;
    }

  }else{

    $("#nuevaDireccion").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO LA OFICINA
  =============================================*/

  var oficina = $("#nuevaOficina").val();

  if (oficina != "") {

    var expresion  = /^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(oficina)) {

      $("#nuevaOficina").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en la oficina regional.</div>');
    
      return false;
    }

  }else{

    $("#nuevaOficina").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO EL TELEFONO
  =============================================*/

  var telefono = $("#nuevoTelefono").val();

  if (telefono != "") {

    var expresion  = /^[-0-9]+$/;

    if (!expresion.test(telefono)) {

      $("#nuevoTelefono").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el teléfono.</div>');
    
      return false;
    }

  }else{

    $("#nuevoTelefono").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO EL FAX 
  =============================================*/

  var telefono = $("#nuevoFax").val();

  if (telefono != "") {

    var expresion  = /^[-0-9]+$/;

    if (!expresion.test(telefono)) {

      $("#nuevoFax").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el fax.</div>');
    
      return false;
    }

  }else{

    $("#nuevoFax").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
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

  }else{

    $("#nuevoEmail").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO EL PIE DE PAGINA
  =============================================*/

  var oficina = $("#nuevoPie").val();

  if (oficina != "") {

    var expresion  = /^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(oficina)) {

      $("#nuevoPie").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el pie de página.</div>');
    
      return false;
    }

  }else{

    $("#nuevoPie").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

}



/*=============================================
  VALIDANDO MODIFICAR EL INSTITUTO
  =============================================*/

function modificarInstituto(){

  /*=============================================
  VALIDANDO EL NOMBRE 
  =============================================*/

  var nombre = $("#editarNombre").val();

  if (nombre != "") {

    var expresion  = /^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(nombre)) {

      $("#editarNombre").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el nombre.</div>');
    
      return false;
    }

  }else{

    $("#editarNombre").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO DIRECCION REGIONAL
  =============================================*/

  var direccion = $("#editarDireccion").val();

  if (direccion != "") {

    var expresion  = /^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(direccion)) {

      $("#editarDireccion").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en la dirección regional.</div>');
    
      return false;
    }

  }else{

    $("#editarDireccion").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO LA OFICINA
  =============================================*/

  var oficina = $("#editarOficina").val();

  if (oficina != "") {

    var expresion  = /^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(oficina)) {

      $("#editarOficina").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en la oficina regional.</div>');
    
      return false;
    }

  }else{

    $("#editarOficina").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO EL TELEFONO
  =============================================*/

  var telefono = $("#editarTelefono").val();

  if (telefono != "") {

    var expresion  = /^[-0-9]+$/;

    if (!expresion.test(telefono)) {

      $("#editarTelefono").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el teléfono.</div>');
    
      return false;
    }

  }else{

    $("#editarTelefono").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

  /*=============================================
  VALIDANDO EL FAX 
  =============================================*/

  var telefono = $("#editarFax").val();

  if (telefono != "") {

    var expresion  = /^[-0-9]+$/;

    if (!expresion.test(telefono)) {

      $("#editarFax").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el fax.</div>');
    
      return false;
    }

  }else{

    $("#editarFax").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
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

  }else{

    $("#editarEmail").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }


  /*=============================================
  VALIDANDO EL PIE DE PAGINA
  =============================================*/

  var oficina = $("#editarPie").val();

  if (oficina != "") {

    var expresion  = /^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;

    if (!expresion.test(oficina)) {

      $("#editarPie").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caractéres especiales en el pie de página.</div>');
    
      return false;
    }

  }else{

    $("#editarPie").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
    
    return false;
  }

}



/*=============================================
SUBIENDO LA FOTO DEL LOGO
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
EDITAR INSTITUTO
=============================================*/
$(".tablas").on("click", ".btnEditarInstituto", function(){

  var idInstituto = $(this).attr("idInstituto");
  
  var datos = new FormData();
  datos.append("idInstituto", idInstituto);

  $.ajax({

    url:"ajax/instituto.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      //console.log("respuesta", respuesta); 

      $("#idInstituto").val(respuesta["id"]);
      $("#editarNombre").val(respuesta["nombre"]);
      $("#editarDireccion").val(respuesta["direccion"]);
      $("#editarOficina").val(respuesta["oficina"]);
      $("#editarTelefono").val(respuesta["telefono"]);
      $("#editarFax").val(respuesta["fax"]);
      $("#editarEmail").val(respuesta["email"]);
      $("#editarPie").val(respuesta["pie"]);

      $("#fotoActual").val(respuesta["logo"]);

      if(respuesta["logo"] != ""){

        $(".previsualizarEditar").attr("src", respuesta["logo"]);

      }else{

        $(".previsualizarEditar").attr("src", "vistas/img/instituto/default.png");

      }

    }

  });

})