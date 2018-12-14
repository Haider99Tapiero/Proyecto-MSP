<?php
	session_start();
	$connect = mysqli_connect("localhost","root","","Restaurante");

	sleep(1);

	if(isset($_POST["nom"]) && isset($_POST["apell"]) && isset($_POST["direc"]) && isset($_POST["emai"]) && isset($_POST["tele"]) && isset($_POST["tipdoc"]) && isset($_POST["docu"]) && isset($_POST["contr"])) {

		// PASAMOS LOS DATOS OBTENIDOS DEL INDEX HACIA VARIBLES LOCALES(REGISTRARSE.PHP)
		$nom = mysqli_real_escape_string($connect, $_POST["nom"]);
		$apell = mysqli_real_escape_string($connect, $_POST["apell"]);
		$direc = mysqli_real_escape_string($connect, $_POST["direc"]);
		$emai = mysqli_real_escape_string($connect, $_POST["emai"]);
		$tele = mysqli_real_escape_string($connect, $_POST["tele"]);
		$tipdoc = mysqli_real_escape_string($connect, $_POST["tipdoc"]);
		$docu = mysqli_real_escape_string($connect, $_POST["docu"]);
		$contr = mysqli_real_escape_string($connect, $_POST["contr"]);
		$contr_cifrado = password_hash($contr,PASSWORD_DEFAULT);

		// CONSULTAMOS SI EXISTE USUARIOS REGISTRADOS CON EL MISMO CORREO
		$sql2 = "SELECT email FROM cliente WHERE email = '$emai' ";

		$result2 = mysqli_query($connect, $sql2);
		$num_row2 = mysqli_num_rows($result2);

		if ($num_row2 == "1") {

			$response['statuss'] = '1';
			echo json_encode($response);
		
		}
		else if ($num_row2 == "0") {

			$sql = "INSERT INTO cliente (nombre,apellido,documento,direccion,email,telefono,contrasena,tipodocumento_idtipodocumento)
							VALUES ('$nom','$apell','$docu','$direc','$emai','$tele','$contr_cifrado','$tipdoc')";

			if (mysqli_query($connect,$sql)) { 
				
				$response['statuss'] = '2';
				echo json_encode($response);

			} else {

			   // ERROR EN CONSULTA 
			
			}

		}

	} else {

	 	echo "SE ENTRO DIRECTO A ESTA CAPA";
	}
?>