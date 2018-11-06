<?php
	session_start ();
		if($_SESSION["Id_fk_rol"]!="admin")
			{
				header("location: index_error.php");
			}
?>
