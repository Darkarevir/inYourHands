<?php 
session_start();
require'extras/conexion.php';
if ($_SESSION['tipo']=='AD') {
	if (isset($_GET['id'])) {
			$idn=$_GET['id'];
			try {
				$sttu=$conexion->prepare('UPDATE foro SET hidden = 1 WHERE idForo=?');
				$sttu->execute(array($idn));
				header('location: perfil.php');
			} catch (PDOException $e) {

			}		
	}else {
		header('location: index.php');
	}
}else{
	header('location: index.php');
}

 ?>