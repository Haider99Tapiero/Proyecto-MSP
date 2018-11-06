<?php 
    include ('S_Admin.php');

    if (isset($_SESSION["kkk"])) {
        echo "<script>alert('Creado correctamente');</script>";
        unset($_SESSION["kkk"]);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
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
    <?php 
        require('Menu-Admin.php');
    ?>
    <div class="container">
        <form id="form1" name="form1" method="post" action="Insumos-Reg-neg.php">
            <div class="input-group">
                <label>Categoria: </label>
                <select class="form-control" name="CategoriaInsumo" id="CategoriaInsumo" required>
                    <option value=Seleccione:>Seleccione:</option>
                    <?php
                        include ('conexion.php');
                        $sql3 ="SELECT * FROM CategoriaInsumo ";

                        if(!$result3 = $db-> query($sql3))
                        {
                        	die('No conecta [' . $db->error . ']');
                        }
                        while ($row3 = $result3->fetch_assoc())
                        {
                            $IIdCategoria=stripslashes($row3["idCategoria"]);
                            $ddescripcion=stripslashes($row3["descripcion"]);
                            echo "<option value=$IIdCategoria>$ddescripcion</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <label>Proveedor: </label>
                <select class="form-control" name="Proveedor" id="Proveedor" required>
                    <option value=Seleccione:>Seleccione:</option>
                    <?php
                        include ('conexion.php');
                        $sql4 ="SELECT * FROM Proveedor";

                        if(!$result4 = $db-> query($sql4))
                        {
                            die('No conecta [' . $db->error . ']');
                        }
                        while ($row4 = $result4->fetch_assoc())
                        {
                            $IIdProveedor=stripslashes($row4["idProveedor"]);
                            $nnombre=stripslashes($row4["nombre"]);
                            $CCategoriaInsumos_id=stripslashes($row4["CategoriaInsumo_idCategoria"]);

                            echo "<option value=$IIdProveedor>$nnombre</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <label>Cantidad: </label>
                <input class="form-control" name="cantidad" type="text" id="cantidad" required/>
            </div>
            <div class="input-group">
                <label>Unidad de medida: </label>
                <input class="form-control" name="unidad_medida" type="text" id="unidad_meida" required/>
            </div>
            <div class="input-group">
                <label>Descripcion: </label>
                <input class="form-control" name="descripcion" type="text" id="descripcion" required/>
            </div>
            <div class="input-group">
                <label>Nombre empleado</label>
                <select class="form-control" name="Empleados_id" id="Empleados_id" required>
                    <option value="Seleccione:">Seleccione:</option>
                    <?php
                        include ('conexion.php');
                        $sql2 ="SELECT * FROM empleados ";
                        
                        if(!$result2 = $db-> query($sql2))
                        {
                            die('No conecta [' . $db->error . ']');
                        }
                        while ($row2 = $result2->fetch_assoc())
                        {
                            $IIdempleado=stripslashes($row2["idEmpleados"]);
                            $nnombre=stripslashes($row2["nombre"]);
                            echo "<option value=$IIdempleado>$nnombre</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <input class="btn btn-success" type="submit" name="Submit" value="Registrar insumo" />
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>