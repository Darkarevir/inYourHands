<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	$correo=$_SESSION['usuario'];
	require 'extras/conexion.php'; 
	require 'extras/funciones.php'; 

	try {
		$stmt = $conexion->prepare('select pais.PAIS, dep.DepName, mun.MunName from pais inner join dep on pais.ID=dep.PAIS_ID inner join mun on dep.DEP_ID=mun.DEP_ID');
		$stmt->execute();
	} catch (PDOException $e) {
		echo $e.getMessage();
	}
	
	try {
		$statement = $conexion->prepare('select usuarios.iduser, usuarios.usuario, detalle_usuarios.nombre, detalle_usuarios.apellido, detalle_usuarios.genero, detalle_usuarios.ubicacion, usuarios.photo from usuarios inner join detalle_usuarios on usuarios.iduser=detalle_usuarios.iduser and usuarios.usuario=?');
		$statement->execute(array($correo));
		$datos=$statement->fetch();
	} catch (PDOException $e) {
		echo $e.getMessage();
	}
	
	$_SESSION['photo']=$datos[6];
	$photoe='';
	$photok='';
	$errores='';
	$enviado='';
	/* Actualizar foto de perfil */
	if (isset($_GET['pupdated'])) {
		$photok=true;
	}
	if (isset($_POST['up-photo'])) {
		$directorio = 'photos/';
		$subir_archivo = $directorio.$datos[0].'.'.basename($_FILES['fichero']['type']);
		$up=$datos[0].'.'.basename($_FILES['fichero']['type']);
		$types=array('image/jpeg', 'image/png', 'image/PNG');
		if (in_array($_FILES['fichero']['type'], $types)){
				if (move_uploaded_file($_FILES['fichero']['tmp_name'], $subir_archivo)) {
				try {
				$statement = $conexion->prepare('update usuarios set photo=? where iduser=?');
				$statement->execute(array($up,$datos[0]));	
				header('Location: config-perfil.php?pupdated=true');
				} catch (Exception $e) {
					$photoe .= "La actualización ha fallado <br>";
				}
				
			} else {
				$photoe .= "La subida ha fallado <br>";
			}
		} else {
			$photoe .= "Tipo de archivo no admitido <br>";
		}
	}
	/* Eliminar foto */
	if (isset($_POST['delete-photo'])) {
		try {
			$statement = $conexion->prepare('update usuarios set photo=? where iduser=?');
			$statement->execute(array('0.png',$datos[0]));	
			header('Location: config-perfil.php?pupdated=true');
		} catch (Exception $e) {
			$photoe .= "La actualización ha fallado <br>";
		}
	}
	/* Actualizar información basica */
	if (isset($_GET['updated'])) {
		$enviado=true;
	}
	if (isset($_POST['submit'])) {
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$correo=$_POST['correo'];
		if (isset($_POST['genero'])) {
			$genero= $_POST['genero'];
		} else {
			$genero=$datos[4];
		}
		if (isset($_POST['ubicacion'])) {
			$ubicacion= $_POST['ubicacion'];
		} else {
			$ubicacion=$datos[5];
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
		if (!empty($correo)) {
			$correo	= filter_var($correo, FILTER_SANITIZE_EMAIL);
			
			if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
				$errores .='Por favor ingresa un correo valido <br />';
			} 
			
		}else {
			$errores .= 'Por favor ingresa un correo electronico <br />';
		}
		if (!$errores) {
			try {
			$statement=$conexion->prepare('update usuarios set usuario=? where iduser=?');
			$statement->execute(array($correo, $datos[0]));
			$_SESSION['usuario']=$correo;


			$statement=$conexion->prepare('update detalle_usuarios set nombre=?, apellido=?, genero=?, ubicacion=?  where iduser=?');
			$statement->execute(array($nombre, $apellido, $genero, $ubicacion, $datos[0]));
			
			header('Location: config-perfil.php?updated=true');
			
			} catch (PDOException $e) {
				echo "Error " . $e->getMessage();
			}
		}
		

	}
	require 'views/config-perfil.view.php';



}else{
	header('Location: login.php');
}
 ?>