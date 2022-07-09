<?php
session_start();
include 'serv.php';
include("conexion_con.php");
$query = "SELECT codigo,nombre,apellido FROM usuario WHERE codigo='".$_SESSION["user"]."'";
$resultado=mysql_query($query);
$row = mysql_fetch_array($resultado);

$query_2 = "SELECT nombre_cur FROM plan order by nombre_cur asc";
$resultado_2=mysql_query($query_2);

if(isset($_SESSION['user'])) {?>

<html>
	<head>
		<link rel="icon" href="img/icono.png" >
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Computación Científica</title>
		<link rel="stylesheet" type="text/css" href="style2.css">
		<script language="JavaScript" type="text/javascript" src="reloj.js">
		</script>
	</head>

	<style type="text/css">
    	.img-circle {
		  border-radius: 50%;
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
		  	max-width: 65px;
		  	height: auto;
		}
    </style>
    
<body style="background-color: ;">
<?php date_default_timezone_set("America/Bogota"); ?>
	<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
	  		<td width="100%" height="100" valign="top">
	  			<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
		    		<tr>
			        	<th width="570" rowspan="4" valign="middle" nowrap="" ap bgcolor="#EBEDF0" class="blanco">
			        		<div align="center">
							    <!---------------------------------------------->
							    <div class="pull-left image">
							        <?php
							        	//define( 'RUTA_HTTP', 'http://www.duanealiaga.com/cientifica/' );
							        	define( 'RUTA_HTTP', 'http://localhost/cientifica' );
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
							    <div class="pull-left info">
							        <p><?php echo $row['nombre'].' '.$row['apellido']; ?></p><br>
									<FONT SIZE=2><a href="logout.php" style="background-color: #FF6666">Cerrar session</a></FONT>
								</div>
								<!---------------------------------------------->
								<div class="pull-left image">
							        <form action="subir_foto.php" method=post enctype="multipart/form-data">
							        	<input name="usuario" value="<?php echo $_SESSION["user"];?>" style="display: none;"><br>
										<font color="black"><div align='center'><input type="file" name="imagen"><br>
										<input type="submit" value="Cambiar foto (.jpg)"></div><br></font>
									</form>
							    </div>
							    <!---------------------------------------------->
								<div class="pull-right info">
							       	<form method="post" action="enviar.php" class="register">
						        		<div><FONT SIZE=2>Correo </FONT><input type="text" name="correo" required></div>
						        		<div><FONT SIZE=2>¿Que curso necesita? </FONT><textarea rows="2" name="mensaje" required></textarea></div>
						        		<div><input type="submit" class="btn btn-success" name="register" value="Enviar"></div>
						    		</form>
								</div>
			       			</div>
			       		</th>   
		    		</tr>
		    	</table>
			</td>
	    </tr>

		<tr>
	    	<th height="100%" valign="top" >
	    		<table width="100%" height="100%" border="1">
					<tr>
			        	<th width="400" height="120" >
			        		<table>
			        			<br><br>
			        			<?php
			        			while ($fila = mysql_fetch_array($resultado_2, MYSQL_NUM)) {?>
									<tr>
					           			<td>
					           				<center>
												<FONT SIZE=2><a href="curso.php?value=<?php echo $fila[0]?>"  method="post" name="nombre" style="" value="<?php echo $fila[0]?>"/><?php echo $fila[0]?></a></FONT>
					           				</center><br><br>
					           			</td>
					        		</tr>
					        	<?php
								}
								//libera la memoria de la variable 
								mysql_free_result($resultado_2); 
			        			?>			        			        	
							</table>
					    </th>
					    <th width="1000" valign="top" bgcolor="9CC6D8">
					    	<br/><br/><br/><br/><br/>
					    	<p>Cursos Subidos:</p><br>
					    	<p>- Analisis Complejo y Aplicado</p>
					    	<p>- Analisis Funcional I</p>
					    	<p>- Analisis Funcional II</p>
					    	<p>- Analisis Real I</p>
					       	<br/><br/><br/><br/><br/>
					       
					        <br/><br/><br/><br/><br/><br/><br/><br/></DIV>  
					    </th>
					</tr>
			    </table>
			</th>
	    </tr>

	    <tr>
		    <th height="70" bgcolor="#EBEDF0">
		    	<table width="100%" border="0" cellpadding="0" cellspacing="0" >
			    	<tr>
			       		<th width="20%"><a href="http://unmsm.edu.pe" target="_blank">unmsm.edu.pe</a></th>
			        	<th width="50%" align="center">SERVICIOS INTEGRALES S.A.C.</th>
			        	<th width="20%" ><a href="http://matematicas.unmsm.edu.pe/" target="_blank">matematicas.unmsm.edu.pe</a></th>
			      	</tr>
		        </table>
		    </th>
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


