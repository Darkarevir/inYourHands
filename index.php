<?php 
	require 'extras/conexion.php';
	require 'extras/funciones.php';
	session_start();
	if (isset($_SESSION['usuario'])){
		$correo=$_SESSION['usuario'];
		try {
			$statement = $conexion->prepare('select usuarios.iduser, usuarios.usuario, detalle_usuarios.nombre, detalle_usuarios.apellido, detalle_usuarios.genero, detalle_usuarios.ubicacion, usuarios.photo from usuarios inner join detalle_usuarios on usuarios.iduser=detalle_usuarios.iduser and usuarios.usuario=?');
			$statement->execute(array($correo));
			$datos=$statement->fetch();
			$_SESSION['perfil']=$datos[2]. " " .$datos[3];
			$_SESSION['photo']=$datos[6];
		} catch (PDOException $e) {
			
		}
		
		require 'views/indexu.view.php';
		
	} else {
		

		$errores='';
		$enviado='';

		if (isset($_POST['submit-login'])) {
		$correo= $_POST['correo'];
		$password=$_POST['password'];

		if (!empty($correo)) {
			$correo	= filter_var($correo, FILTER_SANITIZE_EMAIL);
			if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
				$errores .='Por favor ingresa un correo valido <br />';
			} 
			
		}else {
			$errores .= 'Por favor ingresa un correo electronico <br />';
		}
		try {
			$statement = $conexion->prepare('select password from usuarios where usuario= :id');
			$statement->execute(array(':id' => $correo));
			$resultados = $statement->fetch();
			if (password_verify($password, $resultados[0])) {
				$_SESSION['usuario']= $correo;
				header('Location: index.php');
			} else{
				$errores .= 'Datos incorrectos';
		
			}
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
			
		}

		
		require 'views/index.view.php';
	}

 ?>