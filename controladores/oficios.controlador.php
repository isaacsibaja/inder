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
                //preg_match('/^[0-9]+$/', $_POST["nuevoOficio"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDirigido"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsunto"]) &&
                preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEnviado"]) &&
                preg_match('/^[-0-9]+$/', $_POST["nuevoPlazo"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoAno"]) &&
                preg_match('/^[0-9]+$/', $_POST["idUsuario"]) &&
                preg_match('/^[0-9]+$/', $_POST["seguimiento"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEstado"])) {

                /**
                 *
                 * CONSULTAMOS EL ULTIMO CONSECUTIVO DEL OFICIO Y LE SUMAMOS 1
                 *
                 */

                $consecutivo = ModeloOficios::consecutivo_oficio();

                $tabla = "oficios";

                $datos = array("fecha" => $_POST["nuevaFecha"],
                    "oficio"               => $consecutivo,
                    "dirigidoA"            => $_POST["nuevoDirigido"],
                    "asunto"               => $_POST["nuevoAsunto"],
                    "enviadoPor"           => $_POST["nuevoEnviado"],
                    "plazoRespuesta"       => $_POST["nuevoPlazo"],
                    "ano"                  => $_POST["nuevoAno"],
                    "idEstado"             => $_POST["nuevoEstado"],
                    "seguimiento"          => $_POST["seguimiento"],
                    "idUsuario"            => $_POST["idUsuario"]);

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

                                    }else
                                    {
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
    CREAR OFICIOS
    =============================================*/

    public static function ctrCrearOficioAnoNuevo()
    {

        if (isset($_POST["nuevoOficioAnoNuevo"])) {

            if (preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["nuevaFechaAnoNuevo"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoOficioAnoNuevo"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDirigidoAnoNuevo"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsuntoAnoNuevo"]) &&
                preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEnviadoAnoNuevo"]) &&
                preg_match('/^[-0-9 ]+$/', $_POST["nuevoPlazoAnoNuevo"]) &&
                preg_match('/^[0-9 ]+$/', $_POST["nuevoAnoAnoNuevo"]) &&
                preg_match('/^[0-9]+$/', $_POST["idUsuario"]) &&
                preg_match('/^[0-9]+$/', $_POST["seguimientoAnoNuevo"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoEstadoAnoNuevo"])) {

                $tabla = "oficios";

                $datos = array("fecha" => $_POST["nuevaFechaAnoNuevo"],
                    "oficio"               => $_POST["nuevoOficioAnoNuevo"],
                    "dirigidoA"            => $_POST["nuevoDirigidoAnoNuevo"],
                    "asunto"               => $_POST["nuevoAsuntoAnoNuevo"],
                    "enviadoPor"           => $_POST["nuevoEnviadoAnoNuevo"],
                    "plazoRespuesta"       => $_POST["nuevoPlazoAnoNuevo"],
                    "ano"                  => $_POST["nuevoAnoAnoNuevo"],
                    "idEstado"             => $_POST["nuevoEstadoAnoNuevo"],
                    "seguimiento"          => $_POST["seguimientoAnoNuevo"],
                    "idUsuario"            => $_POST["idUsuario"]);

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
    MOSTRAR OFICIOS CON SEGUIMIENTO
    =============================================*/

    public static function mdlMostrarOficiosSeguimiento($item, $valor)
    {

        $tabla = "oficios";

        $respuesta = ModeloOficios::mdlMostrarOficiosSeguimiento($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    EDITAR OFICIOS DESDE LA PAGINA DE OFICIOS
    =============================================*/

    public static function ctrEditarOficio()
    {

        if (isset($_POST["editarOficio"])) {

            if (preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["editarFecha"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarOficio"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDirigido"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAsunto"]) &&
                preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEnviado"]) &&
                preg_match('/^[-0-9]+$/', $_POST["editarPlazo"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarSeguimiento"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarEstado"])) {

                $tabla = "oficios";

                $datos = array("id" => $_POST["idOficio"],
                    "fecha"             => $_POST["editarFecha"],
                    "oficio"            => $_POST["editarOficio"],
                    "dirigidoA"         => $_POST["editarDirigido"],
                    "asunto"            => $_POST["editarAsunto"],
                    "enviadoPor"        => $_POST["editarEnviado"],
                    "plazoRespuesta"    => $_POST["editarPlazo"],
                    "seguimiento"       => $_POST["editarSeguimiento"],
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

                                    }else
                                    {
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
    EDITAR OFICIOS DESDE LA PAGINA DE SEGUIMIENTOS
    =============================================*/

    public static function ctrEditarOficioSeguimiento()
    {

        if (isset($_POST["editarOficio"])) {

            if (preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["editarFecha"]) &&
                preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["editarOficio"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDirigido"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAsunto"]) &&
                preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEnviado"]) &&
                preg_match('/^[-0-9 ]+$/', $_POST["editarPlazo"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarSeguimiento"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarEstado"])) {

                $tabla = "oficios";

                $datos = array("id" => $_POST["idOficio"],
                    "fecha"             => $_POST["editarFecha"],
                    "oficio"            => $_POST["editarOficio"],
                    "dirigidoA"         => $_POST["editarDirigido"],
                    "asunto"            => $_POST["editarAsunto"],
                    "enviadoPor"        => $_POST["editarEnviado"],
                    "plazoRespuesta"    => $_POST["editarPlazo"],
                    "seguimiento"       => $_POST["editarSeguimiento"],
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

                                    window.location = "seguimiento";

                                    }else
                                    {
                                        window.location = "seguimiento";
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

                            window.location = "seguimiento";

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

                                }else
                                {
                                    window.location = "oficios";
                                }
                            })

                </script>';

            }

        }

    }

    /*=============================================
    DESCARGAR EXCEL DE TODOS LOS OFICIOS
    =============================================*/

    public function ctrDescargarReporte()
    {

        if (isset($_GET["Reporte"])) {

            $tabla = "oficios";

            $item  = null;
            $valor = null;

            $reportes = ModeloOficios::mdlMostrarOficios($tabla, $item, $valor);

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

            $Name = $_GET["Reporte"] . ' Oficios Inder ' . $fechaActual . '.xls';

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
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>OFICIO</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>DIRIGIDO</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>ASUNTO</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>ELABORADO</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>PLAZO RESPUESTA</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>ESTADO</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>ELABORADO</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>SEGUIMIENTO</td>
                    </tr>");

                foreach ($reportes as $row => $item) {

                    $estado  = ControladorEstados::ctrMostrarEstados("id", $item["idEstado"]);
                    $usuario = ControladorUsuarios::ctrMostrarUsuarios("id", $item["idUsuario"]);

                    echo utf8_decode("<tr>

                        <td style='border:1px solid #eee;' align='center'>" . ($row + 1) . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["fecha"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . 'OTTO - ' . $item["oficio"] . ' - ' . $item["ano"] . "</td>
                        <td style='border:1px solid #eee;'>" . $item["dirigidoA"] . "</td>
                        <td style='border:1px solid #eee;'>" . $item["asunto"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["enviadoPor"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["plazoRespuesta"] . "</td>
                        <td style='border:1px solid #eee; background:" . $estado["color"] . "; color:#cccccc' align='center'>" . $estado["estado"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $usuario["nombre"] . "</td>");
                    $si = "Si";
                    $no = "No";

                    if ($item["seguimiento"] == "1") {
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
