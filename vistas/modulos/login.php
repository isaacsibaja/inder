<!--<div id="back"></div>-->

<div class="login-box">

  <div class="login-logo">

    <a href="inicio"><img src="vistas/img/plantilla/iniciarsesion.png" class="img-responsive" style="padding: 0px 100px 15px 100px"></a>

  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <p class="login-box-msg">Iniciar Sesión para ingresar al sistema.</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>

        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>

      <div class="row">

        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-sx">Ingresar</button>
        </div>


      </div>

      <?php
$login = new ControladorUsuarios();
$login->ctrIngresoUsuario();
?>

    </form>

</div>


<div class="row">
  <center><img src="vistas/img/plantilla/somosgenteinder.png" class="img-responsive" style="padding: 50px 0px 0px 0px"></center>
</div>
