<?php

require_once "controladores/plantilla.controlador.php";

require_once "controladores/usuarios.controlador.php";
require_once "controladores/estados.controlador.php";
require_once "controladores/oficios.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/transmites.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/estados.modelo.php";
require_once "modelos/oficios.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/transmites.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
