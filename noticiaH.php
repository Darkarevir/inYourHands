<?php 
	require'extras/conexion.php';
	session_start();
	if ($_SESSION['tipo']=='AD') {

		$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1 ;
		$postpp = 6;

		$inicio = ($pagina > 1) ? ($pagina * $postpp - $postpp) : 0;

		$stts=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM noticia2 WHERE ocultar=1 ORDER BY id DESC LIMIT $inicio, $postpp");
		$stts->execute();
		$stts=$stts->fetchAll();


		if (!$stts) {
  		header('location: noticiaH.php');
		}

		$totalA = $conexion->query('SELECT FOUND_ROWS() AS total');
		$totalA = $totalA->fetch()['total'];

		$numeroPaginas = ceil($totalA / $postpp);



		require'views/noticiaH.view.php';
	}else{
		header('Location: index.php');
	}

		


 ?>