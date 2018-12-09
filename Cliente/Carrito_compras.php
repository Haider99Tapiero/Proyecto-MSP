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
		 session_start();
	 include("../menu-cliente.php");
	 ?>
 </header>
	<section>
		
	<?php
  include ("conexion.php");
     $consulta="select * from plato";
 	 $query=mysqli_query($conexion, $consulta); 
  		while ($f=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
  	?>

   <div class="producto">
   	<center>
   		<span><?php echo $f['nombre'];?></span><p>
    	<img src="./productos/<?php echo $f['imagen'];?> " height="150"><p>
    	<a class="btn btn-info col-3" href="./detalle.php?id=<?php echo $f['idPlato'];?>"><i class="fas fa-eye"></i></a>

		<a class="btn btn-success" href="./carritodecompras.php?id=<?php  echo $f['idPlato'];?>">Añadir  </a>
  		<p>
   		</center>
  	</div>
 	<?php
 	 }
 	?>
		
	</section>
</body>
</html>