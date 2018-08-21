<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar estados
      <small>(Todos los estados)</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar estados</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEstado">

          Agregar estado

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Estado</th>
           <th>Color</th>
           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>

        <?php

$item  = null;
$valor = null;

$estados = ControladorEstados::ctrMostrarEstados($item, $valor);

foreach ($estados as $key => $value) {

    echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td class="text-uppercase">' . $value["estado"] . '</td>

                    <td class="text-uppercase">' . $value["color"] . '</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarEstado" idEstado="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarEstado"><i class="fa fa-pencil"></i></button>';

    if ($_SESSION["perfil"] == "Administrador") {

        echo '<button class="btn btn-danger btnEliminarEstado" idEstado="' . $value["id"] . '"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR ESTADO
======================================-->

<div id="modalAgregarEstado" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" onsubmit="return registroEstado()">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar estado</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL ESTADO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoEstado" name="nuevoEstado" placeholder="Ingresar estado">

              </div>

            </div>

            <!-- ENTRADA PARA EL COLOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>

                <select class="form-control input-lg colorpicker" id="colorpicker" name="colorpicker">

                  <option value="">Selecionar color</option>

                  <option value="#000000">Negro</option>

                  <option value="#FFFFFF">Blanco</option>

                  <option value="#FF0000">Rojo</option>

                  <option value="#00FF00">Verde</option>

                  <option value="#0000FF">Azul</option>

                  <option value="#FFFF00">Amarillo</option>

                  <option value="#00FFFF">Cian</option>

                  <option value="#FF00FF">Magenta</option>

                </select>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar estado</button>

        </div>

        <?php

$crearEstado = new ControladorEstados();
$crearEstado->ctrCrearEstado();

?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarEstado" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" onsubmit="return ModificarEstado()">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar estado</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL ESTADO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarEstado" name="editarEstado"  required>

                 <input type="hidden"  name="idEstado" id="idEstado" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL COLOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>


                <select class="form-control input-lg" id="editarColorpicker" name="editarColorpicker">

                  <option value="">Selecionar color</option>

                  <option value="#000000">Negro</option>

                  <option value="#FFFFFF">Blanco</option>

                  <option value="#FF0000">Rojo</option>

                  <option value="#00FF00">Verde</option>

                  <option value="#0000FF">Azul</option>

                  <option value="#FFFF00">Amarillo</option>

                  <option value="#00FFFF">Cian</option>

                  <option value="#FF00FF">Magenta</option>

                </select>

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

$editarEstado = new ControladorEstados();
$editarEstado->ctrEditarEstado();

?>

      </form>

    </div>

  </div>

</div>

<?php

$borrarEstado = new ControladorEstados();
$borrarEstado->ctrBorrarEstado();

?>