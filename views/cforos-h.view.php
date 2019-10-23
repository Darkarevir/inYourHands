<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrar</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="css/estilos.css">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style>body{ background: #e8eaf6  } .pb { background: white; min-height:150px;  } .card-panel { min-height: 650px; } .dropdown-content {min-width: 200px;} .card{height: 250px;}  </style>
  
</head>
<script type="text/javascript">
	function Ocultar(){
		document.getElementById("alerta").style.display="none";
	}
</script>
<body>

<?php 
    	require 'extras/menu-c.php';
   	?>

<div class="main row  container section">




	<div class="col s12 cyan darken-1">
			<h3 class="white-text"><a href="cforos.php"><i class="material-icons small white-text">keyboard_arrow_left</i></a> Foros archivados
			
			</h3>
			

			<?php foreach ($articulos as $articulo): ?>
				<div class='col s6 l12'>
					<div class='card section'>
						<div class='card-content'>
							<p class='flow-text'><a href='verforo.php?id=<?php echo $articulo['idForo'];  ?>' class='black-text'><?php echo $articulo['titulo'] ." | Categoria: " . $articulo['categoria'];  ?></a>
							
							</p>

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


