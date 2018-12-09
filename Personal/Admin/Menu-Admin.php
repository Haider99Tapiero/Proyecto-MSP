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
		}
		#navigation {
			position: absolute;
			right: 40px;
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
				<a class="logo" href="http://www.freshdesignweb.com"><img src="" alt="fresh design web"></a>
				<a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
				<nav id="navigation">
					<ul id="main-menu">
						<li class="current-menu-item"><a href="http://www.freshdesignweb.com">Home</a></li>
						<li class="parent">
							<a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Features</a>
							<ul class="sub-menu">
								<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html"><i class="icon-wrench"></i> Elements</a></li>
								<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html"><i class="icon-credit-card"></i>  Pricing Tables</a></li>
								<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html"><i class="icon-gift"></i> Icons</a></li>
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
							<a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Blog</a>
							<ul class="sub-menu">
								<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Large Image</a></li>
								<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Medium Image</a></li>
								<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Masonry</a></li>
								<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Double Sidebar</a></li>
								<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Single Post</a></li>
							</ul>
						</li>
						<li><a href="http://www.freshdesignweb.com/responsive-drop-down-menu-jquery-css3-using-icon-symbol.html">Contact</a></li>
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