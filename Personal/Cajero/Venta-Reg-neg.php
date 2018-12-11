<?php
    session_start();
    include ('conexion.php');

    sleep(1);

    if(isset($_POST["Plato_idPlato"]) && isset($_POST["Numeroventa"]) && isset($_POST["cantidad"])){

        
        $numero_venta = $_POST["Numeroventa"];
        $Plato_idPlato = $_POST["Plato_idPlato"];
        $cantidad = $_POST["cantidad"];

        date_default_timezone_set('America/Bogota');
        	$Fecha = date("Y-m-d");

              
            $sql2 = "INSERT INTO detalle_presencial (fecha_venta, plato_idplato, numero_venta, cantidad)
            VALUES ('$Fecha','$Plato_idPlato','$numero_venta','$cantidad')";

            if (!$result2 = $db->query($sql2)){
                $response['status'] = '2';
                echo json_encode($response);

                die('No hace insercion a la tabla ['.$db->error.']');
        
            }

            $response['status'] = '1';
            echo json_encode($response);
    } else {
        echo "SE ENTRO DIRECTO A ESTA CAPA";
    }
?>

