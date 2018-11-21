<?php
    
    session_start();
    include ('conexion.php');

    sleep(1);

    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $costo = $_POST["costo"];
    $fileName = $_POST["fileName"];

    $cont="0";
    
    
    // CONSULTAR SI EXISTE UN USUARIOS

    $cont_existente=0;

    $sql = "SELECT * FROM Plato WHERE nombre='$nombre'";

    if (!$result = $db->query($sql))
        {
            die('No hace consulta de verificar plato registrados ['.$db->error.']');
        }

    while ($row = $result->fetch_assoc())
    {   
        $nnombre=stripslashes($row["nombre"]);    
        $cont_existente=$cont_existente+1;
    }
    
    if ($cont_existente==0)
    {

        // SUBIR IMAGEN //////////////////////////////////////////////////////////////

        date_default_timezone_set('America/Bogota');

        $Fecha = date('m-d-Y-g-ia');

        //$nombre_img = $imagen['name'];
        //$tipo_img = $imagen['type'];
        //$tamano_img = $imagen['size'];

        $img_final=$Fecha.$fileName;

        $carpeta = 'img-personal';

        move_uploaded_file($fileName['tmp_name'], $carpeta.'/'.$img_final);
            
        $sql2 = "INSERT INTO Plato (nombre, descripcion, imagen, precio)
        VALUES ('$nombre','$descripcion','$img_final','$costo')";

        if (!$result2 = $db->query($sql2))
            {
                die('No hace insercion a la tabla ['.$db->error.']');
            }

        
        // FIN SUBIR IMAGEN ///////////////////////////////////////////////////////////
    }

    if ($cont_existente!=0) 
    {
        // header("location: registrar.php");      
    }            
?>