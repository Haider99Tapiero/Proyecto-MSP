<?php
	session_start ();
		if($_SESSION["estado_cajero"]!="1")
			{
				header("location: ../../Index.php");
			}
?>