<?php 
	session_start();

	if ($_SESSION["S_ADMIN"] != "1") 
	{
		header ("location: ../../Login.php");
	}
?>