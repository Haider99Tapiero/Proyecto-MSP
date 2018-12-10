<?php
	include"db.php";
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bbootstrap css -->
	<link rel="stylesheet" href="../menuclient.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!--/////////////////////////////////////ABRIR CAPA OBSERVACION.PHP//////////////////////////////////////-->
	<script type="text/javascript">
		function ajax(){
			var req =new XMLHttpRequest();
			
			req.onreadystatechange=function(){
				if(req.readyState==4 && req.status==200){
					document.getElementById('chat').innerHTML=req.responseText;
				}
			}
			
			/*///////////////HACE QUE LA PAGINA SE RECARGUE CADA SEGUNDO ////////////////*/
			req.open('GET','observacion.php',true);
			req.send();
              /*/////////////////////////////////////////*/
              
		}
		setInterval(function(){ajax();},1000);
	</script>
	<!--/////////////////////////////////////////////////-->		
	<title></title>
</head>
	<body onload="ajax();">
		<header>
			<?php
				session_start();
				include("menu-cliente.php");
			?>
		</header>
		<div class="form-group"></div>
		<div class="container ">
	    <!--//////////////////////SE INCLUYE CAPA OBSERVACION///////////////-->
			
			<form action="chat.php" method="post" class="">
				<div class="form-group">
				</div>
			  <div class="row">
			      <div class="col-11 ">
			      	<input name="comentario" class="form-control" id="mens" placeholder="mensaje">
			      </div>
			      <div class="col-1">
			      	<input  class="btn btn-primary"  type="submit" name="enviar" value="enviar">
			      </div>
			  </div>
			</form>
			<div id="contenedor" >
				<div id="caja-chat">
					<div id="chat">									
					</div>
				</div>
			</div>						
			<span></span>
	    <!--//////////////////PHP PARA INSERTAR DATOS//////////////////-->
			<?php
			  if(isset($_POST['enviar'])){
					if(isset($_SESSION['idcliente'])){
						$idcliente = $_SESSION["idcliente"];
						$comentario=$_POST['comentario'];
						$consulta ="INSERT INTO observacion( comentario,cliente_idcliente) VALUES ('$comentario','$idcliente')";
						$ejecutar =$conexion->query($consulta);								
					}else{   
						echo"<div class='alert alert-danger'>";
						echo"no se inicio sesion";
						echo"<div>";
					}		
			  }
			?>
	    <!--////////////////////////////////////////////////////////-->
    	</div>		
		<!--///////////////////////////////////////////////////////-->		 
		<script type="text/javascript">
			valor = document.getElementById("mens").value;
			if( valor == null ) {
			return false;
			}
		</script>
	   <!--//////////////////////  Scripsts Bootstrap ////////////////////////////////-->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
