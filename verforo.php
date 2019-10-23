<?php
require 'extras/conexion.php';

$aidi = 31;
session_start();


if (isset($_GET['id'])) {
    $idf=$_GET['id'];

    try {
        $stts=$conexion->prepare('SELECT foro.idForo, foro.titulo, foro.cuerpo, foro.categoria, foro.fecha_foro, foro.hidden, detalle_usuarios.nombre, detalle_usuarios.apellido from foro INNER JOIN usuarios ON foro.iduser=usuarios.iduser INNER JOIN detalle_usuarios ON usuarios.iduser=detalle_usuarios.iduser AND foro.idForo=? AND foro.hidden=0');
        $stts->execute(array($idf));
        $row=$stts->fetch();
    } catch (PDOException $e) {
        
    }

    
}

?>
<?php

if (isset($_POST['submit'])) {

$foro = $_POST['foro'];

$iduser = $_SESSION['id'];
$fecha2 = date('Y/m/d');
$descripcion= $_POST['descripcion'];

$query = "INSERT INTO foros_comentarios(idForo, iduser, fecha_comentario, fr_comentario) VALUES ('$foro','$iduser','$fecha2','$descripcion')";

$resultado = $conexion->query($query);

if($resultado){
}else {
  echo "No se insertó";

  echo $foro;
  echo $iduser;
  echo $titulo;

  echo $descripcion;

}
}




?>

<?php

$variable = $row[0]; 
$card_query = "SELECT foros_comentarios.fecha_comentario,foros_comentarios.fr_comentario, usuarios.usuario, usuarios.photo, detalle_usuarios.nombre, detalle_usuarios.apellido  FROM foros_comentarios inner join usuarios on foros_comentarios.iduser=usuarios.iduser  inner join detalle_usuarios on usuarios.iduser=detalle_usuarios.iduser WHERE idForo= '$variable'";
$resultado = $conexion->prepare($card_query);
$resultado->execute();	

$card_content = '';

$card_queryfilas = "SELECT * FROM foros_comentarios WHERE idForo='$variable'";
$sentencia = $conexion->prepare($card_queryfilas);
$sentencia->execute();
$total = $sentencia->rowCount();
$coment;

if($total == 1) {
  $coment = "comentario publicado";
}else{
  $coment = "comentarios publicados";
}

if(!$_GET){
header('location:verforo.php?id='.$foro);

}   
 while($sub_row = $resultado->fetch(PDO::FETCH_ASSOC))
 {

  $comentario= $sub_row  ["fr_comentario"];
  $fecha = $sub_row  ["fecha_comentario"];

  $nombre = $sub_row  ["nombre"];
  $apellido = $sub_row  ["apellido"];

  $correo = $sub_row  ["usuario"];

  $photo = $sub_row ["photo"];


 
  


  $card_content .= '

<div>
   
</div>
      <br>
      <i class="large material-icons circle"><img src="photos/'.$photo.'" alt="" class="responsive-img"></i>
      <p class="title"><font size="5">'.$nombre.' '.$apellido.'</font></p>
      <p><font size="4">'.$comentario.'</font><br>
      Fecha de publicación: '.$fecha.' - Contacto: '.$correo.'
      </p>
      <br>
      <div class="divider"></div>
      <br>

'
  ;

 }


require 'views/verforos.view.php';


?> 