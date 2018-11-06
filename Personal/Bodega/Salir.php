<?php 
	session_start();

	if ($_SESSION["S_VENDEDOR"] = "1") 
	{
		$_SESSION["S_VENDEDOR"] = "0";

		header("location: ../../Index.php");
	}
?>