<?php
	include("../Seguridad-cliente.php");
	include "conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
		<?php  
		include 'Menu-cliente.php';
		?>
	<section>
	
	<center><h1>Compra Finalizada</h1>
	<a href="./carritodecompras.php" title="ver carrito de compras">
			volver
		</a>
		</center>
	
	</section>
</body>
</html>