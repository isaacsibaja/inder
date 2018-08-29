<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Tablero
      <small>Panel de Control</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Tablero</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <!--<div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarLabor">

          Agregar labor

        </button>

      </div>-->

      <div class="box-body">

        <h3 class="box-title">Labores del personal de OTHO</h3>

          <div class="container">

            <div class="row">

              <div class="col"></div>
              <div class="col-7"><div id="CalendarioWeb"></div></div>
              <div class="col"></div>
            </div>


          </div>

      </div>

      <div class="box-footer">

        <br>

            <?php

include "cajas.php";

?>

      </div>


    </div>

  </section>


</div>


<!--=====================================
MODAL AGREGAR LABOR
======================================-->

<div id="modalAgregarLabor" class="modal fade" role="dialog" tabindex="-1">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar labor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA INICIO (HORA Y FECHA) DE LA LABOR -->

            <div class="form-group bootstrap-timepicker">

              <label>Inicio | Hora</label>

              <div class="input-group col-xs-12">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg col-xs-6" id="nuevoInicio" name="nuevoInicio" placeholder="Ingresar fecha inicio" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>


                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>

                <input type="text" class="form-control input-lg col-xs-6 timepicker" id="nuevoInicioHora" name="nuevoInicioHora" placeholder="Ingresar fecha inicio" value="08:00 AM" required>


              </div>

            </div>

            <!-- ENTRADA PARA EL TITULO -->

            <div class="form-group">

              <label>Título</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-edit"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoTitulo" name="nuevoTitulo" placeholder="Ingresar título *" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCION -->

            <div class="form-group">

              <label>Descripción</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa  fa-sort-amount-desc"></i></span>

                <textarea type="text" class="form-control input-lg" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Ingresar descripción *" rows="3" required></textarea>

              </div>

            </div>

            <!-- ENTRADA PARA EL COLOR DE LA ETIQUETA -->

            <div class="form-group">

              <label>Color Etiqueta</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaEtiqueta" name="nuevaEtiqueta" placeholder="Ingresar color etiqueta *" value="#ff0000" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL COLOR DE LA LETRA -->

            <div class="form-group">

              <label>Color Letra</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-font"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaLetra" name="nuevaLetra" placeholder="Ingresar color letra *" value="#ffffff" required>

              </div>

            </div>

            <!-- ENTRADA PARA FINAL (HORA Y FECHA) DE LA LABOR -->

            <div class="form-group bootstrap-timepicker">

              <label>Final | Hora</label>

              <div class="input-group col-xs-12">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg col-xs-6" id="nuevoFinal" name="nuevoFinal" placeholder="Ingresar fecha inicio" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>


                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>

                <input type="text" class="form-control input-lg col-xs-6 timepicker" id="nuevoFinalHora" name="nuevoFinalHora" placeholder="Ingresar fecha final" value="12:00 PM" required>

              </div>

            </div>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="submit" id="btnAgregarLabor" class="btn btn-primary">Guardar labor</button>

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

      </form>

      <?php

//$crearCliente = new ControladorClientes();
//$crearCliente->ctrCrearCliente();

?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR LABOR
======================================-->

<div id="modalEditarLabor" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar labor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA INICIO (HORA Y FECHA) DE LA LABOR -->

            <div class="form-group bootstrap-timepicker">

              <label>Inicio | Hora</label>

              <div class="input-group col-xs-12">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg col-xs-6" id="editarInicio" name="editarInicio" placeholder="Ingresar fecha inicio" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>


                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>

                <input type="text" class="form-control input-lg col-xs-6 timepicker" id="editarInicioHora" name="editarInicioHora" placeholder="Ingresar fecha inicio" required>

                <input type="hidden" id="id" name="id">


              </div>

            </div>

            <!-- ENTRADA PARA EL TITULO -->

            <div class="form-group">

              <label>Título</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-edit"></i></span>

                <input type="text" class="form-control input-lg" id="editarTitulo" name="editarTitulo" placeholder="Ingresar título *" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCION -->

            <div class="form-group">

              <label>Descripción</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa  fa-sort-amount-desc"></i></span>

                <textarea type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" placeholder="Ingresar descripción *" rows="3" required></textarea>

              </div>

            </div>

            <!-- ENTRADA PARA EL COLOR DE LA ETIQUETA -->

            <div class="form-group">

              <label>Color Etiqueta</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>

                <input type="text" class="form-control input-lg" id="editarEtiqueta" name="editarEtiqueta" placeholder="Ingresar color etiqueta *" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL COLOR DE LA LETRA -->

            <div class="form-group">

              <label>Color Letra</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-font"></i></span>

                <input type="text" class="form-control input-lg" id="editarLetra" name="editarLetra" placeholder="Ingresar color letra *" required>

              </div>

            </div>

            <!-- ENTRADA PARA FINAL (HORA Y FECHA) DE LA LABOR -->

            <div class="form-group bootstrap-timepicker">

              <label>Final | Hora</label>

              <div class="input-group col-xs-12">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg col-xs-6" id="editarFinal" name="editarFinal" placeholder="Ingresar fecha inicio" required>


                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>

                <input type="text" class="form-control input-lg col-xs-6 timepicker" id="editarFinalHora" name="editarFinalHora" placeholder="Ingresar fecha final" required>


              </div>

            </div>




          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" id="btnModificarLabor" class="btn btn-warning">Modificar labor</button>

          <button type="submit" id="btnEliminarLabor" class="btn btn-danger">Borrar labor</button>

        </div>

      </form>

      <?php

//$editarCliente = new ControladorClientes();
//$editarCliente->ctrEditarCliente();

?>



    </div>

  </div>

</div>

<?php

//$eliminarCliente = new ControladorClientes();
//$eliminarCliente->ctrEliminarCliente();

?>