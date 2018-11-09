<?php

require_once "../controladores/instituto.controlador.php";
require_once "../modelos/instituto.modelo.php";

class AjaxInstituto
{

    /*=============================================
    EDITAR INSTITUTO
    =============================================*/

    public $idInstituto;

    public function ajaxEditarInstituto()
    {

        $item  = "id";
        $valor = $this->idInstituto;

        $respuesta = ControladorInstituto::ctrMostrarInstituto($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
EDITAR INSTITUTO
=============================================*/
if (isset($_POST["idInstituto"])) {

    $instituto              = new AjaxInstituto();
    $instituto->idInstituto = $_POST["idInstituto"];
    $instituto->ajaxEditarInstituto();
}
