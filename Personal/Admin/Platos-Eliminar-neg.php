<?php
	session_start();

	include ('conexion.php');

	if(isset($_POST["idPlato"])){

		$idPlato = $_POST['idPlato'];

		$sql = "DELETE FROM plato WHERE idPlato = '$idPlato'";
		if (!$result = $db->query($sql))
		{
		    $response['status'] = '2';
            echo json_encode($response);
		    //die('No hace consulta a platos ['.$db->error.']');
		}else{
			$response['status'] = '1';
            echo json_encode($response);
		}

	}else{
		echo "SE ENTRO DIRECTO A ESTA PAGINA";
	}
?>