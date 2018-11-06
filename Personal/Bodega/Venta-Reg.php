<?php 
	include ('S_Vendedor.php');

	if (isset($_SESSION["Plato_crear_ok"])) {
        echo "<script>alert('Creado correctamente');</script>";
        unset($_SESSION["Plato_crear_ok"]);
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        .input-group{
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
	<?php 
		require ('Menu-Bodega.php');
	?>
	<div class="container">
		<form class="col-md-4" name="form1" method="post" action="Venta-Reg-neg.php">
			<div class="input-group">
		  		<label>Cantidad</label>
           		<input class="form-control" name="cantidad" type="text" id="cantidad" required/>
			</div>
			<div class="input-group">
				<label>Nombre Empleado</label>
				<select class="form-control" name="Empleados_idEmpleados" id="Empleados_idEmpleados" required="required">
           			<option value="Seleccione:">Seleccione:</option>
					<?php
						include ('conexion.php');
						$sql2 ="SELECT * FROM empleados WHERE Roles_idRoles = 4 ";
						if(!$result2 = $db-> query($sql2))
						{
							die('No conecta [' . $db->error . ']');
						}
						while ($row2 = $result2->fetch_assoc())
						{
							$EEmpleados_idEmpleados=stripslashes($row2["idEmpleados"]);
							$nnombre=stripslashes($row2["nombre"]);
							echo "<option value=$EEmpleados_idEmpleados>$nnombre</option>";
						}
					?>
            	</select>
			</div>
			<div class="input-group">
				<label>Plato</label>
				<select class="form-control" name="Plato_idPlato" id="Plato_idPlato" required>
	             	<option value=Seleccione:>Seleccione:</option>
		            <?php
						include ('conexion.php');
						$sql3 ="SELECT * FROM plato ";
						if(!$result3 = $db-> query($sql3))
						{
							die('No conecta [' . $db->error . ']');
						}
						while ($row3 = $result3->fetch_assoc())
						{
							$PPlato_idPlato=stripslashes($row3["idPlato"]);
							$nnombre=stripslashes($row3["nombre"]);
							echo "<option value=$PPlato_idPlato>$nnombre</option>";
						}
					?>
	            </select>
			</div>
			<div class="input-group">
				<label>Mesa</label>
	            <select class="form-control" name="Mesas_idMesas" id="Mesas_idMesas" required>
	              	<option value=Seleccione:>Seleccione:</option>
		            <?php
						include ('conexion.php');
						$sql4 ="SELECT * FROM mesas ";
						if(!$result4 = $db-> query($sql4))
						{
							die('No conecta [' . $db->error . ']');
						}
						while ($row4 = $result4->fetch_assoc())
						{
							$MMesas_idMesas=stripslashes($row4["idMesas"]);
							$mmesa=stripslashes($row4["mesa"]);
							echo "<option value=$MMesas_idMesas>$mmesa</option>";
						}
					?>
	            </select>
			</div>
			<div class="input-group">
            	<input class="btn btn-success" type="submit" name="Submit" value="Finalizar Venta"/>
			</div>
    		<div class="input-group">
          		<a class="btn btn-danger" href="xxxxx">cancelar</a>
    		</div>
    	</form>
	</div>
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>