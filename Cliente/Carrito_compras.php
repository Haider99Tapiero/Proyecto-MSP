<?php 
	include("../Seguridad-cliente.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
	<link rel="stylesheet" href="../menuclient.css">
</head>
<body>
	<header>
	 	<?php
			
			include("Menu-cliente.php");
			include ("conexion.php");
		?>
 	</header>
 	
<div class="container col-md-10">
	<?php
		if (isset($_GET['id'])) {
		    $consulta="select * from plato where idPlato=".$_GET['id'];
		 	$query=mysqli_query($conexion, $consulta); 
		  	while ($f=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
  	?>
		<div id="modal" class="" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button id="tacha" type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div>
									<img style="border-radius:5px" src="./productos/<?php echo $f['imagen'];?>" width="220" height="250">
								</div>
							</div>
							<div class="col-md-6">
								<div>
									<div>
										<h5>Nombre:</h5>
									</div>
									<div>
										<p><?php echo $f['nombre'];?></p>
									</div>
									<!--///////-->
									<div>
										<h5>Descripcion:</h5>	
									</div>
									<div>
										<p><?php echo $f['descripcion'];?></p>
									</div>
									<!--///////-->
									<div>
										<h5>Precio:</h5>	
									</div>
									<div>
										<p><?php echo $f['precio'];?></p>
									</div>
								</div >
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php 
  			}
  		}
	?>

	<?php
	  	
	    $consulta="select * from plato";
	 	$query=mysqli_query($conexion, $consulta); 
	  	while ($f=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
  	?>

   	<div class="producto">
	   	<center>
	   		<span><?php echo $f['nombre'];?></span>
			<br><br>
	    	<img src="./productos/<?php echo $f['imagen'];?> " height="150">
	    	<br><br>
	    	<a class="btn btn-info col-3" href="Carrito_compras.php?id=<?php echo $f['idPlato'];?>"><i class="fas fa-eye"></i></a>
			<a class="btn btn-success" href="./carritodecompras.php?id=<?php  echo $f['idPlato'];?>">Añadir  </a>
	   	</center>
  	</div>

 	<?php
 		}
 	?>

	
	</div>
	   <footer class="bg-black small text-center text-white-50">
      <div class="container">
        Copyright &copy; Your Website 2018
      </div>
    </footer>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="js/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#tacha").click(function(){
			    $("#modal").addClass("modal");
			});
    	});
    </script>
</body>
</html>