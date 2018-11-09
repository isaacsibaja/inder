<?php

require_once "../controladores/tramites.controlador.php";
require_once "../modelos/tramites.modelo.php";

class AjaxTramites
{

    /*=============================================
    EDITAR TRAMITE
    =============================================*/

    public $idTramite;
    //public $idSolicitudRespuesta;

    public function ajaxEditarTramite()
    {

        $item  = "id";
        $valor = $this->idTramite;

        $respuesta = ControladorTramites::ctrMostrarTramites($item, $valor);

        echo json_encode($respuesta);

    }

    /*public function ajaxEditarSolicitudRespuesta()
{

$item  = "solicitudRespuesta";
$valor = $this->idSolicitudRespuesta;

$respuesta = ControladorTramites::ctrMostrarTramites($item, $valor);

echo json_encode($respuesta);

}*/

}

/*=============================================
EDITAR TRAMITE
=============================================*/

if (isset($_POST["idTramite"])) {

    $tramite            = new AjaxTramites();
    $tramite->idTramite = $_POST["idTramite"];
    $tramite->ajaxEditarTramite();

}

/*=============================================
EDITAR SOLICITUD RESPUESTA

if (isset($_POST["idSolicitudRespuesta"])) {

$solicitudRespuesta                       = new AjaxTramites();
$solicitudRespuesta->idSolicitudRespuesta = $_POST["idSolicitudRespuesta"];
$solicitudRespuesta->ajaxEditarSolicitudRespuesta();

}
=============================================*/
