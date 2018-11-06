<?php 
	include ('S_Admin.php')
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="utf-8">
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
		require('Menu-Admin.php');
	?>
	<div class="container">
		<table class="table table-striped" border='1'>
			<thead>
				<tr>
					<th>Id</th>
					<th>Categoria</th>
					<th>Proveedor</th>
					<th>cantidad</th>
	          		<th>Unidad de medida</th>
					<th>Descripcion</th>
					<th>Empleado</th>
		        </tr>
			</thead>
			<tbody>
				<?php
					class Usuario
					{
						public function listar()
						{
							include ('conexion.php');

							$sql ="SELECT * FROM pedido_insumos ";

							if(!$result = $db-> query($sql))
							{
								die('No conecta [' . $db->error . ']');
							}			
							
							while ($row = $result->fetch_assoc())
							{
								$iid=stripslashes($row["idPedidoInsumos"]);
								$CCategoriaInsumo_idCategoria=stripslashes($row["CategoriaInsumo_idCategoria"]);
								$PProveedor_idProveedor=stripslashes($row["Proveedor_idProveedor"]);
								$ccantidad=stripslashes($row["cantidad"]);
								$uunidad_medida=stripslashes($row["unidad_medida"]); 
								$ddescripcion=stripslashes($row["descripcion"]); 
								$EEmpleados_idEmpleados=stripslashes($row["Empleados_idEmpleados"]); 
								
								$sql3 ="SELECT * FROM categoriainsumo WHERE idCategoria = '$CCategoriaInsumo_idCategoria'";

								if(!$result3 = $db-> query($sql3))
								{
									die('No conecta [' . $db->error . ']');
								}
								while ($row3 = $result3->fetch_assoc())
								{
									$ddescripcion_categoria=stripslashes($row3["descripcion"]);
								}
								
								$sql4 ="SELECT * FROM proveedor WHERE idProveedor = '$PProveedor_idProveedor' ";

								if(!$result4 = $db-> query($sql4))
								{
									die('No conecta [' . $db->error . ']');
								}
								while ($row4 = $result4->fetch_assoc())
								{
									$nnombrepro=stripslashes($row4["nombre"]);
								}
								
								$sql2 ="SELECT * FROM empleados WHERE idEmpleados = '$EEmpleados_idEmpleados' ";
								
								if(!$result2 = $db-> query($sql2))
								{
									die('No conecta [' . $db->error . ']');
								}
								while ($row2 = $result2->fetch_assoc())
								{
									$nnombre=stripslashes($row2["nombre"]);
								}
								
				        		echo "<tr>";
				        			echo "<td>$iid</td>";
									echo "<td>$ddescripcion_categoria</td>";
									echo "<td>$nnombrepro</td>";
									echo "<td>$ccantidad</td>";
									echo "<td>$uunidad_medida</td>";
									echo "<td>$ddescripcion</td>";
					          		echo "<td>$nnombre</td>";
								echo "</tr>";
					      	}
						}
					}
					$nuevo=new Usuario();
					$nuevo->listar()
				?>
			</tbody>
	</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>