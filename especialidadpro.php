<?php
require 'extras/conexion.php';

session_start();

if (isset($_GET['id'])) {
    $idf=$_GET['id'];

    try {
        $stts=$conexion->prepare('');
        $stts->execute(array($idf));
        $row=$stts->fetch();
    } catch (PDOException $e) {
        
    }

    
};

$collection_query = "SELECT usuarios.iduser, usuarios.usuario, usuarios.photo, detalle_usuarios.nombre, detalle_usuarios.apellido,detalle_usuarios.genero, detalle_usuarios.ubicacion,detalle_profesional.idTipoEsp, detalle_profesional.dui, detalle_profesional.nit, especialidades.especialidad from usuarios inner join detalle_usuarios on usuarios.iduser=detalle_usuarios.iduser inner join detalle_profesional on usuarios.iduser=detalle_profesional.iduser inner join especialidades on detalle_profesional.idTipoEsp=especialidades.idTipoEsp WHERE detalle_profesional.idTipoEsp=$idf";


$resultado = $conexion->prepare($collection_query);
$resultado->execute();	

$collection_content = '';
 while($sub_row = $resultado->fetch(PDO::FETCH_ASSOC)){

 $fotopro = $sub_row ["photo"];

 $nombreprof = $sub_row ["nombre"];
 $apellidoprof= $sub_row ["apellido"];

 $especialidadpro = $sub_row ["especialidad"];
 $genero = $sub_row ["genero"];
 $ubicacion = $sub_row ["ubicacion"];

 $collection_content .= '

 <div class="col s6 m6 l6 xl6">

        <div class="card">

        
   <div class="card-image waves-effect waves-block waves-light">
          <img src="photos/'.$fotopro.'" alt=""  height="500" width="200">
          </div>
          <div class="card-content">
            
            <p class="card-title"><font size="15">'.$nombreprof.' '.$apellidoprof.'</font></p>
            <p><font size="5">Especialidad: '.$especialidadpro.'</font></p>
            <p><font size="5">Genero: '.$genero.'</font></p> 
            <p><font size="5">Ubicacion: '.$ubicacion.'</font></p> 

          </div>

         

        </div>

      </div>

  ';


 };

 


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>En tus manos</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	 <link rel="stylesheet" href="css/styles.css">
	 <link rel="stylesheet" href="styles/footer.css">
	 <script type="text/javascript" src="ckeditor2/ckeditor.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	 <style> .he { min-height: 600px; } .dropdown-content {min-width: 200px;}</style>
</head>
<body class="">
	<!-- Inicio NavBar -->
	<?php 
	if (isset($_SESSION['usuario'])){
		?>
		
		<?php 
    	require 'extras/menu.php';
   	?>

		<?php 	
	} else {
		require 'extras/menu-nu.php';
	}
	?>


	<div class="container">
		<div class="row">
  <br>
  <?php

   echo $collection_content;
  ?>
</div>
  </div>
	

<?php require 'extras/footer.php'; ?>

 <!-- scripts -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 <script>
 	document.addEventListener('DOMContentLoaded',function(){
 		M.AutoInit();
 	});
 </script>
  <script>
 	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(elems);
  });
 </script>

 <script >  
</script>
</body>
</html>