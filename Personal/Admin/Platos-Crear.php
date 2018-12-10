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
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
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
      
        include("Menu-Admin.php");
      ?>
  </header>
   
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCION</th>
                    <th>PRECIO</th>
                    <th>IMAGEN</th>
                    <th>ACCION</th>
                </tr>
            </thead>
            <tbody>
            <?php
                class Platos
                {
                    public function listar()
                    {
                        $cont="0";
                        //  CONSULTAR DE LA BASE DE DATOS
                        include ('conexion.php');
                        $sql = "SELECT * FROM Plato";
                        if (!$result = $db->query($sql))
                        {
                            die('No hace consulta a platos ['.$db->error.']');
                        }
                        while ($row = $result->fetch_assoc())
                        { 
                            $IIdPlato=stripslashes($row["idPlato"]);
                            $NNombre=stripslashes($row["nombre"]);
                            $DDescripcion=stripslashes($row["descripcion"]);
                            $PPrecio=stripslashes($row["precio"]);
                            $IImagen=stripslashes($row["imagen"]);

                            // RUTA
                            $folder = '../../Cliente/productos/';
                            $imagen = $folder.$IImagen;
                            // FIN RUTA

                            echo"<tr>";
                                echo"<td>$IIdPlato</td>";
                                echo"<td>$NNombre</td>";  
                                echo"<td>$DDescripcion</td>";  
                                echo"<td>$PPrecio</td>";  
                                if ($IImagen == '') {
                                    echo "<td>Sin asignar imagen</td>";
                                }else{
                                    echo'<td><a  target="_blank" href="'.$imagen.'"><img height="50" src="'.$imagen.'"></a></td>';
                                }
                                echo"<td>
                                    <a href='Platos-Editar.php?idPlato=".$IIdPlato."' class='btn btn-warning'>
                                        <i class='far fa-edit'></i>
                                    </a>
                                    <button type='button' class='btn btn-danger EliminarPlato' value='".$IIdPlato."'>
                                        <i class='far fa-trash-alt'></i>
                                    </button>
                                    </td>";
                            echo"<tr>";
                        }
                    }                
                }
                $nuevo=new Platos();
                $nuevo->listar();

            ?>
            </tbody>
        </table>
        <div class="row">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar</button>
        </div>
        <div class="row">
            <span id="resulteliminar"></span>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="LabelModalogin" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" class="formulario" action="" id="FormPlato" autocomplete="off" enctype="multipart/form-data">
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
    </div>

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>
    
    <script>
    $(document).ready(function() {
    // GUARDAR EL PLATO
        $('#Guardar').click(function(){
            var nombre = $('#nombre').val();
            var descripcion = $('#descripcion').val();
            var costo = $('#costo').val();

            //var fileName = document.getElementById('imagen').files[0].name;

            var parametros = new FormData($("#FormPlato")[0]);

            if($.trim(nombre).length > 0 && $.trim(descripcion).length > 0 && $.trim(costo).length > 0){
                if (isNaN(costo)){
                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Solo se permite numeros en el campo <strong>costo</strong>¡</div>");
                    $('#costo').value = "";
                }
                else {
                    $.ajax({
                        url:"Platos-Crear-neg.php",
                        type:"POST",
                        data:parametros,
                        contentType:false,
                        processData:false, 
                        cache:"false",
                        beforeSend:function() {
                            $('#Guardar').val("Guardando...");
                        },
                        success:function(data) {
                            $('#Guardar').val("Guardar");
                            var datos = $.parseJSON(data);
                            // SI
                            if (datos.status == "1") {
                                $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Plato creado con exito¡</div>");
                                location.reload();
                            }
                            // NO
                            else if (datos.status == "2") {
                                $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Error al crear el plato¡</div>");
                            }
                        }
                    });
                }

            } else {
                $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Ningun campo puede estar vacio¡</div>");
            };

        });
    // FIN GUARDAR EL PLATO
    // ELIMINAR PLATO
        $('.EliminarPlato').click(function(){
            var idplato = $(this).val();

            $.ajax({
                url:"Platos-Eliminar-neg.php",
                method:"POST",
                data:{idPlato:idplato},
                cache:"false",
                beforeSend:function() {
                    
                },
                success:function(data) {
                    var datos = $.parseJSON(data);
                    // SI
                    if (datos.status == "1") {

                        $("#resulteliminar").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Eliminado con exito¡</div>");
                        location.reload();


                    }
                    // NO
                    else if (datos.status == "2") {
                        $("#resulteliminar").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Es posible que el plato se encuentre en algun registro de venta¡</div>");
                    }
                }
            });
        });
    // FIN ELIMINAR PLATO
    });
    </script>
</body>
</html>