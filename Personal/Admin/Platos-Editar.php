
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
        <?php

            require('Conexion.php');

            $idPlato = $_REQUEST['idPlato'];

            $sql = "SELECT * FROM Plato WHERE idPlato = '$idPlato'";

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

                $sql2 = "SELECT * FROM TipoPlato WHERE idTipoPlato = '$TTTipoPlato_idTipoPlato'"; 

                if (!$result2 = $db->query($sql2))
                {
                    die('No hace subconsulta a tipo plato ['.$db->error.']');
                }
                while ($row2 = $result2->fetch_assoc())
                { 
                    $DDDescripcion=stripslashes($row2["descripcion"]);
                }
            }

        ?>
        <div class="row">
            <div id="myModal" class="" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p style="font-size: 20px;">Editar platos</p>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="Platos-Editar-neg.php" enctype="multipart/form-data" autocomplete="off">
                                <div class="input-group" style="display: none;">
                                    <input class="form-control" value="<?php echo $IIdPlato ?>" name="idPlato" type="text" id="idPlato" placeholder="idPlato" required/>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" value="<?php echo $NNombre ?>" name="nombre" type="text" id="nombre" placeholder="Nombre plato" required/>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" value="<?php echo $DDescripcion ?>" name="descripcion" type="text" id="descripcion" placeholder="Descripcion plato" required/>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" value="<?php echo $CCosto ?>" name="costo" type="text" id="costo" placeholder="Costo" required/>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" value="<?php echo $CCantidad ?>" name="cantidad" type="text" id="cantidad" placeholder="Cantidad" required/>
                                </div>
                                <div class="input-group">
                                    <select class="form-control" value="<?php echo $TTTipoPlato_idTipoPlato ?>" name="TipoPlato_id" id="TipoPlato" required>
                                        <option value="<?php echo $TTTipoPlato_idTipoPlato ?>"><?php echo $DDDescripcion ?></option>
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
                                <input class="btn btn-warning" type="submit" name="Actualizar" id="Actualizar" value="Actualizar">
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