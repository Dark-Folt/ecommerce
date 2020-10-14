<?php
//ce fichier contient que les corps des mails que l'on envoie
    function ecrireConfirmMessage($client_email, $confirm_token)
    {
        $s ="
        <html>
            <body>
                <div align=\"center\" id=\"message-container\">
                    <p>Votre compte a bien été crée, </br> 
                    Vérifier le en cliquant sur lien ci-dessous.
                    </p>
                    <a href=\"http://localhost/ecommerce/controllers/mail_verification.php?email=$client_email&confirm_token=$confirm_token\">Confirmez votre compte</a>
                </div>
            </body>
        </html>
        ";
        return $s;
    }



$ConfirmCommande = 'rien commander';
?>
