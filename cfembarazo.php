<?php 
session_start();
$enviado="";
$errores="";

require 'extras/conexion.php'; 
require 'extras/funciones.php';

try {
	
} catch (PDOException $e) {
	echo "Error: " . $e.getMessage();
}




//SELECT SQL_CALC_FOUND_ROWS,  * FROM foro ORDER BY idForo DESC LIMIT $inicio, $postPorPagina

$forosfijados = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS detalle_usuarios.nombre, detalle_usuarios.apellido, foro.idForo, foro.titulo, foro.cuerpo, foro.categoria, foro.fecha_foro, foro.iduser FROM foro INNER JOIN usuarios on usuarios.iduser=foro.iduser INNER JOIN detalle_usuarios ON detalle_usuarios.iduser=usuarios.iduser WHERE foro.fixed=1  ORDER BY idForo DESC");
	$forosfijados->execute();
	$forosfijados=$forosfijados->fetchAll();


$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1 ;
$postPorPagina = 7;
$inicio=($pagina>1)?($pagina*$postPorPagina-$postPorPagina):0;
$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS detalle_usuarios.nombre, detalle_usuarios.apellido, foro.idForo, foro.titulo, foro.cuerpo, foro.categoria, foro.fecha_foro, foro.iduser FROM foro INNER JOIN usuarios on usuarios.iduser=foro.iduser INNER JOIN detalle_usuarios ON detalle_usuarios.iduser=usuarios.iduser WHERE foro.hidden=0 and foro.fixed=0 and foro.categoria='Embarazo' ORDER BY idForo DESC LIMIT $inicio, $postPorPagina");
$articulos->execute();
$articulos=$articulos->fetchAll();

$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
$totalArticulos = $totalArticulos->fetch()['total'];

$numeroPaginas = ceil($totalArticulos/$postPorPagina);


 ?>



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


<?php if ($totalArticulos>0): ?>
	<div class="main row  container section">


		<div class="col s12 cyan darken-1">
			<h3 class="white-text">Foros para la categoria: Embarazo</h3>

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

	<?php else: ?>
			<div class="main row  container section">

		<div class="col s12 cyan darken-1">
			<h3 class="white-text">Foros para la categoria: Embarazo</h3>

				<div class='col s6 l12'>
					<div class='card section'>
						<div class='card-content'>
						<h4>¡No hay ningún foro publicado para esta categoria!</h4>
						</div>
					</div>
				</div>

		</div>
	</div>
	<?php endif ?>

	
<?php require 'extras/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			M.AutoInit();
		 });
	</script>	
</body>
</html>