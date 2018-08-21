<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar oficios
      <small>(todos mis oficios)</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar oficios</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarOficio">

          Agregar oficio

        </button>

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

$oficios = ControladorOficios::ctrMostrarOficios($item, $valor);

foreach ($oficios as $key => $value) {

    $Otto      = "OTHO - ";
    $espacio   = " - ";
    $anoActual = date('Y');

    echo '<tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["fecha"] . '</td>

                    <td>' . $Otto . '' . $value["oficio"] . '' . $espacio . '' . $anoActual . '</td>

                    <td>' . $value["dirigidoA"] . '</td>

                    <td>' . $value["asunto"] . '</td>

                    <td>' . $value["enviadoPor"] . '</td>

                    <td>' . $value["plazoRespuesta"] . '</td>';

    $itemCliente  = "id";
    $valorCliente = $value["idEstado"];

    $respuestaCliente = ControladorEstados::ctrMostrarEstados($itemCliente, $valorCliente);

    echo '<td>' . $respuestaCliente["estado"] . '</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarOficio" data-toggle="modal" data-target="#modalEditarOficio" idOficio="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>';

    if ($_SESSION["perfil"] == "Administrador") {

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
MODAL AGREGAR OFICIO
======================================-->

<div id="modalAgregarOficio" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" onsubmit="return registroOficio()">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar oficio</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA FECHA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>

                <input type="date" class="form-control input-lg" id="nuevaFecha" name="nuevaFecha" value="<?php echo date("Y-m-d"); ?>" placeholder="Ingresar fecha *" required readonly>


              </div>

            </div>

            <!-- ENTRADA PARA EL OFICIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-list"></i></span>

                <?php

$item  = null;
$valor = null;

$oficios = ControladorOficios::ctrMostrarOficios($item, $valor);

if (!$oficios) {

    echo '<input type="text" class="form-control" id="nuevoOficio" name="nuevoOficio" value="0001" readonly>';

} else {

    foreach ($oficios as $key => $value) {

    }

    $oficio = $value["oficio"] + 1;

    echo '<input type="text" class="form-control" id="nuevoOficio" name="nuevoOficio" value="' . $oficio . '" readonly>';

}

?>

              </div>

            </div>

            <!-- ENTRADA PARA DIRIGIDO A -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mail-forward"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoDirigido" name="nuevoDirigido" placeholder="Ingresar dirigido a" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL ASUNTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoAsunto" name="nuevoAsunto" placeholder="Ingresar asunto *" required>

              </div>

            </div>


            <!-- ENTRADA PARA ENVIADO POR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoEnviado" name="nuevoEnviado" value="<?php echo $_SESSION["nombre"]; ?>" placeholder="Ingresar enviado por" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA PLAZO RESPUESTA -->

            <div class="form-group">

                <!--<label>Date:</label>-->

                <div class="input-group date">

                  <div class="input-group-addon">

                    <i class="fa fa-calendar"></i>

                  </div>

                  <input type="text" class="form-control input-lg" id="nuevoPlazo" name="nuevoPlazo" placeholder="Ingresar plazo respuesta *" required>

                </div>

              </div>

             <!-- ENTRADA PARA EL ESTADO -->

            <div class="form-group">

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


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar oficio</button>

        </div>

      </form>

      <?php

$crearOficio = new ControladorOficios();
$crearOficio->ctrCrearOficio();

?>

    </div>

  </div>

</div>




<!--=====================================
MODAL EDITAR OFICIO
======================================-->

<div id="modalEditarOficio" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" onsubmit="return editarOficio()">

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


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg"  name="editarCategoria" readonly required>

                  <option id="editarCategoria"></option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>

              </div>

            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-6">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                    <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" min="0" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                    <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" min="0" readonly required>

                  </div>

                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

                  <div class="col-xs-6">

                    <div class="form-group">

                      <label>

                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>

                    </div>

                  </div>

                  <!-- ENTRADA PARA PORCENTAJE -->

                  <div class="col-xs-6" style="padding:0">

                    <div class="input-group">

                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div>

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

$editarProducto = new ControladorProductos();
$editarProducto->ctrEditarProducto();

?>

    </div>

  </div>

</div>

<?php

$eliminarOficio = new ControladorProductos();
$eliminarOficio->ctrEliminarProducto();

?>