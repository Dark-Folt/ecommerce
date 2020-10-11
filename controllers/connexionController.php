<?php

    //on vérifie si le bouton a été appuyé
    if(isset($_POST['submit-btn']))
    {
        //FIXME: //ne pas rediriger le client vers une page au quelle il n'a pas accès
        /* Nous allons vérifier si le client a passé des valeurs via le post*/
        if(empty($_POST['email'])) { die("Vérifier votre email.");}
        if(empty($_POST['password'])) { die("Vérifier votre mot de passe");}

        //si le client a bien mit les champs alors on va hacher le mdp 
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $email = htmlspecialchars($_POST['email']);

        include('../include/connexionDB.php');

        $req = $pdo->prepare('SELECT email, password FROM client WHERE email =:email AND password =:password');
        $req->execute(array(
            'email' => $email,
            'password' => $password
        ));

        //TODO: Vérification en JavaScript
        /*
            Apres avoir executé la requete, on va faire un fetch()
            pour lire la primere ligne trouvée
            si la ligne n'est pas vide alors cela veut que les informartions mis par
            le client sont valides.
         */
        $client = $req->fetch();
        if($client) {
            echo 'ok</br>';
        }else{
            echo "vous n'est pas inscrit".'</br>';
        }

    }
?>