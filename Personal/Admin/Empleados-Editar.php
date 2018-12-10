<?php 
    include("../../Seguridad-admin.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" type="text/css" href="css/platos.css">
    <title>Inicio</title>
    <style type="text/css">
        .formulario{
            background-color: #FAFAFA;
            width: 450px;
            padding: 10px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            margin-bottom: 10px;
            background: #FFF;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <header>
        <?php 
            
            include ("Menu-Admin.php");
        ?>
    </header>
    <?php
        require('Conexion.php');

        $idEmple = $_REQUEST['idemple'];

        $sql = "SELECT * FROM empleados WHERE idempleados = '$idEmple'";

        if (!$result = $db->query($sql))
        {
            die('No hace consulta a Usuarios ['.$db->error.']');
        }
        while ($row = $result->fetch_assoc())
        { 
            $IIdempleado=stripslashes($row["idempleados"]);
            $NNombre=stripslashes($row["nombre"]);
            $AApellido=stripslashes($row["apellido"]);
            $DDocumento=stripslashes($row["documento"]);
            $DDireccion=stripslashes($row["direccion"]);
            $EEmail=stripslashes($row["email"]);
            $TTelefono=stripslashes($row["telefono"]);
            $CContrasena=stripslashes($row["contrasena"]);
            $TTipoDocum_idtipodocu=stripslashes($row["tipodocumento_idtipodocumento"]);
            $GGenero_idgenero=stripslashes($row["genero_idgenero"]);
            $RRoles_idroles=stripslashes($row["roles_idroles"]);

            $sql2 ="SELECT * FROM tipodocumento WHERE idtipodocumento = '$TTipoDocum_idtipodocu'";

            if(!$result2 = $db-> query($sql2))
            {
                die('No hace consulta de tipodocumento [' . $db->error . ']');
            }
            while ($row2 = $result2->fetch_assoc())
            {
                $DDes_tipo_docu=stripslashes($row2["descripcion"]);
            }

            $sql3 ="SELECT * FROM genero WHERE idgenero = '$GGenero_idgenero'";

            if(!$result3 = $db-> query($sql3))
            {
                die('No hace consulta de tipodocumento [' . $db->error . ']');
            }
            while ($row3 = $result3->fetch_assoc())
            {
                $DDes_genero=stripslashes($row3["descripcion"]);
            }

            $sql4 ="SELECT * FROM roles WHERE idroles = '$RRoles_idroles'";

            if(!$result4 = $db-> query($sql4))
            {
                die('No hace consulta de tipodocumento [' . $db->error . ']');
            }
            while ($row4 = $result4->fetch_assoc())
            {
                $DDes_rol=stripslashes($row4["rol"]);
            }
        }
    ?>
    <div class="" id="myModal" tabindex="-1" role="dialog" aria-labelledby="LabelModalogin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" class="formulario" action="" id="FormEmpleado" autocomplete="off" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p style="font-size: 20px; text-align: center;">Registrar plato</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="display: none;">
                        <input class="form-control" value="<?php echo $IIdempleado ?>" name="IIdempleado" type="text" id="IIdempleado" placeholder="idEmpleado"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" value="<?php echo $NNombre ?>"  type="text" name="nombre" id="nombre" placeholder="Nombre emplado" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" value="<?php echo $AApellido ?>" type="text" name="apellido" id="apellido" placeholder="Apellido emplado" />
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="selectipodoc1" name="selectipodoc1" required disabled>
                            <option value="<?php echo $TTipoDocum_idtipodocu ?>"><?php echo $DDes_tipo_docu ?></option>
                            <?php
                                //  CONSULTA PARA TRAER LOS TIPODOCUMENTO

                                include ('conexion.php');

                                $sql2 = "SELECT * FROM tipodocumento"; 

                                  if (!$result2 = $db->query($sql2))
                                    {
                                      die('No hace subconsulta a tipo documento del select ['.$db->error.']');
                                    }

                                  while ($row2 = $result2->fetch_assoc())
                                  { 
                                    $IId_Tipo_Doc=stripslashes($row2["idtipodocumento"]);
                                    $DDes=stripslashes($row2["descripcion"]);
                                    echo "<option value='$IId_Tipo_Doc'>$DDes</option>";
                                  }

                                // FIN CONSULTA DE TRAER LOS TIPODOCUMENTO
                            ?>
                        </select>
                    </div>
                    <div class="form-group" style="display: none;">
                        <select class="form-control" id="selectipodoc" name="selectipodoc" required>
                            <option value="<?php echo $TTipoDocum_idtipodocu ?>"><?php echo $DDes_tipo_docu ?></option>
                            <?php
                                //  CONSULTA PARA TRAER LOS TIPODOCUMENTO

                                include ('conexion.php');

                                $sql2 = "SELECT * FROM tipodocumento"; 

                                  if (!$result2 = $db->query($sql2))
                                    {
                                      die('No hace subconsulta a tipo documento del select ['.$db->error.']');
                                    }

                                  while ($row2 = $result2->fetch_assoc())
                                  { 
                                    $IId_Tipo_Doc=stripslashes($row2["idtipodocumento"]);
                                    $DDes=stripslashes($row2["descripcion"]);
                                    echo "<option value='$IId_Tipo_Doc'>$DDes</option>";
                                  }

                                // FIN CONSULTA DE TRAER LOS TIPODOCUMENTO
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" value="<?php echo $DDocumento ?>" type="text" name="documento1" id="documento1" placeholder="Documento" disabled/>
                    </div>
                    <div class="form-group" style="display: none;">
                        <input class="form-control" value="<?php echo $DDocumento ?>" type="text" name="documento" id="documento" placeholder="Documento"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" value="<?php echo $DDireccion ?>" type="text" name="direccion" id="direccion" placeholder="Direccion residencia" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" value="<?php echo $EEmail ?>" type="text" name="email" id="email" placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" value="<?php echo $TTelefono ?>" type="text" name="telefono" id="telefono" placeholder="Telefono" />
                    </div>
                    <div class="form-group">    
                        <select class="form-control" id="selecrol" name="selecrol" required>
                            <option value="<?php echo $RRoles_idroles ?>"><?php echo $DDes_rol ?></option>
                            <?php
                                //  CONSULTA PARA TRAER LOS ROL

                                include ('conexion.php');

                                $sql2 = "SELECT * FROM roles "; 

                                  if (!$result2 = $db->query($sql2))
                                    {
                                      die('No hace subconsulta a los roles del select ['.$db->error.']');
                                    }

                                  while ($row2 = $result2->fetch_assoc())
                                  { 
                                    $IId_Rol=stripslashes($row2["idroles"]);
                                    $Rrol=stripslashes($row2["rol"]);
                                    echo "<option value='$IId_Rol'>$Rrol</option>";
                                  }

                                // FIN CONSULTA DE TRAER LOS ROL
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="selecgenero" name="selecgenero" required>
                            <option value="<?php echo $GGenero_idgenero ?>"><?php echo $DDes_genero ?></option>
                            <?php
                                //  CONSULTA PARA TRAER LOS GENERO

                                include ('conexion.php');

                                $sql2 = "SELECT * FROM Genero "; 

                                  if (!$result2 = $db->query($sql2))
                                    {
                                      die('No hace subconsulta a los generos del select ['.$db->error.']');
                                    }

                                  while ($row2 = $result2->fetch_assoc())
                                  { 
                                    $IId_genero=stripslashes($row2["idgenero"]);
                                    $DDes=stripslashes($row2["descripcion"]);
                                    echo "<option value='$IId_genero'>$DDes</option>";
                                  }

                                // FIN CONSULTA DE TRAER LOS GENERO
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="button" name="Actualizar" id="Actualizar" value="Actualizar" class="btn btn-warning">
                    </div>
                    <div class="form-group">
                        <span id="result"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>

    <script>
        $(document).ready(function() {
            // ACTUALIZAR EL EMPLEADOS
            $('#Actualizar').click(function(){
                var IIdempleado = $('#IIdempleado').val();
                var nombre = $('#nombre').val();
                var apellido = $('#apellido').val();
                var selectipodoc = $('#selectipodoc').val();
                var documento = $('#documento').val();
                var direccion = $('#direccion').val();
                var email = $('#email').val();
                var telefono = $('#telefono').val();
                var selecrol = $('#selecrol').val();
                var selecgenero = $('#selecgenero').val();

                //var fileName = document.getElementById('imagen').files[0].name;

                var parametros = new FormData($("#FormEmpleado")[0]);
                

                if($.trim(nombre).length > 0 && $.trim(apellido).length > 0 && $.trim(documento).length > 0 && $.trim(direccion).length > 0 && $.trim(email).length > 0 && $.trim(telefono).length > 0){
                    if (isNaN(documento)){
                        $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Solo se permite numeros en el campo <strong>documento</strong>¡</div>");
                        $('#documento').value = "";
                    }else if (isNaN(telefono)) {
                        $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Solo se permite numeros en el campo <strong>telefono</strong>¡</div>");
                        $('#telefono').value = "";
                    }else {
                        $.ajax({
                            url:"Empleados-Editar-neg.php",
                            type:"POST",
                            data:parametros,
                            contentType:false,
                            processData:false, 
                            cache:"false",
                            beforeSend:function() {
                                $('#Actualizar').val("Actualizando...");
                            },
                            success:function(data) {
                                $('#Actualizar').val("Actualizar");
                                var datos = $.parseJSON(data);
                                // SI
                                if (datos.status == "1") {
                                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Actualizado correctamente¡</div>");
                                    location.reload();
                                    window.location.href = 'Empleados-crear.php';

                                }
                                // NO
                                else if (datos.status == "2") {
                                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Error actualizar el empleado</div>");
                                }
                            }
                        });
                    }

                } else {
                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Ningun campo puede estar vacio¡</div>");
                }
                // FIN ACTUALIZAR EL PLATO
            });
        });
    </script>
</body>
</html>