<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar instituto
      <small>(Solo ingresar los datos de un instituto).</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar instituto</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <?php
if ($_SESSION["perfil"] == "Administrador") {

    echo '<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarInstituto">

          Agregar instituto

        </button>';

}?>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Logo</th>
           <th>Nombre</th>
           <th>Dirección</th>
           <th>Oficina</th>
           <th>Teléfono</th>
           <th>Fax</th>
           <th>Email</th>
           <th>Pie de página</th>
           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>

        <?php

$item  = null;
$valor = null;

$instituto = ControladorInstituto::ctrMostrarInstituto($item, $valor);

foreach ($instituto as $key => $value) {

    echo ' <tr>
                  <td>' . ($key + 1) . '</td>';
    if ($value["logo"] != "") {

        echo '<td><img src="' . $value["logo"] . '" class="img-thumbnail" width="100px"></td>';

    } else {

        echo '<td><img src="vistas/img/instituto/default.png" class="img-thumbnail" width="100px"></td>';

    }
    echo '<td>' . $value["nombre"] . '</td>
                  <td>' . $value["direccion"] . '</td>
                  <td>' . $value["oficina"] . '</td>
                  <td>' . $value["telefono"] . '</td>
                  <td>' . $value["fax"] . '</td>
                  <td>' . $value["email"] . '</td>
                  <td>' . $value["pie"] . '</td>

                  <td>
                    <div class="btn-group">';

    if ($_SESSION["perfil"] == "Administrador") {

        echo '<button class="btn btn-warning btnEditarInstituto" idInstituto="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarInstituto"><i class="fa fa-pencil"></i></button>';

    } else {
        echo '<a style="color:red" align="center">No tiene permiso</a>';
    }

    echo '</tr>';
}

?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR INSTITUTO
======================================-->

<div id="modalAgregarInstituto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" onsubmit="return registroInstituto()">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar instituto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL INSTUTITO -->

            <div class="form-group">

              <label>Nombre Instituto</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-institution"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoNombre" name="nuevoNombre" placeholder="Ingresar nombre del Instituto" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCION REGIONAL -->

             <div class="form-group">

              <label>Dirección Regional</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaDireccion" name="nuevaDireccion" placeholder="Ingresar dirección regional" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA OFICINA REGIONAL -->

             <div class="form-group">

              <label>Oficina Regional</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaOficina" name="nuevaOficina" placeholder="Ingresar oficina regional" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">

              <label>Teléfono</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa  fa-phone"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoTelefono" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask='"mask": "9999-9999"' data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL FAX -->

            <div class="form-group">

              <label>Fax</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-fax"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoFax" name="nuevoFax" placeholder="Ingresar fax" data-inputmask='"mask": "9999-9999"' data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <label>Email</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoEmail" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL PIE DE PAGINA -->

            <div class="form-group">

              <label>Pie de página</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-edit"></i></span>

                <textarea type="text" class="form-control input-lg" id="nuevoPie" name="nuevoPie" placeholder="Ingresar pie de página para los trámites." required rows="2"></textarea>

              </div>

              <small>Pie de página debe ir sin comillas.</small>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/instituto/default.png" class="img-thumbnail previsualizar" width="100px">

              <h5>Tamaño recomendado para el logo 250px - 150px.</h5>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar instituto</button>

        </div>

        <?php

$crearInstituto = new ControladorInstituto();
$crearInstituto->ctrCrearInstituto();

?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR INSTITUTO
======================================-->

<div id="modalEditarInstituto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" onsubmit="return modificarInstituto()">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar instituto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL INSTUTITO -->

            <div class="form-group">

              <label>Nombre Instituto</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-institution"></i></span>

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" placeholder="Editar nombre del Instituto" required>

                <input type="hidden" id="idInstituto" name="idInstituto">

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCION REGIONAL -->

             <div class="form-group">

              <label>Dirección Regional</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>

                <input type="text" class="form-control input-lg" name="editarDireccion" placeholder="Editar dirección regional" id="editarDireccion" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA OFICINA REGIONAL -->

             <div class="form-group">

              <label>Oficina Regional</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>

                <input type="text" class="form-control input-lg" id="editarOficina" name="editarOficina" placeholder="Editar oficina regional" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">

              <label>Teléfono</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa  fa-phone"></i></span>

                <input type="text" class="form-control input-lg" id="editarTelefono" name="editarTelefono" placeholder="Editar teléfono" data-inputmask='"mask": "9999-9999"' data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL FAX -->

            <div class="form-group">

              <label>Fax</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-fax"></i></span>

                <input type="text" class="form-control input-lg" id="editarFax" name="editarFax" placeholder="Editar fax" data-inputmask='"mask": "9999-9999"' data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <label>Email</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="text" class="form-control input-lg" id="editarEmail" name="editarEmail" placeholder="Editar email" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL PIE DE PAGINA -->

            <div class="form-group">

              <label>Pie de página</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-edit"></i></span>

                <textarea type="text" class="form-control input-lg" id="editarPie" name="editarPie" placeholder="Editar pie de página para los trámites." required rows="2"></textarea>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/instituto/default.png" class="img-thumbnail previsualizarEditar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar instituto</button>

        </div>

     <?php

$editarInstituto = new ControladorInstituto();
$editarInstituto->ctrEditarInstituto();

?>

      </form>

    </div>

  </div>

</div>