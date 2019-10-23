<?php 
require '../extras/conexion.php';
$id_estado = $_POST['id_estado'];

try {
	$queryD = "SELECT * FROM dep where PAIS_ID='$id_estado'";
	$stmt=$conexion->prepare($queryD);
	$stmt->execute();
} catch (PDOException $e) {
	echo $e.getMessage();
}


$html="";
while ($rowD=$stmt->fetch()) {
	$html.="<option value='".$rowD[0]."'>".$rowD[1]."</option>";
}
echo $html;
?>