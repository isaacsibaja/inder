<?php

class ControladorTramites
{
    /*=============================================
    CREAR TRAMITE
    =============================================*/

    public static function ctrCrearTramite()
    {

        if (isset($_POST["nuevaFecha"])) {

            if (preg_match('/^[-0-9]+$/', $_POST["nuevaFecha"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoSolicitante"]) &&
                preg_match('/^[#.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsentamiento"]) &&
                preg_match('/^[-,.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoPredio"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoTipoTramite"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevaSolicitudRespuesta"]) &&
                preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaRespuesta"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaObservacion"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoEstado"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoEnviado"])) {

                $tabla = "tramites";

                $datos = array("fecha" => $_POST["nuevaFecha"],
                    "idCliente"            => $_POST["nuevoSolicitante"],
                    "asentamiento"         => $_POST["nuevoAsentamiento"],
                    "predio"               => $_POST["nuevoPredio"],
                    "idTipoTramite"        => $_POST["nuevoTipoTramite"],
                    "solicitudRespuesta"   => $_POST["nuevaSolicitudRespuesta"],
                    "respuesta"            => $_POST["nuevaRespuesta"],
                    "observacion"          => $_POST["nuevaObservacion"],
                    "idEstado"             => $_POST["nuevoEstado"],
                    "idUsuario"            => $_POST["nuevoEnviado"]);

                $respuesta = ModeloTramites::mdlIngresarTramite($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El trámite ha sido guardado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "tramites";

                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El trámite no puede ir vacío o llevar caracteres especiales!",
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
    (preg_match('/^[-0-9]+$/', $_POST["nuevaFecha"]) &&
    preg_match('/^[0-9]+$/', $_POST["nuevoSolicitante"]) &&
    preg_match('/^[#.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsentamiento"]) &&
    preg_match('/^[-,.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoPredio"]) &&
    preg_match('/^[0-9]+$/', $_POST["nuevoTipoTramite"]) &&
    preg_match('/^[.a-zA-Z0-9 ]+$/', $_POST["nuevaSolicitudRespuesta"]) &&
    preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaRespuesta"]) &&
    preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaObservacion"]) &&
    preg_match('/^[0-9]+$/', $_POST["nuevoEstado"]) &&
    preg_match('/^[0-9]+$/', $_POST["nuevoEnviado"]))
    =============================================*/

    public static function ctrEditarTramite()
    {

        if (isset($_POST["editarSolicitante"])) {

            if (preg_match('/^[-0-9]+$/', $_POST["editarFecha"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarSolicitante"]) &&
                preg_match('/^[#.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAsentamiento"]) &&
                preg_match('/^[-,.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPredio"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarTipoTramite"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarSolicitudRespuesta"]) &&
                preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRespuesta"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarObservacion"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarEstado"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarEnviado"])) {

                $tabla = "tramites";

                $datos = array("id"  => $_POST["idTramite"],
                    "fecha"              => $_POST["editarFecha"],
                    "idCliente"          => $_POST["editarSolicitante"],
                    "asentamiento"       => $_POST["editarAsentamiento"],
                    "predio"             => $_POST["editarPredio"],
                    "idTipoTramite"      => $_POST["editarTipoTramite"],
                    "solicitudRespuesta" => $_POST["editarSolicitudRespuesta"],
                    "respuesta"          => $_POST["editarRespuesta"],
                    "observacion"        => $_POST["editarObservacion"],
                    "idEstado"           => $_POST["editarEstado"],
                    "idUsuario"          => $_POST["editarEnviado"]);

                $respuesta = ModeloTramites::mdlEditarTramite($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El trámite ha sido cambiado correctamente",
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
                          title: "¡El trámite no puede ir vacío o llevar caracteres especiales!",
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
                      title: "El trámite ha sido borrado correctamente",
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

    /*=============================================
    DESCARGAR EXCEL DE TODOS LOS TRAMITES
    =============================================*/

    public function ctrDescargarReporte()
    {

        if (isset($_GET["Reporte"])) {

            $tabla = "tramites";

            $item  = null;
            $valor = null;

            $reportes = ModeloTramites::mdlMostrarTramites($tabla, $item, $valor);

            /*=============================================
            OBTENEMOS LOS DATOS DEL INSTUTITO DESDE LA BASE DE DATOS
            =============================================*/

            $tabla2 = "instituto";
            $item2  = null;
            $valor2 = null;

            $empresa = ModeloInstituto::mdlMostrarInstituto($tabla2, $item2, $valor2);

            /*=============================================
            OBTENEMOS LA FECHA PARA OBTENERLA EN EL NOMBRE DEL EXCEL
            =============================================*/

            date_default_timezone_set('America/Costa_Rica');

            $fecha = date('Y-m-d');

            $hora = date('h:i:s');

            $fechaActual = $fecha . ' ' . $hora;

            /*=============================================
            CREAMOS EL ARCHIVO DE EXCEL
            =============================================*/

            $Name = $_GET["Reporte"] . ' Trámites Inder ' . $fechaActual . '.xls';

            header('Expires: 0');
            header('Cache-control: private');
            header("Content-type: application/vnd.ms-excel");
            header("Cache-Control: cache, must-revalidate");
            header('Content-Description: File Transfer');
            header('Last-Modified: ' . date('D, d M Y H:i:s'));
            header("Pragma: public");
            header('Content-Disposition:attachment; filename="' . $Name . '"');
            header("Content-Transfer-Encoding: binary");

            foreach ($empresa as $key => $value) {

                echo utf8_decode("<table border='0'>

                <p style='font-family:arial; font-size:26px; font-weight:bold; background:#e6e6e6; border:1px solid #eee;'>
                    <caption>

                    <p style='font-family:arial; font-size:18px; font-weight:bold;'>" . $value["nombre"] . "</p></br>
                    <p style='font-family:arial; font-size:18px; font-weight:bold;'>" . $value["direccion"] . "</p></br>
                    <p style='font-family:arial; font-size:18px; font-weight:bold;'>" . $value["oficina"] . "</p></br>
                    <p style='font-family:arial; font-size:17px; font-weight:bold;'>" . 'Tel.: ' . $value["telefono"] . ' | correo: ' . $value["email"] . "</p>

                    <p style='font-family:arial; font-size:17px;color:#808080'>" . 'Creado: ' . $fechaActual . "</p>

                    </caption>
                </p></br>

                    <tr>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>#</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>FECHA</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>SOLICITANTE</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>ASENTAMIENTO</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>PREDIO</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>TRÁMITE</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>OBSERVACIÓN</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>ENVIADO POR</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>ESTADO</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>Respuesta</td>
                    </tr>");

                foreach ($reportes as $row => $item) {

                    $estado      = ControladorEstados::ctrMostrarEstados("id", $item["idEstado"]);
                    $usuario     = ControladorUsuarios::ctrMostrarUsuarios("id", $item["idUsuario"]);
                    $cliente     = ControladorClientes::ctrMostrarClientes("id", $item["idCliente"]);
                    $tipoTramite = ControladorTipoTramites::ctrMostrarTipoTramites("id", $item["idTipoTramite"]);

                    //<td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>RESPUESTA TRÁMITE</td>
                    //<td style='border:1px solid #eee;' align='center'>" . $item["respuesta"] . "</td>

                    echo utf8_decode("<tr>

                        <td style='border:1px solid #eee;' align='center'>" . ($row + 1) . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["fecha"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $cliente["nombre"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["asentamiento"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["predio"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $tipoTramite["tipo"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["observacion"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $usuario["nombre"] . "</td>
                        <td style='border:1px solid #eee; background:" . $estado["color"] . "; color:#cccccc' align='center'>" . $estado["estado"] . "</td>");
                    $si = "Si";
                    $no = "No";

                    if ($item["solicitudRespuesta"] == "1") {
                        echo utf8_decode("</td><td style='border:1px solid #eee;' align='center'>" . $si . "</td></tr>");
                    } else {
                        echo utf8_decode("</td><td style='border:1px solid #eee;' align='center'>" . $no . "</td></tr>");
                    }

                }

                echo "</table>";
            }

        }

    }

}
