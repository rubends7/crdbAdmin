<?php 
	$server='localhost';
	$userMySQL='root';
	$passMySQL='';
	$db='cerveza_ruegodb';

	$conexion=mysqli_connect($server,$userMySQL,$passMySQL,$db) or die("Error de conexion!!");
?>