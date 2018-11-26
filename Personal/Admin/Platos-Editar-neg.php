<?php
    
    session_start();
    include ('conexion.php');

    sleep(1);

    if(isset($_POST["idplato"]) && isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["precio"])){

        $idplato = $_POST["idplato"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $imagen = $_FILES["imagen"];

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
            
        $sql2 = "UPDATE Plato SET nombre = '$nombre', descripcion = '$descripcion', imagen = '$img_final', precio = '$precio' 
        WHERE idPlato = '$idplato'";

        if (!$result2 = $db->query($sql2)){
            
            $response['status'] = '2';
            echo json_encode($response);

            die('No hace insercion a la tabla ['.$db->error.']');
        
        }

        $response['status'] = '1';
        echo json_encode($response);

        // FIN SUBIR IMAGEN ///////////////////////////////////////////////////////////

    } else {
        echo "SE ENTRO DIRECTO A ESTA CAPA";
    }
?>