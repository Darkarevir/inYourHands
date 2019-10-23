<?php
require 'extras/conexion.php';

session_start();

$iduser= $_SESSION['id'];



$collection_query = "SELECT * from especialidades";


$resultado = $conexion->prepare($collection_query);
$resultado->execute();	

$categs = '';
 while($sub_row = $resultado->fetch(PDO::FETCH_ASSOC)){

 $idespecialidad = $sub_row ["idTipoEsp"];
 $especialidad = $sub_row ["especialidad"];
 $categs .= '

 	<option value="'.$idespecialidad.'">'.$especialidad.'</option>


  ';


 };


 if (isset($_POST['submit'])) {

$iduser = $_SESSION['id'];
$categoriaesp = $_POST['categoria'];
$DUI= $_POST['DUI'];
$NIT= $_POST['NIT'];

$query = "INSERT INTO detalle_profesional(iduser, idTipoEsp, dui, nit) VALUES ('$iduser','$categoriaesp','$DUI','$NIT')";

$resultado = $conexion->query($query);

if($resultado){
}else {
 
}
};

$queryfilas = "SELECT * FROM detalle_profesional where iduser=$iduser";

$sentencia = $conexion->prepare($queryfilas);
$sentencia->execute();
$totalfilas = $sentencia->rowCount();

require 'views/perfilpro.view.php';

?>
