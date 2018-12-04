<?php
	class Registro
	{
		public function registrar($cantidad,$forma_pago_idforma_pago,$Mesas_idMesas,$Plato_idPlato)
		{
			session_start();

			include ('conexion.php');

			date_default_timezone_set('America/Bogota');
        	$Fecha = date("Y-m-d");  

			$sql ="INSERT INTO detalle_presencial (fecha_venta, cantidad, forma_pago_idforma_pago, Mesas_idMesas, Plato_idPlato) 
			VALUES ('$Fecha','$cantidad','$forma_pago_idforma_pago','$Mesas_idMesas','$Plato_idPlato')";
			if(!$result = $db-> query($sql))
			{
				die('No conecta [' . $db->error . ']');
			}
			
			$_SESSION["Plato_crear_ok"] = "";

        	header ("location: Venta-Reg.php");

		}
	}
	$nuevo = new Registro();
	$nuevo->registrar($_POST["cantidad"],$_POST["idforma_pago"],$_POST["Mesas_idMesas"],$_POST["Plato_idPlato"])
?>