<?php

include("conexion_con.php");

$Profesor_id = $_REQUEST['id'];

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$dni=$_POST["dni"];

$query = "update profesor set  nombre='$nombre', apellido='$apellido', dni='$dni' where idProfesor=$Profesor_id";

echo '<pre>' ;
  print_r($query);
  echo '</pre>' ;
$resultado=$con->query($query);

 

if($resultado){
	//echo "Se insertaron datos";
	header("Location: usuario.php");
}
else{
	echo "Error, no se guardaron los datos";
}

?>