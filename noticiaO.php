<?php 
session_start();
require'extras/conexion.php';
if ($_SESSION['tipo']=='AD') {
	if (isset($_GET['id'])) {
			$idn=$_GET['id'];
			try {
				$sttu=$conexion->prepare('UPDATE noticia2 SET ocultar=0 WHERE id=?');
				$sttu->execute(array($idn));
				header('location: noticiaH.php');
			} catch (PDOException $e) {

			}		
	}else {
		header('location: index.php');
	}
}else{
	header('location: index.php');
}

 ?>