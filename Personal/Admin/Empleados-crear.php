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
    </style>
</head>
<body>
	<div class="container-fluid">
		<?php 
			include('Menu-Admin.php');
		?>
		<table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>T.DOCUMENTO</th>
                    <th>DOCUMENTO</th>
                    <th>DIRECCION</th>
                    <th>EMAIL</th>
                    <th>TELEFONO</th>
                    <th>GENERO</th>
                    <th>ROL</th>
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
                        $sql = "SELECT * FROM empleados";
                        if (!$result = $db->query($sql))
                        {
                            die('No hace consulta a empleado ['.$db->error.']');
                        }
                        while ($row = $result->fetch_assoc())
                        { 
                            $IIdEmple=stripslashes($row["idempleados"]);
                            $NNombre=stripslashes($row["nombre"]);
                            $AApellido=stripslashes($row["apellido"]);
                            $TTDocumento=stripslashes($row["tipodocumento_idtipodocumento"]);
                            $DDocumento=stripslashes($row["documento"]);
                            $DDirecion=stripslashes($row["direccion"]);
                            $EEmail=stripslashes($row["email"]);
                            $TTelefono=stripslashes($row["telefono"]);
                            $GGenero=stripslashes($row["genero_idgenero"]);
                            $RRol=stripslashes($row["roles_idroles"]);

                            $sql2 ="SELECT * FROM tipodocumento WHERE idtipodocumento = '$TTDocumento'";

							if(!$result2 = $db-> query($sql2))
							{
								die('No hace consulta de tipodocumento [' . $db->error . ']');
							}
							while ($row2 = $result2->fetch_assoc())
							{
								$DDesTipoDocu=stripslashes($row2["descripcion"]);
							}

							$sql3 ="SELECT * FROM genero WHERE idgenero = '$GGenero'";

							if(!$result3 = $db-> query($sql3))
							{
								die('No hace consulta de genero [' . $db->error . ']');
							}
							while ($row3 = $result3->fetch_assoc())
							{
								$DDesGenero=stripslashes($row3["descripcion"]);
							}

							$sql4 ="SELECT * FROM roles WHERE idroles = '$RRol'";

							if(!$result4 = $db-> query($sql4))
							{
								die('No hace consulta de roles [' . $db->error . ']');
							}
							while ($row4 = $result4->fetch_assoc())
							{
								$DDesRol=stripslashes($row4["rol"]);
							}

                            echo"<tr>";
                                echo"<td>$IIdEmple</td>";
                                echo"<td>$NNombre</td>";  
                                echo"<td>$AApellido</td>";  
                                echo"<td>$DDesTipoDocu</td>";
                                echo"<td>$DDocumento</td>";
                                echo"<td>$DDirecion</td>";  
                                echo"<td>$EEmail</td>";  
                                echo"<td>$TTelefono</td>";
                                echo"<td>$DDesGenero</td>";  
                                echo"<td>$DDesRol</td>";
                                echo"<td>
                                    <a href='Platos-Editar.php?idPlato=".$IIdEmple."' class='btn btn-warning'>
                                        <i class='far fa-edit'></i>
                                    </a>
                                    <button type='button' class='btn btn-danger EliminarPlato' value='".$IIdEmple."'>
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
           			<form method="post" class="formulario" action="" id="FormEmpleado" autocomplete="off" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="font-size: 20px; text-align: center;">Registrar plato</p>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
							<input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre emplado" />
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="apellido" id="apellido" placeholder="Apellido emplado" />
						</div>
						<div class="form-group">		
							<select class="form-control" id="selectipodoc" name="selectipodoc" required>
								<option value="">Tipo documento</option>
								<?php
									//  CONSULTA PARA TRAER LOS TIPODOCUMENTO

									include ('conexion.php');

									$sql2 = "SELECT * FROM tipodocumento "; 

					                  if (!$result2 = $db->query($sql2))
					                    {
					                      die('No hace subconsulta a tipo documento del select ['.$db->error.']');
					                    }

					                  while ($row2 = $result2->fetch_assoc())
					                  { 
					                  	$IId_Tipo_Doc=stripslashes($row2["idTipoDocumento"]);
					                    $DDes=stripslashes($row2["descripcion"]);
					                    echo "<option value='$IId_Tipo_Doc'>$DDes</option>";
					                  }

					                // FIN CONSULTA DE TRAER LOS TIPODOCUMENTO
								?>
							</select>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="documento" id="documento" placeholder="Documento" />
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion residencia" />
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="email" id="email" placeholder="Email" />
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono" />
						</div>
						<div class="form-group">
							<input class="form-control" type="password" name="contrasena" id="contrasena" placeholder="Contraseña" />
						</div>
						<div class="form-group">	
							<select class="form-control" id="selecrol" name="selecrol" required>
								<option value="">Rol</option>
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
					                  	$IId_Rol=stripslashes($row2["idRoles"]);
					                    $Rrol=stripslashes($row2["rol"]);
					                    echo "<option value='$IId_Rol'>$Rrol</option>";
					                  }

					                // FIN CONSULTA DE TRAER LOS ROL
								?>
							</select>
						</div>
						<div class="form-group">
							<select class="form-control" id="selecgenero" name="selecgenero" required>
								<option value="">Genero</option>
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
					                  	$IId_genero=stripslashes($row2["idGenero"]);
					                    $DDes=stripslashes($row2["descripcion"]);
					                    echo "<option value='$IId_genero'>$DDes</option>";
					                  }

					                // FIN CONSULTA DE TRAER LOS GENERO
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

	<script>
		$(document).ready(function() {
			// GUARDAR EL PLATO
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
	    // FIN GUARDAR EL PLATO
	    });
	</script>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>
</body>
</html>