<?php
	session_start ();
		if($_SESSION["estado_cliente"]!="1")
			{
				header("location: ../Index.php");
			}
?>
