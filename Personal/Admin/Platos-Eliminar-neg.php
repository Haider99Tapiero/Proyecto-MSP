<?php

	session_start();

	include ('conexion.php');

	$idPlato = $_REQUEST['idPlato'];

	$sql = "DELETE FROM Plato where idPlato = '$idPlato'";
	if (!$result = $db->query($sql))
	{
	    die('No hace consulta a Usuarios ['.$db->error.']');
	}

	$_SESSION["Plato_eliminar_ok"] = "";

    header ("location: Platos-Crear.php");

?>