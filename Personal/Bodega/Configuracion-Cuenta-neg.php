<?php
	session_start();

	include ('Conexion.php');

	$direccion = $_POST["direccion"];
	$email = $_POST["email"];
	$telefono = $_POST["telefono"];
	$contrasena = $_POST["contrasena"];
	$id = $_SESSION["ID"];

	$sql = "UPDATE Empleados SET direccion='$direccion', email='$email', telefono='$telefono', contrasena='$contrasena'WHERE idEmpleados='$id' ";

	if (!$result = $db-> query($sql)){
		die('Error en consulta ['.$db->error.']');
	}

	$_SESSION["ACTU"] = "";

	header('Location: Configuracion-Cuenta.php');
?>