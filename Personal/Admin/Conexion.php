<?php 
	$db = new mysqli('localhost','root','','Restaurante');
	$acentos = $db->query("SET NAMES 'utf8'");
	if ($db->connect_error > 0) 
	{
		die('No se puede conectar a la base de datos ['.$db->connect_error.']');
	}
?>