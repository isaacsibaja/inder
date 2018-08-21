<aside class="main-sidebar">

	<section class="sidebar">

		<div class="user-panel">
        <div class="pull-left image">
          <img class="img-circle" <?php

if ($_SESSION["foto"] != "") {

    echo '<img src="' . $_SESSION["foto"] . '" class="user-image">';

} else {

    echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

}

?>>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["nombre"]; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i>En línea</a>
        </div>
      </div>

		<ul class="sidebar-menu">

			<li class="header">MENU PRINCIPAL</li>
			<!--   <li class="active">   -->
			<li>
				<a href="inicio">
					<i class="fa fa-home"></i>
					<span>Inicio</span>
				</a>
			</li>


			<li>
				<a href="usuarios">
					<i class="fa fa-user"></i>
					<span>Usuarios</span>
				</a>
			</li>


			<li>
				<a href="estados">
					<i class="fa fa-th"></i>
					<span>Estados</span>
				</a>
			</li>


			<li>
				<a href="oficios">
					<i class="fa fa-list"></i>
					<span>Oficios</span>
				</a>
			</li>


			<li >
				<a href="clientes">
					<i class="fa fa-users"></i>
					<span>Clientes</span>
				</a>
			</li>

			<li >
				<a href="tramites">
					<i class="fa fa-folder-open"></i>
					<span>Tramites</span>
				</a>
			</li>


			<li>
				<a href="salir">
					<i class="fa fa-times-circle text-aqua"></i>
					<span>Cerrar Sesión</span>
				</a>
			</li>



		</ul>

	</section>

</aside>