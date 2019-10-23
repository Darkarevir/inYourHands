<?php 
	require 'extras/conexion.php';
	require 'extras/funciones.php';
	session_start();
	$errores='';
	$enviado='';
	if (isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
	if (isset($_GET['usr'])) {
		$enviado=0;
	}

	if (isset($_GET['newpwd'])) {
		$enviado=1;
	}


	if (isset($_POST['submit'])) {
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

			$statement = $conexion->prepare('select * from usuarios where usuario= :id');
			$statement->execute(array(':id' => $correo));
			$resultados = $statement->fetch();
			if (password_verify($password, $resultados[2])) {
				$_SESSION['usuario']= $correo;
				$_SESSION['tipo']=$resultados[3];
				$_SESSION['id']=$resultados[0];	
				header('Location: index.php');
			} else{
				$errores .= 'Datos incorrectos. Intentalo otra vez';
		
			}

	}
	require 'views/login.view.php';
 ?>