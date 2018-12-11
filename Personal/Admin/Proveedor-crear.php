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
                                    <p style="font-size: 20px; text-align: center;">Registrar proveedor</p>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Nombre proveedor</label>
                            <input class="form-control" name="proveedor" type="text" id="proveedor" required/>
                        </div> 
                        <div class="form-group">
                            <label>Celular</label>
                            <input class="form-control" name="numero" type="text" id="numero" required/>
                        </div>            
                        <div class="form-group">
                            <label>Categoria insumo</label>
                            <select class="form-control" name="idcategoriainsumo" id="idcategoriainsumo" required>
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
                var proveedor = $('#proveedor').val();
                var idcategoriainsumo = $('#idcategoriainsumo').val();
                var numero = $('#numero').val();
                   

                //var fileName = document.getElementById('imagen').files[0].name;

                var parametros = new FormData($("#FormPlato")[0]);

                if($.trim(proveedor).length > 0 ){
                   if (isNaN(numero)){
                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Solo se permite numeros en el campo <strong>Celular</strong>¡</div>");
                    $('#costo').value = "";
                }
                    else {
                        $.ajax({
                            url:"proveedor-reg-neg.php",
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
                                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Proveedor actualizado con exito¡</div>");
                                    location.reload();
                                    //location.href = 'Platos-Crear.php';
                                }
                                // NO
                                else if (datos.status == "2") {
                                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Error al registrar el proveedor¡</div>");
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