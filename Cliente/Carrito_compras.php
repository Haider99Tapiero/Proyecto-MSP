<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<script type="text/javascript"  href="./js/scripts.js"></script>
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
    
</head>
<body>
	<header>
    
	</header>
	<div class="form-group"></div>
	<section>
    <div class="container">
        <table class="table table-striped">
            <thead><tr><th>Producto</th><th>Nombre</th><th>Descripcion</th><th>Accion</th></tr></thead>
            
	<?php
  include ("conexion.php");
     $consulta="select * from plato";
 	 $query=mysqli_query($conexion, $consulta); 
  		while ($f=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
            
  	?>
    
  
   	
    	<tbody><tr>
        <td><img class="rounded float-left" src="./productos/<?php echo $f['imagen'];?>" height="45" ></td>
        <td><span><?php echo $f['nombre'];?></span><br></td>
        <td><a class="btn btn-info" href="./detalle.php?id=<?php echo $f['idPlato'];?>">ver</a></td>
        <td><a class="btn btn-warning"  href="./carritodecompras.php?id=<?php  echo $f['idPlato'];?>"><i class="fas fa-cart-plus"></i></a></td>
        </tr>
       
           
    	
    	
		
   		
  	
 	<?php
 	 }
 	?>
            <tr>
            <td>
                <a class="btn btn-info col-md-3" href="carritodecompras.php"><i class="fas fa-shopping-bag"></i></a>
            </td>
        </tr>
        </tbody>
        </table>
    </div>
		
	</section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>