<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>En tus manos <?php echo $row[1]; ?></title>
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
<div class="container">
	<div class="card-panel #bbdefb blue lighten-4">
		<div class="row">
			<div class="col s12 m9">
		<?php echo "<h3>". mb_convert_case($row[1], MB_CASE_TITLE, "UTF-8")."."."</h3>" ?>
	</div>
</div>
		<div class="row">
			<div class="col s12 m9">
				<?php echo "<span class='flow-text'>".$row[2]."</span>"; ?>
			</div>
			<div class="col s12 m3">
				<?php $ejemplo = $row[0];
				?>
				<?php echo "<span>"."Categoria: "."</span>"; ?>
				<?php echo "<span>".$row[3]."</span>"."</br>"; ?>
				<?php echo "<span>"."Fecha de Publicacion: "."<span>"; ?>
				<?php echo "<span>".$row[4]."</span>"."</br>"; ?>
				<?php echo "<span>"."Autor: "."<span>"	; ?>
				<?php echo "<span>".$row[7]." ".$row[6]."</span>"."</br>"; ?>
			</div>
		</div>
	</div>
	</div>
	

<div class="container">
	<div class="card-panel #bbdefb blue lighten-4">
		<div class="row">
			<div class="col s12 m12">
				
				<h4><?php echo $total; ?> <?php echo $coment; ?></h4>
				<br>	
				<br>	
				<ul class="collection ">
					<li class="collection-item avatar #e1f5fe light-blue lighten-5">
				<?php
				echo $card_content;

				?>
				</li>    
			    </ul>
			</div>
		</div>
	</div>
</div>
	
	

<div class="container"> 
			<div class="row">

<div class="col s12 m12 #bbdefb blue lighten-4" >
			
    
    


		 <form id="nf" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="col s12 m10 offset-m1">

				<div class="row">

					

					<div class="input-field col s12 m12">
					<input id="foro" type="hidden" name="foro"  value="<?php echo $ejemplo;

					?>">	
						
					</div>
                    <h3>Publicar un comentario</h3>
					<br>

					<div class="col s12 m12 #e3f2fd blue lighten-5">
			        <div class="input-field col s2 m2">

						<i class="large material-icons"><img src="photos/<?php if($_SESSION['photo']=="0.png"){ echo "0.png"; } else { echo $_SESSION['photo'];} ?>" alt="" class="responsive-img"></i>

					</div>
					
					<div class="input-field col s10 m10">

					    <textarea name="descripcion" id="descripción" class="materialize-textarea" ></textarea>
					    <label for="descripción"><i class="material-icons left">description</i>Comentario:</label>

					</div>
				</div>
					
					<div class="input-field col s12 m12">
					    <br>

					    <input type="submit" name="submit" class="btn btn-primary green" value="Publicar Comentario" onclick=" M.toast({html: 'Comentario publicado!'})" >
					</div>


				</div>	
					
	 		</form>
	

				

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