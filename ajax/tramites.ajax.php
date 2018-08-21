<?php

require_once "../controladores/tramites.controlador.php";
require_once "../modelos/tramites.modelo.php";

class AjaxTramites
{

    /*=============================================
    EDITAR TRAMITE
    =============================================*/

    public $idTramite;

    public function ajaxEditarTramite()
    {

        $item  = "id";
        $valor = $this->idTramite;

        $respuesta = ControladorTramites::ctrMostrarTramites($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
EDITAR TRAMITE
=============================================*/

if (isset($_POST["idTramite"])) {

    $tramite            = new AjaxTramites();
    $tramite->idTramite = $_POST["idTramite"];
    $tramite->ajaxEditarTramite();

}
