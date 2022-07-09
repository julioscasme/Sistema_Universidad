<html>
	<head>
	<link rel="icon" href="img/icono.png" >
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Universidad</title>
		<link rel="stylesheet" type="text/css" href="style.css"> 
		<meta charset="utf-8">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
	</head>

<style type="text/css">
form.register {
    background: none repeat  0 0 ;
    border: 1px solid #46A8D9;
    font-family: sans-serif;
    margin: auto;
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

form.login {
    background: none repeat scroll 0 0 ;
    border: 1px solid #46A8D9;
    font-family: sans-serif;
    margin:  auto;
    padding: 20px;
    width: 300px;
    height: 280px;
}
form.login div {
    margin-bottom: 20px;
    overflow: hidden;
}
form.login div label {
    display: block;
    float: left;
    line-height: 25px;
}
form.login div input[type="text"], form.login div input[type="password"] {
    border: 1px solid #DCDCDC;
    float: right;
    padding: 5px;
    height: 30px;
}
form.login div input[type="submit"] {
    background: none repeat scroll 0 0 #DEDEDE;
    border: 1px solid #C6C6C6;
    float: right;
    font-weight: bold;
    padding: 4px 20px;
    height: 30px;
    font color: red;
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
				          		<h3><font  color="black">Bienvenidos</font></h3>
				          		<img src="logo.png" width=330 height=80 style="position: absolute; top: 0; left: 0;" >
				       		</div>
				       	</td>   
			    	</tr>
			    </table>
			</td>
	    </tr>
		<tr>

	    	<td height="1" valign="top">	
				<br/>	
				<?php
				    include 'serv.php';
				    if(isset($_SESSION['user'])){
				    echo '<script> window.location="usuario.php"; </script>';
				    }
				?>
				<div class="row" >
					<div class="col" >
						<p>Registrarte</p>
						<form method="post" style="border-radius: 5px" action="registrar.php" class="register">
					        <div>
					        	<label>Usuario</label>
					        	<input style="border-radius: 5px" type="text" name="usuario" autocomplete="on" required>
					        </div>
					        <div>
					        	<label>Nombre</label>
					        	<input style="border-radius: 5px" type="text" name="nombre" autocomplete="on" required>
					        </div>
					        <div>
					        	<label>Apellido</label>
					        	<input style="border-radius: 5px" type="text" name="apellido" autocomplete="on" required>
					        </div>
					        <div>
					        	<label>Contraseña</label>
					        	<input style="border-radius: 5px" type="password" name="clave" autocomplete="off" required>
					        </div><br>
					        <div><input type="submit" style="border-radius: 5px; font-size:15px;" class="btn btn-success" name="register" value="Registrar"></div>
					    </form>
					</div>
					<div class="col-6">
						<p>Ingresar</p>
			    		<form method="post" style="border-radius: 5px" action="validar.php" class="login">
					        <div><label>Usuario</label><input style="border-radius: 5px" type="text" name="user" autocomplete="on" required></div>
					        <div><label>Contraseña</label><input style="border-radius: 5px" type="password" name="pass" autocomplete="off" required></div><br>
					        <div><input type="submit" style="border-radius: 5px; font-size:15px;" class="btn btn-success" name="login" value="Iniciar Sesión"></div>
			   			</form>
					</div>
				</div>
				<br/><br/>
				<br/><br/>
			</td>
	    </tr>
	   
	    <tr>
		    <td height="30">
		    <table width="100%" border="0" cellpadding="0" cellspacing="0" >
			    <tr>
			       	<td width="33%"><a href="http://unmsm.edu.pe" target="_blank">unmsm.edu.pe</a></td>
			        <td width="33%" align="center">
			        	<?php
					  	// Obteniendo la fecha actual con hora, minutos y segundos en PHP
					  	$fechaActual = date('d-m-Y H:i:s');
			  			echo $fechaActual;
			  			?></td>
			        <td width="33%" align="right"><a href="http://matematicas.unmsm.edu.pe/" target="_blank">matematicas.unmsm.edu.pe</a></td>
			    </tr>
		    </table>
		    </td>
        </tr>
	</table>
</body>
</html>