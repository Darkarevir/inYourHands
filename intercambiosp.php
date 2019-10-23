<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>En tus manos</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	 <!-- <link rel="stylesheet" href="styles/styles.css"> -->
	 <link rel="stylesheet" href="styles/footer.css">
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	 <style> .he { min-height: 600px; } .dropdown-content {min-width: 200px;}</style>
</head>
<body>
	<!-- Inicio NavBar -->
	<?php 
	if (isset($_SESSION['usuario'])){
		?>
		<?php 
    	require 'extras/menu.php';
   		?>

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
						<li><a href="faqs.php"><i class="material-icons left">question_answer</i>FAQs</a></li>
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
<div class="container">
	<div class="section">
		<h3 class="flow-text">Cambio cuna por cualquier cosa.</h3>
		<img class="materialboxed" width="400" src="img/intercambio.jpg">
		<span> Cambio cuna en buen estado.</span>

		<div class="divider"></div>


		 <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="img/log.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              <span class="black-text">
                Publicado por "Tus manos."
              </span>
              <p>Enviar solicitud de intercambio.</p>
              <textarea name="" id="" cols="30" rows="10"></textarea>
              <a href="" class="btn">Enviar mensaje.</a>
            </div>
          </div>
        </div>
      </div>

	</div>
</div>



  <!-- Inicio de columnas -->



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
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
  });
 </script>
</body>
</html>