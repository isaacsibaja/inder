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

?>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["nombre"]; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i>En línea</a>
        </div>
      </div>

		<ul class="sidebar-menu">

			<li class="header">MENU PRINCIPAL</li>

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


			<li >
				<a href="clientes">
					<i class="fa fa-users"></i>
					<span>Clientes</span>
				</a>
			</li>



			<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>

					<span>Oficios</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>
						<a href="oficios">
							<i class="fa fa-list"></i>
							Administrar Oficios
						</a>
					</li>

					<li>
						<a href="seguimiento">
							<i class="fa fa-share"></i>
							Seguimiento Oficios
						</a>

					</li>

				</ul>

			</li>


			<li class="treeview">

				<a href="#">

					<i class="fa fa-folder-open"></i>

					<span>Trámites</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li >
						<a href="tramites">
							<i class="fa fa-folder-open"></i>
							<span>Administrar Trámites</span>
						</a>
					</li>

					<li>
						<a href="tipotramite">
							<i class="fa fa-file-text-o"></i>
							<span>Tipo Trámites</span>
						</a>

					</li>

				</ul>

			</li>



			<li class="header">CONFIGURACIÓN</li>

			<li>
				<a href="instituto">
					<i class="fa fa-cog"></i>
					<span>Instituto</span>
				</a>
			</li>

	</section>

</aside>