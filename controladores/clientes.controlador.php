<?php

class ControladorClientes
{

    /*=============================================
    CREAR CLIENTES
    =============================================*/

    public static function ctrCrearCliente()
    {

        if (isset($_POST["nuevoCliente"])) {

            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
                preg_match('/^[-a-zA-Z0-9]+$/', $_POST["nuevoDocumentoId"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) &&
                preg_match('/^[()\0-9 ]+$/', $_POST["nuevoTelefono"]) &&
                preg_match('/^[()\0-9 ]+$/', $_POST["nuevoTelefono2"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaObservacion"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDireccion"])) {

                $tabla = "clientes";

                $datos = array("nombre" => $_POST["nuevoCliente"],
                    "documento"             => $_POST["nuevoDocumentoId"],
                    "email"                 => $_POST["nuevoEmail"],
                    "telefono"              => $_POST["nuevoTelefono"],
                    "telefono2"             => $_POST["nuevoTelefono2"],
                    "direccion"             => $_POST["nuevaDireccion"],
                    "observacion"           => $_POST["nuevaObservacion"],
                    "fecha_nacimiento"      => $_POST["nuevaFechaNacimiento"]);

                $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El cliente ha sido guardado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "clientes";

                                    }else{
                                        window.location = "clientes";
                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "clientes";

                            }else{
                                window.location = "clientes";
                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    MOSTRAR CLIENTES
    =============================================*/

    public static function ctrMostrarClientes($item, $valor)
    {

        $tabla = "clientes";

        $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    EDITAR CLIENTE
    =============================================*/

    public static function ctrEditarCliente()
    {

        if (isset($_POST["editarCliente"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
                preg_match('/^[-a-zA-Z0-9]+$/', $_POST["editarDocumentoId"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) &&
                preg_match('/^[()\0-9 ]+$/', $_POST["editarTelefono"]) &&
                preg_match('/^[()\0-9 ]+$/', $_POST["editarTelefono2"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarObservacion"]) &&
                preg_match('/^[#\.,\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDireccion"])) {

                $tabla = "clientes";

                $datos = array("id" => $_POST["idCliente"],
                    "nombre"            => $_POST["editarCliente"],
                    "documento"         => $_POST["editarDocumentoId"],
                    "email"             => $_POST["editarEmail"],
                    "telefono"          => $_POST["editarTelefono"],
                    "telefono2"         => $_POST["editarTelefono2"],
                    "direccion"         => $_POST["editarDireccion"],
                    "observacion"       => $_POST["editarObservacion"],
                    "fecha_nacimiento"  => $_POST["editarFechaNacimiento"]);

                $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El cliente ha sido cambiado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "clientes";

                                    }else{
                                        window.location = "clientes";
                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "clientes";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    ELIMINAR CLIENTE
    =============================================*/

    public static function ctrEliminarCliente()
    {

        if (isset($_GET["idCliente"])) {

            $tabla = "clientes";
            $datos = $_GET["idCliente"];

            $respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "El cliente ha sido borrado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then(function(result){
                                if (result.value) {

                                window.location = "clientes";

                                }else{
                                    window.location = "clientes";
                                }
                            })

                </script>';

            }

        }

    }

    /*=============================================
    DESCARGAR EXCEL DE TODOS LOS CLIENTES
    =============================================*/

    public function ctrDescargarReporte()
    {

        if (isset($_GET["Reporte"])) {

            $tabla = "clientes";

            $item  = null;
            $valor = null;

            $reportes = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

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

            $Name = $_GET["Reporte"] . ' Clientes Inder ' . $fechaActual . '.xls';

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
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>NOMBRE</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>CÉDULA</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>EMAIL</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>TELÉFONO</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>TELÉFONO</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>DIRECCIÓN</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>FECHA NACIMIENTO</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>OBSERVACIÓN</td>
                        <td style='font-weight:bold; background:#e6e6e6; border:1px solid #eee;' align='center'>FECHA</td>
                    </tr>");

                foreach ($reportes as $row => $item) {

                    echo utf8_decode("<tr>

                        <td style='border:1px solid #eee;' align='center'>" . ($row + 1) . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["nombre"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["documento"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["email"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["telefono"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["telefono2"] . "</td>
                        <td style='border:1px solid #eee;'>" . $item["direccion"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["fecha_nacimiento"] . "</td>
                        <td style='border:1px solid #eee;'>" . $item["observacion"] . "</td>
                        <td style='border:1px solid #eee;' align='center'>" . $item["fecha"] . "</td></tr>");

                }

                echo "</table>";

            }

        }

    }

}
