<?php

class ControladorOficios
{

    /*=============================================
    CREAR OFICIOS
    =============================================*/

    public static function ctrCrearOficio()
    {

        if (isset($_POST["nuevoOficio"])) {

            if (preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["nuevaFecha"]) &&
                preg_match('/^[0-9 ]+$/', $_POST["nuevoOficio"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDirigido"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsunto"]) &&
                preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEnviado"]) &&
                preg_match('/^[-0-9 ]+$/', $_POST["nuevoPlazo"]) &&
                preg_match('/^[0-9 ]+$/', $_POST["nuevoAno"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoEstado"])) {

                $tabla = "oficios";

                $datos = array("fecha" => $_POST["nuevaFecha"],
                    "oficio"               => $_POST["nuevoOficio"],
                    "dirigidoA"            => $_POST["nuevoDirigido"],
                    "asunto"               => $_POST["nuevoAsunto"],
                    "enviadoPor"           => $_POST["nuevoEnviado"],
                    "plazoRespuesta"       => $_POST["nuevoPlazo"],
                    "ano"                  => $_POST["nuevoAno"],
                    "idEstado"             => $_POST["nuevoEstado"]);

                $respuesta = ModeloOficios::mdlIngresarOficio($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El oficio ha sido guardado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "oficios";

                                    } else{window.location = "oficios";}
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El oficio no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "oficios";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    CREAR OFICIOS
    =============================================*/

    public static function ctrCrearOficioAnoNuevo()
    {

        if (isset($_POST["nuevoOficioAnoNuevo"])) {

            if (preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["nuevaFechaAnoNuevo"]) &&
                preg_match('/^[0-9 ]+$/', $_POST["nuevoOficioAnoNuevo"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDirigidoAnoNuevo"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsuntoAnoNuevo"]) &&
                preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEnviadoAnoNuevo"]) &&
                preg_match('/^[-0-9 ]+$/', $_POST["nuevoPlazoAnoNuevo"]) &&
                preg_match('/^[0-9 ]+$/', $_POST["nuevoAnoAnoNuevo"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoEstadoAnoNuevo"])) {

                $tabla = "oficios";

                $datos = array("fecha" => $_POST["nuevaFechaAnoNuevo"],
                    "oficio"               => $_POST["nuevoOficioAnoNuevo"],
                    "dirigidoA"            => $_POST["nuevoDirigidoAnoNuevo"],
                    "asunto"               => $_POST["nuevoAsuntoAnoNuevo"],
                    "enviadoPor"           => $_POST["nuevoEnviadoAnoNuevo"],
                    "plazoRespuesta"       => $_POST["nuevoPlazoAnoNuevo"],
                    "ano"                  => $_POST["nuevoAnoAnoNuevo"],
                    "idEstado"             => $_POST["nuevoEstadoAnoNuevo"]);

                $respuesta = ModeloOficios::mdlIngresarOficioAnoNuevo($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El oficio ha sido guardado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "oficios";

                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El oficio no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "oficios";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    MOSTRAR OFICIOS
    =============================================*/

    public static function ctrMostrarOficios($item, $valor)
    {

        $tabla = "oficios";

        $respuesta = ModeloOficios::mdlMostrarOficios($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    EDITAR OFICIOS
    =============================================*/

    public static function ctrEditarOficio()
    {

        if (isset($_POST["editarOficio"])) {

            if (preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["editarFecha"]) &&
                preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["editarOficio"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDirigido"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAsunto"]) &&
                preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEnviado"]) &&
                preg_match('/^[-0-9 ]+$/', $_POST["editarPlazo"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarEstado"])) {

                $tabla = "oficios";

                $datos = array("id" => $_POST["idOficio"],
                    "fecha"             => $_POST["editarFecha"],
                    "oficio"            => $_POST["editarOficio"],
                    "dirigidoA"         => $_POST["editarDirigido"],
                    "asunto"            => $_POST["editarAsunto"],
                    "enviadoPor"        => $_POST["editarEnviado"],
                    "plazoRespuesta"    => $_POST["editarPlazo"],
                    "idEstado"          => $_POST["editarEstado"]);

                $respuesta = ModeloOficios::mdlEditarOficio($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El oficio ha sido cambiado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "oficios";

                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El oficio no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "oficios";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    ELIMINAR OFICIOS
    =============================================*/

    public static function ctrEliminarOficio()
    {

        if (isset($_GET["idOficio"])) {

            $tabla = "oficios";
            $datos = $_GET["idOficio"];

            $respuesta = ModeloOficios::mdlEliminarOficio($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "El oficio ha sido borrado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then(function(result){
                                if (result.value) {

                                window.location = "oficios";

                                }
                            })

                </script>';

            }

        }

    }

}
