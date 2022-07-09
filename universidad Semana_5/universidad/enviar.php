<?php
    require_once ("PHPMailer/clsMail.php");

    $mailSend = new clsMail();

    /*$bodyHTML = '
        <h2>Saludos, y suscribanse</h2>
        ñ Ñ, día
        <br>
        <br>
        <br>
        Mensaje final';*/

    $correo=$_REQUEST['correo'];
    $mensaje=$_REQUEST['mensaje'];
    
    $enviado =  $mailSend->metEnviar($correo,"Correos Youtube","jdk.jdcm99@gmail.com","Prof. Duane", $mensaje);

    if($enviado){
        echo ("Enviado");
        echo '<script> window.location="usuario.php"; </script>';
    }else {
        echo ("No se pudo enviar el correo");
    }

?>