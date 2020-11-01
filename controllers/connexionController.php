<?php
session_start();

/**
 * connexionController.php 
 * est le controller de la page de connection il se charge 
 * du traitement des données pour ensuite les renvoyé à la vue
 */

//on vérifie si le bouton a été appuyé
if(isset($_POST['submit-btn']))
{
    //FIXME: //ne pas rediriger le client vers une page au quelle il n'a pas accès
    /* Nous allons vérifier si le client a passé des valeurs via le post*/

    /*
        On fait comme dans inscriptionController.php 
        on declareun tableau d'erreur
     */

    $errors = [];
    if(empty($_POST['email'])) {
        $errors[] = "Vérifier votre email";
        $GLOBALS[] = "Vérifier votre email";
    }
    if(empty($_POST['password'])) { 
        $errors[] = "Vérifier votre mot de passe";
    }


    /*
    on teste si le tableau est vide ou pas
    si il est vide on fait la requete pour connecter le client
    sinon on le redirige vers la page de connexion
    */
    if(empty($errors)) {
        //si le tableau n'est pas vide on redirige
        $email = $_POST['email'];

        require_once ('../include/MyDB.php');
        $DB = new MyDB();
        $client = $DB->query('SELECT email, password, email_confirme FROM client WHERE email =:email',array('email' => $email))->fetch();
        $DB->closeDB();

        //TODO: Vérification en JavaScript
        /*
            Apres avoir executé la requete, on va faire un fetch()
            pour lire la primere ligne trouvée
            si la ligne n'est pas vide alors cela veut dire que les informartions mis par
            le client sont valides.
            On va alors vérifier si le mot de passe correspond avec password_verify
        */

        /*
            Ici on a pas besoin de hasher le mot de passe c'est juste pour vérifier mais pas le stoker
            vue que le mot de passe est envoyé par post alors c'est bon
        */
        if($client && password_verify($_POST['password'], $client->password)) {

            if($client->email_confirme == 0)
            {
                /*
                redirection vers la page d'erreur en enoyer dans l'url l'erreur 
                pour pouvoir l'afficher dans la page d'erreur
                */
                header('Location: ../include/errors/pageDErreur.php?verif_email=false');
            }else {
                $_SESSION['connect'] = 1;
                $_SESSION['email'] = $client->email;
                //TODO:javascript animation a faire 
                header('Location: ../');
            }
        }else{
            header('Location: ../include/errors/pageDErreur.php?donnees_saisie=false');
        }

    }else{
        header('Location: ../connexion/');
    }
}
?>