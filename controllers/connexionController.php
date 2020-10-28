<?php
session_start();

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

        include('../include/connexionDB.php');

        $req = $pdo->prepare('SELECT email, password, email_confirme FROM client WHERE email =:email');
        $req->execute(array(
            'email' => $email
        ));

        //TODO: Vérification en JavaScript
        /*
            Apres avoir executé la requete, on va faire un fetch()
            pour lire la primere ligne trouvée
            si la ligne n'est pas vide alors cela veut dire que les informartions mis par
            le client sont valides.
            On va alors vérifier si le mot de passe correspond avec password_verify
        */
        $client = $req->fetch(); //fetch nous retourne notre objet client

        $req->closeCursor();//fermeture de la BD

        /*
            Ici on a pas besoin de hasher le mot de passe c'est juste pour vérifier mais pas le stoker
            vue que le mot de passe est envoyé par post alors c'est bon
        */
        if($client && password_verify($_POST['password'], $client->password)) {

            if($client->email_confirme == 0)
            {
                ?>
                    <!-- affichage de l'erreur-->
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
                    <div class="alert alert-danger" style="text-align: center; width: 60%; height: 10%; margin: auto;">
                      <strong>Erreur!</strong> Vous devez d'abord confirmer votre email.
                    </div>
                <?php
                
            }else {
                $_SESSION['connect'] = 1;
                $_SESSION['email'] = $client->email;
                //TODO:javascript animation a faire 
                header('Location: ../');
            }
        }else{
            header('Location: ../connexion/');
        }

    }else{
        header('Location: ../connexion/');
    }
}
?>