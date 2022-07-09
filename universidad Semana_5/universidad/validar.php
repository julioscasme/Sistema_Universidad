<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<head>
<link rel="icon" href="img/icono.png" >
	<title>Validando...</title>
	<meta charset="utf-8">
</head>
</head>
<body>
		<?php
			include 'serv.php';
			if(isset($_POST['login'])){
				$usuario = $_POST['user'];
				$pass = $_POST['pass'];
				$log = mysql_query("SELECT * FROM user WHERE usuario='$usuario' AND pass='$pass'");
				print($log);
				if (mysql_num_rows($log)>0) {
					$row = mysql_fetch_array($log);
					$_SESSION["user"] = $row['usuario']; 
				  	echo 'Iniciando sesión para '.$_SESSION['usuario'].' <p>';
					echo '<script> window.location="usuario.php"; </script>';
				}
				else{
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					echo '<script> window.location="index.php"; </script>';
				}
			}
		?>	
</body>
</html>