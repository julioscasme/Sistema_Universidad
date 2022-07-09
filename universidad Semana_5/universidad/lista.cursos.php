<?php
session_start();
include 'serv.php';
include("conexion_con.php");
$query = "SELECT * FROM user WHERE usuario='".$_SESSION["user"]."'";
$resultado=mysql_query($query);
$row = mysql_fetch_array($resultado);

if(isset($_SESSION['user'])) {?>


<html>
	<head>
		<link rel="icon" href="img/icono.png" >
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Universidad</title>
		<link rel="stylesheet" type="text/css" href="style.css"> 
	</head>

<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

a:link {
	color: #FF0000;
	text-decoration: none;
}

</style>

<body>
<?php date_default_timezone_set("America/Bogota"); ?>
	<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
	  		<td width="100%" height="100" valign="top">
	  			<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
		    		<tr>
			        	<td width="570" rowspan="4" valign="middle" nowrap class="blanco">
			        		<div align="center">
			          			<h2>Usuario: <?php echo $row['nombre'];?></h2>
			          			<br>
								<FONT SIZE=2><a href="logout.php">Cerrar session</a></FONT>
			          			<img src="logo.png" width=330 height=80 style="position: absolute; top: 0; left: 0;" >
			       			</div>
			       		</td>   
		    		</tr>
		    	</table>
			</td>
	    </tr>

		<tr>
	    	<td height="100%" valign="top">
				<center>
					<table border="3">
						<thead>
							<tr>
								<th colspan="12">Lista de Cursos</th>
							</tr>
						</thead>	
						<tbody>
							<tr>
								<td>ID</td>
								<td>Nombre</td>
							</tr>

						<?php
							include("conexion_con.php");

							$variable=$_GET['value'];

							echo '<pre>' ;
					        print_r($variable);
					        echo '</pre>' ;


							$query="SELECT * from asignacion 
							inner join curso on curso.idcurso=asignacion.curso_id
							where Profesor_id='".$_GET['value']."'; ";

							$resultado=$con->query($query);
							while($row=$resultado->fetch_assoc()){
						?>
							<tr>
								<td><?php echo $row['idCurso']?></td>
								<td><?php echo $row['nombre']?></td>
						<?php			
							}
						?>		
						</tbody>
					</table>
				</center>
			</td>
	    </tr>
	   
	    <tr>
		    <td height="30">
		    	<table width="100%" border="0" cellpadding="0" cellspacing="0" >
			    	<tr>
			       		<td width="33%"><a href="http://www.unmsm.edu.pe" target="_blank">unmsm.edu.pe</a></td>
			        	<td width="33%" align="center">Ciudad Universitaria 2022</td>
			        	<td width="33%" align="right"><a href="http://matematicas.unmsm.edu.pe/" target="_blank">matematicas.unmsm.edu.pe</a></td>
			    	</tr>
		    	</table>
		    </td>
        </tr>
	</table>
</body>
</html>


<?php
}
else{
	echo '<script> window.location="index.php"; </script>';
}
?>