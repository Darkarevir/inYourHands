<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Configuracion de perfil</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="css/estilos.css">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style>body{ background: #e8eaf6  } .pb { background: white; min-height:150px;  } .card-panel { min-height: 650px; } .dropdown-content {min-width: 200px;}</style>
  
</head>
<script type="text/javascript">
	function Ocultar(){
		document.getElementById("alerta").style.display="none";
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
			<h5>Configuración</h5>
			<div class="col s12 m3">
				<h5 class=""><a href="config-perfil.php">Cuenta</a></h5>
				<blockquote>
				<h5 class=""><a href="#">Contraseña</a></h5>
				</blockquote>
			</div>
			<div class="col s12 m7">
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<?php if(!empty($errores)): ?>
						<div id="alerta" class="col s12 alert error">
							<?php echo $errores; ?>
						</div>
					<?php elseif ($enviado): ?>
						<div class="col s12 alert success">
							<?php echo "Actualizado correctamente"; ?>
						</div>
					<?php endif ?>
					<div class="input-field col s12">
						<input type="password" name="password-a" id="password-a" class="validate" onclick="Ocultar()" required value="">
						<label for="password-a">Contraseña actual</label>
						<a href="recuperar.php">¿Olvidaste tu contraseña?</a>
					</div>
					<div class="input-field col s12">
						<input type="password" name="password-n" id="password-n" class="validate" onclick="Ocultar()" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe tener mínimo 8 caracteres, incluida 1 letra mayúscula, 1 letra minúscula y caracteres numéricos">
						<label for="password-n">Nueva contraseña</label>
					</div>
					<div class="input-field col s12">
						<input type="password" name="password-n2" id="password-n2" class="validate" onclick="Ocultar()" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe tener mínimo 8 caracteres, incluida 1 letra mayúscula, 1 letra minúscula y caracteres numéricos">
						<label for="password-n2">Verificar contraseña</label>
					</div>
					
					
					<input type="submit" name="submit" class="btn col" value="Guardar">
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
</body>
</html>