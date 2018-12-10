<?php 
    include("../../Seguridad-cajero.php");
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
            
            include ("Menu-cajero.php");
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
                                    <p style="font-size: 20px; text-align: center;">Registrar venta</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
								<label for="cantidad">Cantidad</label>
                            <input class="form-control" type="text" name="cantidad" id="cantidad" placeholder="cantidad" />
							</div>
						<div class="form-group">
							<label>Forma de pago</label>
							<select class="form-control" name="idforma_pago" id="idforma_pago" required="required">
			           			<option value="Seleccione:">Seleccione:</option>
								<?php
									include ('conexion.php');
									$sql2 ="SELECT * FROM forma_pago";
									if(!$result2 = $db-> query($sql2))
									{
										die('No conecta [' . $db->error . ']');
									}
									while ($row2 = $result2->fetch_assoc())
									{
										$iidforma_pago=stripslashes($row2["idforma_pago"]);
										$nnombre=stripslashes($row2["descripcion"]);
										echo "<option value=$iidforma_pago>$nnombre</option>";
									}
								?>
			            	</select>
						</div>
						<div class="form-group">
							<label>Mesa</label>
				            <select class="form-control" name="Mesas_idMesas" id="Mesas_idMesas" required>
				              	<option value=Seleccione:>Seleccione:</option>
					            <?php
									include ('conexion.php');
									$sql4 ="SELECT * FROM mesas ";
									if(!$result4 = $db-> query($sql4))
									{
										die('No conecta [' . $db->error . ']');
									}
									while ($row4 = $result4->fetch_assoc())
									{
										$MMesas_idMesas=stripslashes($row4["idmesas"]);
										$mmesa=stripslashes($row4["mesa"]);
										echo "<option value=$MMesas_idMesas>$mmesa</option>";
									}
								?>
				            </select>
						</div>
						<div class="form-group">
							<label>Plato</label>
							<select class="form-control" name="Plato_idPlato" id="Plato_idPlato" required>
				             	<option value=Seleccione:>Seleccione:</option>
					            <?php
									include ('conexion.php');
									$sql3 ="SELECT * FROM plato ";
									if(!$result3 = $db-> query($sql3))
									{
										die('No conecta [' . $db->error . ']');
									}
									while ($row3 = $result3->fetch_assoc())
									{
										$PPlato_idPlato=stripslashes($row3["idPlato"]);
										$nnombre=stripslashes($row3["nombre"]);
										echo "<option value=$PPlato_idPlato>$nnombre</option>";
									}
								?>
				            </select>
						</div>
						<div class="form-group">
                            <input type="button" name="Realizar compra" id="Realizar compra" value="Realizar compra" class="btn btn-success">
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
            // Realizar compra EL PLATO
            $('#Realizar compra').click(function(){
                var cantidad = $('#cantidad').val();
                var idforma_pago = $('#idforma_pago').val();
                var Mesas_idMesas = $('#Mesas_idMesas').val();
                var Plato_idPlato = $('#Plato_idPlato').val(); 

                //var fileName = document.getElementById('imagen').files[0].name;

                var parametros = new FormData($("#FormPlato")[0]);

                if($.trim(cantidad).length > 0){
                    if (isNaN(cantidad)){
                        $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Solo se permite numeros en el campo <strong>cantidad</strong>¡</div>");
                    }
                    else {
                        $.ajax({
                            url:"Venta-Reg-neg.php",
                            type:"POST",
                            data:parametros,
                            contentType:false,
                            processData:false, 
                            cache:"false",
                            beforeSend:function() {
                                $('#Realizar compra').val("Realizando...");
                            },
                            success:function(data) {
                                $('#Realizar compra').val("Realizar compra");
                                var datos = $.parseJSON(data);
                                // SI
                                if (datos.status == "1") {
                                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Venta realizada¡</div>");
                                    location.reload();
                                    //location.href = 'Platos-Crear.php';
                                }
                                // NO
                                else if (datos.status == "2") {
                                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Imposible realizar venta¡</div>");
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