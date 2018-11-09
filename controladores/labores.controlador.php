<?php

class ControladorLabores
{

    /*=============================================
    MOSTRAR LABORES
    =============================================*/

    public static function ctrMostrarLabores($item, $valor)
    {

        $tabla = "labores";

        $respuesta = ModeloLabores::mdlMostrarLabores($tabla, $item, $valor);

        return $respuesta;

    }

}
