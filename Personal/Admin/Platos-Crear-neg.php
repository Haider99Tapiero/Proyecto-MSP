<?php
    
    session_start();
    include ('conexion.php');

    sleep(1);

    if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["costo"])){

        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $costo = $_POST["costo"];
        $imagen = $_FILES["imagen"];

        $cont="0";
        
        // CONSULTAR SI EXISTE UN USUARIOS

        $cont_existente=0;

        $sql = "SELECT * FROM Plato WHERE nombre='$nombre'";

        if (!$result = $db->query($sql)){
                die('No hace consulta de verificar plato registrados ['.$db->error.']');
            }

        while ($row = $result->fetch_assoc()){   
            $nnombre=stripslashes($row["nombre"]);    
            $cont_existente=$cont_existente+1;
        }
        
        if ($cont_existente==0){

            // SUBIR IMAGEN //////////////////////////////////////////////////////////////

            if ($imagen['name'] == "") {

                $img_final = "";
                
            }else{
                
                date_default_timezone_set('America/Bogota');

                $Fecha = date('m-d-Y-g-ia');

                $nombre_img = $imagen['name'];
                $tipo_img = $imagen['type'];
                $tamano_img = $imagen['size'];

                $img_final=$Fecha.$nombre_img;

                $carpeta = 'img-personal';

                move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.'/'.$img_final);
                
            }
                
            $sql2 = "INSERT INTO Plato (nombre, descripcion, imagen, precio)
            VALUES ('$nombre','$descripcion','$img_final','$costo')";

            if (!$result2 = $db->query($sql2)){
                    die('No hace insercion a la tabla ['.$db->error.']');
                }

            $response['status'] = '1';
            echo json_encode($response);


            // FIN SUBIR IMAGEN ///////////////////////////////////////////////////////////
        }

        if ($cont_existente!=0){
            $response['status'] = '2';
            echo json_encode($response);
        }

    } else {
        echo "SE ENTRO DIRECTO A ESTA CAPA";
    }
?>