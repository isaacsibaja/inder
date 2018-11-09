<?php

require_once "../controladores/tipotramite.controlador.php";
require_once "../modelos/tipotramite.modelo.php";

class AjaxTipoTramites
{

    /*=============================================
    EDITAR TIPO TRAMITE
    =============================================*/

    public $idTipoTramite;

    public function ajaxEditarTipoTramite()
    {

        $item  = "id";
        $valor = $this->idTipoTramite;

        $respuesta = ControladorTipoTramites::ctrMostrarTipoTramites($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
EDITAR TIPO TRAMITE
=============================================*/

if (isset($_POST["idTipoTramite"])) {

    $cliente                = new AjaxTipoTramites();
    $cliente->idTipoTramite = $_POST["idTipoTramite"];
    $cliente->ajaxEditarTipoTramite();

}
