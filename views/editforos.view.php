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
        <form id="nf"  enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" name="frm_update" method="POST">
        <div class="row">
					<div class="input-field col s12">
						<input type="text" name="foro" id="foro" class="validate" required value="<?php echo $row[1]?>">
						<label for="foro"><i class="material-icons left">title</i>Titulo</label>
					</div>
					<div class="input-field col s12">
					    <select name="categoria">
					      <option value="" disabled selected required><?php echo $row[3]?></option>
					      <option value="Bebes">Bebés</option>
					      <option value="Crianza">Crianza</option>
					      <option value="Salud">Embarazo</option>
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
					    <textarea name="cuerpo" id="ckeditor" class="ckeditor" required>
                        <?php echo $row[2];?>
                        </textarea>
					</div>
                    <input type="hidden" name="idf" value="<?php echo $row[0];?>">
					<button class="btn waves-effect waves-light" type="submit" name="update" onclick="return confirmar_envio()">Guardar Foro</button>


				</div>		
        </form>
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