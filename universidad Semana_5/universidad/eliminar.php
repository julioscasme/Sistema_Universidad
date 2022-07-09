<?php

include("conexion_con.php");

$Profesor_id = $_REQUEST['value'];


$query = "DELETE FROM profesor WHERE idProfesor=$Profesor_id ";

$resultado=$con->query($query);

if($resultado){
	//echo "Se insertaron datos";
	header("Location: usuario.php");
}
else{
	echo "Error, no se guardaron los datos";
}

?>