<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	$correo=$_SESSION['usuario'];

	require 'extras/conexion.php'; 
	require 'extras/funciones.php';
	
	$statement = $conexion->prepare('select usuarios.iduser, usuarios.usuario, detalle_usuarios.nombre, detalle_usuarios.apellido, detalle_usuarios.genero, detalle_usuarios.ubicacion, usuarios.photo from usuarios inner join detalle_usuarios on usuarios.iduser=detalle_usuarios.iduser and usuarios.usuario=?');
	$statement->execute(array($correo));
	$datos=$statement->fetch();
	

	$_SESSION['photo']=$datos[6];

	$idu = $datos[0];

	$statemen = $conexion-> prepare('SELECT * FROM foro WHERE iduser = ? AND hidden = ?');
	$statemen->execute(array($idu, 0));
	$statemen=$statemen->fetchAll();

	

	require 'views/perfil.view.php';
}else{
	header('Location: login.php');
}





 ?>