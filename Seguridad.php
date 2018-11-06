<?php
	session_start ();
		if($_SESSION["estado"]!="1")
			{
				header("location: index_error.php");
			}
?>
