<?php

require_once "../../controladores/instituto.controlador.php";
require_once "../../modelos/instituto.modelo.php";

require_once "../../controladores/oficios.controlador.php";
require_once "../../modelos/oficios.modelo.php";

require_once "../../controladores/estados.controlador.php";
require_once "../../modelos/estados.modelo.php";

require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";

$reporte = new ControladorOficios();
$reporte->ctrDescargarReporte();
