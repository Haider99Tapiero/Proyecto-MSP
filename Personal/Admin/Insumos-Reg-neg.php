<?php
	
	session_start();

	$CategoriaInsumo = $_POST["CategoriaInsumo"];
	$Proveedor = $_POST["Proveedor"];
	$cantidad =	$_POST["cantidad"];
	$unidad_medida = $_POST["unidad_medida"];
	$descripcion = $_POST["descripcion"];
	$Empleados_id = $_POST["Empleados_id"];

		include ('conexion.php');
		$sql ="INSERT INTO Pedido_Insumos (CategoriaInsumo_idCategoria,Proveedor_idProveedor,cantidad,unidad_medida,descripcion,Empleados_idEmpleados) 
		VALUES ('$CategoriaInsumo','$Proveedor','$cantidad','$unidad_medida','$descripcion','$Empleados_id')";

		if(!$result = $db-> query($sql))
		{
			die('No conecta [' . $db->error . ']');
		}

		$_SESSION["kkk"] = "";

		header ("location: Insumos-Reg.php");
?>