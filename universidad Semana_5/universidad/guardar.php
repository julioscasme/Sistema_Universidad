<?php

include("conexion_con.php");

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$dni=$_POST["dni"];

$query = "INSERT INTO profesor(nombre,apellido,dni) VALUES('$nombre','$apellido',$dni)";
$resultado=$con->query($query);

if($resultado){
	//echo "Se insertaron datos";
	header("Location: usuario.php");
}
else{
	echo "Error, no se guardaron los datos";
}

?>