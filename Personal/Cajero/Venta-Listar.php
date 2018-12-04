<?php 
	include ('S_Vendedor.php')
?>
<!DOCTYPE html>
<html>
<head>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<title></title>
</head>
<body>
	<?php
		require('Menu-Bodega.php')
	?>
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

								$sql ="SELECT * FROM ventas ";
								
								if (isset($_POST['fecha-enviar'])) {
									$Fecha_Con = $_POST['fecha'];
									$sql ="SELECT * FROM ventas WHERE fecha = '$Fecha_Con' ";
								}

								if (isset($_POST['mostrar_todo'])) {
									$sql ="SELECT * FROM ventas ";
								}



								if(!$result = $db-> query($sql))
								{
									die('No hace consulta a ventas [' . $db->error . ']');
								}		
								while ($row = $result->fetch_assoc())
								{
									$iid=stripcslashes($row["idVentas"]);
									$ffecha=stripslashes($row["fecha"]);
									$ccantidad=stripslashes($row["cantidad"]);
									$EEmpleados_idEmpleados=stripslashes($row["Empleados_idEmpleados"]);
									$PPlato_idPlato=stripslashes($row["Plato_idPlato"]);
									$MMesas_idMesas=stripslashes($row["Mesas_idMesas"]);
									 
									$sql2 ="SELECT * FROM empleados WHERE idEmpleados = '$EEmpleados_idEmpleados'";

									if(!$result2 = $db-> query($sql2))
									{
										die('No conecta [' . $db->error . ']');
									}
									while ($row2 = $result2->fetch_assoc())
									{
										$nnombre=stripslashes($row2["nombre"]);
									}

									$sql3 ="SELECT * FROM plato WHERE idPlato = '$PPlato_idPlato'";
									
									if(!$result3 = $db-> query($sql3))
									{
										die('No conecta [' . $db->error . ']');
									}
									while ($row3 = $result3->fetch_assoc())
									{
										$nnombreplato=stripslashes($row3["nombre"]);
									}
									
									$sql4 ="SELECT * FROM mesas  WHERE idMesas = '$MMesas_idMesas'";
									
									if(!$result4 = $db-> query($sql4))
									{
										die('No conecta [' . $db->error . ']');
									}
									while ($row4 = $result4->fetch_assoc())
									{
										$mmesa=stripslashes($row4["mesa"]);
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