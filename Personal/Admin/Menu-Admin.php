    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>	
	<style type="text/css">
		@import url(http://fonts.googleapis.com/css?family=Open+Sans);
		a {
			color: #23dbdb;
			text-decoration: none;
		}

		a:hover {
			color: #000;
		}

		ol, ul {
			list-style: none;
			padding:0px;
			margin:0px;
		}

		#wrap {
			margin: 0 auto;
		}

		.inner {
			margin: 0 auto;
			max-width: 940px;
			padding: 0 40px;
		}

		.relative {
			position: relative;
		}

		/* HEADER */
		#wrap > header {
			background-color: #333;
			padding-top: 20px;
			padding-bottom: 20px;
		}
		.logo {
			display: inline-block;
			font-size: 0;
			
			margin-left: -500px;

		}
		#navigation {
			position: absolute;
			right: -400px;
			bottom: 0px;
		}

		#menu-toggle {
			display: none;
			float: right;
		}

		/* HEADER > MENU */
		#main-menu {
			float: right;
			font-size: 0;
			margin: 10px 0;
		}

		#main-menu > li {
			display: inline-block;
			margin-left: 30px;
			padding: 2px 0;
		}


		#main-menu > li.parent > a {
			padding-left: 14px;
		}

		#main-menu > li > a {
			color: #eee;
			font-size: 14px;
			line-height: 14px;
			padding: 30px 0;
			text-decoration:none;
		}

		#main-menu > li:hover > a,
		#main-menu > li.current-menu-item > a {
			color: #23dbdb;
		}

		/* HEADER > MENU > DROPDOWN */
		#main-menu li {
			position: relative;
		}

		ul.sub-menu { /* level 2 */
			display: none;
			left: 0px;
			top: 38px;
			padding-top: 10px;
			position: absolute;
			width: 150px;
			z-index: 9999;
		}

		ul.sub-menu ul.sub-menu { /* level 3+ */
			margin-top: -1px;
			padding-top: 0;
			left: 149px;
			top: 0px;
		}

		ul.sub-menu > li > a {
			background-color: #333;
			border: 1px solid #444;
			border-top: none;
			color: #bbb;
			display: block;
			font-size: 12px;
			line-height: 15px;
			padding: 10px 12px;
		}

		ul.sub-menu > li > a:hover {
			background-color: #2a2a2a; 
			color: #fff;
		}

		ul.sub-menu > li:first-child {
			border-top: 3px solid #23dbdb;
		}

		ul.sub-menu ul.sub-menu > li:first-child {
			border-top: 1px solid #444;
		}

		ul.sub-menu > li:last-child > a {
			border-radius: 0 0 2px 2px;
		}

		ul.sub-menu > li > a.parent {
			background-image: url(../images/arrow.png);
			background-size: 5px 9px;
			background-repeat: no-repeat;
			background-position: 95% center;
		}

		#main-menu li:hover > ul.sub-menu {
			display: block; /* show the submenu */
		}

		@media all and (max-width: 700px) {

		#navigation {
			position: static;
			margin-top: 20px;
		}

		#menu-toggle {
			display: block;
		}

		#main-menu {
			display: none;
			float: none;
		}

		#main-menu li {
			display: block;
			margin: 0;
			padding: 0;
		}

		#main-menu > li {
			margin-top: -1px;
		}

		#main-menu > li:first-child {
			margin-top: 0;
		}

		#main-menu > li > a {
			background-color: #333;
			border: 1px solid #444;
			color: #bbb;
			display: block;
			font-size: 14px;
			padding: 12px !important;
			padding: 0;
		}

		#main-menu li > a:hover {
			background-color: #444; 
		}

		#main-menu > li.parent {
			background: none !important;
			padding: 0;
		}

		#main-menu > li:hover > a,
		#main-menu > li.current-menu-item > a {
			border: 1px solid #444 !important;
			color: #fff !important;
		}

		ul.sub-menu {
			display: block;
			margin-top: -1px;
			margin-left: 20px;
			position: static;
			padding: 0;
			width: inherit;
		}

		ul.sub-menu > li:first-child {
			border-top: 1px solid #444 !important;
		}

		ul.sub-menu > li > a.parent {
			background: #333 !important;
		}
		
		}
	</style>
	<div id="wrap">
		<header>
			<div class="inner relative">
				<a class="logo" href="#"><img src="../../cliente/imagenes/logo.png" style="border-radius: 5px" height="40" width="100" alt="fresh design web"></a>
				<nav id="navigation">
					<ul id="main-menu">
						<li class="current-menu-item"><a href=""><i class="fas fa-home"></i> Home</a></li>
						<li><a href="domicilio-listar.php"><i class="fas fa-utensils"></i> Ventas</a></li>
						<li><a href="Empleados-crear.php"><i class="fas fa-shopping-cart"></i> Empleados</a></li>
						<li><a href="Platos-Crear.php"><i class="fas fa-comments"></i> Registrar un plato</a></li>
						<li><a href="Insumos-Listar.php"><i class="fas fa-comments"></i> Insumos</a></li>
						<li><a href="Insumos-Reg.php"><i class="fas fa-comments"></i> Registrar insumo</a></li>
						<li class="parent">
							<a href=""><i class="fas fa-user"></i> <?php echo $_SESSION["nombre"];?></a>
							<ul class="sub-menu">
								<li><a href="Salir.php"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<div class="clear"></div>
			</div>
		</header>	
	</div>
<!--
	<script type="text/javascript">
		$(document).ready(function() {

		/* MAIN MENU */
		$('#main-menu > li:has(ul.sub-menu)').addClass('parent');
		$('ul.sub-menu > li:has(ul.sub-menu) > a').addClass('parent');

		$('#menu-toggle').click(function() {
			$('#main-menu').slideToggle(300);
			return false;
		});

		$(window).resize(function() {
			if ($(window).width() > 700) {
				$('#main-menu').removeAttr('style');
			}
		});

	});
	</script>
-->