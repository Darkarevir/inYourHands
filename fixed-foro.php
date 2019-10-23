<?php 
session_start();
require'extras/conexion.php';
if ($_SESSION['tipo']=='AD') {
	if (isset($_GET['idff'])) {
		$idff=$_GET['idff'];
		$forosfijados = $conexion->prepare("UPDATE foro SET fixed=1 WHERE idForo=$idff");
		$forosfijados->execute();
		header('Location: cforos.php');
	}

	if (isset($_GET['iduf'])) {
		$iduf=$_GET['iduf'];
		$forosfijados = $conexion->prepare("UPDATE foro SET fixed=0 WHERE idForo=$iduf");
		$forosfijados->execute();
		header('Location: cforos.php');
	}

	if (isset($_GET['idhd'])) {
		$idhd=$_GET['idhd'];
		$forosfijados = $conexion->prepare("UPDATE foro SET hidden=1 WHERE idForo=$idhd");
		$forosfijados->execute();
		header('Location: cforos.php');
	}


}

 ?>