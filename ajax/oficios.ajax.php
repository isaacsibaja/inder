<?php

require_once "../controladores/oficios.controlador.php";
require_once "../modelos/oficios.modelo.php";

class AjaxOficios
{

    /*=============================================
    EDITAR OFICIO
    =============================================*/

    public $idOficio;

    public function ajaxEditarOficio()
    {

        $item = "id";

        $valor = $this->idOficio;

        $respuesta = ControladorOficios::ctrMostrarOficios($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
EDITAR OFICIO
=============================================*/

if (isset($_POST["idOficio"])) {

    $oficio           = new AjaxOficios();
    $oficio->idOficio = $_POST["idOficio"];
    $oficio->ajaxEditarOficio();

}
