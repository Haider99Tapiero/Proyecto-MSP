<?php
    session_start();
    include ('conexion.php');

    sleep(1);

    if(isset($_POST["cantidad"]) && isset($_POST["idforma_pago"]) && isset($_POST["Mesas_idMesas"]) && isset($_POST["Plato_idPlato"])){

        $cantidad = $_POST["cantidad"];
        $idforma_pago = $_POST["idforma_pago"];
        $Mesas_idMesas = $_POST["Mesas_idMesas"];
        $Plato_idPlato = $_POST["Plato_idPlato"];

        date_default_timezone_set('America/Bogota');
        	$Fecha = date("Y-m-d");

              
            $sql2 = "INSERT INTO datalle_presencial (fecha_venta, cantidad, forma_pago_idforma_pago, mesas_idmesas, plato_idplato)
            VALUES ('$Fecha','$cantidad','$idforma_pago','$Mesas_idMesas','$Plato_idPlato')";

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

