<?php
    
    session_start();

    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $costo = $_POST["costo"];
    $cantidad = $_POST["cantidad"];
    $TipoPlato = $_POST["TipoPlato_id"];

    $cont="0";
    
    include ('conexion.php');

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

        $nombre_img = $_FILES['imagen']['name'];
        $tipo_img = $_FILES['imagen']['type'];
        $tamano_img = $_FILES['imagen']['size'];

        $img_final=$Fecha.$nombre_img;

        $carpeta = 'img-personal';

        move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.'/'.$img_final);
            
        $sql2 = "INSERT INTO Plato (nombre, descripcion, costo, cantidad, Nombre_img, TipoPlato_idTipoPlato)
        VALUES ('$nombre','$descripcion','$costo','$cantidad','$img_final','$TipoPlato')";

        if (!$result2 = $db->query($sql2))
            {
                die('No hace insercion a la tabla ['.$db->error.']');
            }

        $_SESSION["Plato_crear_ok"] = "";

        header ("location: Platos-Crear.php");
        
        // FIN SUBIR IMAGEN ///////////////////////////////////////////////////////////
    }

    if ($cont_existente!=0) 
    {
        // header("location: registrar.php");      
    }            
?>