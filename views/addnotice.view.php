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
	 <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	 <style> .he { min-height: 600px; } .dropdown-content {min-width: 200px;} /*body{ background: #333;*/ }</style>
</head>
<body>
	<!-- Inicio NavBar -->
	<?php 
    	require 'extras/menu-c.php';
   	?>
  <!-- Final NavBar -->
  <!--  -->
  <!-- Inicio de columnas -->
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

	<div class="container">
		<h3><a href="cpanel.php"><i class="material-icons small">keyboard_arrow_left</i></a> Publicar noticia <?php if ($ok==true): ?>
			<i title="Noticia publicada" class="material-icons medium right green-text">check_box</i>
		<?php endif ?> </h3>
		<h5 class="titl">Agregar foto de portada de noticia</h5>
		<input type="HIDDEN" name="MAX_FILE_SIZE" value='5000000'>
		<p><input type="FILE" name="fichero"></p>



		<input type="text" name="title" placeholder="Titulo" required>
		<textarea name="cuerpo" id="ckeditor" class="ckeditor" required></textarea>
 <?php $fecha = date('l jS \of F Y');  echo "<p>$fecha</p>"; ?>
 	<button class="btn waves-effect waves-light" type="submit" name="action">Agregar noticia
    </button>
 </form>
</div>
<br>


  <!-- Final -->

 

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
 <script>
 	 $(document).ready(function() {
    M.updateTextFields();
  });
 </script>
</body>
</html>