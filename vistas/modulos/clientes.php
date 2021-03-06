<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar clientes
      <small>(Todos los clientes o solicitantes)</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar clientes</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">

          Agregar cliente

        </button>

        <div class="box-tool pull-right">

          <?php

echo '<a href="vistas/modulos/descargar-reporte-clientes.php?Reporte=Reporte">
            <button class="btn btn-success">Descargar reporte de clientes</button>
          </a>';
?>

        </div>

      </div>



      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Cédula</th>
           <th>Email</th>
           <th>Teléfono</th>
           <th>Teléfono</th>
           <th>Dirección</th>
           <th>Nacimiento</th>
           <th>Observación</th>
           <th>Fecha</th>
           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>

        <?php

$item  = null;
$valor = null;

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

foreach ($clientes as $key => $value) {

    echo '<tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["nombre"] . '</td>

                    <td>' . $value["documento"] . '</td>

                    <td>' . $value["email"] . '</td>

                    <td>' . $value["telefono"] . '</td>

                    <td>' . $value["telefono2"] . '</td>

                    <td>' . $value["direccion"] . '</td>

                    <td>' . $value["fecha_nacimiento"] . '</td>

                    <td>' . $value["observacion"] . '</td>

                    <td>' . $value["fecha"] . '</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>';

    if ($_SESSION["perfil"] == "Administrador") {

        echo '<button class="btn btn-danger btnEliminarCliente" idCliente="' . $value["id"] . '"><i class="fa fa-times"></i></button>';

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

              <label>Cédula o Pasaporte </label>

              <small>(Puede usar guiones).</small>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" min="0" class="form-control input-lg" id="nuevoDocumentoId" name="nuevoDocumentoId" placeholder="Ingresar cédula o pasaporte *" required>

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

              <label>Número Telefónico Fijo</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoTelefono" name="nuevoTelefono" placeholder="Ingresar teléfono fijo" data-inputmask="'mask':'9999-9999'" data-mask>

              </div>

            </div>


            <!-- ENTRADA PARA EL TELÉFONO MOVIL -->

            <div class="form-group">

              <label>Número Telefónico Móvil</label>

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

              <small style="font-weight: bold;"> (año-mes-día).</small>

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

                <textarea type="text" class="form-control input-lg" id="nuevaObservacion" name="nuevaObservacion" placeholder="Ingresar observación" rows="3"></textarea>

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

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" onsubmit="return modificarCliente()">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cliente</h4>

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

                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" placeholder="Editar Cliente" required>
                <input type="hidden" id="idCliente" name="idCliente">
              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->

            <div class="form-group">

              <label>Cédula o Pasaporte</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" placeholder="Editar pasaporte o cédula" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <label>Correo Electrónico</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" placeholder="Editar Email">

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO FIJO-->

            <div class="form-group">

              <label>Número Telefónico</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'9999-9999'" data-mask placeholder="Editar Teléfono Fijo">

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO MOVIL-->

            <div class="form-group">

              <label>Número Telefónico</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>

                <input type="text" class="form-control input-lg" name="editarTelefono2" id="editarTelefono2" data-inputmask="'mask':'9999-9999'" data-mask placeholder="Editar Teléfono Móvil">

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <label>Dirección</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion"  placeholder="Editar Dirección" required>

              </div>

            </div>

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

            <div class="form-group">

              <label>Fecha Nacimiento</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask placeholder="Editar Fecha Nacimiento">

              </div>

            </div>

            <!-- ENTRADA PARA OBSERVACION -->

            <div class="form-group">

              <label>Observaciones</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plus-square-o"></i></span>

                <textarea type="text" class="form-control input-lg" name="editarObservacion" id="editarObservacion" placeholder="Editar Observación" rows="3"></textarea>

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

$editarCliente = new ControladorClientes();
$editarCliente->ctrEditarCliente();

?>



    </div>

  </div>

</div>

<?php

$eliminarCliente = new ControladorClientes();
$eliminarCliente->ctrEliminarCliente();

?>