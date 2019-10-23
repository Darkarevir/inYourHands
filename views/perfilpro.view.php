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
	<?php if($totalfilas==0):?>

<div class="">
	<div class="container">
	<form id="nf" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="col s12 m10 offset-m1">
			    <div class="container ">
				<div class="row">

					<div class="input-field col s12 m12">
					<input id="iduser" type="hidden" name="iduser"  value="<?php echo $iduser;

					?>">	
						
					</div>

					<center><h1>¡Complete su perfil profesional!</h1></center>
						<br>

					<div class="input-field col s12">
			            <h5>Especialidad a la que pertenece:</h5>
			            <br>

					    <select name="categoria">

					      <option value="" disabled selected REQUIRED>Selecciona especialidad</option>
					    <?php echo $categs;?>
					    </select>
					</div>
					
					<div class="input-field col s12 m12">

						<h5>DUI:</h5>
						<input type="text" name="DUI" id="DUI" class="validate" required value="">
					</div>

					<div class="input-field col s12 m12">

						<h5>NIT:</h5>
						<input type="text" name="NIT" id="NIT" class="validate" required value="">
					</div>


					<div class="input-field col s12 m12">
					    <br>
					    <input type="submit" name="submit" class="btn btn-primary green" value="Completar perfil" >
					</div>


				</div>	
				</div>	
	 		</form>
	 	</div>
	 </div>
	<?php else: ?>
<div class="main row  container section">

	
				<div class='col s6 l12 '>
					<div class='card section #66bb6a green lighten-1'>
						<div class='card-content #4caf50 green'>
						<center><h4>¡El registro ha sido completado!</h4></center>
						</div>
					</div>
				</div>
			</div>

		<?php endif ?>


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