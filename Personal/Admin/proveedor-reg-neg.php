<?php
    
    session_start();
    include ('conexion.php');

    sleep(1);

    if(isset($_POST["idcategoriainsumo"]) && isset($_POST["proveedor"]) && isset($_POST["numero"])){

        
        $idcategoriainsumo = $_POST["idcategoriainsumo"];
        $idprovedor = $_POST["proveedor"];
        $numero = $_POST["numero"];

              
            $sql2 = "INSERT INTO proveedor (nombre, celular,categoriainsumo_idcategoria)
            VALUES ('$idprovedor','$numero','$idcategoriainsumo')";

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