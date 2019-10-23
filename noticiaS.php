<?php 
session_start();
	require'extras/conexion.php';
	if (isset($_GET['id'])) {
		$idn=$_GET['id'];

		try {
			$stts=$conexion->prepare('SELECT * FROM noticia2 WHERE id=?');
			$stts->execute(array($idn));
			$row=$stts->fetch();
		} catch (PDOException $e) {
			
		}
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
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	 <style> .he { min-height: 600px; } .dropdown-content {min-width: 200px;}</style>
</head>
<body>
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
	 
	 

	
  <!-- Final NavBar -->
  <!--  -->
  <!-- Inicio de columnas --> 
  <div class="parallax-container">
  	<div class="parallax">
  		<?php echo "<img src='photos-noticias/$row[5]'>"; ?>
  		<img src="img/1.jpg">
  	</div>
  </div>
  <div class="cyan darken-1 white-text center">
  	<div class="container">
  		<div class="section">
  			<?php echo "<h3>".$row[1]."</h3>"; ?>
  		</div>
  	</div>
  </div>
<div class="container">
	<?php echo "<p class'flow-text'>".$row[2]."</p>"; ?>
		
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
</body>
</html>