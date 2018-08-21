<?php

class ControladorTramites
{

    /*=============================================
    CREAR TRAMITE
    =============================================*/

    public static function ctrCrearTramite()
    {

        if (isset($_POST["nuevoTramite"])) {

            if (preg_match('/^[-0-9]+$/', $_POST["nuevaFecha"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoSolicitante"]) &&
                preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsentamiento"]) &&
                preg_match('/^[-,.a-zA-Z0-9 ]+$/', $_POST["nuevoPredio"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTramite"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaObservacion"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoEstado"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoEnviado"])) {

                $tabla = "tramites";

                $datos = array("fecha" => $_POST["nuevaFecha"],
                    "idCliente"            => $_POST["nuevoSolicitante"],
                    "asentamiento"         => $_POST["nuevoAsentamiento"],
                    "predio"               => $_POST["nuevoPredio"],
                    "tramite"              => $_POST["nuevoTramite"],
                    "observacion"          => $_POST["nuevaObservacion"],
                    "idEstado"             => $_POST["nuevoEstado"],
                    "idUsuario"            => $_POST["nuevoEnviado"]);

                $respuesta = ModeloTramites::mdlIngresarTramite($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El tramite ha sido guardado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "tramites";

                                    }else{
                                        window.location = "tramites";
                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El tramite no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "tramites";

                            }else{
                                window.location = "tramites";
                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    MOSTRAR TRAMITES
    =============================================*/

    public static function ctrMostrarTramites($item, $valor)
    {

        $tabla = "tramites";

        $respuesta = ModeloTramites::mdlMostrarTramites($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    EDITAR TRAMITE
    =============================================*/

    public static function ctrEditarTramite()
    {

        if (isset($_POST["editarSolicitante"])) {

            if (preg_match('/^[-0-9]+$/', $_POST["editarFecha"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarSolicitante"]) &&
                preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAsentamiento"]) &&
                preg_match('/^[-,.a-zA-Z0-9 ]+$/', $_POST["editarPredio"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTramite"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarObservacion"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarEstado"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarEnviado"])) {

                $tabla = "tramites";

                $datos = array("id" => $_POST["idTramite"],
                    "fecha"             => $_POST["editarFecha"],
                    "idCliente"         => $_POST["editarSolicitante"],
                    "asentamiento"      => $_POST["editarAsentamiento"],
                    "predio"            => $_POST["editarPredio"],
                    "tramite"           => $_POST["editarTramite"],
                    "observacion"       => $_POST["editarObservacion"],
                    "idEstado"          => $_POST["editarEstado"],
                    "idUsuario"         => $_POST["editarEnviado"]);

                $respuesta = ModeloTramites::mdlEditarTramite($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El tramite ha sido cambiado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "tramites";

                                    }else{
                                        window.location = "tramites";
                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El tramite no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "tramites";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    ELIMINAR TRAMITE
    =============================================*/

    public static function ctrEliminarTramite()
    {

        if (isset($_GET["idTramite"])) {

            $tabla = "tramites";
            $datos = $_GET["idTramite"];

            $respuesta = ModeloTramites::mdlEliminarTramite($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "El tramite ha sido borrado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then(function(result){
                                if (result.value) {

                                window.location = "tramites";

                                }else{
                                    window.location = "tramites";
                                }
                            })

                </script>';

            }

        }

    }

}
