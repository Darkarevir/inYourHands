<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>En tus manos</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	 <link rel="stylesheet" href="css/styles.css">
	 <link rel="stylesheet" href="styles/footer.css">
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	 <style> .he { min-height: 600px; } body{ background: #333; }</style>
</head>
<body>
	<!-- Inicio NavBar -->
	<?php 
	if (isset($_SESSION['usuario'])){
		?>
		<div class="navbar-fixed">
		<nav class="red darken-4 ">
			<div class="nav-wrapper ">
				<a href="index.php" class="brand-logo">En tus manos </a>
				<a href="" data-target="menu-responsive" class="sidenav-trigger">
					<i class="material-icons">menu</i>
				</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="index.php"><i class="material-icons left">home</i>Inicio</a></li>
					</li>
					<li><a href="#"><i class="material-icons left">forum</i>Foros</a></li>
					<li><a href="#"><i class="material-icons left">transform</i>Intercambios</a></li>
					<li><a href="#"><i class="material-icons left">favorite</i>Donaciones</a></li>
					<li><a href="#"><i class="material-icons left">supervisor_account</i>Asesorias</a></li>
					<li><a href="perfil.php"><i class="material-icons left">account_circle</i><?php echo $_SESSION['perfil']; ?></a>
					<li>
						<a href="#" class="dropdown-trigger" data-target="id_drop">
							 
							<i class="material-icons right">menu</i>
						</a>
					</li>
				</ul>
				<ul id="id_drop" class="dropdown-content">
					<li><a href="config-perfil.php"><i class="material-icons ">settings</i>Configuración</a></li>
					<li><a href="faqs.php"><i class="material-icons">question_answer</i>FAQs</a></li>
					<li><a href="cerrar.php"><i class="material-icons">exit_to_app</i>Salir</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<ul class="sidenav" id="menu-responsive">
			<li><a href="index.php"><i class="material-icons">home</i>Inicio</a></li>
			<li><a href="perfil.php"><i class="material-icons">account_circle</i><?php echo $_SESSION['perfil']; ?></a></li>
			<li><a href="#"><i class="material-icons">forum</i>Foros</a></li>
			<li><a href="#"><i class="material-icons left">transform</i>Intercambios</a></li>
			<li><a href="#"><i class="material-icons left">favorite</i>Donaciones</a></li>
			<li><a href="#"><i class="material-icons left">supervisor_account</i>Asesorias</a></li>
			<li class="divider"></li>
			<li><a href="config-perfil.php"><i class="material-icons">settings</i>Configuración </a></li>
			<li><a href="faqs.php"><i class="material-icons">question_answer</i>FAQs</a></li>
			<li><a href="cerrar.php"><i class="material-icons">exit_to_app</i>Salir</a></li>
	</ul>
		<?php 	
	} else {
		?>
		<div class="navbar-fixed">
			<nav class="red darken-4">
				<div class="nav-wrapper">
					<a href="" class="brand-logo">En tus manos</a>
					<a href="" data-target="menu-responsive" class="sidenav-trigger">
						<i class="material-icons">menu</i>
					</a>
					<ul class="right hide-on-med-and-down">
						<li><a href="index.php"><i class="material-icons left">home</i>Inicio</a></li>
						</li>
						<li><a href="#"><i class="material-icons left">forum</i>Foros</a></li>
						<li><a href="login.php">Inicia sesión</a></li>
						<li class="red accent-4"><a href="registro.php">Registrate</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<ul class="sidenav" id="menu-responsive">
				<li><a href="index.php"><i class="material-icons left">home</i>Inicio</a></li>
				</li>
				<li><a href="#"><i class="material-icons left">forum</i>Foros</a></li>
				<div class="divider"></div>
				<li><a href="registro.php">Registrate</a></li>
				<li><a href="login.php">Inicia sesión</a></li>
		</ul>
		<?php 
	}
	?>
  <!-- Final NavBar -->
  <!--  -->
  <!-- Inicio de columnas -->

<div class="parallax-container">    
    <div class="parallax animated zoomIn slower">
      <img src="img/2.jpg">
    </div>
  </div>

<div class="cyan darken-1 white-text center">
    <div class="container">
      <div class="section">
        <h3 class="animated slideInDown slow">El embarazo no se anticipa ni se confirma.</h3>
        <p class="animated slideInDown slow">La realidad es que casi la mitad de todos los embarazos son involuntarios o, más específicamente, el 45-49% del tiempo no son planeados, dijo la doctora Jen Villavicencio, una ginecoobstetra que da conferencias en la Universidad de Medicina de Michigan y también es miembro del Colegio Americano de Obstetras y Ginecólogos. Aquellas que intentan quedar embarazadas pueden estar monitoreando cada aspecto de sus ciclos y tener preparadas las pruebas de embarazo, pero para muchas mujeres quedar embarazadas es una sorpresa.</p>


        <div class="video-container">
       <iframe width="853" height="480" src="https://www.youtube.com/embed/SGKX8ERxzjA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      </div>
    </div>
  </div>

  <footer class="page-footer red darken-4">
		<div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">En tus manos</h5>
              </div>
            </div>
         </div>
      <div class="footer-copyright center">
        <div class="container">
        © 2019 4Flow
        </div>
      </div>
    </footer>

 <!-- scripts -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 <script>
 	document.addEventListener('DOMContentLoaded',function(){
 		M.AutoInit();
 	});
 </script>
  <script>
 	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(elems);
  });
 </script>
</body>
</html>