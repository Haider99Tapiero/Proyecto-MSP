<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		
	
	</header>
	<section>
		
	<?php
  include ("conexion.php");
     $consulta="select * from plato where idPlato=".$_GET['id'];
 	 $query=mysqli_query($conexion, $consulta); 
  		while ($f=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
  	?>
			
			<center>
				<img class="rounded float-left" src="./productos/<?php echo $f['imagen'];?>" height="45" ><br>
				<span><?php echo $f['nombre'];?></span><br>
                <span>Precio: <?php echo $f['descripcion'];?></span><br>
				<span>Precio: <?php echo $f['precio'];?></span><br>
				<a href="./carritodecompras.php?id=<?php  echo $f['idPlato'];?>">Añadir al carrito de compras</a>
			</center>
		
	<?php
		}
	?>
		
	</section>
</body>
</html>