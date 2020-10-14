<?php
//ce fichier contient que les corps des mails que l'on envoie
$ConfirmCompte ='
<html>
        <head>
            <title>Confirmation de votre mail</title>
            <meta charset="utf-8">
        </head>
        <style type="text/css">
            body{
                margin: 0px;
            }
            div#message-container{
                width: 500px;
                margin: 100px auto 0px auto ;
                border-radius: 20px;
                background-color:  #f2f2f2;
                box-shadow: 0px 5px 10px  #dedede;
                padding: 25px;
            }

            a{
                text-decoration: none;
            }

            a:hover {
                color: #0066ff;
            }
        </style>
        <body>
            <div align="center" id="message-container">
                <p>Votre compte a bien été crée, </br> 
                Vérifier le en cliquant sur lien ci-dessous.
                </p>
                <a href="http://localhost/confirmation.php?pseudo=">Confirmez votre compte</a>
            </div>
        </body>
    </html>
';



$ConfirmCommande = 'rien commander';
?>



<?php
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../include/PHPMailer/src/Exception.php';
require '../include/PHPMailer/src/PHPMailer.php';
require '../include/PHPMailer/src/SMTP.php';
require 'corpsMails.php';

 
//fonction e-mail
function smtpmailer($to,$sujet,$message,$headers){
    
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->IsHTML();    
    $mail->Host='localhost';
    $mail->SMTPDebug=0;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='ssl';
    $mail->Host='smtp.gmail.com';
    $mail->Port=465;
    $mail->Username='ecommerce2020.shop@gmail.com';
    $mail->Password='Meco12-76'; //ton mdp gmail
    $mail->SetFrom('ecommerce2020.shop@gmail.com');
    $mail->CharSet="utf-8";
    $mail->Subject = $sujet;
    $mail->Body = $message;
    $mail->AddAddress($to);
         
    if(!$mail->Send()){
        echo 'E-mail non envoyé';
        echo 'Mailer error:'.$mail->Errorinfo;
    }else{
        echo 'Message envoyé';
    }
} //fin fonction e-mail
*/
?>