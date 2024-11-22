<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['enviar'])) {
  $mail = new PHPMailer(true);

    try {
    
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;                   
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'cavpmcmdo@policiamilitar.sp.gov.br';                     
    $mail->Password   = '1932mmdc';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;         
    
 

    //Recipients
    $mail->setFrom('cavpmsmdo@gmail.com', 'Fale com o Comandante');
    $mail->addAddress('cavpmcmdo@gmail.com', 'CAvPM');     
    $mail->addReplyTo('cavpmcmdo@gmail.com', 'Fabio');
    $mail->isHTML(true);                                 
    $mail->Subject = 'Mensagem Fale com o Comandante';

$body = "Mensagem enviada pelo Fale com o Comandante:<br>
     Nome: ".$_POST['nome']."<br> 
     E-mail: ".$_POST['email']."<br>
     Mensagem:<br>".$_POST['msg'];


    $mail->Body    = $body;

        $mail->send();
    echo 'E-mail enviado com Sucesso';
} catch (Exception $e) {
    echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
}
}else{
    echo "erro ao enviar e-mail, acesso não foi via formulario";
}
?>