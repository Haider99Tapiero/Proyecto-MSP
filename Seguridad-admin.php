<?php
	session_start ();
		if($_SESSION["estado_admin"]!="1")
			{
				header("location: ../../Index.php");
			}
?>
