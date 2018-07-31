<?php

class ControladorEstados
{

    /*=============================================
    CREAR ESTADOS
    =============================================*/

    public static function ctrCrearEstado()
    {

        if (isset($_POST["nuevoEstado"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEstado"])) {

                $tabla = "estados";

                $datos = $_POST["nuevoEstado"];

                $respuesta = ModeloEstados::mdlIngresarEstado($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El estado ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "estados";

									}
								})

					</script>';

                }

            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "estados";

							}
						})

			  	</script>';

            }

        }

    }

    /*=============================================
    MOSTRAR ESTADOS
    =============================================*/

    public static function ctrMostrarEstados($item, $valor)
    {

        $tabla = "estados";

        $respuesta = ModeloEstados::mdlMostrarEstados($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    EDITAR ESTADO
    =============================================*/

    public static function ctrEditarEstado()
    {

        if (isset($_POST["editarEstado"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEstado"])) {

                $tabla = "estados";

                $datos = array("estado" => $_POST["editarEstado"],
                    "id"                    => $_POST["idEstado"]);

                $respuesta = ModeloEstados::mdlEditarEstado($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El estado ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "estados";

									}else{
										window.location = "estados";
									}
								})

					</script>';

                }

            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El estado no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "estados";

							}
						})

			  	</script>';

            }

        }

    }

    /*=============================================
    BORRAR ESTADO
    =============================================*/

    public static function ctrBorrarEstado()
    {

        if (isset($_GET["idEstado"])) {

            $tabla = "estados";
            $datos = $_GET["idEstado"];

            $respuesta = ModeloEstados::mdlBorrarEstado($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "El estado ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "estados";

									}
								})

					</script>';
            }
        }

    }
}
