<?php 
require'extras/conexion.php';
session_start();
if ($_SESSION['tipo']=='AD' || $_SESSION['tipo']=='CC') {
$idu = $_SESSION['id'];						
$ok=false;
if (isset($_POST['action'])) {
	$titulo = $_POST['title'];
	$contenido = $_POST['cuerpo'];
	$fecha2 = date('Y/m/d');

	try {
		$stts =$conexion->prepare('INSERT INTO noticia2(titulo, contenido, fecha,iduser, ocultar) values(?,?,?,?,?)');
		$stts->execute(array($titulo,$contenido,$fecha2,$idu,1));

		$stts=$conexion->prepare('SELECT * FROM noticia2 WHERE titulo=?');
		$stts->execute(array($titulo));
		$datos=$stts->fetch();
	} catch (PDOException $e) {
		
	}
	if (isset($_FILES['fichero'])) {
		$directorio = 'photos-noticias/';
		$subir_archivo = $directorio.$datos[0].'.'.basename($_FILES['fichero']['type']);
		$up=$datos[0].'.'.basename($_FILES['fichero']['type']);
		$types=array('image/jpeg', 'image/png', 'image/PNG');
		if (in_array($_FILES['fichero']['type'], $types)){
				if (move_uploaded_file($_FILES['fichero']['tmp_name'], $subir_archivo)) {
					try {
					$statement = $conexion->prepare('update noticia2 set photon=? where id=?');
					$statement->execute(array($up,$datos[0]));	
					$ok=true;
					} catch (Exception $e) {
						$photoe .= "La actualización ha fallado <br>";
					}
			} else {
				//$photoe .= "La subida ha fallado <br>";
			}
		} else {
			//$photoe .= "Tipo de archivo no admitido <br>";
		}
	}
	

}

require 'views/addnotice.view.php';


} else {
	header('Location: index.php');
}




?>

