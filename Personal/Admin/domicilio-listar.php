<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" type="text/css" href="css/platos.css">
    <title>Inicio</title>
</head>
<body>
	<div class="container">
		<?php 
			require('Menu-Admin.php');
		?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nurero de venta</th>
	          		<th>Nombre</th>
					<th>Imagen</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Subtotal</th>
					<th>Cliente</th>
		        </tr>
			</thead>
			<tbody>
				<?php
					class Domicilio
					{
						public function listar()
						{
							include ('conexion.php');

							$sql ="SELECT * FROM compras ";

							if(!$result = $db-> query($sql))
							{
								die('No conecta [' . $db->error . ']');
							}			
							
							while ($row = $result->fetch_assoc())
							{
								$iid=stripslashes($row["id"]);
								$nnumeroventa=stripslashes($row["numeroventa"]);
								$nnombre=stripslashes($row["nombre"]); 
								$iimagen=stripslashes($row["imagen"]); 
								$pprecio=stripslashes($row["precio"]);
								$ccantidad=stripslashes($row["cantidad"]);
								$ssubtotal=stripslashes($row["subtotal"]); 
								$ccliente_idcliente=stripslashes($row["cliente_idcliente"]);
								
								$sql ="SELECT * FROM cliente WHERE idcliente = '$ccliente_idcliente' ";
								
								if(!$result2 = $db-> query($sql))
								{
									die('No hace consulta de clientes [' . $db->error . ']');
								}
								while ($row2 = $result2->fetch_assoc())
								{
									$nnombres=stripslashes($row2["nombre"]);
								}
								
				        		echo "<tr>";
				        			echo "<td>$iid</td>";
									echo "<td>$nnumeroventa</td>";
									echo "<td>$nnombre</td>";
									echo "<td>$iimagen</td>";
									echo "<td>$pprecio</td>";
					          		echo "<td>$ccantidad</td>";
									echo "<td>$ssubtotal</td>";
									echo "<td>$ccliente_idcliente</td>";
								echo "</tr>";
					      	}
						}
					}
					$nuevo=new Domicilio();
					$nuevo->listar()
				?>
			</tbody>
	</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>
</body>
</html>