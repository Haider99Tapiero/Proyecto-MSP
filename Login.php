<?php
	session_start();
	$connect = mysqli_connect("localhost","root","","restaurante");

	sleep(1);

	if(isset($_POST["docu"]) && isset($_POST["pass"])){

		$docu = mysqli_real_escape_string($connect, $_POST["docu"]);
		$pass = mysqli_real_escape_string($connect, $_POST["pass"]);

		// CONSULTAMOS LA TABLA DE CLIENTE
		$sql = "SELECT idcliente, nombre FROM cliente WHERE documento='$docu' AND contrasena='$pass'";

		$result = mysqli_query($connect, $sql);
		$num_row = mysqli_num_rows($result);

		// CONSULTAMOS LA TABLA DE EMPLEADOS
		$sql2 = "SELECT idempleados, nombre, rol, estado_idestado FROM empleados INNER JOIN roles ON empleados.roles_idroles = roles.idroles WHERE documento='$docu' AND contrasena='$pass'";

		$result2 = mysqli_query($connect, $sql2);
		$num_row2 = mysqli_num_rows($result2);

		// ------------------------------------------------------- //


		// ENVIAMOS LA RESPUESTA A EL INDEX POR PARTE DE LA TABLA CLIENTE
		if ($num_row == "1") {

			$data = mysqli_fetch_array($result);
			// SACAMOS LOS DATOS QUE QUEREMOS DE LA PERSONA QUE SE AUTENTIFICA
			$_SESSION["estado_cliente"] = "1";
			$_SESSION["nombre"] = $data["nombre"];
            $_SESSION['idcliente']=$data["idcliente"];
			// ENVIAMOS DE RESPUESTA
			$response['status'] = '1';
			echo json_encode($response);

		} else {

			//echo "NO EXISTE UN USUARIO CON ESOS DATOS EN CLIENTES";
		
		}

		// ENVIAMOS LA RESPUESTA A EL INDEX POR PARTE DE LA TABLA USUARIOS
		$data2 = mysqli_fetch_array($result2);
		$estado = $data2["estado_idestado"];
		if ($num_row2 == "1" && $estado == "1") {
				
			// SACAMOS LOS DATOS QUE QUEREMOS DE LA PERSONA QUE SE AUTENTIFICA
			$_SESSION["idempleado"] = $data2["idempleados"];
			$_SESSION["nombre"] = $data2["nombre"];
			$_SESSION["rol"] = $data2["rol"];
			// ENVIAMOS LA RESPUESTA A EL INDEX

			$rol = $data2["rol"];

			if ($rol == "Admin")  {
				$_SESSION["estado_admin"] = "1";
				// ENVIAMOS DE RESPUESTA
				$response['status'] = '2';
				echo json_encode($response);

			}else if ($rol == "Cajero") {
				$_SESSION["estado_cajero"] = "1";
				// ENVIAMOS DE RESPUESTA
				$response['status'] = '3';
				echo json_encode($response);

			}

		} elseif ($num_row2 == "1" && $estado == "2") {

			$response['status'] = '5';
			echo json_encode($response);

		}

		if ($num_row == "0" && $num_row2 == "0") {

			$response['status'] = '4';
			echo json_encode($response);
			
		} else {

			//echo "Ni puta idea";

		}


	} else {

	 	echo "SE ENTRO DIRECTO A ESTA CAPA";
	}
?>