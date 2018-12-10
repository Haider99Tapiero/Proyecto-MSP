<?php
    
    session_start();
    include ('conexion.php');

    sleep(1);

    if(isset($_POST["cantidad"]) && isset($_POST["unidad_medida"]) && isset($_POST["descripcion"]) && isset($_POST["idcategoriainsumo"]) && isset($_POST["idproveedor"])){

        $empleados = $_SESSION['idempleado'];
        $cantidad = $_POST["cantidad"];
        $unidad_medida = $_POST["unidad_medida"];
        $descripcion = $_POST["descripcion"];
        $idcategoriainsumo = $_POST["idcategoriainsumo"];
        $idprovedor = $_POST["idproveedor"];

              
            $sql2 = "INSERT INTO pedido_insumos (cantidad, unidad_medida, descripcion, categoriainsumo_idcategoria, empleados_idempleados, proveedor_idproveedor)
            VALUES ('$cantidad','$unidad_medida','$descripcion','$idcategoriainsumo','$empleados','$idprovedor')";

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