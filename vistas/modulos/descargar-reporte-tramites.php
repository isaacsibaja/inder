<?php

require_once "../../controladores/instituto.controlador.php";
require_once "../../modelos/instituto.modelo.php";

require_once "../../controladores/tramites.controlador.php";
require_once "../../modelos/tramites.modelo.php";

require_once "../../controladores/tipotramite.controlador.php";
require_once "../../modelos/tipotramite.modelo.php";

require_once "../../controladores/estados.controlador.php";
require_once "../../modelos/estados.modelo.php";

require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";

require_once "../../controladores/clientes.controlador.php";
require_once "../../modelos/clientes.modelo.php";

$reporte = new ControladorTramites();
$reporte->ctrDescargarReporte();
