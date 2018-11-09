<?php

class ControladorTipoTramites
{

    /*=============================================
    CREAR TIPO TRAMITE
    =============================================*/

    public static function ctrCrearTipoTramite()
    {

        if (isset($_POST["nuevoTipo"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTipo"]) &&
                preg_match('/^[\s#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaRespuesta"])) {

                $tabla = "tipotramite";

                $datos = array("tipo" => $_POST["nuevoTipo"],
                    "respuesta"           => $_POST["nuevaRespuesta"]);

                $respuesta = ModeloTipoTramites::mdlIngresarTipoTramite($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El tipo trámite ha sido guardado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "tipotramite";

                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El tipo trámite no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "tipotramite";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    MOSTRAR TIPO TRAMITE
    =============================================*/

    public static function ctrMostrarTipoTramites($item, $valor)
    {
        $tabla = "tipotramite";

        $respuesta = ModeloTipoTramites::mdlMostrarTipoTramites($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    EDITAR TIPO TRAMITE
    =============================================*/

    public static function ctrEditarTipoTramite()
    {

        if (isset($_POST["editarTipo"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipo"]) &&
                preg_match('/^[\s#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRespuesta"])) {

                $tabla = "tipotramite";

                $datos = array("id" => $_POST["idTipoTramite"],
                    "tipo"              => $_POST["editarTipo"],
                    "respuesta"         => $_POST["editarRespuesta"]);

                $respuesta = ModeloTipoTramites::mdlEditarTipoTramite($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El tipo trámite ha sido cambiado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "tipotramite";

                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El tipo trámite no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "tipotramite";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    BORRAR TIPO TRAMITE
    =============================================*/

    public static function ctrBorrarTipoTramite()
    {

        if (isset($_GET["idTipoTramite"])) {

            $tabla = "tipotramite";
            $datos = $_GET["idTipoTramite"];

            $respuesta = ModeloTipoTramites::mdlBorrarTipoTramite($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                    swal({
                          type: "success",
                          title: "El tipo trámite ha sido borrado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "tipotramite";

                                    }
                                })

                    </script>';
            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El tipo trámite no se puede borrar debido está enlazado a un trámite!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "tipotramite";

                            }
                        })

                </script>';

            }
        }

    }
}
