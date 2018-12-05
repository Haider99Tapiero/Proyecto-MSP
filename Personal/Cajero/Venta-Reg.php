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

		.switch {
		  position: relative;
		  display: inline-block;
		  width: 60px;
		  height: 34px;
		  margin-left: 5px;
		}

		.switch input { 
		  opacity: 0;
		  width: 0;
		  height: 0;
		}

		.slider {
		  position: absolute;
		  cursor: pointer;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  background-color: #ccc;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		.slider:before {
		  position: absolute;
		  content: "";
		  height: 26px;
		  width: 26px;
		  left: 4px;
		  bottom: 4px;
		  background-color: white;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		input:checked + .slider {
		  background-color: #2196F3;
		}

		input:focus + .slider {
		  box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before {
		  -webkit-transform: translateX(26px);
		  -ms-transform: translateX(26px);
		  transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
		  border-radius: 34px;
		}

		.slider.round:before {
		  border-radius: 50%;
		}

    </style>
</head>
<body>
<div class="row">
<div class="col-1"></div>
	<div class="container-fluit col-md-10">
		
		<table class="table table-striped" border='1'>
				<thead>
					<tr>
						<th>Id</th>
						<th>Fecha</th>
						<th>Cantidad</th>
		          		<th>Empleado</th>
						<th>Plato</th>
		          		<th>Mesa</th>	
			        </tr>
				</thead>
				<tbody>
					<?php
						class Ventas
						{
							public function listar()
							{
								include ('conexion.php');

								$sql ="SELECT * FROM detalle_presencial ";
								
								if (isset($_POST['fecha-enviar'])) {
									$Fecha_Con = $_POST['fecha_venta'];
									$sql ="SELECT * FROM detalle_presencial WHERE fecha_venta = '$Fecha_Con' ";
								}

								if (isset($_POST['mostrar_todo'])) {
									$sql ="SELECT * FROM detalle_presencial ";
								}



								if(!$result = $db-> query($sql))
								{
									die('No hace consulta a ventas [' . $db->error . ']');
								}		
								while ($row = $result->fetch_assoc())
								{
									$iid=stripcslashes($row["iddetalle_presencial"]);
									$ffecha=stripslashes($row["fecha_venta"]);
									$ccantidad=stripslashes($row["cantidad"]);
									$fforma_pago_idformapago=stripslashes($row["forma_pago_idforma_pago"]);
									$MMesas_idMesas=stripslashes($row["mesas_idmesas"]);
									$PPlato_idPlato=stripslashes($row["plato_idplato"]);
									
									 
									$sql2 ="SELECT * FROM forma_pago WHERE idforma_pago = '$fforma_pago_idformapago'";

									if(!$result2 = $db-> query($sql2))
									{
										die('No conecta [' . $db->error . ']');
									}
									while ($row2 = $result2->fetch_assoc())
									{
										$nnombre=stripslashes($row2["descripcion"]);
									}

									$sql3 ="SELECT * FROM mesas  WHERE idmesas = '$MMesas_idMesas'";
									
									if(!$result3 = $db-> query($sql3))
									{
										die('No conecta [' . $db->error . ']');
									}
									while ($row3 = $result3->fetch_assoc())
									{
										$mmesa=stripslashes($row3["mesa"]);
									}

									$sql4 ="SELECT * FROM plato WHERE idPlato = '$PPlato_idPlato'";
									
									if(!$result4 = $db-> query($sql4))
									{
										die('No conecta [' . $db->error . ']');
									}
									while ($row4 = $result4->fetch_assoc())
									{
										$nnombreplato=stripslashes($row4["nombre"]);
									}
									
									
									
					        		echo "<tr>";
					        			echo "<td>$iid</td>";
										echo "<td>$ffecha</td>";
										echo "<td>$ccantidad</td>";
						          		echo "<td>$nnombre</td>";
										echo "<td>$nnombreplato</td>";
						          		echo "<td>$mmesa</td>";
					        		echo "</tr>";	
								}
							}
						}
						$nuevo=new Ventas();
						$nuevo->listar();
					?>
				</tbody>
			</table>        <div class="row">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar</button>
        </div>
        <div class="row">
            <span id="resulteliminar"></span>
        </div>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="LabelModalogin" aria-hidden="true">
    		<div class="modal-dialog" role="document">
        		<div class="modal-content">
           			<form method="post" class="formulario" action="" id="FormEmpleado" autocomplete="off" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="font-size: 20px; text-align: center;">Registrar Venta</p>
                                </div>
                            </div>
                        <div class="form-group">
		  		<label>Cantidad</label>
           		<input class="form-control" name="cantidad" type="text" id="cantidad" required/>
			</div>
			<div class="form-group">
		<form class="col-md-4" name="form1" method="post" action="Venta-Reg-neg.php">
			
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
	</div>

	<script>
		$(document).ready(function() {
			// ESTADO DEL EMPLEADO
			$(".estado").change(function(){
				var idemple = $(this).val();
				var estado;
				if ($(this).prop("checked")) {
	        		estado = 1;
				}
				else{
					estado = 2;
				}

				$.ajax({
	                url:"Empleados-estado-neg.php",
	                method:"POST",
	                data:{idemple:idemple, estado:estado},
	                cache:"false",
	                beforeSend:function() {
	                    
	                },
	                success:function(data) {
	                    var datos = $.parseJSON(data);
	                    // SI
	                    if (datos.status == "1") {
	                        location.reload();
	                    }
	                    // NO
	                    else if (datos.status == "2") {
	                        $("#resulteliminar").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!No se pudo cambiar el estado¡</div>");
	                    }
	                }
	            });
	    	});
			// FIN ESTADO EMPLEADO
			// GUARDAR EL EMPLEADO
	        $('#Guardar').click(function(){
	            var nombre = $('#nombre').val();
	            var apellido = $('#apellido').val();
	            var selectipodoc = $('#selectipodoc').val();
	            var documento = $('#documento').val();
	            var direccion = $('#direccion').val();
	            var email = $('#email').val();
	            var telefono = $('#telefono').val();
	            var contrasena = $('#contrasena').val();
	            var selecrol = $('#selecrol').val();
	            var selecgenero = $('#selecgenero').val();

	            //var fileName = document.getElementById('imagen').files[0].name;

	            var parametros = new FormData($("#FormEmpleado")[0]);
	            

	            if($.trim(nombre).length > 0 && $.trim(apellido).length > 0 && $.trim(documento).length > 0 && $.trim(direccion).length > 0 && $.trim(email).length > 0 && $.trim(telefono).length > 0 && $.trim(contrasena).length > 0){
	                if (isNaN(documento)){
	                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Solo se permite numeros en el campo <strong>documento</strong>¡</div>");
	                    $('#documento').value = "";
	                }else if (isNaN(telefono)) {
	                	$("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Solo se permite numeros en el campo <strong>telefono</strong>¡</div>");
	                    $('#telefono').value = "";
	                }else {
	                    $.ajax({
	                        url:"Empleados-crear-neg.php",
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
	                                $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Usuario registrado con exito¡</div>");
	                                location.reload();
	                            }
	                            // NO
	                            else if (datos.status == "2") {
	                                $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Error al registrar el usuario</div>");
	                            }
	                        }
	                    });
	                }

	            } else {
	                $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Ningun campo puede estar vacio¡</div>");
	            };

	        });
	    	// FIN GUARDAR EL EMPLEADO
	    });
	</script>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>
</body>
</html>