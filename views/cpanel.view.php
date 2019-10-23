<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrar</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="css/estilos.css">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style>body{ background: #e8eaf6  } .pb { background: white; min-height:150px;  } .card-panel { min-height: 650px; } .dropdown-content {min-width: 200px;} .card{height: 250px;} .bd { min-height: 600px; }  </style>
  
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


	<div class="row container section center bd">
		<div class="col s6 l4">
			<div class="card section">
				
				<div class="card-content">
					<div class="center">
						<a href="addnotice.php" class="btn-floating btn-large waves-effect waves-light purple"><i class="material-icons">add</i></a>
					</div>
					<p class="flow-text"><a href="addnotice.php" class="black-text">Nueva noticia</a></p>
					<div class="divider"></div>
					<p>Publicación de nuevas noticias</p>
				</div>
			</div>
		</div>
	
		<?php if ($_SESSION['tipo']=='AD') {
			
		?>
		<div class="col s6 l4">
			<div class="card section">
				
				<div class="card-content">
					<div class="center">
						<a href="noticiaH.php" class="btn-floating btn-large waves-effect waves-light pink"><i class="material-icons">settings</i></a>
					</div>
					<p class="flow-text"><a href="noticiaH.php" class="black-text">Administrar noticias</a></p>
					<div class="divider"></div>
					<p>Lista y edición de noticas, ocultar noticias</p>
				</div>
			</div>
		</div>

		<div class="col s6 l4">
			<div class="card section">
				
				<div class="card-content">
					<div class="center">
						<a href="cforos.php" class="btn-floating btn-large waves-effect waves-light cyan"><i class="material-icons">forum</i></a>
					</div>
					<p class="flow-text "><a href="cforos.php" class="black-text">Administrar foros</a> </p>
					<div class="divider"></div>
					<p>Lista de foros publicados</p>
				</div>
			</div>
		</div>

		<div class="col s6 l4">
			<div class="card ">
				<div class="card-content">
					<div class="center">
						<a href="users-list.php" class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">account_circle</i></a>
					</div>
					<p class="flow-text "><a href="users-list.php" class="black-text">Administrar usuarios</a> </p>
					<div class="divider"></div>
					<p>Lista de usuarios, modificación de privilegios</p>
				</div>
			</div>
		</div>
		<?php } ?>
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


