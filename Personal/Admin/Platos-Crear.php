<?php 
    include ('S_Admin.php');

    if (isset($_SESSION["Plato_crear_ok"])) {
        echo "<script>alert('Creado correctamente');</script>";
        unset($_SESSION["Plato_crear_ok"]);
    }
    if (isset($_SESSION["Plato_editar_ok"])) {
        echo "<script>alert('Editado correctamente');</script>";
        unset($_SESSION["Plato_editar_ok"]);
    }
    if (isset($_SESSION["Plato_eliminar_ok"])) {
        echo "<script>alert('Elminado correctamente');</script>";
        unset($_SESSION["Plato_eliminar_ok"]);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="utf-8">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        .input-group{
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php 
                require('Menu-Admin.php');
            ?>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCION</th>
                    <th>COSTO</th>
                    <th>CANTIDAD</th>
                    <th>TIPO DE PLATO</th>
                    <th>IMAGEN</th>
                    <th>ACCION</th>
                </tr>
            </thead>
            <tbody>
            <?php
                class Usuarios
                {
                    public function listar()
                    {
                        $cont="0";
                        //  CONSULTAR DE LA BASE DE DATOS
                        include ('conexion.php');
                        $sql = "SELECT * FROM Plato";
                        if (!$result = $db->query($sql))
                        {
                            die('No hace consulta a Usuarios ['.$db->error.']');
                        }
                        while ($row = $result->fetch_assoc())
                        { 
                            $IIdPlato=stripslashes($row["idPlato"]);
                            $NNombre=stripslashes($row["nombre"]);
                            $DDescripcion=stripslashes($row["descripcion"]);
                            $CCosto=stripslashes($row["costo"]);
                            $CCantidad=stripslashes($row["cantidad"]);
                            $IImagen=stripslashes($row["Nombre_img"]);
                            $TTTipoPlato_idTipoPlato=stripslashes($row["TipoPlato_idTipoPlato"]);
                            //  CREAR UNA SUBCONSULTA AL TIPO PLATO
                            $sql2 = "SELECT * FROM TipoPlato WHERE idTipoPlato = '$TTTipoPlato_idTipoPlato'"; 

                            if (!$result2 = $db->query($sql2))
                            {
                                die('No hace subconsulta a tipo plato ['.$db->error.']');
                            }
                            while ($row2 = $result2->fetch_assoc())
                            { 
                                $DDDescripcion=stripslashes($row2["descripcion"]);
                            }
                            //  FIN DE LA SUBCONSULTA TIPO PLATO

                            // RUTA
                            $folder = 'img-personal/';
                            $imagen = $folder.$IImagen;
                            // FIN RUTA

                            echo"<tr>";
                                echo"<td>$IIdPlato</td>";
                                echo"<td>$NNombre</td>";  
                                echo"<td>$DDescripcion</td>";  
                                echo"<td>$CCosto</td>";  
                                echo"<td>$CCantidad</td>";  
                                echo"<td>$DDDescripcion</td>";
                                if ($IImagen == '') {
                                    echo "<td>Sin asignar imagen</td>";
                                }else{
                                    echo'<td><a class="btn btn-info" target="_blank" href="'.$imagen.'">Ver imagen</a></td>';
                                }
                                echo"<td>
                                    <a href='Platos-Editar.php?idPlato=".$IIdPlato."' class='btn btn-warning'>
                                        <span class='glyphicon glyphicon-edit'></span>
                                    </a>
                                    <a href='Platos-Eliminar-neg.php?idPlato=".$IIdPlato."' class='btn btn-danger'>
                                        <span class='glyphicon glyphicon-trash'></span>
                                    </a>
                                </td>";
                            echo"<tr>";
                        }
                    }                
                }
                $nuevo=new Usuarios();
                $nuevo->listar();

            ?>
            </tbody>
        </table>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar</button>

        <div class="row">
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <p style="font-size: 20px;">Registro de nuevo plato</p>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="Platos-Crear-neg.php" enctype="multipart/form-data" autocomplete="off">
                                <div class="input-group">
                                    <input class="form-control" name="nombre" type="text" id="nombre" placeholder="Nombre plato" required/>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" name="descripcion" type="text" id="descripcion" placeholder="Descripcion plato" required/>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" name="costo" type="text" id="costo" placeholder="Costo" required/>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" name="cantidad" type="text" id="cantidad" placeholder="Cantidad" required/>
                                </div>
                                <div class="input-group">
                                    <select class="form-control" name="TipoPlato_id" id="TipoPlato" required>
                                        <option value=Seleccione:>Tipo de plato</option>
                                        <?php
                                            include ('conexion.php');
                                            $sql3 ="SELECT * FROM TipoPlato ";

                                            if(!$result3 = $db-> query($sql3))
                                            {
                                                die('No conecta [' . $db->error . ']');
                                            }
                                            
                                            while ($row3 = $result3->fetch_assoc())
                                            {
                                                $TTipoPlato_idTipoPlato=stripslashes($row3["idTipoPlato"]);
                                                $ddescripcion=stripslashes($row3["descripcion"]);
                                                echo "<option value='$TTipoPlato_idTipoPlato'>$ddescripcion</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" name="imagen" id="imagen" type="file">
                                </div>
                                <input class="btn btn-success" type="submit" name="Guardar" id="Guardar" value="Guardar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>