<?php
session_start();
include './conexion.php';
$idCliente = $_SESSION["idcliente"];
$arreglo=$_SESSION['carrito'];
$numeroventa=0;
$re=mysqli_query($conexion,"SELECT * FROM compras order by numeroventa DESC limit 1") or die (mysql_error());
 while ($f=mysqli_fetch_array($re))
 {
  $numeroventa=$f['numeroventa'];
 }
 if($numeroventa==0)
 {
  $numeroventa=1;
 }
 else
 {
  $numeroventa=$numeroventa+1;
 }
 for ($i=0; $i <count($arreglo); $i++) { 
   mysqli_query($conexion,"INSERT INTO compras (numeroventa, imagen, nombre, precio, cantidad, subtotal, idcliente) VALUES (
    ".$numeroventa.",
    '".$arreglo[$i]['Imagen']."',
    '".$arreglo[$i]['Nombre']."',
    '".$arreglo[$i]['Precio']."',
    '".$arreglo[$i]['Cantidad']."',
    '".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])."',
    ".$idCliente."
    )")or die(mysql_error());
 }
 $_SESSION["kkk"] = "";
 unset($_SESSION['carrito']);
 header("Location: ../admin.php");
?>