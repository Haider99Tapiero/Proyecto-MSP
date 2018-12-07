<?php
    
    session_start();
    include ('conexion.php');

    sleep(1);

    if(isset($_POST["IIdempleado"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["selectipodoc"]) && isset($_POST["documento"]) && isset($_POST["direccion"]) && isset($_POST["email"]) && isset($_POST["telefono"]) && isset($_POST["selecrol"]) && isset($_POST["selecgenero"])){

        $IIdempleado = $_POST["IIdempleado"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $selectipodoc = $_POST["selectipodoc"];
        $documento = $_POST["documento"];
        $direccion = $_POST["direccion"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $selecrol = $_POST["selecrol"];
        $selecgenero = $_POST["selecgenero"];
        
        $sql2 = "UPDATE empleados SET nombre='$nombre', apellido='$apellido', direccion='$direccion', email='$email', telefono='$telefono', roles_idroles='$selecrol', genero_idgenero='$selecgenero' WHERE idempleados = '$IIdempleado'";

        if (!$result2 = $db->query($sql2)){
            
            $response['status'] = '2';
            echo json_encode($response);

            die('No hace insercion a la empledos ['.$db->error.']');
        
        }

        $response['status'] = '1';
        echo json_encode($response);

    } else {
        echo "SE ENTRO DIRECTO A ESTA CAPA";
    }
?>