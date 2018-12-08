<?php
 session_start();
 include './conexion.php';
 if(isset($_SESSION['carrito'])){
  if(isset($_GET['id'])){
    $arreglo=$_SESSION['carrito'];
    $encontro=false;
    $numero=0;
    for($i=0;$i<count($arreglo);$i++){
     if($arreglo[$i]['Id']==$_GET['id']){
      $encontro=true;
      $numero=$i;
     }
    }
    if($encontro==true){
     $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
     $_SESSION['carrito']=$arreglo;
    }else{
     $nombre="";
     $precio=0;
     $imagen="";
     $re=mysqli_query($conexion,"select * from plato where idPlato=".$_GET['id']);
     while ($f=mysqli_fetch_array($re)) {
      $nombre=$f['nombre'];
      $precio=$f['precio'];
      $imagen=$f['imagen'];
     }
     $datosNuevos=array('Id'=>$_GET['id'],
         'Nombre'=>$nombre,
         'Precio'=>$precio,
         'Imagen'=>$imagen,
         'Cantidad'=>1);

     array_push($arreglo, $datosNuevos);
     $_SESSION['carrito']=$arreglo;
    }

   }

 }else{
  if(isset($_GET['id'])){
   $nombre="";
   $precio=0;
   $imagen="";
   $re=mysqli_query($conexion,"select * from plato where idPlato=".$_GET['id']);
   while ($f=mysqli_fetch_array($re)) {
    $nombre=$f['nombre'];
    $precio=$f['precio'];
    $imagen=$f['imagen'];
   }
   $arreglo[]=array('Id'=>$_GET['id'],
       'Nombre'=>$nombre,
       'Precio'=>$precio,
       'Imagen'=>$imagen,
       'Cantidad'=>1);
   $_SESSION['carrito']=$arreglo;
  }
 }
     
?>

<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8"/>
 <title>Carrito de Compras</title>
 <!--<link rel="stylesheet" type="text/css" href="./css/estilos.css">-->
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
 <script type="text/javascript"  src="./js/scripts.js"></script>
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
  <h1>Carrito de Compras</h1>
  <a href="./carritodecompras.php" title="ver carrito de compras">
   <img src="./imagenes/carrito.png">
  </a>
 </header> 
 <div class="container">
 
 <section>
  <?php
   $total=0;
   if(isset($_SESSION['carrito'])){
   $datos=$_SESSION['carrito'];

   $total=0;
   for($i=0;$i<count($datos);$i++){
 ?>
    <div class="row">
     <div class="col-4 text-center">
     <img src="./productos/<?php echo $datos[$i]['Imagen'];?>"></br>
     <span class="tamalet"><?php echo $datos[$i]['Nombre'];?></span></br>
     <span> $<?php echo $datos[$i]['Precio'];?></span></br>
      <span>
      		<input class="form-control -2" type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
      		data-precio="<?php echo $datos[$i]['Precio'];?>"
      		data-id="<?php echo $datos[$i]['Id'];?>"
      		class="cantidad">
      </span></br>
         <span><?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span></br>
         <a href="" class="eliminar btn btn-danger" data-id="<?php echo $datos[$i]['Id']?>" ><i class="fas fa-trash-alt"></i></a>
	<a class="btn btn-success" href="./compras.php" class="aceptar"><i class="fas fa-cart-arrow-down"></i></a></br>
        

     
    
  <?php
	 
   $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
  }
   }else{
    echo '<h2>No has añadido ningun producto</h2>';
   }

   echo 'Total a pagar $'.$total.'</br>
   
    </div>
          </div>';
	 
   if($total!=0)
   {
    echo '<a href="./compras.php" class="aceptar">Comprar</a><a href=Carrito_compras.php>Ver catalogo</a>';
   }

  ?> 
  
 </section>

 </div>
</body>
</html>﻿
<style>
   .tamalet{
		font-size:25px;
	   text-transform: uppercase;
	}
</style>