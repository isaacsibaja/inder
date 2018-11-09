<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar trámites
      <small>(Todos los trámites)</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar trámites</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTramite">

          Agregar trámite

        </button>


        <div class="box-tool pull-right">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">

          Agregar cliente

        </button>

          <?php

echo '<a href="vistas/modulos/descargar-reporte-tramites.php?Reporte=Reporte">
            <button class="btn btn-success">Descargar reporte de trámites</button>
          </a>';
?>

        </div>

      </div>


      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Solicitante</th>
           <th>Asentamiento</th>
           <th>Predio</th>
           <th>Trámite</th>
           <th>Observación</th>
           <th>Estado</th>
           <th>Enviado</th>
           <th>R/</th>
           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>

        <?php

$item  = null;
$valor = null;

$tramites = ControladorTramites::ctrMostrarTramites($item, $valor);

foreach ($tramites as $key => $value) {

    echo '<tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["fecha"] . '</td>';

    $itemCliente  = "id";
    $valorCliente = $value["idCliente"];

    $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

    echo '<td>' . $respuestaCliente["nombre"] . '</td>

                    <td>' . $value["asentamiento"] . '</td>

                    <td>' . $value["predio"] . '</td>';

    $itemTipoTramite  = "id";
    $valorTipoTramite = $value["idTipoTramite"];

    $respuestaTipoTramite = ControladorTipoTramites::ctrMostrarTipoTramites($itemTipoTramite, $valorTipoTramite);

    echo '<td>' . $respuestaTipoTramite["tipo"] . '</td>

                    <td>' . $value["observacion"] . '</td>';

    $itemEstado  = "id";
    $valorEstado = $value["idEstado"];

    $respuestaEstado = ControladorEstados::ctrMostrarEstados($itemEstado, $valorEstado);

    echo '<td>' . $respuestaEstado["estado"] . '</td>';

    $itemUsuario  = "id";
    $valorUsuario = $value["idUsuario"];

    $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

    echo '<td>' . $respuestaUsuario["nombre"] . '</td>';

    $si                      = "Si";
    $no                      = "No";
    $valorSolicitudRespuesta = $value["solicitudRespuesta"];

    if ($value["solicitudRespuesta"] == "1") {
        echo '<td align="center">' . $si . '</td>';
    } else {
        echo '<td align="center">' . $no . '</td>';
    }

    echo '<td>

                      <div class="btn-group">

                      <button class="btn btn-info btnImprimirTramite" codigoTramite="' . $value["id"] . '">
                          <i class="fa fa-print"></i>
                      </button>

                        <button class="btn btn-warning btnEditarTramite" data-toggle="modal" data-target="#modalEditarTramite" idTramite="' . $value["id"] . '" idSolicitudRespuesta="' . $value["solicitudRespuesta"] . '"><i class="fa fa-pencil"></i></button>';

    if ($_SESSION["perfil"] == "Administrador") {

        //echo '<button class="btn btn-danger btnEliminarTramite" idTramite="' . $value["id"] . '"><i class="fa fa-times"></i></button>';

    }

    echo '</div>

                    </td>

                  </tr>';
}

?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>



<!--=====================================
MODAL AGREGAR TRAMITE
======================================-->

<div id="modalAgregarTramite" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <!--onsubmit="return registroTramite()"-->

      <form role="form" method="post" onsubmit="return registroTramite()">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar trámite</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA FECHA -->

            <div class="form-group">

              <label>Fecha</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <?php
date_default_timezone_set('America/Costa_Rica');

$fecha = date('Y-m-d');
?>

                <input type="text" class="form-control input-lg" id="nuevaFecha" name="nuevaFecha" value="<?php echo $fecha ?>" placeholder="Ingresar fecha actual" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask  readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL CLIENTE O SOLICITANTE -->

            <div class="form-group">

              <label>Solicitante</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa fa-users"></i></span>

                <select class="form-control input-lg" id="nuevoSolicitante" name="nuevoSolicitante" >

                    <option value="">Seleccionar cliente</option>

                    <?php

$item  = null;
$valor = null;

$cliente = ControladorClientes::ctrMostrarClientes($item, $valor);

foreach ($cliente as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';

}

?>

                    </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL ASENTAMIENTO -->

            <div class="form-group">

              <label>Asentamiento o Localidad</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoAsentamiento" name="nuevoAsentamiento" placeholder="Ingresar asentamiento" >

              </div>

            </div>

            <!-- ENTRADA PARA EL PREDIO -->

            <div class="form-group">

              <label>Predio o Dirección</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoPredio" name="nuevoPredio" placeholder="Ingresar predio o localidad" >

              </div>

            </div>

            <!-- ENTRADA PARA TIPO TRAMITE -->

            <div class="form-group">

              <label>Tipo Trámite</label> <small> (Para agregar más tipos de trámite <a href="tipotramite">clic aquí)</a></small>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>

                <select class="form-control input-lg" id="nuevoTipoTramite" name="nuevoTipoTramite" >

                    <option value="">Seleccionar tipo trámite</option>

                    <?php

$item  = null;
$valor = null;

$tipoTramite = ControladorTipoTramites::ctrMostrarTipoTramites($item, $valor);

foreach ($tipoTramite as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["tipo"] . '</option>';

}

?>

                    </select>

              </div>

            </div>

             <!-- ENTRADA PARA LA OBSERVACIÓN -->

            <div class="form-group">

              <label>Observación</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa  fa-search"></i></span>

                <textarea type="text" class="form-control input-lg" id="nuevaObservacion" name="nuevaObservacion" placeholder="Ingresar observación (opcional)" rows="3"></textarea>

              </div>

            </div>

             <!-- ENTRADA PARA EL ESTADO-->

            <div class="form-group">

              <label>Estado</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="nuevoEstado" name="nuevoEstado" >

                        <option value="">Selecionar estado</option>

                        <?php

$item  = null;
$valor = null;

$estados = ControladorEstados::ctrMostrarEstados($item, $valor);

foreach ($estados as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["estado"] . '</option>';
}

?>

                      </select>

              </div>

            </div>

            <!-- ENTRADA PARA SEGUIMIENTO -->

            <div class="formulario" align="center">

              <h2 id="idNuevaSolicitudRespuesta">¿Desea dar respuesta a este trámite?</h2>

                  <input type="radio" name="nuevaSolicitudRespuesta" id="si" value="1" >
                  <label for="si">Si dar respuesta</label>

                  <input type="radio" name="nuevaSolicitudRespuesta" id="no" value="0" checked>
                  <label for="no">No dar respuesta</label>

            </div>

            <!-- ENTRADA PARA LA RESPUESTA -->

            <div class="form-group">

              <label>Respuesta</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaRespuesta" name="nuevaRespuesta" placeholder="Ingresar respuesta">

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <input type="hidden" class="form-control input-lg" id="nuevoEnviado" name="nuevoEnviado"
          value="<?php echo $_SESSION["id"]; ?>" >

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar trámite</button>

        </div>

      </form>

      <?php

$crearTramite = new ControladorTramites();
$crearTramite->ctrCrearTramite();

?>

    </div>

  </div>

</div>




<!--=====================================
MODAL EDITAR TRAMITE
======================================-->

<div id="modalEditarTramite" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" onsubmit="return modificarTramite()">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar trámite</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA FECHA -->

            <div class="form-group">

              <label>Fecha</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" id="editarFecha" placeholder="Editar fecha *" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask readonly>

                <input type="hidden" id="idTramite" name="idTramite">

                <!--<input type="text" id="idSolicitudRespuesta" name="idSolicitudRespuesta">-->

              </div>

            </div>

            <!-- ENTRADA PARA SOLICITANTE O CLIENTE -->

            <div class="form-group">

              <label>Solicitante</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa fa-users"></i></span>

                <select class="form-control input-lg" id="editarSolicitante" name="editarSolicitante">

                        <option value="">Selecionar solicitante</option>

                        <?php

$item  = null;
$valor = null;

$cliente = ControladorClientes::ctrMostrarClientes($item, $valor);

foreach ($cliente as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
}

?>

                      </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL ASENTAMIENTO -->

            <div class="form-group">

              <label>Asentamiento</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" id="editarAsentamiento" name="editarAsentamiento" placeholder="Editar asentamiento">

              </div>

            </div>

            <!-- ENTRADA PARA EL PREDIO -->

            <div class="form-group">

              <label>Predio</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>

                <input type="text" class="form-control input-lg" id="editarPredio" name="editarPredio" placeholder="Editar predio">

              </div>

            </div>


            <!-- ENTRADA PARA TIPO DE TRAMITE -->

            <div class="form-group">

              <label>Tipo Trámite</label> <small> (Para agregar más tipos de trámite <a href="tipotramite">clic aquí)</a></small>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa fa-users"></i></span>

                <select class="form-control input-lg" id="editarTipoTramite" name="editarTipoTramite">

                        <option value="">Selecionar tipo trámite</option>

                        <?php

$item  = null;
$valor = null;

$tipo = ControladorTipoTramites::ctrMostrarTipoTramites($item, $valor);

foreach ($tipo as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["tipo"] . '</option>';
}

?>

                      </select>

              </div>

            </div>


            <!-- ENTRADA PARA LA OBSERVACIÓN -->

            <div class="form-group">

              <label>Observación</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa  fa-search"></i></span>

                <textarea type="text" class="form-control input-lg" id="editarObservacion" name="editarObservacion" placeholder="Editar observación *" rows="3"></textarea>

              </div>

            </div>

             <!-- ENTRADA PARA EL ESTADO-->

            <div class="form-group">

              <label>Estado</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="editarEstado" name="editarEstado">

                        <option value="">Selecionar estado</option>

                        <?php

$item  = null;
$valor = null;

$estados = ControladorEstados::ctrMostrarEstados($item, $valor);

foreach ($estados as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["estado"] . '</option>';
}

?>

                      </select>

              </div>

            </div>

            <!-- ENTRADA SOLICITUD DE RESPUESTA  formularioTramite-->

            <div class="formularioTramite" align="center">

              <h2 id="idEditarSolicitudRespuesta">¿Desea dar respuesta a este trámite?</h2>

                  <input type="radio" name="editarSolicitudRespuesta" id="siT" value="1">
                  <label for="siT">Si dar respuesta</label>

                  <input type="radio" name="editarSolicitudRespuesta" id="noT" value="0" checked>
                  <label for="noT">No dar respuesta</label>

            </div>


            <!-- ENTRADA PARA LA RESPUESTA -->

            <div class="form-group">

              <label>Respuesta</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>

                <input type="text" class="form-control input-lg" id="editarRespuesta" name="editarRespuesta" placeholder="Editar respuesta">

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <!--esta entrada para futuro desarrollos (value) para capturar el ultimo que modifico el tramite-->
          <input type="hidden" class="form-control input-lg" id="editarEnviado" name="editarEnviado" required readonly>

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

$editarTramite = new ControladorTramites();
$editarTramite->ctrEditarTramite();

?>



    </div>

  </div>

</div>

<?php

$eliminarTramite = new ControladorTramites();
$eliminarTramite->ctrEliminarTramite();

?>



<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" onsubmit="return registroCliente()">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <label>Nombre Completo</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoCliente" name="nuevoCliente" placeholder="Ingresar nombre *" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->

            <div class="form-group">

              <label>Cédula o Pasaporte</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" min="0" class="form-control input-lg" id="nuevoDocumentoId" name="nuevoDocumentoId" placeholder="Ingresar pasaporte o cédula *" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <label>Correo Electrónico</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" id="nuevoEmail" name="nuevoEmail" placeholder="Ingresar email">

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO FIJO -->

            <div class="form-group">

              <label>Número Telefónico</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoTelefono" name="nuevoTelefono" placeholder="Ingresar teléfono fijo" data-inputmask="'mask':'9999-9999'" data-mask>

              </div>

            </div>


            <!-- ENTRADA PARA EL TELÉFONO MOVIL -->

            <div class="form-group">

              <label>Número Telefónico</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoTelefono2" name="nuevoTelefono2" placeholder="Ingresar teléfono móvil" data-inputmask="'mask':'9999-9999'" data-mask>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <label>Dirección</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaDireccion" name="nuevaDireccion" placeholder="Ingresar dirección *" required>

              </div>

            </div>

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

            <div class="form-group">

              <label>Fecha Nacimiento</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaFechaNacimiento" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>

              </div>

            </div>

            <!-- ENTRADA PARA OBSERVACION -->

            <div class="form-group">

              <label>Observaciones</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plus-square-o"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaObservacion" name="nuevaObservacion" placeholder="Ingresar observación">

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

      <?php

$crearCliente = new ControladorClientes();
$crearCliente->ctrCrearCliente();

?>

    </div>

  </div>

</div>