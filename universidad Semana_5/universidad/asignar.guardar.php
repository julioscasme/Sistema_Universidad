<?php

include("conexion_con.php");

$profesor=$_POST["Profesor_id"];
$alumno=$_POST["Alumno_id"];
$curso=$_POST["Curso_id"];
$n_matricula=$_POST["n_matricula"];

$query = "INSERT INTO asignacion(Profesor_id,Alumno_id,Curso_id,numero_matricula) VALUES('$profesor','$alumno',$curso,$n_matricula)";
$resultado=$con->query($query);

if($resultado){
	//echo "Se insertaron datos";
	header("Location: usuario.php");
}
else{
	echo "Error, no se guardaron los datos";
}

?>