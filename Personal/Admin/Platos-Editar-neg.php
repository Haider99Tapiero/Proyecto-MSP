<?php

    

    $idPlato = $_POST["idPlato"];
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

        $nombre_img = $_FILES['imagen']['name'];
        $tipo_img = $_FILES['imagen']['type'];
        $tamano_img = $_FILES['imagen']['size'];

        $img_final=$nombre_img;

        // RUTA IMAGEN

        $carpeta = 'img-personal';

        move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.'/'.$img_final);

        $sql2 = "UPDATE Plato SET nombre = '$nombre', descripcion = '$descripcion', costo = '$costo', cantidad = '$cantidad', Nombre_img = '$nombre_img', TipoPlato_idTipoPlato = '$TipoPlato' WHERE idPlato = '$idPlato'";

        if (!$result2 = $db->query($sql2))
            {
                die('No hace insercion a la tabla ['.$db->error.']');
            }
        
        // FIN SUBIR IMAGEN ///////////////////////////////////////////////////////////

        $_SESSION["Plato_editar_ok"] = "";

        header ("location: Platos-Crear.php");
        
    } 
                
?>