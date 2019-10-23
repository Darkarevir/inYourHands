<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Recuperar contraseña</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="wrap">	
		<div class="container section">
			<div class="row container section">
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
					<div class="row card-panel">
						<h4 class="registro"><a href="index.php"><i class="material-icons small">keyboard_arrow_left</i></a> Recuperar contraseña <i class="material-icons">lock</i> </h4>
						<p>Un correo electrónico será enviado a usted con las instrucciones necesarias para cambiar tu contraseña</p>
						<div class="input-field col s12">
							<input type="email" name="correo" id="correo" class="validate" required value="<?php if(!$enviado && isset($correo)) echo $correo ?>">
							<label for="correo">Correo electronico<i class="material-icons left">email</i></label>
						</div>
						<?php if(!empty($errores)): ?>
						<div class="col s12 alert error">
							<?php echo $errores; ?>
						</div>
						<?php elseif ($enviado): ?>
							<div class="col s12 alert success">
								<?php echo "Correo de recuperación enviado con éxito! </br> Revisa tu correo electronico"; ?>
							</div>
						<?php endif ?>
						<input type="submit" name="submit" class="btn col" value="Enviar">	
					</div>
 				</form>
 				<div class="c-login">
		 			<p>¿Aun no tienes una cuenta? <a href="registro.php">Registrate</a></p>
		 		</div>
			</div>
		</div>
	
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			M.AutoInit();
		 });
	</script>
</body>
</html>