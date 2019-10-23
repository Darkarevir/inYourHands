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


?>
<?php

//Definir articulos por pagina

$articulos_x_pagina = 10;
$iniciar = ($_GET['pagina']-1)*$articulos_x_pagina;


if(!$_GET){
header('location:donaciones.php?pagina=1');
$iduser = $_SESSION['id'];

}    

if (isset($_POST['submit'])) {

$iduser = $_SESSION['id'];
$titulo= $_POST['titulo'];
$descripcion= $_POST['descripcion'];
$nombreimg=$_FILES['Imagen']['name']; //nombre
$archivo= $_FILES['Imagen']['tmp_name']; //archivo
$ruta="photosdonaciones";
$ruta = $ruta."/".$nombreimg;
move_uploaded_file($archivo, $ruta);

$query = "INSERT INTO donaciones(iduser,titulo,descripcion,imagen) VALUES ('$iduser','$titulo','$descripcion','".$nombreimg."')";

$resultado = $conexion->query($query);

if($resultado){
  
}else {
  echo "No se insertó";
}

}

//Consulta obtener datos

$card_query = "SELECT donaciones.titulo, donaciones.descripcion, donaciones.imagen, usuarios.usuario, detalle_usuarios.nombre, detalle_usuarios.ubicacion FROM donaciones inner join usuarios on donaciones.iduser=usuarios.iduser inner join detalle_usuarios on usuarios.iduser=detalle_usuarios.iduser ORDER BY id_donacion DESC LIMIT :iniciar,:narticulos ";





//Cantidad de articulos por pagina
$card_queryfilas = "SELECT * FROM donaciones";

$sentencia = $conexion->prepare($card_queryfilas);
$sentencia->execute();

$resultado = $conexion->prepare($card_query);
$resultado->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
$resultado->bindParam(':narticulos', $articulos_x_pagina, PDO::PARAM_INT);

$resultado->execute();	

$total_articulos_db = $sentencia->rowCount();
$paginas = $total_articulos_db/$articulos_x_pagina;
$paginas = ceil($paginas);


if ($_GET['pagina']>$paginas || $_GET['pagina']<=0 ){
	/*header('location:donaciones.php?pagina=1');*/

}

$card_content = '';

//Recorrer y obtener datos de tabla

 while($sub_row = $resultado->fetch(PDO::FETCH_ASSOC))
 {


  $titulo= $sub_row  ["titulo"];
  $titulocorto = substr($titulo, 0, 17);
  $descripcion = $sub_row["descripcion"];
  $usuario = $sub_row ["usuario"];
  $nombreuser = $sub_row ["nombre"];
  $ubicacion = $sub_row ["ubicacion"];
  $imagen = $sub_row ["imagen"];


  if(strlen($titulocorto)>=17){

    $titulocorto.="...";

  }


  $card_content .= '

     <div class="col s6 m4 l4 xl4">

        <div class="card">

          <div class="card-image waves-effect waves-block waves-light">
          <img src="photosdonaciones/'.$imagen.'" alt="" class="activator"  height="200" width="200">
          </div>

          <div class="card-content">
            <span class="card-title activator">'.$titulocorto.'
              <i class="material-icons right">more_vert</i>
            </span>
          </div>

          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">'.$titulo.'
              <i class="material-icons right">close</i>
            </span>
            <p>'.$descripcion.'</p>
            <p>Publicado por: '.$nombreuser.'</p>
            <p>Correo electronico: '.$usuario.'</p>
            <p>Ubicacion del dueño del articulo: '.$ubicacion.'</p>
            <p>
              <a href="#">Contactar con el dueño</a>
            </p>
          </div>

        </div>

      </div>




  ';
 }
require 'views/donaciones.view.php';
?>
