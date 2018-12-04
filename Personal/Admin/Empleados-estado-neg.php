<?php
	session_start();

	include ('conexion.php');

	if(isset($_POST["idemple"]) && isset($_POST["estado"])){

		$idemple = $_POST['idemple'];
		$estado = $_POST['estado'];

		$sql = "UPDATE empleados SET estado_idestado = '$estado' WHERE idempleados = '$idemple'";
		if (!$result = $db->query($sql))
		{
		    die('No hace consulta a empleados ['.$db->error.']');
		    $response['status'] = '2';
            echo json_encode($response);
		}else{
			$response['status'] = '1';
            echo json_encode($response);
		}

	}else{
		echo "SE ENTRO DIRECTO A ESTA PAGINA";
	}
?>