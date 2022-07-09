<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

class clsMail{

    private $mail = null;
    
    function __construct(){
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 587;
        $this->mail->Username = "jdk.jdcm99@gmail.com";
        $this->mail->Password = "yuftzaqztzezfyje";
    }


    public function metEnviar( $titulo,  $nombre,  $correo,  $asunto,  $bodyHTML)
    {
        $this->mail->setFrom("jdk.jdcm99@gmail.com", 'Julios Deciderio Castillo Melchor');
        $this->mail->addAddress('duanealiaga93@gmail.com');
        $this->mail->Subject = 'Corrección del Examen Parcial 1';
        $this->mail->Body = 'Corrección de examen parcial. Preguntas: 1-2';
        $this->mail->isHTML(true);
        $this->mail->addAttachment('documentos/Corección-PC1.rar' , 'Corección_PC1.rar');

        $this->mail->CharSet = "UTF-8";

        /*$this->mail->addAttachment('documentos/tarea.pdf' , 'Trabajo.pdf');*/

        return $this->mail->send(); 
    }
}

?>