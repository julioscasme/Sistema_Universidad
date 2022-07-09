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
form.register {
    background: none repeat  0 0 ;
    font-family: sans-serif;

    padding: 20px;
    width: 300px;
    height: 450px;
}	
form.register div {
    margin-bottom: 20px;
    overflow: hidden;
}
form.register div label {
    display: block;
    float: left;
    line-height: 25px;
}
form.register div input[type="text"], form.register div input[type="password"] {
    border: 1px solid #DCDCDC;
    float: right;
    padding: 5px;
    height: 30px;
}
form.register div input[type="submit"] {
    background: none repeat scroll 0 0 #DEDEDE;
    border: 1px solid #C6C6C6;
    float: right;
    font-weight: bold;
    padding: 4px 20px;
    height: 30px;
    color: black;
}
.error{
    color: #D13621;
    font-weight: bold;
    margin: 10px;
    text-align: center;
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
			          			<h2>Bienvenido: <?php echo $row['nombre'];?></h2>
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
					<div class="col" >
					    <p>Asignar Profesor | Alumno | Curso</p><br>
						<form method="post" action="asignar.guardar.php" class="register">
					        <div>
					        	<label>Profesor: </label>
					        	<select  type="text" id="Profesor_id" name="Profesor_id"  class="form-control formulario__input" placeholder=""  required />
					        	<option value="0">-- Seleccionar Profesor--</option> 
					        		<?php 
					        		$Profesor = "SELECT * FROM profesor order by idProfesor";
									$resultado_Profesor=$con->query($Profesor);		        
									?>	

						          	<?php foreach ($resultado_Profesor as $item): ?>               
						            <option value="<?php echo $item['idProfesor']; ?>"><?php echo $item['nombre']; ?> <?php echo $item['apellido']; ?></option>                      
						          	<?php endforeach; ?>
					        	</select>
					        </div>
					        <div>
					        	<label>Alumno: </label>
					        	<select  type="text" id="Alumno_id" name="Alumno_id"  class="form-control formulario__input" placeholder=""  required />
					        	<option value="0">-- Seleccionar Alumno--</option> 
					        		<?php 
					        		$Alumno = "SELECT * FROM alumno";
									$resultado_Alumno=$con->query($Alumno);		        
									?>	

						          	<?php foreach ($resultado_Alumno as $item1): ?>               
						            <option value="<?php echo $item1['idAlumno']; ?>"><?php echo $item1['nombre']; ?> <?php echo $item1['apellido']; ?></option>                      
						          	<?php endforeach; ?>
					        	</select>
					        </div>
					        <div>
					        	<label>Curso: </label>
					        	<select  type="text" id="Curso_id" name="Curso_id"  class="form-control formulario__input" placeholder=""  required />
					        	<option value="0">-- Seleccionar Curso--</option> 
					        		<?php 
					        		$Curso = "SELECT * FROM curso";
									$resultado_Curso=$con->query($Curso);		        
									?>	

						          	<?php foreach ($resultado_Curso as $item2): ?>               
						            <option value="<?php echo $item2['idCurso'];?>"><?php echo $item2['nombre']; ?></option>                      
						          	<?php endforeach; ?>
					        	</select>
					        </div>
					        <div>
					        	<label>Número Matricula: </label>
					        	<input style="border-radius: 5px" type="text" id="n_matricula" name="n_matricula" autocomplete="on" required>
					        </div>
					        <div>
					        	<input type="submit" style="border-radius: 5px; font-size:15px;" class="btn btn-success" name="register" value="Agregar">
					        </div>
					        <br><br>
					   
					    </form>
					    <br><br>
					    <br><br>
					</div>
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