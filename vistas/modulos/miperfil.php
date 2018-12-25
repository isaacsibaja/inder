<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Perfil
        <small>(Administrar mi perfil)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Perfil</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-body">

          <div class="row">

          <div class="col-lg-2"></div>

          <div class="col-lg-8">

            <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <h2>Editar Mi Perfil</h2></br>

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <label>Editar Nombre</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="<?php echo $_SESSION['nombre']; ?>" placeholder="Editar nombre completo" required>

                <input type="hidden" value="<?php echo $_SESSION['id']; ?>" id="idUsuario" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">

              <label>Nombre Usuario</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="<?php echo $_SESSION['usuario']; ?>" placeholder="Editar nombre usuario" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA ESTADO -->

             <div class="form-group">

              <label>ESTADO</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text"  class="form-control input-lg" name="estadoPerfil" value="Activado" readonly>

                <input type="hidden" class="form-control input-lg" id="editarEstado" name="editarEstado" value="<?php echo $_SESSION['estado']; ?>" placeholder="Editar estado" readonly>

                <input type="hidden" class="form-control input-lg" id="editarPerfil" name="editarPerfil" value="<?php echo $_SESSION['perfil']; ?>" placeholder="Editar estado" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">

              <label>Contraseña</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="submit" class="btn btn-primary" id="editarPerfil">Modificar usuario</button>

        </div>

     <?php

$editarUsuario = new ControladorUsuarios();
$editarUsuario->ctrEditarUsuario();

?>

      </form>
          </div>

          <div class="col-lg-2"></div>


        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>