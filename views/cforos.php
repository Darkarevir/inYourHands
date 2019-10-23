<?php 

require'extras/conexion.php';
	session_start();
	if ($_SESSION['tipo']=='AD') {

	$forosfijados = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS detalle_usuarios.nombre, detalle_usuarios.apellido, foro.idForo, foro.titulo, foro.cuerpo, foro.categoria, foro.fecha_foro, foro.iduser FROM foro INNER JOIN usuarios on usuarios.iduser=foro.iduser INNER JOIN detalle_usuarios ON detalle_usuarios.iduser=usuarios.iduser WHERE foro.fixed=1  ORDER BY idForo DESC");
	$forosfijados->execute();
	$forosfijados=$forosfijados->fetchAll();

		$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1 ;
		$postPorPagina = 7;
		$inicio=($pagina>1)?($pagina*$postPorPagina-$postPorPagina):0;
		$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS detalle_usuarios.nombre, detalle_usuarios.apellido, foro.idForo, foro.titulo, foro.cuerpo, foro.categoria, foro.fecha_foro, foro.iduser, foro.hidden FROM foro INNER JOIN usuarios on usuarios.iduser=foro.iduser INNER JOIN detalle_usuarios ON detalle_usuarios.iduser=usuarios.iduser WHERE foro.hidden=0 and foro.fixed=0 ORDER BY idForo DESC LIMIT $inicio, $postPorPagina");
		$articulos->execute();
		$articulos=$articulos->fetchAll();
		if (!$articulos) {
			header('location: foros.php');
		}

		$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
		$totalArticulos = $totalArticulos->fetch()['total'];

		$numeroPaginas = ceil($totalArticulos/$postPorPagina);


		require 'views/cforos.view.php';
	} else {
		header('Location: index.php');
	}





 ?>