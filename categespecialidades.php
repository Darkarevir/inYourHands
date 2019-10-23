<?php
require 'extras/conexion.php';

session_start();


$collection_query = "SELECT * from especialidades";


$resultado = $conexion->prepare($collection_query);
$resultado->execute();	

$collection_content = '';
 while($sub_row = $resultado->fetch(PDO::FETCH_ASSOC)){

 $idespecialidad = $sub_row ["idTipoEsp"];
 $especialidad = $sub_row ["especialidad"];
 $collection_content .= '

 <a href="especialidadpro.php?id='.$idespecialidad.'" class="collection-item"><i class="material-icons left">arrow_forward</i>'.$especialidad.'</a>

  ';


 }


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
<body class="#64b5f6 blue lighten-2
">
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
	<div class="col s12 ">

			<h3 class="white-text">Categorias de Especialidades</h3><div class="collection">

			<?php

   echo $collection_content;
  ?></div>
		
		</div>
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