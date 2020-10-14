<?php

    /*
        Si on arrive sur cette page c'est que le mail de confirmation a été envoyé
        Dans cette partie nous allons faire une requete vers la BD pour vérifier l'existence 
        du mail et du token
        Si le mail est verifié et le token aussi alors
        on met à 1 la variable email_confirm pour dire que c'est bon ce client 
        a déjà confirmé son email
     */
    if(!empty($_GET))
    {
        if(isset($_GET['email']) && isset($_GET['confirm_token']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
        {
            $client_email = $_GET['email'];
            $client_token = $_GET['confirm_token'];
            require_once('../include/connexionDB.php');
                $req = $pdo->prepare('SELECT id FROM client WHERE email = :email AND confirm_token = :token');
                $req->execute(array(
                    'email'         => $client_email,
                    'token'         => $client_token
                ));

                $client = $req->fetch();
                if($client){
                    echo 'Votre compte a bien été confirmé </br>';
                }

                //après avoir verifier on met le champ email_confirm à 1
                $req2 = $pdo->prepare('UPDATE  client SET email_confirme=1 WHERE email = :email');
                $req2->execute(array(
                    'email' => $_GET['email']
                ));

            //on redirige le client vers l'aceuil
            header('Location: ../');
        }
    }
?>