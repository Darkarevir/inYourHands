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
	 <style> body{background: #e8eaf6;} .he { min-height: 600px; } .dropdown-content {min-width: 200px;}</style>
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
		require 'extras/menu-nu.php';
	}
	?>
  <!-- Final NavBar -->
  <!--  -->
  <!-- Inicio de columnas -->

<div class=" white-text flow-text">
	<div class="container">
	<div class="section">
		<h3 class="black-text">FAQ's</h3>

		<ul class="collapsible popout">
	    	<li>
	      	<div class="collapsible-header black-text"><i class="material-icons">keyboard_arrow_down</i>¿Qué es En tus Manos?</div>
	      	<div class="collapsible-body black-text"><span>En tus manos es un sitio de ayuda mutua a padres, madres primerizos los cuales ayudaran a mejorar las condiciones con sus hijos, participando mediante foros conseguirás hablar tanto con personas experimentadas sobre algún tema en específico..</span></div>
	    	</li>
	   		<li>
	      	<div class="collapsible-header black-text"><i class="material-icons">keyboard_arrow_down</i>¿Qué necesito para poder registrarme en el sitio web?</div>
	      	<div class="collapsible-body black-text"><span>Sola mente necesitas llenar el formulario con tus datos personales, un nombre de usuario, una contraseña y una dirección de correo electrónico.</span></div>
	    	</li>
	    	<li>
	      	<div class="collapsible-header black-text"><i class="material-icons">keyboard_arrow_down</i>¿Cómo puedo ingresar al sitio web?</div>
	      	<div class="collapsible-body black-text"><span>Ingresando desde tu navegador al sitio <a href="index.php">www.entusmanos.com</a> ingresando tu usuario.</span></div>
	    	</li>
	    	<li>
	      	<div class="collapsible-header black-text"><i class="material-icons">keyboard_arrow_down</i>¿Por qué no puedo ingresar al sitio después de haberme registrado?</div>
	      	<div class="collapsible-body black-text"><span>El nombre de usuario o  la contraseña son incorrectos. Si haz olvidado tu contraseña solicita la recuperación de cuentas clicando aquí <a href="reset-password.php">recuperar contraseña.</a></span></div>
	    	</li>
	    	<li>
	      	<div class="collapsible-header black-text"><i class="material-icons">keyboard_arrow_down</i>¿Puedo acceder al sitio desde un dispositivo móvil (celular, Tablet, etc.)?</div>
	      	<div class="collapsible-body black-text"><span>Sí, siempre y cuando tengas un Teléfono Inteligente (Smartphone) con conexión a internet vía wifi o plan de datos desde tu navegador de preferencia.</span></div>
	    	</li>
	    	<li>
	      	<div class="collapsible-header black-text"><i class="material-icons">keyboard_arrow_down</i>¿Qué beneficios me traerá estar unido al sitio web En tus Manos?</div>
	      	<div class="collapsible-body black-text"><span><p>Amplitud al conocimiento sobre temas como padres primerizos.</p>
		<p>Revisión de materiales informativos en los foros sobre un tema en especifico.</p>
		<p>Informarse sobre donaciones de intercambios de artículo de interés con otras personas.</p></span></div>
	    	</li>
	    	</li>
	    	<li>
	      	<div class="collapsible-header black-text"><i class="material-icons">keyboard_arrow_down</i>¿Cómo puedo cambiar mis datos en mi perfil?</div>
	      	<div class="collapsible-body black-text"><span>Yendo al icono de perfil seleccionando configuración de perfil editar información y haciendo los cambios en los cambios respectivos que desees modificar.</span></div>
	    	</li>
	    	<li>
	      	<div class="collapsible-header black-text"><i class="material-icons">keyboard_arrow_down</i>¿Cómo puedo cambiar mi contraseña?</div>
	      	<div class="collapsible-body black-text"><span>Puedes solicitar un cambio de contraseña desde tu configuración de perfil de usuario dando al icono de configuración de perfil.
		A configuración de usuario solicitar cambio de contraseña..</span></div>
	    	</li>
	    	<li>
	      	<div class="collapsible-header black-text"><i class="material-icons">keyboard_arrow_down</i>¿El registro es gratuito?</div>
	      	<div class="collapsible-body black-text"><span>Si</span></div>
	    	</li>
	  </ul>
	</div>
</div>
</div>

<?php require 'extras/footer.php'; ?>

 <!-- scripts -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 <script>
 	document.addEventListener('DOMContentLoaded',function(){
 		M.AutoInit();
 	});
 </script>
</body>
</html>