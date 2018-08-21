<?php

require_once "../controladores/estados.controlador.php";
require_once "../modelos/estados.modelo.php";

class AjaxEstados
{

    /*=============================================
    EDITAR ESTADO
    =============================================*/

    public $idEstado;

    public function ajaxEditarEstados()
    {

        $item  = "id";
        $valor = $this->idEstado;

        $respuesta = ControladorEstados::ctrMostrarEstados($item, $valor);

        echo json_encode($respuesta);

    }

    /*=============================================
    ACTIVAR COLORES EN EL ESTADO
    =============================================*/

    public function ajaxValidarColor()
    {

        $item  = "estados";
        $valor = $this->idEstado;

        $respuesta = ControladorEstados::ctrMostrarEstados($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
EDITAR ESTADO
=============================================*/
if (isset($_POST["idEstado"])) {

    $estado           = new AjaxEstados();
    $estado->idEstado = $_POST["idEstado"];
    $estado->ajaxEditarEstados();
}

/*=============================================
VALIDAR COLOR DEL ESTADO
=============================================*/

if (isset($_POST["colorpicker"])) {

    $color              = new AjaxEstados();
    $color->idEstado    = $_POST["idEstado"];
    $color->colorpicker = $_POST["colorpicker"];
    $color->ajaxValidarColor();

}
