<?php 
    

    if (isset($_SESSION["insumos_crear"])) {
        echo "<script>alert('Creado correctamente');</script>";
        unset($_SESSION["insumos_crear"]);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
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
    
    <div class="container">
        <form class="col-md-4" name="form1" method="post" action="Insumos-Reg-neg.php">
            <div class="input-group">
                <label>Cantidad</label>
                <input class="form-control" name="cantidad" type="text" id="cantidad" required/>
            </div>
            <div class="container">
                <div class="input-group">
                <label>unidad de medida</label>
                <input class="form-control" name="unidad_medida" type="text" id="cantidad" required/>
            </div>
            <div class="container">
                <div class="input-group">
                <label>Descripcion</label>
                <input class="form-control" name="descripcion" type="text" id="cantidad" required/>
            </div>
            <div class="container">
        <form class="col-md-4" name="form1" method="post" action="Insumos-Reg-neg.php">
            
            <div class="input-group">
                <label>Categoria insumo</label>
                <select class="form-control" name="categoriainsumo_idcategoriainsumo" id="categoriainsumo_idcategoriainsumo" required="required">
                    <option value="Seleccione:">Seleccione:</option>
                    <?php
                        include ('conexion.php');
                        $sql2 ="SELECT * FROM categoriainsumo";
                        if(!$result2 = $db-> query($sql2))
                        {
                            die('No conecta [' . $db->error . ']');
                        }
                        while ($row2 = $result2->fetch_assoc())
                        {
                            $iidcategoria=stripslashes($row2["idcategoria"]);
                            $nnombre=stripslashes($row2["descripcion"]);
                            echo "<option value=$iidcategoria>$nnombre</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <label>Empleado</label>
                <select class="form-control" name="empleados_idempleados" id="empleados_idempleados" required>
                    <option value=Seleccione:>Seleccione:</option>
                    <?php
                        include ('conexion.php');
                        $sql4 ="SELECT * FROM empleados WHERE roles_idroles = 5 ";
                        if(!$result4 = $db-> query($sql4))
                        {
                            die('No conecta [' . $db->error . ']');
                        }
                        while ($row4 = $result4->fetch_assoc())
                        {
                            $iidempleados=stripslashes($row4["idempleados"]);
                            $nnombre=stripslashes($row4["nombre"]);
                            echo "<option value=$iidempleados>$nnombre</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <label>Provedor</label>
                <select class="form-control" name="proveedor_idproveedor" id="proveedor_idproveedor" required>
                    <option value=Seleccione:>Seleccione:</option>
                    <?php
                        include ('conexion.php');
                        $sql3 ="SELECT * FROM proveedor ";
                        if(!$result3 = $db-> query($sql3))
                        {
                            die('No conecta [' . $db->error . ']');
                        }
                        while ($row3 = $result3->fetch_assoc())
                        {
                            $iidproveedor=stripslashes($row3["idproveedor"]);
                            $nnombres=stripslashes($row3["nombre"]);
                            echo "<option value=$iidproveedor>$nnombres</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <input class="btn btn-success" type="submit" name="Submit" value="Finalizar Venta"/>
            </div>
            
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>