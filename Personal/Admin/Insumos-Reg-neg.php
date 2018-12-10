<?php
    
    session_start();
    include ('conexion.php');

    sleep(1);

    if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["selectipodoc"]) && isset($_POST["documento"]) && isset($_POST["direccion"]) && isset($_POST["email"]) && isset($_POST["telefono"]) && isset($_POST["contrasena"]) && isset($_POST["selecrol"]) && isset($_POST["selecgenero"])){

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $selectipodoc = $_POST["selectipodoc"];
        $documento = $_POST["documento"];
        $direccion = $_POST["direccion"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $contrasena = $_POST["contrasena"];
        $selecrol = $_POST["selecrol"];
        $selecgenero = $_POST["selecgenero"];
        $estado = "1";

        $cont="0";
        
        // CONSULTAR SI EXISTE UN USUARIOS

        $cont_existente=0;

        $sql = "SELECT * FROM empleados WHERE documento='$documento'";

        if (!$result = $db->query($sql)){
                die('No hace consulta de verificar empleados registrados ['.$db->error.']');
            }

        while ($row = $result->fetch_assoc()){   
            $nnombre=stripslashes($row["nombre"]);    
            $cont_existente=$cont_existente+1;
        }
        
        if ($cont_existente==0){

            // INSERTAR DATOS //////////////////////////////////////////////////////////////
                
            $sql2 = "INSERT INTO empleados (nombre, apellido, documento, direccion, email, telefono, contrasena, tipodocumento_idtipodocumento, genero_idgenero, roles_idroles, estado_idestado)
            VALUES ('$nombre','$apellido','$documento','$direccion','$email','$telefono','$contrasena','$selectipodoc','$selecgenero','$selecrol','$estado')";

            if (!$result2 = $db->query($sql2)){
                    die('No hace insercion a la tabla ['.$db->error.']');
                }

            $response['status'] = '1';
            echo json_encode($response);


            // FIN INSERTAR DATOS ///////////////////////////////////////////////////////////
        }

        if ($cont_existente!=0){
            $response['status'] = '2';
            echo json_encode($response);
        }

    } else {
        echo "SE ENTRO DIRECTO A ESTA CAPA";
    }
?>