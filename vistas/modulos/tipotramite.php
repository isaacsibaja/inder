<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar tipo trámites
      <small>(Todos los tipos de trámites)</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar tipo trámites</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTipoTramite">

          Agregar tipo trámite

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Tipo trámite</th>
           <th>Respuesta</th>
           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>

        <?php

$item  = null;
$valor = null;

$tipoTramite = ControladorTipoTramites::ctrMostrarTipoTramites($item, $valor);

foreach ($tipoTramite as $key => $value) {

    echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["tipo"] . '</td>

                    <td>' . $value["respuesta"] . '</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarTipoTramite" idTipoTramite="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarTipoTramite"><i class="fa fa-pencil"></i></button>';

    if ($_SESSION["perfil"] == "Administrador") {

        echo '<button class="btn btn-danger btnEliminarTipoTramite" idTipoTramite="' . $value["id"] . '"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR TIPO TRAMITE
======================================-->

<div id="modalAgregarTipoTramite" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar tipo trámite</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <label>Tipo trámite</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoTipo" name="nuevoTipo" placeholder="Ingresar tipo trámite" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA RESPUESTA -->

            <div class="form-group">

              <label>Respuesta</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-edit"></i></span>

                <textarea type="text" class="form-control input-lg" id="nuevaRespuesta" name="nuevaRespuesta" placeholder="Ingresar respuesta tipo trámite" rows="12" required></textarea>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar tipo trámite</button>

        </div>

        <?php

$crearTipoTramite = new ControladorTipoTramites();
$crearTipoTramite->ctrCrearTipoTramite();

?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR TIPO TRAMITE
======================================-->

<div id="modalEditarTipoTramite" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar tipo trámite</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <label>Tipo trámite</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>

                <input type="text" class="form-control input-lg" id="editarTipo" name="editarTipo" placeholder="Editar tipo trámite" required>

                <input type="hidden" id="idTipoTramite" name="idTipoTramite">

              </div>

            </div>

            <!-- ENTRADA PARA LA RESPUESTA -->

            <div class="form-group">

              <label>Respuesta</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-edit"></i></span>

                <textarea type="text" class="form-control input-lg" id="editarRespuesta" name="editarRespuesta" placeholder="Editar respuesta tipo trámite" rows="12" required></textarea>

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

      <?php

$editarTipoTramite = new ControladorTipoTramites();
$editarTipoTramite->ctrEditarTipoTramite();

?>

      </form>

    </div>

  </div>

</div>

<?php

$borrarTipoTramite = new ControladorTipoTramites();
$borrarTipoTramite->ctrBorrarTipoTramite();

?>