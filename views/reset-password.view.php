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
						<h4 class="registro">Nueva contraseña <i class="material-icons">lock</i> </h4>
						<div class="input-field col s12">
							<input type="password" name="password" id="password" class="validate" required value="">
							<label for="password">Nueva Contraseña</label>
						</div>
						<div class="input-field col s12">
							<input type="password" name="password2" id="password2" class="validate" required value="">
							<label for="password2">Repetir Contraseña</label>
						</div>
						<?php if(!empty($errores)): ?>
						<div class="col s12 alert error">
							<?php echo $errores; ?>
						</div>
						<?php endif ?>
						<input type="submit" name="submit" class="btn col" value="Cambiar contraseña">	
					</div>
 				</form>
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