<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/platos.css">
    <title>Inicio</title>
</head>
<body>
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
            <!--<?php/*
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

            */?>-->
            </tbody>
        </table>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar</button>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="LabelModalogin" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="formulario" action="" id="FormPlato" autocomplete="off" >
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="font-size: 20px; text-align: center;">Registrar plato</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="nombre" type="text" id="nombre" placeholder="Nombre plato"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="descripcion" type="text" id="descripcion" placeholder="Descripcion plato"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="costo" type="text" id="costo" placeholder="Costo"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="imagen" id="imagen" type="file">
                        </div>
                        <div class="form-group">
                            <input type="button" name="Guardar" id="Guardar" value="Guardar" class="btn btn-success">
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
        $('#Guardar').click(function(){
            var nombre = $('#nombre').val();
            var descripcion = $('#descripcion').val();
            var costo = $('#costo').val();
            //var files = $('#imagen');

            var fileName = document.getElementById('imagen').files[0].name;

            //var fileName = files[0].name;
            //var fileSize = files[0].size;
            //var fileType = files[0].type;


            if($.trim(nombre).length > 0 && $.trim(descripcion).length > 0 && $.trim(costo).length > 0){
                if (isNaN(costo)){
                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Solo se permite numeros en el campo <strong>costo</strong>¡</div>");
                    $('#costo').value = "";
                }
                else {
                    $.ajax({
                        url:"Platos-Crear-neg.php",
                        method:"POST",
                        data:{nombre:nombre, descripcion:descripcion, costo:costo, fileName:fileName},
                        cache:"false",
                        beforeSend:function() {
                            $('#Guardar').val("Guardando...");
                        },
                        success:function(data) {
                            $('#Guardar').val("Guardar");
                            var datos = $.parseJSON(data);
                            // CLIENTE
                            if (datos.status == "1") {
                                $(location).attr('href','Cliente/Carrito_compras.php');
                            }
                            // ADMIN
                            else if (datos.status == "2") {
                                $(location).attr('href','capa_admin.php');
                            }
                            // CAJERO
                            else if (datos.status == "3") {
                                $(location).attr('href','capa_cajero.php');
                            }   
                            // NN
                            else if (datos.status == "4") {
                                $(location).attr('href','NN.php');
                            }
                            else {
                                $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!El <strong>documento </strong> o <strong>contraseña </strong>son incorrectos¡</div>");
                            }
                        }
                    });
                }

            } else {
                $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Ningun campo puede estar vacio¡</div>");
            };
        });
    });

    </script>


</body>
</html>

<!-- Allie X - Paper Love -->