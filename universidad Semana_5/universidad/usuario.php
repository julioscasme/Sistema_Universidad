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

<style type="text/css">
    	.img-circle {
		  border-radius: 25%;
		}
		@media (max-width: 991px) {
			.navbar-collapse.pull-left {
			    float: none!important;
			}
			.navbar-collapse.pull-left + .navbar-custom-menu {
			    display: block;
				position: absolute;
			    top: 0;
			    right: 40px;
			}
		}
		.media-left,
		.media > .pull-left {
		  	padding-right: 10px;
		}	
		.pull-left {
		  	float: right !important;
		}
		.image > img {
			width: 100%;
		  	max-width: 80px;
		  	height: auto;
			position: absolute; top:9%; left:60%;
		}

		.pull-right{
			position: absolute; top:23%; left:15%;
		}
		.pull-right input[type="submit"]{
			background: #F4D03F;
			border-radius: 5px;
			width: 60px;
			height: 20px;
		
		}
		.pull-right input[type="text"]{
			background: #FFDFC0;
			width: 200px;
			height: 20px;
			border-bottom: 1px solid #FF7628;
	
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
								<br>
			          			<h2>Bienvenido: <?php echo $row['nombre'];?></h2>
			          			<br>
								<FONT SIZE=2><a href="logout.php">Cerrar session</a></FONT>
								<br>
			          			<img src="logo.png" width=330 height=80 style="position: absolute; top: 0; left: 0;" >
								
								<!---------------------------------------------->
								
								<div class="pull-left image">
							        <?php
							        	//define( 'RUTA_HTTP', 'http://www.duanealiaga.com/cientifica/' );
							        	define( 'RUTA_HTTP', 'http://localhost/proyectos/universidad%20Semana_5/universidad' );
							            $fotoPerfil = RUTA_HTTP.'/fotos/'.$_SESSION['user'].'.jpg';
							            if (@getimagesize($fotoPerfil)) {
							              	$fotoPerfil=$fotoPerfil;
							            }else{
							              	$fotoPerfil = RUTA_HTTP.'/fotos/user-M.png';
							            }
							        ?>
							        <img src="<?php echo $fotoPerfil; ?>"  class="img-circle" alt="User Image">
							    </div>
								<!---------------------------------------------->
								<div class="pull-left image">
							        <form action="subir_foto.php" method=post enctype="multipart/form-data">
							        	<input name="usuario" value="<?php echo $_SESSION["user"];?>" style="display: none;"><br>
										<font color="black"><div align='center'><input type="file" name="imagen"><br>
										<input type="submit" value="Cambiar foto (.jpg)" ></div><br>
										
									</form>
							    </div>
								<!---------------------------------------------->
								<div class="pull-right info">
							       	<form method="post" action="enviar.php" class="register">
						        		<div><FONT SIZE=2>Correo: </FONT><input type="text" name="correo" required></div>
						        		<div><FONT SIZE=2>¿Que curso necesita? </FONT><br><textarea rows="2" name="mensaje" required></textarea></div>
						
						        		<div><input type="submit" class="btn btn-success" name="register" value="Enviar"></div>
						    		</form>
								</div>
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
							<td><a  href="agregar.php">Añadir Profesor</a></td>
							<td><a  href="asignar.php">Asignar</a></td>
							<tr>
								<th colspan="12">Lista de Profesores</th>
							</tr>
						</thead>	
						<tbody>
							<tr>
								<td>ID</td>
								<td>Nombre</td>
								<td>Apellido</td>
								<td>dni</td>
								<td>ver cursos</td>
								<td>ver alumnos</td>
								<td>Editar</td>
								<td>Eliminar</td>
							</tr>

						<?php
							include("conexion_con.php");

							$query="SELECT * from profesor ";

							$resultado=$con->query($query);
							while($row=$resultado->fetch_assoc()){
						?>
							<tr>
								<td><?php echo $row['idProfesor']?></td>
								<td><?php echo $row['nombre']?></td>
								<td><?php echo $row['apellido']?></td>	
								<td><?php echo $row['dni']?></td>
								<td><a  href="lista.cursos.php?value=<?php echo $row['idProfesor']?>">ver curso</a></td>
								<td><a  href="lista.alumnos.php?value=<?php echo $row['idProfesor']?>">ver alumnos</a></td>
								<td><a  href="editar.php?value=<?php echo $row['idProfesor']?>">Editar</a></td>
								<td><a  href="eliminar.php?value=<?php echo $row['idProfesor']?>">Eliminar</a></td>
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
			        	<td width="33%" align="center">Ciudad Universitaria 2021</td>
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