<?php 
session_start();
require'extras/conexion.php';
// $sttm=$conexion->prepare('SELECT * FROM noticia2 WHERE ocultar=1');
// $sttm->execute();

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1 ;
$postpp = 6;

$inicio = ($pagina > 1) ? ($pagina * $postpp - $postpp) : 0;



$sttm=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM noticia2 WHERE ocultar=1 ORDER BY id DESC LIMIT $inicio, $postpp");
$sttm->execute();
$sttm=$sttm->fetchAll();



if (!$sttm) {
  header('location: hnoticia.php');
}

$totalA = $conexion->query('SELECT FOUND_ROWS() AS total');
$totalA = $totalA->fetch()['total'];

$numeroPaginas = ceil($totalA / $postpp);

require 'views/hnoticia.view.php';

 ?>