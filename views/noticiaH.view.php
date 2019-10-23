<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>En tus manos</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	 <link rel="stylesheet" href="css/styles.css">
	 <link rel="stylesheet" href="styles/footer.css">
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
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
	 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	 <style> .he { min-height: 600px; }</style>
</head>
<body>
	<!-- Inicio NavBar -->
<?php 
    	require 'extras/menu-c.php';
   	?>
	 
	 <!-- Final NavBar -->
	
		
	 <div class="container">
	 	<h3><a href="cpanel.php"><i class="material-icons small">keyboard_arrow_left</i></a> Administración de noticias</h3>
		<a href="noticiaHO.php" class="btn waves-effect waves-light green">Noticias ocultas</a>
	 	<img src="" alt="">
	 	<table class=" highlight responsive-table">
			<thead>
				<th>Portada</th>
				<th>Titulo</th>
				<th>Contenido</th>
				<th>Fecha</th>
				<th>Editar</th>
			</thead>
			

				<?php foreach ($stts as $objeto): ?>
					<tbody>
					<tr>
						<td><img src="photos-noticias/<?php echo $objeto[5]; ?>" height="150" width="150"></td>
						<td><?php echo $objeto[1]; ?></td>
						<td><?php echo substr($objeto[2], 0, 150) ; ?></td>
						<td><?php echo $objeto[3]; ?></td>
						<td><a href="noticiaE.php?id=<?php echo $objeto[0]; ?> " class="btn cyan darken-1 waves-effect">Editar</a></td>
						<td><a href="noticiaO.php?id=<?php echo $objeto[0]; ?> " class="btn cyan darken-1 waves-effect" onclick="return confirmar_ocultar()">Ocultar</a></td>
					</tr>
					 </tbody>
					
				<?php endforeach ?>
			
		</table>
	 </div>

	 <ul class="pagination center">
    <?php if ($pagina==1): ?>
      <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <?php else: ?>
      <li class=""><a href="?pagina=<?php echo $pagina-1?>"><i class="material-icons">chevron_left</i></a></li>
    <?php endif ?>

    <?php 
      for ($i=1; $i <=$numeroPaginas ; $i++) { 
        if ($pagina==$i) {
          echo "<li class='active'><a href='?pagina=$i'>".$i."</a></li>";
        }else{
          echo "<li class='waves-effect'><a href='?pagina=$i'>".$i."</a></li>";
        }
      }

     ?>
      <?php if ($pagina==$numeroPaginas): ?>
      <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    <?php else: ?>
      <li class=""><a href="?pagina=<?php echo $pagina+1?>"><i class="material-icons">chevron_right</i></a></li>
    <?php endif ?>
  </ul>
		


	 <!--  -->

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
</body>
</html>