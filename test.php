<?php 
$token = random_bytes(32);
echo password_verify('607035aba32e4ecaff0d1d5f6416edc0ea9885bf1d3dc6111b21405f42b02814', '$2y$10$cyQePdTJfMv04/6/WOUrn.oaypeSXVkgrsYKfBfxhvY3xDnIhdKTy');

 ?>


 <div class="col s12 m12 l3 ">
 		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="">
 			<div class="input-field col s12 m12 l12 hide-on-med-and-down">
 				<i class="material-icons prefix">account_circle</i>
				<input type="Email" id="icon_prefix" class="validate" name="correo">
				<label for="icon_prefix">Correo Electronico</label>
				<span class="helper-text" data-error="Por favor ingrese un correo valido." data-sucess="Accediendo"></span>
 			</div>
 			<div class="input-field col s12 m12 l6 l12 hide-on-med-and-down">
				<i class="material-icons prefix">lock</i>
				<input type="password" id="icon_prefix" class="validate" name="password">

				<label for="icon_prefix">Contraseña</label>
			</div>
			<div class="container hide-on-med-and-down">
			<a href="recuperar.php">¿Has olvidado la contraseña?</a>
			<?php if(!empty($errores)): ?>
					<div class="col s12 alert error">
					<?php echo $errores; ?>
				</div>
			<?php elseif ($enviado): ?>
				<div class="col s12 alert success">
					<?php echo "Registrado correctamente"; ?>
				</div>
			<?php endif ?>
			<button class="btn waves-effect waves-light input-field col s6 m6  green darken-3 input-field col s6 m6 l12" type="submit" name="submit-login">Iniciar
					<i class="material-icons right">send</i>		
			</button>
				<span class=" col s7 m7 l12">¿No tienes cuenta?<a href="registro.php">Registrate</a></span>
			</div>
 		</form>
 	</div>