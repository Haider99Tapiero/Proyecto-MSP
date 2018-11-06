<?php 
	session_start();

	if ($_SESSION["S_VENDEDOR"] != "1") 
	{
		header ("location: ../../Login.php");
	}
?>