<?php

$con= new mysqli("localhost","root","","sanmarcos");
mysqli_set_charset($con,"utf8");

if ($con)
	{
	//echo "Conexion exitosa";
	}
	else
	{
	//echo "Conexion fallida";
	}
?>