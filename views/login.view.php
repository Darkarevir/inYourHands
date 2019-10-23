<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Iniciar sesión</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<style>
		body,html{margin: 0; padding: 0; height: 100%;}
		.head { margin-top: 5% }
		form {margin-top: 6%}
		.main {background-image: url("img/reg/4.jpg");background-size: cover;}
		.main, .second{ height: 100vh;}	
	</style>
</head>
<script type="text/javascript">
	function Ocultar(){
		document.getElementById("alerta").style.display="none";
	}
</script>
<body>

	<div class="main row">
		<div class="second row col s12 m6 white">
			
			<div class="head row col s12 section">
				<h3 class="registro col m9"><a href="index.php"><i class="material-icons small">keyboard_arrow_left</i></a>Iniciar sesión</h3>
				<div class="col s5 m3 hide-on-med-and-down">
				<a href="index.php"><img src="img/log.png" class="responsive-img" alt=""></a>
				</div>
			</div> 	
		
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="col s12 m10 offset-m1">
				<?php if(!empty($errores)): ?>
						<div id="alerta" class="alert error">
							<?php echo $errores; ?>
						</div>
					<?php elseif ($enviado===0): ?>
						<div id="alerta" class="alert success">
							<?php echo "Usuario registrado correctamente, ¡Inicia sesión!"; ?>
						</div>
					<?php elseif ($enviado==1): ?>
						<div id="alerta" class=" alert success">
							<?php echo "Contraseña actualizada correctamente, ¡Inicia sesión!"; ?>
						</div>
					<?php endif ?>
				<div class="row">
					<div class="input-field col s12">
						<input type="email" name="correo" id="correo" class="validate" onclick="Ocultar()" required value="">
						<label for="correo"><i class="material-icons left">account_circle</i>Correo electronico</label>
					</div>
					<div class="input-field col s12">
						<input type="password" name="password" id="password" class="validate" onclick="Ocultar()" required value="">
						<label for="password"><i class="material-icons left">lock</i>Contraseña</label>
						<a href="recuperar.php">¿Olvidaste tu contraseña?</a>
					</div>
				</div>
				<input type="submit" name="submit" class="btn btn-primary green" value="Iniciar sesión">
	 		</form>

		</div>
	
	</div>
	

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 <script>
 	document.addEventListener('DOMContentLoaded',function(){
 		M.AutoInit();
 	});
 </script>
</body>
</html>