<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Tablero
      <small>(Panel de Control)</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Tablero</li>

    </ol>

  </section>

  <section class="content">

    <div class="box with-border">

      <div class="box-body">

        <h3>Labores del Personal OTTO</h3>

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

<div id="modalLabor" class="modal fade" role="dialog" tabindex="-1">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Labor Personal OTTO</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA INICIO (HORA Y FECHA) DE LA LABOR -->

            <div class="form-row">

              <div class="form-group col-lg-6" data-autoclose="true">

                <label>Fecha Inicio</label>

                <input type="hidden" id="id" name="id" required>

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" id="inicioLabor" name="inicioLabor" placeholder="Ingresar fecha inicio" required>

              </div>

              <div class="form-group inicioHoraLabor col-lg-6" data-autoclose="true">

                <label>Hora</label>

                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>

                <input type="text" class="form-control input-lg" value="08:00" id="inicioHoraLabor" name="inicioHoraLabor" required/>

              </div>

            </div>


            <!-- ENTRADA PARA FINAL (HORA Y FECHA) DE LA LABOR -->

            <div class="form-row">

              <div class="form-group col-lg-6" data-autoclose="true">

                <label>Fecha Final</label>

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" id="finalLabor" name="finalLabor" placeholder="Ingresar fecha final" required>

              </div>

              <div class="form-group finalHoraLabor col-lg-6" data-autoclose="true">

                <label>Hora</label>

                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>

                <input type="text" class="form-control input-lg" id="finalHoraLabor" name="finalHoraLabor" value="16:00" required/>

              </div>

            </div>


            <!-- ENTRADA PARA EL TITULO -->

            <div class="form-group">

              <label>Título</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-edit"></i></span>

                <input type="text" class="form-control input-lg" id="tituloLabor" name="tituloLabor" placeholder="Ingresar título labor *" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCION -->

            <div class="form-group">

              <label>Descripción</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa  fa-sort-amount-desc"></i></span>

                <textarea type="text" class="form-control input-lg" id="descripcionLabor" name="descripcionLabor" placeholder="Ingresar descripción labor *" rows="3" required></textarea>

              </div>

            </div>

            <!-- ENTRADA PARA EL COLOR DE LA ETIQUETA -->

            <div class="form-group">

              <label>Color Etiqueta</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>

                <select type="text" class="form-control input-lg" id="etiquetaLabor" name="etiquetaLabor" placeholder="Ingresar color etiqueta *" value="red" required>


                  <option value="">Selecionar un color</option>
                  <option value="red">Rojo</option>
                  <option value="grey">Gris</option>
                  <option value="green">Verde</option>
                  <option value="yellow">Amarillo</option>
                  <option value="Darkorange">Naranja</option>
                  <option value="Darkmagenta">Magenta</option>
                  <option value="Darkcyan">Cyan</option>
                  <option value="Darkgreen">Verde Oscuro</option>
                  <option value="Coral">Coral</option>
                  <option value="navy">Navy</option>
                  <option value="olivedrab">Olivo</option>
                  <option value="violet">Violeta</option>
                  <option value="yellowgreen">Amarillo - Verde</option>
                  <option value="black">Negro</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL COLOR DE LA LETRA -->

            <div class="form-group">

              <label>Color Letra</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-font"></i></span>

                <select type="text" class="form-control input-lg" id="letraLabor" name="letraLabor" placeholder="Ingresar color letra *" value="white" required>

                  <option value="">Selecionar un color</option>
                  <option value="white">Blanco</option>
                  <option value="black">Negro</option>

              </select>

              </div>

            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="submit" id="btnAgregarLabor" class="btn btn-primary">Agregar</button>

          <button type="submit" id="btnModificarLabor" class="btn btn-warning">Modificar</button>

          <?php

if ($_SESSION["perfil"] == "Administrador") {

    echo '<button type="submit" id="btnEliminarLabor" class="btn btn-danger">Borrar</button>';

}
?>

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

      </form>

    </div>

  </div>

</div>