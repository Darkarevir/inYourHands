<?php 

	echo "<div style='display: none'>";
	use PHPMailer\PHPMailer\PHPMailer;
	include_once "PHPMailer/PHPMailer.php";
	include_once "PHPMailer/SMTP.php";
	echo "owo";
	echo "</div>";


	
	require 'extras/conexion.php';
	require 'extras/funciones.php';
	$errores='';
	$enviado='';
	if (isset($_POST['submit'])) {
		$correo= $_POST['correo'];
		
		if (!empty($correo)) {
			$correo	= filter_var($correo, FILTER_SANITIZE_EMAIL);
			if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
				$errores .='Por favor ingresa un correo valido <br />';
			} 
			
		}else {
			$errores .= 'Por favor ingresa un correo electronico <br />';
		}

		$selector = bin2hex(random_bytes(8));
		$token = bin2hex(random_bytes(32));
		$url="localhost/yourhands/forgottenpwd/create-new-password.php?selector=".$selector."&validator=".$token;
		$expires=date("U")+1800;
		$sql="DELETE FROM pwdReset WHERE pwdResetEmail=:email";


		try {
			$statement = $conexion->prepare('select * from usuarios where usuario= :id');
			$statement->execute(array(':id' => $correo));
			$resultados = $statement->fetch();

			if ($resultados != false) {
				try {
					$statement=$conexion->prepare($sql);
					$statement->execute(array(':email'=>$correo));


					$hashedToken= encrypPassword($token);
					$statement=$conexion->prepare('INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?)');
					$statement->execute(array($correo, $selector, $hashedToken, $expires));
					$to=$correo;
					$subject= 'Cambia tu contrasena En Tus Manos';
					$message= '<p>Recibimos una solicitud de cambio de contraseña. Si tu no has hecho el pedido puedes ignorar este email</p>';
					$message.= '<p>Este es tu enlace para el cambio de contrasena: </br>';
					$message.= '<a href="'.$url.'">' .$url.'</a></p>';
					$headers="From: En Tus Manos <isaactoo@hotmail.es> \r\n";
					$headers.="Reply-To: isaactoo@hotmail.es\r\n";
					$headers.="Conent-type: text/html\r\n";
					
					$mail= new PHPMailer(true);
					// $mail->SMTPDebug=1;
					$mail->isSMTP();
					$mail->Host='smtp.gmail.com';
					$mail->SMTPAuth=true;
					$mail->Username='entusmanosugb@gmail.com';
					$mail->Password='Entusmanos1234';
					$mail->SMTPSecure='tls';
					$mail->Port=587;


					$mail->setFrom('isaacfunesmartinez@gmail.com');
					$mail->addAddress($correo, $correo);
					$mail->Subject =$subject;
					$mail->isHTML(true);
					$mail->Body =$message;

					if ($mail->send()) {
						$enviado=true;
					}else{
						$errores="Hubo un error <br>";
					}

					// mail($to, $subject, $message, $headers);
					// $enviado=true;

				} catch (PDOException $e) {
					echo "Error " .$e;
				}

				// $enviado=true;
				
			} else{
				$errores .= 'Correo electronico no registrado';
			}

			} catch (PDOException $e) {
				echo "Error: ". $e->getMessage();
		}
	}


	require 'views/recuperar.view.php';



 ?>