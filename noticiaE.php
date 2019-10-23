<?php 
require'extras/conexion.php';
session_start();
if ($_SESSION['tipo']=='AD') {
	if (isset($_GET['id'])) {
		$idn=$_GET['id'];
		try {
			$stts=$conexion->prepare('SELECT * FROM noticia2 WHERE id=?');
			$stts->execute(array($idn));
			$row=$stts->fetch();
		} catch (PDOException $e) {

		}		
	}




	if (isset($_POST['update'])) {
		$titulo = $_POST['title'];
		$contenido = $_POST['cuerpo'];
		$fecha2 = date('Y/m/d');
		$id=$_POST['idh'];
			try {
				$stt =$conexion->prepare('UPDATE noticia2 SET titulo=?, contenido=?, fecha=? WHERE id=?');
				$stt->execute(array($titulo,$contenido,$fecha2, $id));
				header('location: noticiaH.php');
			} catch (PDOException $e) {

			}

		if (isset($_FILES['fichero'])) {
			$id=$_POST['idh'];
			$directorio = 'photos-noticias/';
			$subir_archivo = $directorio.$id.'.'.basename($_FILES['fichero']['type']);
			$up=$id.'.'.basename($_FILES['fichero']['type']);
			$types=array('image/jpeg', 'image/png', 'image/PNG');
			if (in_array($_FILES['fichero']['type'], $types)){
					if (move_uploaded_file($_FILES['fichero']['tmp_name'], $subir_archivo)) {
						try {
						$statement = $conexion->prepare('update noticia2 set photon=? where id=?');
						$statement->execute(array($up,$id));	
						$ok=true;
						} catch (Exception $e) {
							$photoe .= "La actualización ha fallado <br>";
						}
				} else {
					$photoe .= "La subida ha fallado <br>";
				}
			} else {
				$photoe .= "Tipo de archivo no admitido <br>";
			}
		}
	}
}else{
	header('Location: index.php');
}
	

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
	 <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	 <script type="text/javascript" language="JavaScript">
	 	function confirmar_envio(){
			if (confirm("Seguro de actualizar los datos?")==true)
			{
        		return true;
     		}else{
     			return false;
     		}
		}
	 </script>
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
  <h3 class="center"><a href="noticiaH.php"><i class="material-icons small">keyboard_arrow_left</i></a> Edición de noticias</h3>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="frm_update" method="POST">

	<div class="container">
		<h5 class="titl">Agregar foto de portada de noticia</h5>
		<input type="HIDDEN" name="MAX_FILE_SIZE" value='5000000'>
		<p><input type="FILE" name="fichero"></p>
		<?php 
			echo "<input type='text' name='title' placeholder='Titulo' value='$row[1]' required>";
			echo "<textarea name='cuerpo' id='ckeditor' class='ckeditor' value='' required>".$row[2]."</textarea>";
			echo "<input type='hidden' name='idh' value='$row[0]'>";
		 ?>
 <?php $fecha = date('l jS \of F Y');  echo "<p>$fecha</p>"; ?>
 	<button class="btn waves-effect waves-light" type="submit" name="update" onclick="return confirmar_envio()">actualizar noticia</button>
 </form>
 <form action="noticiaH.php" name="nope"></form>
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