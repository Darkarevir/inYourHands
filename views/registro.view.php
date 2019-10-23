<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
</head>
<body>
	
	<div class="wrap">
		<h1 class="registro">Registrate</h1>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php if(!$enviado && isset($nombre)) echo $nombre ?>">
			<input type="text" class="form-control" id="apellido"	name="apellido" placeholder="Apellido" value="<?php if(!$enviado && isset($apellido)) echo $apellido ?>">
			<input type="text" class="form-control" id="correo"	name="correo" placeholder="Correo electronico" value="<?php if(!$enviado && isset($correo)) echo $correo ?>">
			<input type="password" class="form-control" id="password"	name="password" placeholder="Contraseña" value="">
			<input type="password" class="form-control" id="password2"	name="password2" placeholder="Repetir contraseña" value="">
			<div class="box">
				<select name="genero" id="genero" >
					<option value="otro">Otro</option>
					<option value="masculino">Masculino</option>
					<option value="femenino">Femenino</option>
				</select>
			</div>
			
			
			<?php if(!empty($errores)): ?>
				<div class="alert error">
					<?php echo $errores; ?>
				</div>
			<?php elseif ($enviado): ?>
				<div class="alert success">
					<?php echo "Registrado correctamente"; ?>
				</div>
			<?php endif ?>
			<input type="submit" name="submit" class="btn btn-primary" value="Registrar">


 		</form>
 		<div class="c-login">
 			<p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
 		</div>
 		
	</div>
</body>
</html>