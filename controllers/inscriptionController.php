<?php
    /*si on a appuyé sur le bouton valider on entre dans le if*/
    if(isset($_POST['submit-btn']))
    {

        /*
            Cette methode de verification on l'a trouvé grace à un tuto sur Youtube
            La methode consiste à creer un tableau qui va contenir toutes les erreurs
            que l'on rencontrera c'est à dire les erreurs au niveau de l'email si le
            client a bien mit un email etc ... 
            On va remplir au fur et a mesure ce tableau d'erreur et si 
            à la fin le tableau d'erreur est vide alors la on pourra faire nos requetes
            proprement
        */

        $errors = []; //tableau d'erreur
        /*
            nous vérifions le mail meme si dans le formulaire nous mis un require 
            pour obliger le client à mettre un email
            Nous utilisons aussi le FILTER_VALIDATE_EMAIL intégré dans php
            qui vérifie automatiquement le mail et nous renvoie true ou false
            et donc on teste le cas contraire.
            
            si le mail est valide, et ben on vérifie si il ne figure pas dans la
            base donné car un mail doit etre utilisé qu'une seule fois
        */
        require_once('../include/connexionDB.php');
        if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors[] = "Votre email n'est pas valide";
        }else{
            // on verifie si le mail existe deja
            $req = $pdo->prepare('SELECT id FROM client WHERE email = :email');
            $req->execute(array(
                'email' => $_POST['email']
            ));

            //TODO:Faire  les vérifs en JavaScript
            /*
                on utilise fetch() pour avoir le premier enregistrement
                si le result n'est pas vide alors le mail est dejà utilisé
            */
            $client = $req->fetch();
            if($client){
                $errors[] = "Cet email est déjà utilsé";
                echo 'email utilisé</br>';
            }
        }

        if(empty($_POST['password']) || $_POST['password'] != $_POST['password-confirm']) {
            $errors[] = "Vous devez entrer un mot de passe valide";
        }

        /*
            Une fois arrivé là on va verifier si le tab est vide
            si il est vide alors on interagire avec la BD
        */
        if(empty($errors)){

            $req = $pdo->prepare('INSERT INTO client(email, password) VALUES(:email, :password)');
            $req->execute(array(
                'email'=> $_POST['email'],
                'password' => password_hash($_POST['password'],PASSWORD_BCRYPT)
            ));


            /*
                Nous allons enoyer le mail de vérification au client.
                Pour cela nous allons charger le fichier qui contient
                le corps du message à envoyer (include/messageConfirm)
            */

            require_once ('../include/MailSender.php');

            $mailer = new MailSender();
            $mailer->envoyerMailConfirmation($_POST['email']);
        }else{
            header('Location:../inscription/');
        }

    }

?>