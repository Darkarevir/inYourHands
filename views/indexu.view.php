<?php 
require'extras/conexion.php';
$sttm=$conexion->prepare('select * from noticia2 WHERE ocultar=1 ORDER BY id DESC LIMIT 4');
$sttm->execute();

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>En tus manos</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	 	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	 <style> .he { min-height: 600px; } .dropdown-content {min-width: 200px;} body{ background:#e8eaf6; }  </style>
</head>
<body>
	<!-- Inicio NavBar -->
	
  <?php 
    require 'extras/menu.php';
   ?>


  <!-- Final NavBar -->
  <!--  -->
  <!-- Inicio de columnas -->

 <div class="parallax-container">
  	<div class="parallax animated zoomIn slower">
  		<img src="img/1.jpg">
  	</div>
  </div>

  <div class="cyan darken-1 white-text center">
  	<div class="container">
  		<div class="section">
  			<img class="responsive-img" src="img/log.png">
  			<h3 class="animated slideInDown slow">Consejo Diario.</h3>
  			<p class="animated slideInDown slow">El cuerpo de la mujer pasa por distintos etapas luego de dar a luz y se engloban en lo que medicamente se llama Puerperio. Estas fases son relativas a cada mujer y sus tiempos no son exactos. Relajate.</p>
  		</div>
  	</div>
  </div>
  <!--  -->
<div class='row section'>
   <?php 

 while ($row=$sttm->fetch(PDO::FETCH_NUM)) {
         
        echo "<div class='nt col s12 m12 section'>";
        	echo "<div class='parallax-container'>";
        		echo "<div class='parallax'>";
        		echo "<img src='photos-noticias/$row[5]'>";
        	echo "</div>";
        echo "</div>";

        echo "<div class='cyan darken-1 white-text center'>";
        echo "<div class='container'>";
        echo "<div class='section'>";
        echo "<h3>".$row[1]."</h3>";
        echo "<p>". utf8_encode(substr($row[2], 0, 130)) ."<a class='red-text text-darken-4' href='noticiaS.php?id=$row[0]'> Leer mas...</a>"."</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
         echo "</br>";

       // echo $row[0]."   ".$row[1]."   ".$row[2]."</br>";
    }
  ?>
</div>

<a href="hnoticia.php" class="center"><h4>Ver todas las noticias</h4></a>

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
</body>
</html>