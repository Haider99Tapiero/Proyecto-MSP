<?php 
	include ('S_Vendedor.php');

	if (isset($_SESSION["ACTU"])) {
        echo "<script>alert('Actualizado correctamente');</script>";
        unset($_SESSION["ACTU"]);
    }
?>
<!DOCTYPE html>
<html>
<head>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<title></title>
	<style type="text/css">
		.input-group{
			margin-bottom: 10px;
		}
		p{
			font-weight: bold;
		}
	</style>
</head>
<body>
	<?php
		require('Menu-Bodega.php')
	?>
	<div class="container">
		<?php 
			include ('Conexion.php');

			$id = $_SESSION["ID"];

			$sql = "SELECT * FROM Empleados WHERE idEmpleados = '$id'";

			if (!$result = $db-> query($sql)) 
			{	
				die('No hace consulta a empleados [' . $db->error . ']');
			}
			while ($row = $result->fetch_assoc()) 
			{
				$nnombre=stripcslashes($row["nombre"]);
				$aapellido=stripslashes($row["apellido"]);
				$ddocumento=stripslashes($row["documento"]);
				$ddireccion=stripslashes($row["direccion"]);
				$eemail=stripslashes($row["email"]);
				$ttelefono=stripslashes($row["telefono"]);
				$ccontrasena=stripslashes($row["contrasena"]);			
			}
		?>
		<form class="col-md-12" method="post" action="Configuracion-Cuenta-neg.php">
			<div class="input-group">
				<p>Nombre: </p>
				<input disabled type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nnombre ?>">
			</div>
			<div class="input-group">
				<p>Apellido: </p>
				<input disabled type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $aapellido ?>">
			</div>
			<div class="input-group">
				<p>Documento: </p>
				<input disabled type="text" class="form-control" name="documento" id="documento" value="<?php echo $ddocumento ?>">
			</div>
			<div class="input-group">
				<p>Direccion: </p>
				<input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $ddireccion ?>">
			</div>
			<div class="input-group">
				<p>Email: </p>
				<input type="text" class="form-control" name="email" id="email" value="<?php echo $eemail ?>">
			</div>
			<div class="input-group">
				<p>Telefono: </p>
				<input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $ttelefono ?>">
			</div>
			<div class="input-group">
				<p>Contraseña: </p>
				<input type="text" class="form-control" name="contrasena" id="contrasena" value="<?php echo $ccontrasena ?>">
			</div>
			<div class="input-group">
				<input type="submit" class="btn btn-success" value="Aceptar">
			</div>
		</form>
	</div>
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>