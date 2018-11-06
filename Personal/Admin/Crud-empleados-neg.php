<?php
$dbh = new PDO('mysql:host=localhost;dbname=Restaurante', 'root', '');
$page = isset($_GET['p'])? $_GET['p'] : '';
if($page=='add'){
    try{
        $Vidempleado = $_POST['idemple'];
        $Vnombre = $_POST['nombre'];
        $Vapellido = $_POST['apellido'];
        $Vtipodoc = $_POST['tipodoc'];
        $Vdoc = $_POST['doc'];
        $Vdireccion = $_POST['direccion'];
        $Vemail = $_POST['email'];
        $Vtelefono = $_POST['telefono'];
        $Vrol = $_POST['rol'];
        $Vgenero = $_POST['genero'];
        $stmt = $dbh->prepare("INSERT INTO Empleados VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1,$Vidempleado);
        $stmt->bindParam(2,$Vnombre);
        $stmt->bindParam(3,$Vapellido);
        $stmt->bindParam(4,$Vdoc);
        $stmt->bindParam(5,$Vdireccion);
        $stmt->bindParam(6,$Vemail);
        $stmt->bindParam(7,$Vtelefono);
        $stmt->bindParam(8,$Vdoc);
        $stmt->bindParam(9,$Vtipodoc);
        $stmt->bindParam(10,$Vrol);
        $stmt->bindParam(11,$Vgenero);
        if($stmt->execute()){
            print "<div class='alert alert-success' role='alert'>Agregado correctamente</div>";
        } else{
            print "<div class='alert alert-danger' role='alert'>Fallo al agregar registro</div>";
        }
    } catch(PDOException $e){
        print "Error!: " . $e->getMessage() . "<br/>";
    } 
} else if($page=='update'){
    try{
        $Vidempleado = $_POST['idemple'];
        $Vnombre = $_POST['nombre'];
        $Vapellido = $_POST['apellido'];
        $Vtipodoc = $_POST['tipodoc'];
        $Vdoc = $_POST['doc'];
        $Vdireccion = $_POST['direccion'];
        $Vemail = $_POST['email'];
        $Vtelefono = $_POST['telefono'];
        $Vrol = $_POST['rol'];
        $Vgenero = $_POST['genero'];
        $stmt = $dbh->prepare("UPDATE Empleados SET nombre=?, apellido=?, documento=?, direccion=?, email=?, telefono=?, TipoDocumento_idTipoDocumento=?, Roles_idRoles=?, Genero_idGenero=? WHERE idEmpleados=?");
        $stmt->bindParam(1,$Vnombre);
        $stmt->bindParam(2,$Vapellido);
        $stmt->bindParam(3,$Vdoc);
        $stmt->bindParam(4,$Vdireccion);
        $stmt->bindParam(5,$Vemail);
        $stmt->bindParam(6,$Vtelefono);
        $stmt->bindParam(7,$Vtipodoc);
        $stmt->bindParam(8,$Vrol);
        $stmt->bindParam(9,$Vgenero);
        $stmt->bindParam(10,$Vidempleado);
        if($stmt->execute()){
            print "<div class='alert alert-success' role='alert'>Registro actualizado correctamente</div>";
        } else{
            print "<div class='alert alert-danger' role='alert'>Fallo al actualizar</div>";
        }
    } catch(PDOException $e){
        print "Error!: " . $e->getMessage() . "<br/>";
    } 
} else if($page=='delete'){
    try{
        $Vidempleados = $_POST['idEmpleados'];
        $stmt = $dbh->prepare("DELETE FROM Empleados WHERE idEmpleados=?");
        $stmt->bindParam(1,$Vidempleados);
        if($stmt->execute()){
            print "<div class='alert alert-success' role='alert'>Eliminado correctamente</div>";
        } else{
            print "<div class='alert alert-danger' role='alert'>Fallo eliminar registro</div>";
        }
    } catch(PDOException $e){
        print "Error!: " . $e->getMessage() . "<br/>";
    } 
} else{
    try{
        $stmt = $dbh->prepare("SELECT idEmpleados, nombre, apellido, documento, direccion, email, telefono, TipoDocumento.descripcion as des, rol, Genero.descripcion as dess FROM empleados INNER JOIN TipoDocumento on empleados.TipoDocumento_idTipoDocumento = TipoDocumento.idTipoDocumento INNER JOIN Genero on empleados.Genero_idGenero = Genero.idGenero INNER JOIN Roles on empleados.Roles_idRoles = Roles.idRoles ORDER BY idEmpleados DESC");
        $stmt->execute();
        while($row = $stmt->fetch()){
            print "<tr>";
            print "<td>".$row['idEmpleados']."</td>";
            print "<td>".$row['nombre']."</td>";
            print "<td>".$row['apellido']."</td>";
            print "<td>".$row['documento']."</td>";
            print "<td>".$row['direccion']."</td>";
            print "<td>".$row['email']."</td>";
            print "<td>".$row['telefono']."</td>";
            print "<td>".$row['des']."</td>";
            print "<td>".$row['rol']."</td>";
            print "<td>".$row['dess']."</td>";
            print "<td class='text-center'><div class='btn-group' role='group' aria-label='group-".$row['idEmpleados']."'>";
            ?> 
            <button onclick="editData(
            '<?php echo $row['idEmpleados'] ?>',
            '<?php echo $row['nombre'] ?>',
            '<?php echo $row['apellido'] ?>',
            '<?php echo $row['documento'] ?>',
            '<?php echo $row['direccion'] ?>',
            '<?php echo $row['email'] ?>',
            '<?php echo $row['telefono'] ?>',
            '<?php echo $row['des'] ?>',
            '<?php echo $row['rol'] ?>',
            '<?php echo $row['dess'] ?>'
            )" class='btn btn-warning'>Editar</button>
            <button onclick="removeConfirm('<?php echo $row['idEmpleados'] ?>')" class='btn btn-danger'>Eliminar</button>
            <?php 
            print "</div></td>";
            print "</tr>";
        }
    } catch(PDOException $e){
        print "Error!: " . $e->getMessage() . "<br/>";
    }
}
?>