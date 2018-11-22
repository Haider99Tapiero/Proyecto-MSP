<?php 
	//include ('S_Admin.php')
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php 
				//require('Menu-Admin.php');
			?>
		</div>
		<div class="row">
			<div class="col-md-12">
	            <table class="table table-bordered table-striped table-hover">
	                <thead>
	                    <tr>
	                        <th width="40">ID</th>
	                        <th>Nombre</th>
	                        <th>Apellido</th>
	                        <th>Documento</th>
	                        <th>Direccion</th>
	                        <th>Email</th>
	                        <th>Telefono</th>
	                        <th>Tipo Doc</th>
	                        <th>Rol</th>
	                        <th>Genero</th>
	                        <th width="125">Accion</th>
	                    </tr>
	                </thead>
	                <tbody></tbody>
	            </table>
	        </div>
	    </div>

		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Agregar</button>
	    
	    <div class="row">
			<div id="myModal" class="modal fade " role="dialog">
				<div class="modal-dialog">
					<div class="modal-content col-md-6 col-md--offset12">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
<form autocomplete="off">
	<div class="input-group">
		<p class="titulo">Registrar empleados</p>
	</div>
	<div class="input-group">
		<input class="form-control" type="text" name="idempleado" id="idempleado" placeholder="Id empleado" />
	</div>
	<div class="input-group">
		<input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre emplado" />
	</div>
	<div class="input-group">
		<input class="form-control" type="text" name="apellido" id="apellido" placeholder="Apellido emplado" />
	</div>
	<div class="input-group">		
		<select class="form-control" id="selectipodoc" name="Id_Tipo_Doc">
			<option value="">Tipo documento</option>
			<?php
				//  CONSULTA PARA TRAER LOS CC

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

                // FIN CONSULTA DE TRAER LOS CC
			?>
		</select>
	</div>
	<div class="input-group">
		<input class="form-control" type="text" name="documento" id="documento" placeholder="Documento" />
	</div>
	<div class="input-group">
		<input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion residencia" />
	</div>
	<div class="input-group">
		<input class="form-control" type="text" name="email" id="email" placeholder="Email" />
	</div>
	<div class="input-group">
		<input class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono" />
	</div>
	<div class="input-group">	
		<select class="form-control" id="selecrol" name="Id_Rol">
			<option value="">Rol</option>
			<?php
				//  CONSULTA PARA TRAER LOS CC

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

                // FIN CONSULTA DE TRAER LOS CC
			?>
		</select>
	</div>
	<div class="input-group">
		<select class="form-control" id="selecgenero" name="Id_Genero">
			<option value="">Genero</option>
			<?php
				//  CONSULTA PARA TRAER LOS CC

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

                // FIN CONSULTA DE TRAER LOS CC
			?>
		</select>
	</div>
	<button type="button" id="save" class="btn btn-primary" onclick="saveData()">Guardar</button>
    <button type="button" id="update" class="btn btn-warning" onclick="updateData()">Actualizar</button>
</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap.min.js"></script>
    <script src="crud-empleados.js"></script>
</body>
</html>