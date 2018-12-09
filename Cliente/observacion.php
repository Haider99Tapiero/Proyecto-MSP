<?php	
include("db.php");

$consulta="SELECT comentario, cliente.nombre FROM observacion INNER JOIN cliente on observacion.cliente_idcliente = cliente.idcliente ";
$ejecutar=$conexion-> query($consulta);
															
while($fila=$ejecutar->fetch_array()):
         
			    echo"<div  style=''  ><div class=''><b>";
				echo  $fila['nombre'];
				echo"</div></b>";
	
                echo"<div style='' class=''>";
                echo $fila['comentario'];
                echo"</div><br></div>";
			
endwhile;  
?>
