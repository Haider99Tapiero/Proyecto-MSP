
	  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

	  <link rel="stylesheet" href="menuclient.css">
	<div id="wrap">
		<header>
			<div class="inner relative">
				<a class="logo" href="http://www.freshdesignweb.com"><img src="" alt="fresh design web"></a>
				<a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
				<nav id="navigation">
					<ul id="main-menu">
						<li class="current-menu-item"><a href="http://www.freshdesignweb.com">Home</a></li>
						<li class="parent">
							<a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Features</a>
							<ul class="sub-menu">
								<li><a href="Carrito_compras.php"><i class="icon-credit-card"></i>  Comprar</a></li>
									<li><a href="carritodecompras.php"><i class="icon-wrench"></i> Mis compras</a></li>
								<li><a href="Chat.php"><i class="icon-gift"></i>Comentar</a></li>
								<li>
									<a class="parent" href="#"><i class="icon-file-alt"></i> Pages</a>
									<ul class="sub-menu">
										<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Full Width</a></li>
										<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Left Sidebar</a></li>
										<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Right Sidebar</a></li>
										<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Double Sidebar</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Portfolio</a></li>
						<li class="parent">
							<a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html"><i class="fas fa-user"></i>  
							  <?php echo $_SESSION["nombre"];?> 
							</a>
							<ul class="sub-menu">
								<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Configuracion</a></li>
								<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Salir</a></li>
								
							</ul>
						</li>
						
					</ul>
				</nav>
				<div class="clear"></div>
			</div>
		</header>	
	</div>

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
	