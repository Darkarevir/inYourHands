<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script type="text/javascript" language="JavaScript">
	 	function confirmar_ocultar(){
			if (confirm("Desea ocultar esta noticia?")==true)
			{
        		return true;
     		}else{
     			return false;
     		}
		}
	 </script>
	<style>body{ background: #e8eaf6; } .pb { background: white; min-height:115px;  } .card-panel { min-height: 650px; } .dropdown-content {min-width: 200px;} 
	</style>
</head>
<body>
	<?php 
    require 'extras/menu.php';
   	?>

	<div class="container">
		<div class="row pb section z-depth-1">
			<div class="col s5 m2 offset-s3"> <!-- foto de perfil -->
				<img src="photos/<?php if($_SESSION['photo']=="0.png"){ echo "0.png"; } else { echo $_SESSION['photo'];} ?>" alt="" class="responsive-img">
			</div>
			<div class="imgcont col s12 m10 offset-s2">
				<div class="col s12 m8">
				<h5><a href="perfil.php"><?php echo $datos[2] ." ". $datos[3] ."<br>";  ?></a> <i class="material-icons amber-text">star</i><i class="material-icons amber-text">star</i><i class="material-icons amber-text">star</i></h5>
			</div>
			<div class="col s12 m4">
				<a href="config-perfil.php"><p>Configuración de cuenta</p></a>
			</div>
			<div class="col s12 m12 row">
				<div class="col m3 headers">
					<p>Email:</p>
					<p>Genero:</p>
					<p>Ubicación:</p>
				</div>
				<div class="col m6 content">
					<p><?php echo $correo; ?></p>
					<p><?php echo $datos[4]; ?></p>
					<p><?php echo $datos[5]; ?></p>
				</div>
			</div>
			
			</div>
			
		</div>
		<div class="row card-panel">
			<h4>Mis publicaciones</h4>
			<div class="divider z-depth-1"></div>

			<table class="higlight responsive-table">
				<thead>
					<th>Titulo</th>
					<th>Categoria</th>
					<th>Fecha de publicación</th>
					<th>Administracion</th>
				</thead>

					<?php foreach ($statemen as $objeto): ?>
					<tbody>
					<tr>
					<td><a href="verforo.php?id=<?php echo $objeto[0];?>"><?php echo $objeto[1]?></a></td>
					<td><?php echo $objeto[3]?></td>
					<td><?php echo $objeto[4]?></td>
					<td><a href="forosO.php?id=<?php echo $objeto[0];?>" class="btn cyan darken-1 waves-effect" onclick="return confirmar_ocultar()">Ocultar</a>
					<a href="editforos.php?id=<?php echo $objeto[0];?>" class="btn cyan darken-1 waves-effect">Editar</a></td>
					</tr>
					</tbody>
					<?php endforeach?>
			</table>
			
			
			
		</div>

	</div>
	

	
	 <?php require 'extras/footer.php'; ?>
	





 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 <script>
 	document.addEventListener('DOMContentLoaded',function(){
 		M.AutoInit();
 	});
 </script>


</body>
</html>