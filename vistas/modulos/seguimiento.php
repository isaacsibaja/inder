<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Administrar seguimiento oficios
      <small>(todos los oficios en seguimiento)</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar seguimiento oficios</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <a href="oficios" class="btn btn-primary" style="color: white">Administrar Oficios</a>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Oficio</th>
           <th>Dirigido</th>
           <th>Asunto</th>
           <th>Enviado</th>
           <th>Plazo</th>
           <th>Estado</th>
           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>

        <?php

$item  = null;
$valor = null;

$oficios = ControladorOficios::mdlMostrarOficiosSeguimiento($item, $valor);

foreach ($oficios as $key => $value) {

    $Otto    = "OTHO - ";
    $espacio = " - ";

    echo '<tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["fecha"] . '</td>

                    <td>' . $Otto . '' . $value["oficio"] . '' . $espacio . '' . $value["ano"] . '</td>

                    <td>' . $value["dirigidoA"] . '</td>

                    <td>' . $value["asunto"] . '</td>

                    <td>' . $value["enviadoPor"] . '</td>

                    <td>' . $value["plazoRespuesta"] . '</td>';

    $PermisoModificar = $value["idUsuario"];

    $itemEstado  = "id";
    $valorEstado = $value["idEstado"];

    $respuestaEstado = ControladorEstados::ctrMostrarEstados($itemEstado, $valorEstado);

    echo '<td>' . $respuestaEstado["estado"] . '</td>

          <td>

            <div class="btn-group">';

    if ($_SESSION["perfil"] == "Usuario" && $_SESSION["id"] == $PermisoModificar) {

        echo '<button class="btn btn-warning btnEditarOficio" data-toggle="modal" data-target="#modalEditarOficio" idOficio="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>';

    } elseif ($_SESSION["perfil"] == "Administrador") {

        echo '<button class="btn btn-warning btnEditarOficio" data-toggle="modal" data-target="#modalEditarOficio" idOficio="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>';

        echo '<button class="btn btn-danger btnEliminarOficio" idOficio="' . $value["id"] . '"><i class="fa fa-times"></i></button>';

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
MODAL EDITAR OFICIO
======================================-->

<div id="modalEditarOficio" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" onsubmit="return modificarOficio()">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar oficio</h4>

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

                <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>

                <input type="text" class="form-control input-lg" name="editarFecha" id="editarFecha" placeholder="Editar Fecha *" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>

                <input type="hidden" id="idOficio" name="idOficio">


              </div>

            </div>

            <!-- ENTRADA PARA EL OFICIO -->

            <div class="form-group">

              <label>Número Oficio</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-list"></i></span>

                <input type="text" min="0" class="form-control input-lg" name="editarOficio" id="editarOficio" placeholder="Editar oficio"  readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA DIRIGIDO A -->

            <div class="form-group">

              <label>Dirigido a</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mail-forward"></i></span>

                <input type="text" class="form-control input-lg" name="editarDirigido" id="editarDirigido" placeholder="Editar Dirigido A" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL ASUNTO -->

            <div class="form-group">

              <label>Asunto</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>

                <textarea type="text" class="form-control input-lg" name="editarAsunto" id="editarAsunto"  placeholder="Editar Asunto *" required rows="3"></textarea>

              </div>

            </div>

            <!-- ENTRADA PARA ENVIADO POR -->

            <div class="form-group">

              <label>Enviado por</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarEnviado" id="editarEnviado" value="<?php echo $_SESSION["nombre"]; ?>" placeholder="Editar Enviado Por" readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA PLAZO RESPUESTA -->

            <div class="form-group">

              <label>Plazo Respuesta</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="editarPlazo" id="editarPlazo"  placeholder="Editar Plazo Respuesta" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA ESTADO -->

            <div class="form-group">

              <label>Estado</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plus-square-o"></i></span>

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


            <!-- ENTRADA PARA EDITAR SEGUIMIENTO -->

            <div class="formulario" align="center">

              <h2>¿Desea dar seguimiento a este oficio?</h2>

                  <input type="radio" name="editarSeguimiento" id="siM" value="1">
                  <label for="siM">Si dar seguimiento</label>

                  <input type="radio" name="editarSeguimiento" id="noM" value="0">
                  <label for="noM">No dar seguimiento</label>

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

$editarOficio = new ControladorOficios();
$editarOficio->ctrEditarOficioSeguimiento();

?>



    </div>

  </div>

</div>