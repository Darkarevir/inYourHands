
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>En tus manos</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	 <link rel="stylesheet" href="css/estilos.css">
	 <!-- <link rel="stylesheet" href="styles/styles.css"> -->
	 <link rel="stylesheet" href="styles/footer.css">
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	 	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	 <style> .he { min-height: 600px; } </style>
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
  <div class="row">
    <div class="container">
      <div class="input-field col s12 m12">
        <i class="material-icons prefix">search</i>
        <input type="text" id="icon_prefix" class="validate">
        <label for="icon_prefix">Buscar Noticia</label>        
      </div>
      <a href="" class="waves-effect waves-light btn right-align"><!-- <i class="material-icons left">search</i> -->Buscar</a>
    </div>
  </div>
  <div class="container">
  <div class="row">
    <?php foreach ($sttm as $objeto ): ?>
      <div class="col s12 m4">
      <div class="card">
      <div class="card-image">
      <img src="photos-noticias/<?php echo $objeto[5]; ?>" height="500" width="500" >
      <span class="card-title teal grey lighten-4 black-text col s12 m12"><?php echo mb_convert_case($objeto[1], MB_CASE_UPPER, "UTF-8")."."; ?></span>
      </div>
      <div class="card-content">
      <p> <?php echo substr($objeto[2], 0, 150);  ?></p>
      </div>
      <div class="card-action">
      <a class="red-text text-darken-4" href="noticiaS.php?id=<?php echo $objeto[0]; ?>">Leer mas...</a>
      </div>
      </div>
      </div>
    <?php endforeach ?>
   </div>
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