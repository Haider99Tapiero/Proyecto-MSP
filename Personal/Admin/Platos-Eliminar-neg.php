<?php
	session_start();

	include ('conexion.php');

	if(isset($_POST["idPlato"])){

		$idPlato = $_POST['idPlato'];

		$sql = "DELETE FROM Plato where idPlato = '$idPlato'";
		if (!$result = $db->query($sql))
		{
		    die('No hace consulta a Usuarios ['.$db->error.']');
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