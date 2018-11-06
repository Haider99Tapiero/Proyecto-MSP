<?php
	class Registro
	{
		public function registrar($cantidad,$Empleados_idEmpleados,$Plato_idPlato,$Mesas_idMesas)
		{
			session_start();

			include ('conexion.php');

			date_default_timezone_set('America/Bogota');
        	$Fecha = date("Y-m-d");  

			$sql ="INSERT INTO ventas (fecha, cantidad, Empleados_idEmpleados, Plato_idPlato, Mesas_idMesas) 
			VALUES ('$Fecha','$cantidad','$Empleados_idEmpleados','$Plato_idPlato','$Mesas_idMesas')";
			if(!$result = $db-> query($sql))
			{
				die('No conecta [' . $db->error . ']');
			}
			
			$_SESSION["Plato_crear_ok"] = "";

        	header ("location: Venta-Reg.php");

		}
	}
	$nuevo = new Registro();
	$nuevo->registrar($_POST["cantidad"],$_POST["Empleados_idEmpleados"],$_POST["Plato_idPlato"],$_POST["Mesas_idMesas"])
?>