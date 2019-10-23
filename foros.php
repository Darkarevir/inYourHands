<?php 
session_start();
$enviado="";
$errores="";

require 'extras/conexion.php'; 
require 'extras/funciones.php';

try {
	
} catch (PDOException $e) {
	echo "Error: " . $e.getMessage();
}

if (isset($_POST['submit'])) {
	$titulo = $_POST['foro'];
	$categoria = $_POST['categoria'];
	$cuerpo = $_POST['cuerpo'];
	$iduser = $_SESSION['id'];
	$fecha = date("Y/m/d"); 
	try {
		$statement=$conexion->prepare('insert into foro (titulo, cuerpo, categoria, fecha_foro, iduser) values(?,?,?,?,?)');
		$statement->execute(array($titulo, $cuerpo, $categoria, $fecha,$iduser));
		$enviado=true;
	} catch (PDOException $e) {
		echo "Error: " . $e.getMessage();
	}
}



//SELECT SQL_CALC_FOUND_ROWS,  * FROM foro ORDER BY idForo DESC LIMIT $inicio, $postPorPagina

$forosfijados = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS detalle_usuarios.nombre, detalle_usuarios.apellido, foro.idForo, foro.titulo, foro.cuerpo, foro.categoria, foro.fecha_foro, foro.iduser FROM foro INNER JOIN usuarios on usuarios.iduser=foro.iduser INNER JOIN detalle_usuarios ON detalle_usuarios.iduser=usuarios.iduser WHERE foro.fixed=1 AND foro.hidden = 0 ORDER BY idForo DESC");
	$forosfijados->execute();
	$forosfijados=$forosfijados->fetchAll();


$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1 ;
$postPorPagina = 7;
$inicio=($pagina>1)?($pagina*$postPorPagina-$postPorPagina):0;
$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS detalle_usuarios.nombre, detalle_usuarios.apellido, foro.idForo, foro.titulo, foro.cuerpo, foro.categoria, foro.fecha_foro, foro.iduser FROM foro INNER JOIN usuarios on usuarios.iduser=foro.iduser INNER JOIN detalle_usuarios ON detalle_usuarios.iduser=usuarios.iduser WHERE foro.hidden=0 and foro.fixed=0 ORDER BY idForo DESC LIMIT $inicio, $postPorPagina");
$articulos->execute();
$articulos=$articulos->fetchAll();
if (!$articulos) {
	header('location: foros.php');
}

$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
$totalArticulos = $totalArticulos->fetch()['total'];

$numeroPaginas = ceil($totalArticulos/$postPorPagina);


require 'views/foros.view.php';

 ?>