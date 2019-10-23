
<div class="navbar-fixed">
		<nav class="red darken-4">
			<div class="nav-wrapper ">
				<a href="index.php">
					<img src="img/entusmanosl.png" height="58" width="100" >
				</a>
				
				<a href="" data-target="menu-responsive" class="sidenav-trigger">
					<i class="material-icons">menu</i>
				</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="index.php"><i class="material-icons left">home</i>Inicio</a></li>
					</li>
					<li><a href="foros.php"><i class="material-icons left">forum</i>Foros</a></li>
					<li><a href="intercambios.php"><i class="material-icons left">transform</i>Intercambios</a></li>
					<li><a href="donaciones.php"><i class="material-icons left">favorite</i>Donaciones</a></li>
					<li><a href="#"><i class="material-icons left">supervisor_account</i>Asesorias</a></li>
					<li><a href="categespecialidades.php"><i class="material-icons left">format_list_bulleted</i>Especialidades</a></li>


					<?php
					if ($_SESSION['tipo']=='AD' || $_SESSION['tipo']=='CC') {
						echo "<li><a href='cpanel.php'><i class='material-icons left'>settings</i>Administrar</a></li>";
					} ?>

					<?php
					if ($_SESSION['tipo']=='ESP') {
						echo "<li><a href='perfilpro.php'><i class='material-icons left'>card_travel</i>Perfil Profesional</a></li>";
					} ?>

					<li>
						<a href="#" class="dropdown-trigger" data-target="id_drop">
							 
							<i class="material-icons left">
							<img class="circle" src='photos/<?php echo $_SESSION['photo']; ?>' height="25" width="25" >
							</i><?php echo $_SESSION['perfil']; ?>
						</a>
					</li>
				</ul>
				<ul id="id_drop" class="dropdown-content">
          <li><a href="perfil.php"><i class="material-icons"><img class="circle" src='photos/<?php echo $_SESSION['photo']; ?>' height="25" width="25" ></i>Perfil</a></li>
					<li><a href="config-perfil.php"><i class="material-icons ">settings</i>Configuración</a></li>
					<li><a href="faqs.php"><i class="material-icons">question_answer</i>FAQs</a></li>
					<li><a href="cerrar.php"><i class="material-icons">exit_to_app</i>Salir</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<ul class="sidenav" id="menu-responsive">
			<li><a href="index.php"><i class="material-icons">home</i>Inicio</a></li>
			<li><a href="perfil.php"><i class="material-icons"><img class="circle" src='photos/<?php echo $_SESSION['photo']; ?>' height="25" width="25" ></i><?php echo $_SESSION['perfil']; ?></a></li>
			<li><a href="foros.php"><i class="material-icons">forum</i>Foros</a></li>
			<li><a href="intercambios.php"><i class="material-icons left">transform</i>Intercambios</a></li>
			<li><a href="#"><i class="material-icons left">favorite</i>Donaciones</a></li>
			<li><a href="#"><i class="material-icons left">supervisor_account</i>Asesorias</a></li>
			<li class="divider"></li>
			<li><a href="config-perfil.php"><i class="material-icons">settings</i>Configuración </a></li>
			<li><a href="faqs.php"><i class="material-icons">question_answer</i>FAQs</a></li>
			<li><a href="cerrar.php"><i class="material-icons">exit_to_app</i>Salir</a></li>
	</ul>