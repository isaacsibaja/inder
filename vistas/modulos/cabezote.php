<header class="main-header">

  <!--=====================================
  =            LOGOTIPO            =
  ======================================-->

    <a href="inicio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">

        <img src="vistas/img/plantilla/icono-blanco.png" class="img-responsive" style="padding: 10px">

      </span>

      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">

        <img src="vistas/img/plantilla/logo-blanco-lineal.png" class="img-responsive" style="padding: 10px 0px">

      </span>
    </a>

  <!--=====================================
  =            BARRA DE NAVEGACION            =
  ======================================-->

  <nav class="navbar navbar-static-top">
      <!--Sidebar toggle button (boton de navegacion)-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

       <span class="sr-only">Toggle navigation</span>
      </a>

        <!--=====================================
  =            PERFIL DE USUARIO            =
  ======================================-->

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

        <!--====================================
        =            Notificaciones            =
        =====================================-->

        <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>


        <!--====  End of Notificaciones  ====-->



          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">


              <?php

if ($_SESSION["foto"] != "") {

    echo '<img src="' . $_SESSION["foto"] . '" class="user-image">';

} else {

    echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

}

?>

              <span class="hidden-xs">Bienvenido (a): <?php echo $_SESSION["nombre"]; ?></span>

            </a>

            <ul class="dropdown-menu">


              <li class="user-header">
                <img class="img-circle" alt="User Image" <?php

if ($_SESSION["foto"] != "") {

    echo '<img src="' . $_SESSION["foto"] . '" class="user-image">';

} else {

    echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

}

?>

                <p>
                  <?php echo $_SESSION["nombre"]; ?>

                  <small><?php echo $_SESSION["perfil"]; ?></small>

                </p>

              </li>


              <li class="user-body">

                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Mi Perfil</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Botón</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Botón</a>
                  </div>
                </div>

              </li>


              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Botón</a>
                </div>
                <div class="pull-right">
                   <a href="salir" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>


            </ul>

          </li>
        </ul>

      </div>




    </nav>


</header>