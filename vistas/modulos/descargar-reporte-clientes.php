<?php

require_once "../../controladores/instituto.controlador.php";
require_once "../../modelos/instituto.modelo.php";

require_once "../../controladores/clientes.controlador.php";
require_once "../../modelos/clientes.modelo.php";

$reporte = new ControladorClientes();
$reporte->ctrDescargarReporte();
