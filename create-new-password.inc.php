<?php 
	if (isset($_POST['submit'])) {
		
		$selector = $_POST['selector'];
		$validator = $_POST['validator'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];

		if (empty($password) || empty($password2)) {
			header("Location: /forgottenpwd/create-new-password.php?newpwd=empy");
			exit();
		} else if ($password != $password2) {
			header("Location: /forgottenpwd/create-new-password.php?newpwd=pwdnotsame");
			exit();
		}

		$currenDate = date("U");
		require 'extras/conexion.php';
		require 'extras/funciones.php';
		try {
			$statement = $conexion->prepare('select * from pwdreset where pwdResetSelector=? and pwdResetExpires>= ?');
			$statement->execute(array($selector, $currenDate));

			
			if (($row=$statement->fetch(PDO::FETCH_ASSOC))==false) {
				echo "Necesitas reenviar tu solicitud 1";
				
			} else {
				$token = $validator;
				$tokenCheck = password_verify($token, $row['pwdResetToken']);

				if ($tokenCheck == false) {
					echo "Error";
				} else if ($tokenCheck == true) {
					$tokenEmail = $row['pwdResetEmail'];
					try {
						$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario= :id');
						$statement->execute(array(':id' => $tokenEmail));
						$result=$statement->fetch();
						if ($row =$statement->fetchAll(PDO::FETCH_ASSOC)) {
							echo "Error ";
							exit();
						} else {
							try {
								$password=encrypPassword($password);
								$statement = $conexion->prepare('UPDATE usuarios SET password = :pass WHERE usuario = :id');
								$statement->execute(array(':pass'=>$password,':id' => $tokenEmail));
								
								
								$statement = $conexion->prepare('delete from pwdreset WHERE pwdResetEmail=?');
								$statement->execute(array($tokenEmail));
									header("Location: login.php?newpwd=passwordupdated");

								

							} catch (PDOException $e) {
								echo "Eror ". $e;
						}
					}
					} catch (PDOException $e) {
						echo "Eror ". $e;
					}
				}
			}
		} catch (PDOException $e) {
			echo "Eror ". $e;
		}


	} else {
		header("Location: index.php");
	}

 ?>