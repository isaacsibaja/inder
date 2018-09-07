<?php

$item  = null;
$valor = null;
$orden = "id";

$clientes      = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);

$tramites      = ControladorTramites::ctrMostrarTramites($item, $valor);
$totalTramites = count($tramites);

$oficio       = ControladorOficios::ctrMostrarOficios($item, $valor);
$totalOficios = count($oficio);

$estados      = ControladorEstados::ctrMostrarEstados($item, $valor, $orden);
$totalEstados = count($estados);

?>


<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow">

    <div class="inner">

      <h3><?php echo number_format($totalClientes); ?></h3>

      <p>Clientes</p>

    </div>

    <div class="icon">

      <i class="fa fa-users"></i>

    </div>

    <a href="clientes" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-green">

    <div class="inner">

      <h3><?php echo number_format($totalTramites); ?></h3>

      <p>Tramites</p>

    </div>

    <div class="icon">

      <i class="fa fa-folder-open"></i>

    </div>

    <a href="tramites" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">

    <div class="inner">

      <h3><?php echo number_format($totalOficios); ?></h3>

      <p>Oficios</p>

    </div>

    <div class="icon">

      <i class="fa fa-list"></i>

    </div>

    <a href="oficios" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-red">

    <div class="inner">

      <h3><?php echo number_format($totalEstados); ?></h3>

      <p>Estados</p>

    </div>

    <div class="icon">

      <i class="fa fa-th"></i>

    </div>

    <a href="estados" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>
