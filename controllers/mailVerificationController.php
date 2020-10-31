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
            require_once('../include/MyDB.php');
            $DB = new MyDB();

            $data = array(
                'email'         => $client_email,
                'token'         => $client_token
            );

            /*
                Fetch nous renvoie un objet de type client
                nous allons verifier cet objet
                s'il est vide on update en mettant email_confirm à 1
            */
            $client = $DB->query('SELECT id, email_confirme FROM client WHERE email = :email AND confirm_token = :token', $data)->fetch();
            
            /*
                Ce test permet de verifier une seule fois le mail d'un client
                s'il retente de reutilisé le même lien il ne fonctionnera plus
            */
            if($client && $client->email_confirme == 0){
                //après avoir verifier on met le champ email_confirm à 1
                $data = array(
                    'email' => $_GET['email']
                );

                $DB->query('UPDATE  client SET email_confirme=1 WHERE email = :email', $data);
                $DB->closeDB();
            }

            /*
                on redirige le client vers l'aceuil
                dans tout les cas car avec la variable de session
                nous allons gerer la connexion du client
                donc si l'utilisatuer n'est pas connecter il aura une autre page
            */
            header('Location: ../');
        }
    }
?>