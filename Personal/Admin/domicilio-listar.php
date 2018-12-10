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
    <title>Inicio</title>
</head>
<body>
	<header>
		<?php
			session_start();
			include("Menu-Admin.php");
		?>
	</header>
	<?php
		include ('conexion.php');
		if (isset($_GET['id'])) {
	?>
			<div id="modal" class="" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button id="tacha" type="button" class="close" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<table class="table table-striped">
									<thead>
										<th>Producto</th>
										<th>Preciop</th>
										<th>Cantidad</th>
										<th>SubTotal</th>
									</thead>
									<tbody>
	<?php

			$id = $_GET['id'];
		    $sql2 = "SELECT * FROM `compras` WHERE numeroventa = '$id'";
			if(!$result2 = $db-> query($sql2))
			{
				die('No conecta [' . $db->error . ']');
			}			
			
			while ($row2 = $result2->fetch_assoc())
			{
				$nnombre=stripslashes($row2["nombre"]); 
				$pprecio=stripslashes($row2["precio"]);
				$ccantidad=stripslashes($row2["cantidad"]);
				$ssubtotal=stripslashes($row2["subtotal"]);

				echo "<tr>";
					echo "<td>$nnombre</td>";
					echo "<td>$pprecio</td>";
					echo "<td>$ccantidad</td>";
					echo "<td>$ssubtotal</td>";
				echo "</tr>";
			}
		}
	?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
	<div class="container col-md-10">
		<table class="table table-striped">
			<thead>
				<tr>	
					<th>Numero de venta</th>
	          		<th>ver</th>
					<th>P. en la venta</th>
					<th>Total</th>
		        </tr>
			</thead>
			<tbody>
				<?php
					class Domicilio
					{
						public function listar()
						{
							include ('conexion.php');
							$sql = "SELECT *, COUNT(cantidad) AS totalcol, SUM(precio) AS totalpagar FROM `compras` GROUP BY numeroventa ";

							if(!$result = $db-> query($sql))
							{
								die('No conecta [' . $db->error . ']');
							}			
							
							while ($row = $result->fetch_assoc())
							{
								$iid=stripslashes($row["id"]);
								$nnumeroventa=stripslashes($row["numeroventa"]);
								$nnombre=stripslashes($row["nombre"]); 
								$pprecio=stripslashes($row["precio"]);
								$ccantidad=stripslashes($row["cantidad"]);
								$ssubtotal=stripslashes($row["subtotal"]);
								$totalcol=stripslashes($row["totalcol"]);
								$totalpagar=stripslashes($row["totalpagar"]);
																
				        		echo "<tr>";
									echo "<td>$nnumeroventa</td>";
									echo "<td><a class='btn btn-info' href='domicilio-listar.php?id=$nnumeroventa'><i class='fas fa-eye'></i></a></td>";
					          		echo "<td>$totalcol</td>";
					          		echo "<td>$totalpagar</td>";
								echo "</tr>";

					      	}
						}
					}
					$nuevo=new Domicilio();
					$nuevo->listar()
				?>
			</tbody>
		</table>


	</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#tacha").click(function(){
			    $("#modal").addClass("modal");
			});
    	});
    </script>

</body>
</html>