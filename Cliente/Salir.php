<?php 
	session_start();

	if ($_SESSION["estado_cliente"] == "1") 
	{
		//$_SESSION["estado_cliente"] = "0";
		session_destroy();
		header("location: ../Index.php");
	}
?>