<?php 
session_start();
require'extras/conexion.php';
if ($_SESSION['tipo']=='AD') {

	if (isset($_GET['idesp'])) {
		$idesp=$_GET['idesp'];
		$forosfijados = $conexion->prepare("UPDATE usuarios SET idtipo='ESP' WHERE iduser=$idesp");
		$forosfijados->execute();
		header('Location: users-list.php');
	}

	if (isset($_GET['idcc'])) {
		$idcc=$_GET['idcc'];
		$forosfijados = $conexion->prepare("UPDATE usuarios SET idtipo='CC' WHERE iduser=$idcc");
		$forosfijados->execute();
		header('Location: users-list.php');
	}

	if (isset($_GET['idad'])) {
		$idad=$_GET['idad'];
		$forosfijados = $conexion->prepare("UPDATE usuarios SET idtipo='AD' WHERE iduser=$idad");
		$forosfijados->execute();
		header('Location: users-list.php');
	}

	if (isset($_GET['idtu'])) {
		$idtu=$_GET['idtu'];
		$forosfijados = $conexion->prepare("UPDATE usuarios SET idtipo='TU' WHERE iduser=$idtu");
		$forosfijados->execute();
		header('Location: users-list.php');
	}
}

 ?>