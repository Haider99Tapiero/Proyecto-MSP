<?php 
	session_start();

	if ($_SESSION["estado_cajero"] == "1") 
	{
		//$_SESSION["estado_cajero"] = "0";
		session_destroy();
		header("location: ../../Index.php");
	}
?>