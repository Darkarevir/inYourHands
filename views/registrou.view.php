<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<style>
		.pp{ height: 100%; background-image: url("img/reg/2.jpg");background-size: cover;}	
	</style>
</head>
<script type="text/javascript">
	function Ocultar(){
		document.getElementById("alerta").style.display="none";
	}
</script>
<body >
		<div class="row pp">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="col s12 m6 white">
				<div class="row section">
					<h3 class="col s12 m9"><a href="index.php"><i class="material-icons small">keyboard_arrow_left</i></a> Registrate</h3>
					<div class="col s5 m3 hide-on-med-and-down">
						<a href="index.php"><img src="img/log.png" class="responsive-img" alt=""></a>
					</div>
					<div class="col s8 offset-s2 container section">
					<?php if(!empty($errores)): ?>
						<div id="alerta" class="col s12 alert error">
							<?php echo $errores; ?>
						</div>
					<?php elseif ($enviado): ?>
						<div class="col s12 alert success">
							<?php echo "Registrado correctamente"; ?>
						</div>
					<?php endif ?>
					<div class="input-field col s12">
						<input type="text" name="nombre" id="nombre" class="validate" onclick="Ocultar()" required value="<?php if(!$enviado && isset($nombre)) echo $nombre ?>">
						<label for="nombre">Nombre</label>
					</div>
					<div class="input-field col s12">
						<input type="text" name="apellido" id="apellido" class="validate" onclick="Ocultar()" required value="<?php if(!$enviado && isset($apellido)) echo $apellido ?>">
						<label for="apellido">Apellido</label>
					</div>
					<div class="input-field col s12">
						<input type="email" name="correo" id="correo" class="validate" onclick="Ocultar()" required value="<?php if(!$enviado && isset($correo)) echo $correo ?>">
						<label for="correo">Correo electronico</label>
					</div>
					<div class="input-field col s12">
						<input type="password" name="password" id="password" class="validate" onclick="Ocultar()" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe tener mínimo 8 caracteres, incluida 1 letra mayúscula, 1 letra minúscula y caracteres numéricos">
						<label for="password">Contraseña</label>
					</div>
					<div class="input-field col s12">
						<input type="password" name="password2" id="password2" class="validate" onclick="Ocultar()" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe tener mínimo 8 caracteres, incluida 1 letra mayúscula, 1 letra minúscula y caracteres numéricos">
						<label for="password2">Repetir contraseña</label>
					</div>
					<div class="input-field col s12">
					    <select name="genero">
					      <option value="" disabled selected>Selecciona uno</option>
					      <option value="Femenino">Femenino</option>
					      <option value="Masculino">Masculino</option>
					      <option value="Otro">Otro</option>
					    </select>
					    <label>Genero</label>
					</div>
					<div class="input-field col s12">
						<input type="text" name="ubicacion" id="ubicacion" class="validate autocomplete" onclick="Ocultar()" required value="<?php if(!$enviado && isset($ubicacion)) echo $ubicacion ?>">
						<label for="ubicacion">Ubicación</label>
					</div>


					
					<input type="submit" name="submit" class="btn col green" value="Registrar">	
					<div class="col s12">
		 			<p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
		 			</div>
					</div> 
					
				</div>
				
			</form>
		</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 <script>
 	document.addEventListener('DOMContentLoaded',function(){
 		M.AutoInit();
 	});
 </script>
	<script>

		  document.addEventListener('DOMContentLoaded', function() {
		  	var options ={
		  		data: {
		  			<?php 
		  				while ($row=$stmt->fetch()) {
		  					$ub = $row[0] .", ".$row[1] .", ". $row[2];
		  					?>
		  						"<?php echo utf8_encode($ub) ?>":null,
		  					<?php
		  				}
		  			 ?>	
		  		}
		  	}

		    var elems = document.querySelectorAll('.autocomplete');
		    var instances = M.Autocomplete.init(elems, options);
		  });
	</script>

</body>
</html>

