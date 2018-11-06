<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Menu</title>
</head>
<style type="text/css">
	body{
		margin-top: 100px;
	}
</style>
<body>
	<div class="container">
		<header>
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
							<span class="sr-only">Menu</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="" class="navbar-brand">Maspro</a>
					</div>
					<div class="collapse navbar-collapse" id="navbar-1">
						<ul class="nav navbar-nav">
							<li><a href="Crud-empleados.php">Registro de empleados</a></li>
							<li><a href="Platos-Crear.php">Administrar platos</a></li>
							<li><a href="Insumos-Reg.php">Administrar insumos</a></li>
							<li><a href="Insumos-Listar.php">Listar insumos</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown" rol="button"><?php echo $_SESSION["NOMBRE_EMPLEADO"]; ?> <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href=""><span class='glyphicon glyphicon-cog'>   Configuracion de cuenta</a></li>
									<li><a href=""><span class='glyphicon glyphicon-book'>   Ayuda</a></li>
									<li><a href="Salir.php"><span class='glyphicon glyphicon-log-out'>   Salir</a></li>
								</ul>
							</li>
						</ul>

					</div>
				</div>
			</nav>
		</header>
	</div>
</body>
</html>