<!DOCTYPE html>
<html>
<head>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<title></title>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
				<div class="form-group">
					<label for="fecha">Buscar por fecha: </label>
					<input class="form-control" type="date" id="fecha" name="fecha">
					<input class="btn btn-primary" type="submit" name="fecha-enviar" value="Buscar">
				</div>
			</form>
		</div>
		<br>
		<div class="row">
			<table class="table table-striped" border='1'>
				<thead>
					<tr>
						<th>Id</th>
						<th>Fecha</th>
						<th>Cantidad</th>
		          		<th>Empleado</th>
						<th>Plato</th>
		          		<th>Mesa</th>	
			        </tr>
				</thead>
				<tbody>
					<?php
						class Ventas
						{
							public function listar()
							{
								include ('conexion.php');

								$sql ="SELECT * FROM detalle_presencial ";
								
								if (isset($_POST['fecha-enviar'])) {
									$Fecha_Con = $_POST['fecha_venta'];
									$sql ="SELECT * FROM detalle_presencial WHERE fecha_venta = '$Fecha_Con' ";
								}

								if (isset($_POST['mostrar_todo'])) {
									$sql ="SELECT * FROM detalle_presencial ";
								}



								if(!$result = $db-> query($sql))
								{
									die('No hace consulta a ventas [' . $db->error . ']');
								}		
								while ($row = $result->fetch_assoc())
								{
									$iid=stripcslashes($row["iddetalle_presencial"]);
									$ffecha=stripslashes($row["fecha_venta"]);
									$ccantidad=stripslashes($row["cantidad"]);
									$fforma_pago_idformapago=stripslashes($row["forma_pago_idforma_pago"]);
									$MMesas_idMesas=stripslashes($row["mesas_idmesas"]);
									$PPlato_idPlato=stripslashes($row["plato_idplato"]);
									
									 
									$sql2 ="SELECT * FROM forma_pago WHERE idforma_pago = '$fforma_pago_idformapago'";

									if(!$result2 = $db-> query($sql2))
									{
										die('No conecta [' . $db->error . ']');
									}
									while ($row2 = $result2->fetch_assoc())
									{
										$nnombre=stripslashes($row2["descripcion"]);
									}

									$sql3 ="SELECT * FROM mesas  WHERE idmesas = '$MMesas_idMesas'";
									
									if(!$result3 = $db-> query($sql3))
									{
										die('No conecta [' . $db->error . ']');
									}
									while ($row3 = $result3->fetch_assoc())
									{
										$mmesa=stripslashes($row3["mesa"]);
									}

									$sql4 ="SELECT * FROM plato WHERE idPlato = '$PPlato_idPlato'";
									
									if(!$result4 = $db-> query($sql4))
									{
										die('No conecta [' . $db->error . ']');
									}
									while ($row4 = $result4->fetch_assoc())
									{
										$nnombreplato=stripslashes($row4["nombre"]);
									}
									
									
									
					        		echo "<tr>";
					        			echo "<td>$iid</td>";
										echo "<td>$ffecha</td>";
										echo "<td>$ccantidad</td>";
						          		echo "<td>$nnombre</td>";
										echo "<td>$nnombreplato</td>";
						          		echo "<td>$mmesa</td>";
					        		echo "</tr>";	
								}
							}
						}
						$nuevo=new Ventas();
						$nuevo->listar();
					?>
				</tbody>
			</table>
		</div>
		<div class="row">
			<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
				<div class="form-group">
					<input class="btn btn-info" type="submit" name="mostrar_todo" value="Mostar todo">
				</div>
			</form>
		</div>
	</div>
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>