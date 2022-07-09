<?php

include("conexion_con.php");

$usuario=$_POST["usuario"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$clave=$_POST["clave"];

$query = "INSERT INTO user(nombre,apellido,usuario,pass) VALUES('$nombre','$apellido',$usuario,'$clave')";
$resultado=$con->query($query);

if($resultado){
	//echo "Se insertaron datos";
	header("Location: usuario.php");
}
else{
	echo "Error, no se guardaron los datos";
}

?>