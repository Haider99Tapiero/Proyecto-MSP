<?php 
	

	if (isset($_SESSION["Plato_crear_ok"])) {
        echo "<script>alert('Creado correctamente');</script>";
        unset($_SESSION["Plato_crear_ok"]);
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        .input-group{
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<header>
     
      <?php
      session_start();
        include("../../menu-caje-msp.php");
      ?>
      
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="js/jquery-3.3.1.min.js"></script>
  </header>

<body>
	
  
	<div class="container">
		<form class="col-md-4" name="form1" method="post" action="Venta-Reg-neg.php">
			<div class="input-group">
		  		<label>Cantidad</label>
           		<input class="form-control" name="cantidad" type="text" id="cantidad" required/>
			</div>
			<div class="container">
		<form class="col-md-4" name="form1" method="post" action="Venta-Reg-neg.php">
			
			<div class="input-group">
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
			<div class="input-group">
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
			<div class="input-group">
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
			<div class="input-group">
            	<input class="btn btn-success" type="submit" name="Submit" value="Finalizar Venta"/>
			</div>
    		<div class="input-group">
          		<a class="btn btn-danger" href="xxxxx">cancelar</a>
    		</div>
    	</form>
	</div>
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>