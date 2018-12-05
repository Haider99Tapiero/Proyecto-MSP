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
     $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+0;
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
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
 <script type="text/javascript"  src="./js/scripts.js"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    
</head>
<body>
 <header>
   <?php
        include("../menu-clien-msp.php");
        ?>
 </header>
 <div class="form-group"></div>
 <div class="container">
 <table class="table table-striped">
 <thead>
     <tr>
         <th>Producto</th>
         <th>Nombre</th>
         <th>Cantidad</th>
         <th>Precio</th>
         <th>Accion</th>
     </tr>
 </thead>
  <?php
   $total=0;
   if(isset($_SESSION['carrito'])){
   $datos=$_SESSION['carrito'];

   $total=0;
   for($i=0;$i<count($datos);$i++){
 ?>
    
     <center>
     <tbody>
      <tr>
         <td><img height="50" class="rounded" src="./productos/<?php echo $datos[$i]['Imagen'];?>"><br></td>
          <td><span class="align-middle"><?php echo $datos[$i]['Nombre'];?></span><br></td>
          <td><span>
      		<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
      		data-precio="<?php echo $datos[$i]['Precio'];?>"
      		data-id="<?php echo $datos[$i]['Id'];?>"
      		class="cantidad">
      </span><br></td>
      <td><span> $<?php echo $datos[$i]['Precio'];?></span><br></td>
      
    
     <td><a href="" class="eliminar btn btn-danger" data-id="<?php echo $datos[$i]['Id']?>" ><i class="fas fa-trash-alt"></i></a></td> 
    </tr>
    </tbody>
   
  <?php
     
   $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
    
  }
   }else{
    echo '<center><h2>No has añadido ningun producto</h2></center>';
   }
  
    echo '<tr><th>Total a pagar</td><td colspan="2"></th><td><div  id="total">$'.$total.'</div></td><td></td></tr>';

   if($total!=0)
   {
       echo"<tr><td>";
       echo '<a class="btn btn-success col-md-4" href="./compras.php" class="aceptar"><i class="fas fa-cart-arrow-down"></i></a>
       
        <a class="btn btn-info col-md-4" href="Carrito_compras.php"><i class="fas fa-eye"></i></a></td></tr>';
      
   }

  ?> 

 
     </center>
        
</table>
  
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="js/jquery-3.3.1.min.js"></script>
</body>
</html>﻿