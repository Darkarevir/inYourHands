<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="UTF-8">
	<title>Intercambios</title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

	 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	 <link rel="stylesheet" href="css/estilos.css">
	 <link rel="stylesheet" href="styles/footer.css">

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
		document.getElementById("cerrar").style.display="inline-block";
		document.getElementById("nuevo").style.display="none";
		document.getElementById("alerta").style.display="none";
	}

</script>
 <body class="	" >
 
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


    <?php

 	     
    ?>


	<!-- Formulario agregar articulo -->

	<div class="col s12 m12 #e1bee7 purple lighten-4" >
			<h4 class="center col s12 m12">Publicar nuevo articulo <a onclick="Mostrar()" id="nuevo" class="btn-floating ¿waves-effect waves-light green"><i class="material-icons">add</i></a>
				 <a onclick="Ocultar()" id="cerrar" style="display: none;" class="btn-floating waves-effect waves-light red"><i class="material-icons">remove</i></a></h4>
				
			<?php if (isset($_SESSION['usuario'])): ?>

		 <form style="display: none;" id="nf" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="col s12 m10 offset-m1">
			    <div class="container">

				<div class="row">

					<div class="input-field col s12 m12">
						<input type="text" name="titulo" id="titulo" class="validate" required value="">
						<label for="titulo"><i class="material-icons left">title</i>Ingrese un titulo</label>
					</div>
					
					<div class="input-field col s12 m12">
						<p class="">Descripcción del Articulo</p>
					    <textarea REQUIRED name="descripcion" id="descripción" class="materialize-textarea" ></textarea>


					</div>
					<div class="input-field col s12 m12">

					<div class="file-field input-field"> 
					    <div class="btn"> 
					       	<span>Seleccione imagen</span>
					       	<input type="file" REQUIRED name="Imagen">
					    </div> 
					    <div class="file-path-wrapper">
					    <input class="file-path validate" type="text">
					    </div>
					    </div>
					    <br>
					    <input type="submit" name="submit" class="btn btn-primary green" value="Publicar articulo" >
					</div>


				</div>	
				</div>	
	 		</form>
	 		<?php else: ?>
				<div class="col s12 alert error">
						<?php echo "¡Inicia sesion para publicar articulos!"; ?>
				</div>
			<?php endif ?>


	</div>

		<!-- Fin formulario -->


	<!-- Inicio tabs -->
<?php if ($total_articulos_db>0): ?>
<div class="row">
<br>
    <ul class="tabs col s12 m12 #e1bee7 purple lighten-4">
    	<li class="tab col s12"><a href="#test1" style="color:#1b5e20">ARTICULOS EN INTERCAMBIO</a></li>
   
    </ul>

 <div id="test1" class="col s12">
      
  <div class="container">
  <h3>Articulos para intercambiar disponibles</h3>
  <br>
  <?php

   echo $card_content;
  ?>

  </div>
</div>
</div>
	<?php else: ?>
<div class="main row  container section">

	
				<div class='col s6 l12'>
					<div class='card section'>
						<div class='card-content'>
						<center><h4>¡No hay ningún articulo disponible!</h4></center>
						</div>
					</div>
				</div>
			</div>

		<?php endif ?>

	<!-- Final tabs -->

	<!-- Inicio paginación -->

<div class="container">
	<div class="row">
		
	<div class="col s12 center #e0f2f1 teal lighten-5">

			<ul class="pagination">
				    <?php
	                  $paginaactual = $_GET['pagina'];
	                ?>

					<?php if ($paginaactual == 1): ?>

				    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
				    <?php else: ?>

					<li class=""><a href="intercambios.php?pagina=<?php echo $_GET['pagina']-1 ?>"><i class="material-icons">chevron_left</i></a></li>

					<?php endif; ?>

					<?php 

					for($i=0;$i<$paginas;$i++): 

					?>

                    <li class="<?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>"><a href="intercambios.php?pagina=<?php echo $i+1; ?>"><?php echo $i+1; ?></a></li>
                    <?php endfor ?>

                    <?php if ($paginaactual == $paginas): ?>
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                    <?php else: ?>

                    <li class="waves-effect"><a href="intercambios.php?pagina=<?php echo $_GET['pagina']+1 ?>"><i class="material-icons">chevron_right</i></a></li>
                    <?php endif; ?>


			</ul>
                    <?php 

                    $numeroarticulo= '';

                    $numeroarticulo.= '<h6>Numero de articulos actuales: '.$total_articulos_db.'</h6>';


                    echo $numeroarticulo;
                    ?>

	</div>
	</div>
</div>

	<!-- Fin paginación -->

	
	<!-- Footer -->

	<?php require 'extras/footer.php'; 

	?>

	<!-- Fin footer -->


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
		document.addEventListener('DOMContentLoaded', function() {
			M.AutoInit();
		 });
	</script>
<script>
	

	//Script tabs

  $(document).ready(function(){
    $('.tabs').tabs();
  });
        

</script>


 </body>
 </html>

