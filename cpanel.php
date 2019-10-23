<?php 
	require 'extras/conexion.php';
	require 'extras/funciones.php';
	session_start();

if ($_SESSION['tipo']=='AD' ||  $_SESSION['tipo']=='CC') {
	require 'views/cpanel.view.php';					
}else{
	header('Location: index.php');
}


 ?>