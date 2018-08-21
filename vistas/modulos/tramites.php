<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar tramites
      <small>(Todos los tramites)</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar tramites</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTramite">

          Agregar tramite

        </button>

        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAgregarCliente">

          Agregar cliente

        </button>

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
           <th>Tránsmite</th>
           <th>Observaciones</th>
           <th>Estado</th>
           <th>Enviado por</th>
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

                    <td>' . $value["predio"] . '</td>

                    <td>' . $value["tramite"] . '</td>

                    <td>' . $value["observacion"] . '</td>';

    $itemCliente  = "id";
    $valorCliente = $value["idEstado"];

    $respuestaCliente = ControladorEstados::ctrMostrarEstados($itemCliente, $valorCliente);

    echo '<td>' . $respuestaCliente["estado"] . '</td>';

    $itemUsuario  = "id";
    $valorUsuario = $value["idUsuario"];

    $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

    echo '<td>' . $respuestaUsuario["nombre"] . '</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarTramite" data-toggle="modal" data-target="#modalEditarTramite" idTramite="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>';

    if ($_SESSION["perfil"] == "Administrador") {

        echo '<button class="btn btn-danger btnEliminarTramite" idTramite="' . $value["id"] . '"><i class="fa fa-times"></i></button>';

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

      <form role="form" method="post" onsubmit="return registroTramite()">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar tramite</h4>

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

                <input type="text" class="form-control input-lg" id="nuevaFecha" name="nuevaFecha" value="<?php echo date("Y-m-d"); ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask placeholder="Ingresar fecha *" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA SOLICITANTE O CLIENTE -->

            <div class="form-group">

              <label>Solicitante</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa fa-users"></i></span>

                <select class="form-control input-lg" id="nuevoSolicitante" name="nuevoSolicitante" required>

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

                <input type="text" class="form-control input-lg" id="nuevoAsentamiento" name="nuevoAsentamiento" placeholder="Ingresar asentamiento" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL PREDIO -->

            <div class="form-group">

              <label>Predio</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoPredio" name="nuevoPredio" placeholder="Ingresar predio" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL TRAMITE -->

            <div class="form-group">

              <label>Tramite</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoTramite" name="nuevoTramite" placeholder="Ingresar tramite"  required>

              </div>

            </div>

            <!-- ENTRADA PARA LA OBSERVACIÓN -->

            <div class="form-group">

              <label>Observación</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa  fa-search"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaObservacion" name="nuevaObservacion" placeholder="Ingresar observación *">

              </div>

            </div>

             <!-- ENTRADA PARA EL ESTADO-->

            <div class="form-group">

              <label>Estado</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="nuevoEstado" name="nuevoEstado" required>

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

            <!-- ENTRADA PARA ID USUARIO -->

            <div class="form-group">

              <!--<label>Usuario</label>-->

              <div class="input-group">

                <!--<span class="input-group-addon"><i class="fa fa-user"></i></span>-->

                <input type="hidden" class="form-control input-lg" id="nuevoEnviado" name="nuevoEnviado" value="<?php echo $_SESSION["id"]; ?>" placeholder="Ingresar enviado por" required readonly>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar tramite</button>

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

          <h4 class="modal-title">Editar tramite</h4>

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

                <input type="text" class="form-control input-lg" id="editarFecha" name="editarFecha" placeholder="Editar fecha *" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required readonly>

                <input type="hidden" id="idTramite" name="idTramite">

              </div>

            </div>

            <!-- ENTRADA PARA SOLICITANTE O CLIENTE -->

            <div class="form-group">

              <label>Solicitante</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa fa-users"></i></span>

                <select class="form-control input-lg" id="editarSolicitante" name="editarSolicitante" required>

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

                <input type="text" class="form-control input-lg" id="editarAsentamiento" name="editarAsentamiento" placeholder="Editar asentamiento" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL PREDIO -->

            <div class="form-group">

              <label>Predio</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>

                <input type="text" class="form-control input-lg" id="editarPredio" name="editarPredio" placeholder="Editar predio" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL TRAMITE -->

            <div class="form-group">

              <label>Tramite</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>

                <input type="text" class="form-control input-lg" id="editarTramite" name="editarTramite" placeholder="Editar tramite"  required>


              </div>

            </div>

            <!-- ENTRADA PARA LA OBSERVACIÓN -->

            <div class="form-group">

              <label>Observación</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa  fa-search"></i></span>

                <input type="text" class="form-control input-lg" id="editarObservacion" name="editarObservacion" placeholder="Editar observación *">

              </div>

            </div>

             <!-- ENTRADA PARA EL ESTADO-->

            <div class="form-group">

              <label>Estado</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="editarEstado" name="editarEstado" required>

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

            <!-- ENTRADA PARA ID USUARIO -->

            <div class="form-group">

              <!--<label>Usuario</label>-->

              <div class="input-group">

                <!--<span class="input-group-addon"><i class="fa fa-user"></i></span>-->

                <input type="hidden" class="form-control input-lg" id="editarEnviado" name="editarEnviado" value="<?php echo $_SESSION["id"]; ?>" required>

              </div>

            </div>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

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

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoCliente" name="nuevoCliente" placeholder="Ingresar nombre *" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" min="0" class="form-control input-lg" id="nuevoDocumentoId" name="nuevoDocumentoId" placeholder="Ingresar pasaporte o cédula *" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" id="nuevoEmail" name="nuevoEmail" placeholder="Ingresar email">

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO FIJO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoTelefono" name="nuevoTelefono" placeholder="Ingresar teléfono fijo" data-inputmask="'mask':'9999-9999'" data-mask>

              </div>

            </div>


            <!-- ENTRADA PARA EL TELÉFONO MOVIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoTelefono2" name="nuevoTelefono2" placeholder="Ingresar teléfono móvil" data-inputmask="'mask':'9999-9999'" data-mask>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaDireccion" name="nuevaDireccion" placeholder="Ingresar dirección *" required>

              </div>

            </div>

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaFechaNacimiento" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>

              </div>

            </div>

            <!-- ENTRADA PARA OBSERVACION -->

            <div class="form-group">

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