<?php
	class Registro
	{
		public function registrar($cantidad,$unidad_medida,$descripcion,$categoriainsumo_idcategoriainsumo,$empleados_idempleados,$proveedoer_idproveedor)
		{
			session_start();

			include ('conexion.php');

		  

			$sql ="INSERT INTO pedido_insumos (cantidad, unidad_medida, descripcion,categoriainsumo_idcategoria,empleados_idempleados,proveedor_idproveedor) 
			VALUES ('$cantidad','$unidad_medida','$descripcion','$categoriainsumo_idcategoriainsumo','$empleados_idempleados','$proveedoer_idproveedor')";
			if(!$result = $db-> query($sql))
			{
				die('No conecta [' . $db->error . ']');
			}
			
			$_SESSION["Plato_crear_ok"] = "";

        	header ("location: Insumos-Reg.php");

		}
	}
	$nuevo = new Registro();
	$nuevo->registrar($_POST["cantidad"],$_POST["unidad_medida"],$_POST["descripcion"],$_POST["categoriainsumo_idcategoriainsumo"],$_POST["empleados_idempleados"], $_POST["proveedor_idproveedor"])
?>