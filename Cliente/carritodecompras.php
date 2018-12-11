<?php
  include("../Seguridad-cliente.php");
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script type="text/javascript"  src="./js/scripts.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <link rel="stylesheet" href="../menuclient.css">
</head>
<body >
	<header>
   	<?php
  	  include("Menu-cliente.php");
  	?>
  </header>

  <div class="container col-md-9">
    <?php
      $total=0;
      if(isset($_SESSION['carrito'])){
      $datos=$_SESSION['carrito'];

      $total=0;
      for($i=0;$i<count($datos);$i++){
    ?>
    
    <div class="producto">
      <center>
        <span><?php echo $datos[$i]['Nombre'];?></span>
        <div class="form-group"></div>
        <img height="20"  src="./productos/<?php echo $datos[$i]['Imagen'];?>"><p>
  		  <span><b>Precio</b>    $<?php echo $datos[$i]['Precio'];?></span><p>
        <span><b>Cant:</b> 
        	<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
        		data-precio="<?php echo $datos[$i]['Precio'];?>"
        		data-id="<?php echo $datos[$i]['Id'];?>"
        		class="cantidad col-5"
        		>
        </span><p>
  		  <!--<span><b>Subt:</b>   $<?php //echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><p>-->
        <a href="" class="eliminar btn btn-danger " data-id="<?php echo $datos[$i]['Id']?>" ><i class="fas fa-trash-alt"></i></a>
      </center>
    </div>
      <?php
          $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
        }
        }else{
          echo '<center><h2>No has añadido ningun producto</h2></center>';
        }
        echo '<center><h2  id="total">Total: '.$total.'</h2></center>';
        if($total!=0)
        {
          echo '<center><a href="./compras.php" class="aceptar btn btn-success">Comprar</a></center>';
        }
      ?> 
    <center>
      <a href="Carrito_compras.php">Ver catalogo</a>
    </center>
  </div>


 

</body>
</html>﻿