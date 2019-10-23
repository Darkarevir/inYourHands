<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Foros</title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	 <link rel="stylesheet" href="css/estilos.css">
	 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	 <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <style>body{ background: #e8eaf6;  } .pb { background: white; min-height:150px;  } .card-panel { min-height: 650px; } .dropdown-content {min-width: 200px;} </style>
</head>

<script type="text/javascript">
	function Ocultar(){
		document.getElementById("nf").style.display="none";
		document.getElementById("cerrar").style.display="none";
		document.getElementById("nuevo").style.display="inline-block";
	}
	function Mostrar(){
		document.getElementById("nf").style.display="block";
		document.getElementById("cerrar").style.display="inline";
		document.getElementById("nuevo").style.display="none";
		document.getElementById("alerta").style.display="none";
	}

</script>

<body>

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



	<div class="main row  container section">

		<div class="second row col s12 m12 white z-depth-2" >
			<h3 class="center col s12 m12">Crea tu propio foro <a onclick="Mostrar()" id="nuevo" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">add</i></a>
				<input type="submit" id="cerrar" style="display: none;" class="btn btn-primary red" value="Cerrar" onclick="Ocultar()"></h3>
				<?php if(!empty($errores)): ?>
					<div id="alerta" class="col s12 alert error">
						<?php echo $errores; ?>
					</div>
				<?php elseif ($enviado): ?>
					<div id="alerta" class="col s12 alert success">
						<?php echo "¡Publicado correctamente!"; ?>
					</div>
				<?php endif ?>

			<?php if (isset($_SESSION['usuario'])): ?>
				<form style="display: none;" id="nf" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="col s12 m10 offset-m1">
				
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="foro" id="foro" class="validate" required value="">
						<label for="foro"><i class="material-icons left">title</i>Titulo</label>
					</div>
					<div class="input-field col s12">
					    <select name="categoria">
					      <option value="" disabled selected required>Selecciona la categoria</option>
					      <option value="Bebés">Bebés</option>
					      <option value="Crianza">Crianza</option>
					      <option value="Embarazo">Embarazo</option>
					      <option value="Familia">Familia</option>
					      <option value="Niños">Niños</option>
					      <option value="Mujer">Mujer</option>
					      <option value="Salud">Salud</option>
					      
					      
					      
					      <option value="Otro">Otro</option>
					    </select>
					    <label>Categoria</label>
					</div>
					<div class="input-field col s12">
						<p class="">Cuerpo del foro</p>
					    <textarea name="cuerpo" id="ckeditor" class="ckeditor" required></textarea>
					</div>
					<input type="submit" name="submit" class="btn btn-primary green" value="Publicar foro">

				</div>		
	 		</form>
			<?php else: ?>
				<div class="col s12 alert error">
						<?php echo "¡Inicia sesión para publicar un foro!"; ?>
				</div>
			<?php endif ?>

			

		</div>
		<div class="col s12 cyan darken-1">
		<h3 class="white-text">Foros fijados</h3>

		<?php 
			if (!$forosfijados) {
			echo "<p class='flow-text white-text'>No hay foros fijados</p>";
		}else{
			?>
			
				<?php foreach ($forosfijados as $articulo): ?>


					<div class='col s6 l12'>
						<div class='card section'>
							<div class="col s2 m2">
								<img src="img/prueba.jpg" alt="" class="responsive-img" width="400" height="400">
							</div>
							<div class='card-content'>
								<p class='flow-text'><a href='verforo.php?id=<?php echo $articulo['idForo'];  ?>' class='black-text'><?php echo $articulo['titulo'] ." | Categoria: " . $articulo['categoria'];  ?></a>
									<a href="" title="Foro fijado"><i class="material-icons right orange-text">star</i></a>
								</p>

								<div class='divider'></div>
								<p><?php echo "Publicado por: ". $articulo['nombre'] . " ". $articulo['apellido'] . "  el " . $articulo['fecha_foro']; ?></p>

								<p><?php echo substr($articulo['cuerpo'], 0, 150); ?></p>
							</div>
						</div>
					</div>
				<?php endforeach ?>		

				<?php 
			}

			 ?>
		</div>

		<div class="col s12 cyan darken-1">
			<h3 class="white-text">Categorias</h3>
			<div class="collection">
		        <a href="cfbebes.php" class="collection-item"><i class="material-icons left">child_care</i>Bebés</a>
		        <a href="cfcrianza.php" class="collection-item"><i class="material-icons left">school</i>Crianza</a>
		        <a href="cfembarazo.php" class="collection-item"><i class="material-icons left">pregnant_woman</i>Embarazo</a>
		        <a href="cffamilia.php" class="collection-item"><i class="material-icons left">group</i>Familia</a>
		        <a href="cfniños.php" class="collection-item"><i class="material-icons left">face</i>Niños</a>
		        <a href="cfmujer.php" class="collection-item"><i class="material-icons left">shopping_basket</i>Mujer</a>
		        <a href="cfsalud.php" class="collection-item"><i class="material-icons left">healing</i>Salud</a>
		        <a href="cfotro.php" class="collection-item"><i class="material-icons left">weekend</i>Otro</a>

	      	</div>
		
		</div>

		<div class="col s12 cyan darken-1">
			<h3 class="white-text">Ultimos foros publicados</h3>

			<?php foreach ($articulos as $articulo): ?>
				<div class='col s6 l12'>
					<div class='card section'>
						<div class='card-content'>
							<p class='flow-text'><a href='verforo.php?id=<?php echo $articulo['idForo'];  ?>' class='black-text'><?php echo $articulo['titulo'] ." | Categoria: " . $articulo['categoria'];  ?></a></p>
							<div class='divider'></div>
							<p><?php echo "Publicado por: ". $articulo['nombre'] . " ". $articulo['apellido'] . "  el " . $articulo['fecha_foro']; ?></p>

							<p><?php echo substr($articulo['cuerpo'], 0, 150); ?></p>
						</div>
					</div>
				</div>
			<?php endforeach ?>			

		</div>

		<div class="col s12 center cyan darken-1">
			<ul class="pagination">
				<?php if ($pagina == 1): ?>
					<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
				<?php else: ?>
					<li class=""><a href="?pagina=<?php echo $pagina-1 ?>"><i class="material-icons">chevron_left</i></a></li>
				<?php endif; ?>

				<?php 

				for ($i=1; $i <= $numeroPaginas ; $i++) { 
					if ($pagina == $i) {
						echo " <li class='active red darken-4'><a href='?pagina=$i'>$i</a></li> ";
					} else {
						echo "<li class='waves-effect'><a href='?pagina=$i'>$i</a></li> ";
					}
	
				}

				 ?>

				<?php if ($pagina == $numeroPaginas): ?>
					<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
				<?php else: ?>
					<li class=""><a href="?pagina=<?php echo $pagina+1 ?>"><i class="material-icons">chevron_right</i></a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	
<?php require 'extras/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			M.AutoInit();
		 });
	</script>	
</body>
</html>