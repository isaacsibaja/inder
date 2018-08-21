<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar oficios
      <small>(todos los oficios)</small>

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

        <?php

if ($_SESSION["perfil"] == "Administrador") {

    echo '<button class="btn btn-danger pull-right" data-toggle="modal" data-target="#btnAgregarPrimerOficioAnual"><i class="fa fa-pencil"></i> Agregar Primer Oficio Anual</button>';

}

?>

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

              <label>Fecha</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaFecha" name="nuevaFecha" value="<?php echo date("Y-m-d"); ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask placeholder="Ingresar fecha *" required readonly>


              </div>

            </div>

            <!--ENTRADA PARA EL OFICIO ESTA EN EL DIV DEL BOTON GUARDAR-->


            <!-- ENTRADA PARA DIRIGIDO A -->

            <div class="form-group">

              <label>Dirigido a</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mail-forward"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoDirigido" name="nuevoDirigido" placeholder="Ingresar dirigido a *" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL ASUNTO -->

            <div class="form-group">

              <label>Asunto</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoAsunto" name="nuevoAsunto" placeholder="Ingresar asunto *" required>

                <!--<textarea class="form-control" rows="5" id="comment"></textarea>-->

              </div>

            </div>


            <!-- ENTRADA PARA ENVIADO POR -->

            <div class="form-group">

              <label>Enviado por</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoEnviado" name="nuevoEnviado" value="<?php echo $_SESSION["nombre"]; ?>" placeholder="Ingresar enviado por" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA PLAZO RESPUESTA -->

            <div class="form-group">

                <label>Plazo Respuesta</label>

                <div class="input-group date">

                  <div class="input-group-addon">

                    <i class="fa fa-calendar"></i>

                  </div>
                  <!--data-inputmask="'alias': 'yyyy-mm-dd'" data-mask-->
                  <input type="text" class="form-control input-lg" id="nuevoPlazo" name="nuevoPlazo" placeholder="Ingresar plazo respuesta *" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>

                </div>

              </div>

             <!-- ENTRADA PARA EL ESTADO -->

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


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">



<?php
agregarOficio();
?>

          <!--Ingresar Año-->
          <input type="hidden" class="form-control input-lg" id="nuevoAno" name="nuevoAno" value="<?php echo date("Y"); ?>"required>

          <!--Botones para guardar o cancelar el oficio-->

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
METODO PARA OBTENER EL NUMERO DE OFICIO
======================================-->

<?php

function agregarOficio()
{

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

}

?>




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

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>

                <input type="text" class="form-control input-lg" name="editarFecha" id="editarFecha" placeholder="Editar Fecha *" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>

                <input type="hidden" id="idOficio" name="idOficio">

              </div>

            </div>

            <!-- ENTRADA PARA EL OFICIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-list"></i></span>

                <input type="text" min="0" class="form-control input-lg" name="editarOficio" id="editarOficio" placeholder="Editar oficio"  readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA DIRIGIDO A -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mail-forward"></i></span>

                <input type="text" class="form-control input-lg" name="editarDirigido" id="editarDirigido" placeholder="Editar Dirigido A" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL ASUNTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>

                <input type="text" class="form-control input-lg" name="editarAsunto" id="editarAsunto"  placeholder="Editar Asunto *" required>

              </div>

            </div>

            <!-- ENTRADA PARA ENVIADO POR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarEnviado" id="editarEnviado" value="<?php echo $_SESSION["nombre"]; ?>" placeholder="Editar Enviado Por" readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA PLAZO RESPUESTA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="editarPlazo" id="editarPlazo"  placeholder="Editar Plazo Respuesta" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA ESTADO -->

            <div class="form-group">

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
$editarOficio->ctrEditarOficio();

?>



    </div>

  </div>

</div>



<?php
/**

TODO:
- ACCION ELIMINAR UN OFICIO CONCLUIDA
- Comente el llamado a eliminar oficio, ya que no necesitan eliminar ningun oficio

 */

//$eliminarOficio = new ControladorOficios();
//$eliminarOficio->ctrEliminarOficio();

?>



<!--=====================================
MODAL AGREGAR OFICIO EN NUMERO UNO PARA AÑO NUEVO
======================================-->

<div id="btnAgregarPrimerOficioAnual" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" onsubmit="return registroOficioAnual()">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Oficio <strong style="color: white">Anual</strong></h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <h3 align="center"><strong style="color: red">Advertencia:</strong> llenar solo para el primer oficio anual.</h3>

            <!-- ENTRADA PARA LA FECHA -->

            <div class="form-group">

              <label>Fecha</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaFechaAnoNuevo" name="nuevaFechaAnoNuevo" value="<?php echo date("Y-m-d"); ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask placeholder="Ingresar fecha *" required readonly>


              </div>

            </div>

            <!-- ENTRADA PARA EL OFICIO -->

            <div class="form-group">

              <label>Oficio</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-list"></i></span>

                <input type="number" class="form-control input-lg" id="nuevoOficioAnoNuevo" name="nuevoOficioAnoNuevo" value="1" placeholder="Ingresar número oficio" readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA DIRIGIDO A -->

            <div class="form-group">

              <label>Dirigido a (*)</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mail-forward"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoDirigidoAnoNuevo" name="nuevoDirigidoAnoNuevo" placeholder="Ingresar dirigido a" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL ASUNTO -->

            <div class="form-group">

              <label>Asunto</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoAsuntoAnoNuevo" name="nuevoAsuntoAnoNuevo" placeholder="Ingresar asunto *" required>

              </div>

            </div>


            <!-- ENTRADA PARA ENVIADO POR -->

            <div class="form-group">

              <label>Enviado por</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoEnviadoAnoNuevo" name="nuevoEnviadoAnoNuevo" value="<?php echo $_SESSION["nombre"]; ?>" placeholder="Ingresar enviado por" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA PLAZO RESPUESTA -->

            <div class="form-group">

                <label>Plazo Respuesta</label>

                <div class="input-group date">

                  <div class="input-group-addon">

                    <i class="fa fa-calendar"></i>

                  </div>
                  <!--data-inputmask="'alias': 'yyyy-mm-dd'" data-mask-->
                  <input type="text" class="form-control input-lg" id="nuevoPlazoAnoNuevo" name="nuevoPlazoAnoNuevo" placeholder="Ingresar plazo respuesta *" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>
                </div>

              </div>

             <!-- ENTRADA PARA EL ESTADO -->

            <div class="form-group">

              <label>Estado</label>

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-th"></i></span>

                      <select class="form-control input-lg" id="nuevoEstadoAnoNuevo" name="nuevoEstadoAnoNuevo" required>

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

                  <h5 align="center" style="color: red"><strong>El consecutivo de este oficio empezará en 1.</strong></h5>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <!--Ingresar Año-->
          <input type="hidden" class="form-control input-lg" id="nuevoAnoAnoNuevo" name="nuevoAnoAnoNuevo" value="<?php echo date("Y"); ?>"required>

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar oficio</button>

        </div>

      </form>

      <?php

$crearOficioAnoNuevo = new ControladorOficios();
$crearOficioAnoNuevo->ctrCrearOficioAnoNuevo();

?>

    </div>

  </div>

</div>