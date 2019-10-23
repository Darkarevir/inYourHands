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
<script type="text/javascript" language="JavaScript">
	 	function confirmar_envio(){
			if (confirm("¿Seguro de actualizar el rol?")==true)
			{
        		return true;
     		}else{
     			return false;
     		}
		}
	 </script>
<body>

<?php 
    	require 'extras/menu-c.php';
   	?>

<div class="main row  container section">


	<h3><a href="cpanel.php"><i class="material-icons small">keyboard_arrow_left</i></a> Administración de usuarios</h3>

	<table class=" highlight responsive-table">
			<thead>
				<th>Foto</th>
				<th>eMail</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Genero</th>
				<th>Tipo Usuario</th>
				<th>Asignar rol</th>
			</thead>
			

				<?php foreach ($articulos as $objeto): ?>
					<tbody>
					<tr>
						<td><img src="photos/<?php echo $objeto['photo']; ?>" height="150" width="150"></td>
						<td><?php echo $objeto['usuario']; ?></td>
						<td><?php echo $objeto['nombre']; ?></td>
						<td><?php echo $objeto['apellido']; ?></td>
						<td><?php echo $objeto['genero']; ?></td>
						<td><?php echo $objeto['idtipo']; ?></td>
						<td>
							<a onclick="return confirmar_envio()" title="Especialista" href="user-rol.php?idesp=<?php echo $objeto['iduser']; ?> " class="btn cyan darken-1 waves-effect">ESP</a>
							<a onclick="return confirmar_envio()" title="Creador de contenido" href="user-rol.php?idcc=<?php echo $objeto['iduser']; ?> " class="btn cyan darken-1 waves-effect">C.C</a>
							<a onclick="return confirmar_envio()" title="Administrador" href="user-rol.php?idad=<?php echo $objeto['iduser']; ?> " class="btn cyan darken-1 waves-effect">AD</a>
							<a onclick="return confirmar_envio()" title="Eliminar roles" href="user-rol.php?idtu=<?php echo $objeto['iduser']; ?> " class="btn red waves-effect"> <i class="material-icons">highlight_off</i></a>
						</td>
					</tr>
					 </tbody>
					
				<?php endforeach ?>
			
	</table>

	<div class="col s12 center">
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


