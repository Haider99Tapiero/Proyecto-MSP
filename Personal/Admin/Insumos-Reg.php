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
        #resulteliminar{
            margin: 0 auto;
            width: 50%;
        }

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
            session_start();
            include ("Menu-Admin.php");
        ?>
    </header>
    <div class="container col-md-10">
        <div class="" id="myModal" tabindex="-1" role="dialog" aria-labelledby="LabelModalogin" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" class="formulario" action="" id="FormPlato" autocomplete="off" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="font-size: 20px; text-align: center;">Registrar insumo</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input class="form-control" name="cantidad" type="text" id="cantidad" required/>
                        </div>
                        <div class="form-group">
                            <label>unidad de medida</label>
                            <input class="form-control" name="unidad_medida" type="text" id="unidad_medida" required/>
                        </div>
                        <div class="form-group">
                            <label>Descripcion</label>
                            <input class="form-control" name="descripcion" type="text" id="descripcion" required/>
                        </div>            
                        <div class="form-group">
                            <label>Categoria insumo</label>
                            <select class="form-control" name="categoriainsumo_idcategoriainsumo" id="categoriainsumo_idcategoriainsumo" required>
                                <option value="">Seleccione:</option>
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
                        <div class="form-group">
                            <label>Empleado</label>
                            <select class="form-control" name="empleados_idempleados" id="empleados_idempleados" required>
                                <option value=" ">Seleccione:</option>
                                <?php
                                    include ('conexion.php');
                                    $sql4 ="SELECT * FROM empleados";
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
                        <div class="form-group">
                            <label>Provedor</label>
                            <select class="form-control" name="proveedor_idproveedor" id="proveedor_idproveedor" required>
                                <option value="">Seleccione:</option>
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
                        <div class="form-group">
                            <input type="button" name="Registrar" id="Registrar" value="Registrar" class="btn btn-success">
                        </div>
                        <div class="form-group">
                            <span id="result"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>

    <script>
        $(document).ready(function() {
            // Registrar EL PLATO
            $('#Registrar').click(function(){
                var idplato = $('#idplato').val();
                var nombre = $('#nombre').val();
                var descripcion = $('#descripcion').val();
                var precio = $('#precio').val();     

                //var fileName = document.getElementById('imagen').files[0].name;

                var parametros = new FormData($("#FormPlato")[0]);

                if($.trim(nombre).length > 0 && $.trim(descripcion).length > 0 && $.trim(precio).length > 0){
                    if (isNaN(precio)){
                        $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Solo se permite numeros en el campo <strong>precio</strong>¡</div>");
                        $('#precio').value = "";
                    }
                    else {
                        $.ajax({
                            url:"Platos-Editar-neg.php",
                            type:"POST",
                            data:parametros,
                            contentType:false,
                            processData:false, 
                            cache:"false",
                            beforeSend:function() {
                                $('#Registrar').val("Registrando...");
                            },
                            success:function(data) {
                                $('#Registrar').val("Registrar");
                                var datos = $.parseJSON(data);
                                // SI
                                if (datos.status == "1") {
                                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Plato actualizado con exito¡</div>");
                                    //location.reload();
                                    location.href = 'Platos-Crear.php';
                                }
                                // NO
                                else if (datos.status == "2") {
                                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Error al registrar el plato¡</div>");
                                }
                            }
                        });
                    }

                } else {
                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Ningun campo puede estar vacio¡</div>");
                };

            });
        // FIN ACTUALIZAR EL PLATO
        });
    </script>
</body>
</html>