<?php	
include("db.php");

$consulta="SELECT comentario, cliente.nombre FROM observacion INNER JOIN cliente on observacion.cliente_idcliente = cliente.idcliente ";
$ejecutar=$conexion-> query($consulta);
															
while($fila=$ejecutar->fetch_array()):

			    echo"<div class=''>";
				echo  $fila['nombre'];
				echo"</div>";
	
                echo"<div class='alert alert-primary'>";
                echo $fila['comentario'];
                echo"</div>";
			
endwhile;  
?>
