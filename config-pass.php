<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	$correo=$_SESSION['usuario'];
	require 'extras/conexion.php'; 
	require 'extras/funciones.php'; 
	
	$statement = $conexion->prepare('select usuarios.iduser, usuarios.usuario, detalle_usuarios.nombre, detalle_usuarios.apellido, detalle_usuarios.genero, detalle_usuarios.ubicacion from usuarios inner join detalle_usuarios on usuarios.iduser=detalle_usuarios.iduser and usuarios.usuario=?');
	$statement->execute(array($correo));
	$datos=$statement->fetch();
	
	$errores='';
	$enviado='';
	
	if (isset($_POST['submit'])) {
		$passworda=$_POST['password-a'];
		$passwordn=$_POST['password-n'];
		$passwordn2=$_POST['password-n2'];
		

	
		try {
			$statement=$conexion->prepare('select password from usuarios where iduser=?');
			$statement->execute(array($datos[0]));
			$result=$statement->fetch();
			
			if (password_verify($passworda, $result[0])) {
				$passwordn=encrypPassword($passwordn);
				if (!password_verify($passwordn2, $passwordn)) {
					$errores .= 'Las contraseñas no son coinciden <br />';
				}
			} else {
				$errores .= 'Contraseña actual incorrecta <br />';
			}
		} catch (PDOException $e) {
			
		}
		

		if (!$errores) {
			try {
			$statement=$conexion->prepare('update usuarios set password=? where iduser=?');
			$statement->execute(array($passwordn ,$datos[0]));
			$enviado=true;
			
			} catch (PDOException $e) {
				echo "Error " . $e->getMessage();
			}
		}
		

	}

	require 'views/config-pass.view.php';


}else{
	header('Location: login.php');
}
 ?>