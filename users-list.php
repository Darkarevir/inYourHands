<?php 

require'extras/conexion.php';
	session_start();
	if ($_SESSION['tipo']=='AD') {

		$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1 ;
		$postPorPagina = 7;
		$inicio=($pagina>1)?($pagina*$postPorPagina-$postPorPagina):0;
		$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS usuarios.iduser, usuarios.usuario, detalle_usuarios.nombre, detalle_usuarios.apellido, detalle_usuarios.genero, detalle_usuarios.ubicacion, usuarios.photo, usuarios.idtipo from usuarios inner join detalle_usuarios on usuarios.iduser=detalle_usuarios.iduser where usuarios.idtipo!='AD' ORDER BY iduser ASC LIMIT $inicio, $postPorPagina");
		$articulos->execute();
		$articulos=$articulos->fetchAll();
		if (!$articulos) {
			header('location: foros.php');
		}

		$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
		$totalArticulos = $totalArticulos->fetch()['total'];

		$numeroPaginas = ceil($totalArticulos/$postPorPagina);


		require 'views/users-list.view.php';
	} else {
		header('Location: index.php');
	}





 ?>