<?php 
	session_start();

	if ($_SESSION["estado_admin"] == "1") 
	{
		//$_SESSION["estado_admin"] = "0";
		session_destroy();
		header("location: ../../Index.php");
	}
?>