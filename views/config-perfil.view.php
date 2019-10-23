<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Configuracion de perfil</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style>  body{ background: #e8eaf6  } .pb { background: white; min-height:150px;  } .card-panel { min-height: 650px; } .dropdown-content {min-width: 200px;} </style>
    
</head>
<script type="text/javascript">
	function confirmDelete(){
		var respuesta = confirm("Tu foto de perfil se eliminará");
		if (respuesta==true) {
			return true;
		} else {
			return false;
		}
	}
</script>

<body>
	
	<?php 
    require 'extras/menu.php';
   	?>


	<div class="container">
		<div class="row pb section z-depth-1">
			<div class="col s5 m2 offset-s3"> <!-- foto de perfil -->
				<img src="photos/<?php if($_SESSION['photo']=="0.png"){ echo "0.png"; } else { echo $_SESSION['photo'];} ?>" alt="" class="responsive-img">
			</div>
			<div class="col s12 m10 offset-s2">
				<div class="col s12 m8">
					<h5> <a href="perfil.php"><?php echo $datos[2] ." ". $datos[3] ."<br>";  ?></a>  <i class="material-icons amber-text">star</i><i class="material-icons amber-text">star</i><i class="material-icons amber-text">star</i></h5>
				</div>
	
			
			</div>
			
		</div>
		<div class="row card-panel">
			<h5 class="titl">Configuración</h5>
			<div class="col s12 m3">
				<blockquote>
				<h5 class=""><a href="config-perfil.php">Cuenta</a></h5>
				</blockquote>
				<h5 class=""><a href="config-pass.php">Contraseña</a></h5>

			</div>
			<div class="col s12 m7">
				<form  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<h5 class="titl">Actualiza tu foto de perfil</h5>
					<?php if(!empty($photoe)): ?>
						<div class="col s12 alert error">
							<?php echo $photoe; ?>
						</div>
					<?php elseif ($photok): ?>
						<div class="col s12 alert success">
							<?php echo "Foto de perfil actualizada correctamente"; ?>
						</div>
					<?php endif ?>
					<input type="HIDDEN" name="MAX_FILE_SIZE" value='5000000'>
					<p><input type="FILE" name="fichero"></p>
					<input type="submit" name="up-photo" value="Actualizar" class="btn  green">
					<input type="submit" name="delete-photo" value="Eliminar" class="btn  red" onclick="return confirmDelete()">
				</form>
				<br>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<h5>Edita tu información básica</h5>
					<?php if(!empty($errores)): ?>
						<div class="col s12 alert error">
							<?php echo $errores; ?>
						</div>
					<?php elseif ($enviado): ?>
						<div class="col s12 alert success">
							<?php echo "Actualizado correctamente"; ?>
						</div>
					<?php endif ?>
					<div class="input-field col s12">
						<input type="text" name="nombre" id="nombre" class="validate" required value="<?php echo $datos[2] ?>">
						<label for="nombre">Nombres</label>
					</div>
					<div class="input-field col s12">
						<input type="text" name="apellido" id="apellido" class="validate" required value="<?php echo $datos[3] ?>">
						<label for="apellido">Apellidos</label>
					</div>
					<div class="input-field col s12">
					    <select name="genero">
					      <option value="<?php echo $datos[4] ?>" disabled selected><?php echo $datos[4] ?></option>
					      <option value="Femenino">Femenino</option>
					      <option value="Masculino">Masculino</option>
					      <option value="Otro">Otro</option>
					    </select>
					    <label>Genero</label>
					</div>
					<div class="input-field col s12">
						<input type="text" name="ubicacion" id="ubicacion" class="validate autocomplete" required value="<?php echo $datos[5] ?>">
						<label for="ubicacion">Ubicación</label>
					</div>
					
					<div class="input-field col s12">
						<input type="email" name="correo" id="correo" class="validate" required value="<?php echo $correo ?>">
						<label for="correo">Correo electronico</label>
					</div>
					
					
					<input type="submit" name="submit" class="btn col green" value="Guardar">
				</form>
				
			</div>
			
			
		</div>

	</div>
<?php require 'extras/footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
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