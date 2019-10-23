<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Foro</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="styles/footer.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
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
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	<style> .he { min-height: 600px; }</style>
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
    <div class="container">
    

    <?php foreach($sttm as $objeto):
        if($objeto == 0){
            echo "<p> No hay foros en la categoria Bebés </p>";
        }?>

    <div class='col s6 l12'>
		<div class='card section'>
			<div class='card-content'>
				<p class='flow-text'><a href='verforo.php?id=<?php echo $objeto[2];  ?>' class='black-text'><?php echo $objeto[3] ." | Categoria: " . $objeto[5];  ?></a></p>
					<div class='divider'></div>
					 <p><?php echo "Publicado por: ". $objeto[0] . " ". $objeto[1] . "  el " . $objeto[6]; ?></p>
					 <p><?php echo substr($objeto[4], 0, 150); ?></p>
					</div>
				</div>
			</div>
    <?php endforeach?>

    </div>

    <?php require'extras/footer.php'?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			M.AutoInit();
		 });
	</script>	
</body>
</html>