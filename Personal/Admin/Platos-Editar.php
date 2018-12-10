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
        include("Menu-Admin.php");
      ?>
  </header>
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
            $IImagen=stripslashes($row["imagen"]);
            $PPrecio=stripslashes($row["precio"]);
        }
    ?>
    <div class="" id="myModal" tabindex="-1" role="dialog" aria-labelledby="LabelModalogin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" class="formulario" action="" id="FormPlato" autocomplete="off" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p style="font-size: 20px; text-align: center;">Editar plato</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="display: none;">
                        <input class="form-control" value="<?php echo $IIdPlato ?>" name="idplato" type="text" id="idplato" placeholder="idPlato"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" value="<?php echo $NNombre ?>" name="nombre" type="text" id="nombre" placeholder="Nombre plato"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" value="<?php echo $DDescripcion ?>" name="descripcion" type="text" id="descripcion" placeholder="Descripcion plato"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" value="<?php echo $PPrecio ?>" name="precio" type="text" id="precio" placeholder="Precio"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="imagen" id="imagen" type="file">
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
            // ACTUALIZAR EL PLATO
            $('#Actualizar').click(function(){
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
                                $('#Actualizar').val("Actualizando...");
                            },
                            success:function(data) {
                                $('#Actualizar').val("Actualizar");
                                var datos = $.parseJSON(data);
                                // SI
                                if (datos.status == "1") {
                                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Plato actualizado con exito¡</div>");
                                    //location.reload();
                                    location.href = 'Platos-Crear.php';
                                }
                                // NO
                                else if (datos.status == "2") {
                                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Error al actualizar el plato¡</div>");
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