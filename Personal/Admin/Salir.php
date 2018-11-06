<?php 
	session_start();

	if ($_SESSION["S_ADMIN"] = "1") 
	{
		$_SESSION["S_ADMIN"] = "0";

		header("location: ../../Index.php");
	}
?>