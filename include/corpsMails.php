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
