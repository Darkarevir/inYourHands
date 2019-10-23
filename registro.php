<?php
	require 'extras/conexion.php'; 
	require 'extras/funciones.php'; 
	session_start();

	try {
		$stmt = $conexion->prepare('select pais.PAIS, dep.DepName, mun.MunName from pais inner join dep on pais.ID=dep.PAIS_ID inner join mun on dep.DEP_ID=mun.DEP_ID');
		$stmt->execute();
	} catch (PDOException $e) {
		
	}


	if (isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
	
	$errores='';
	$enviado='';
	if (isset($_POST['submit'])) {
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$correo=$_POST['correo'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		$ubicacion=$_POST['ubicacion'];

		if (isset($_POST['genero'])) {
			$genero= $_POST['genero'];
		} else {
			$errores='Por favor selecciona un genero <br />';
		}

		

		if (!empty($nombre)){
			$nombre = cleanVar($nombre);
		} else{
			$errores .= 'Por favor ingresa un nombre <br />';
		}
		if (!empty($apellido)){
			$apellido= cleanVar($apellido);
		} else{
			$errores .= 'Por favor ingresa un apellido <br />';
		}
		if (!empty($password) or !empty($password2)){
			$password= cleanVar($password);
			$password2= cleanVar($password2);
		} else{
			$errores .= 'Por favor ingresa una contraseña <br />';
		}

		if (!empty($correo)) {
			$correo	= filter_var($correo, FILTER_SANITIZE_EMAIL);
			if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
				$errores .='Por favor ingresa un correo valido <br />';
			} 
			
		}else {
			$errores .= 'Por favor ingresa un correo electronico <br />';
		}
		try {
			$statement = $conexion->prepare('select * from usuarios where usuario=?');
			$statement->execute(array($correo));
			$resultados = $statement->fetchAll();
		} catch (PDOException $e) {
			echo "Error ". $e;
		}
	
		if ($resultados != false ) {
				$errores .= 'Correo electronico ya registrado <br />';				
		}

		$password = encrypPassword($password);
		if (!password_verify($password2, $password)) {
				$errores .= 'Las contraseñas no son iguales <br />';		
		}



		if (!$errores){
				try {
					$statement=$conexion->prepare('insert into usuarios (usuario, password, idtipo, photo) values(?,?,?,?)');
					
					$statement->execute(array($correo, $password, 'TU','0.png'));
					// $statement=$conexion->prepare('insert into usuarios (usuario, password, idtipo) values(?, ?, ?)');
					// $statement->execute(array($correo, $password, 'TU'));
					//buscar id
					$statement = $conexion->prepare('select * from usuarios where usuario=?');
					$statement->execute(array($correo));
					$id=$statement->fetch();
					//agregar datos
					$statement=$conexion->prepare('insert into detalle_usuarios (iduser, nombre, apellido, genero, ubicacion) values(?, ?, ?, ?, ?)');
					$statement->execute(array($id[0], $nombre, $apellido, $genero, $ubicacion));
					
					header('Location: login.php?usr=dn');
				} catch (PDOException $e) {
					echo "Error " . $e->getMessage();
				}						
		}

		
	}
	require 'views/registrou.view.php';
 ?>