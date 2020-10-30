<?php
    /*si on a appuyé sur le bouton valider on entre dans le if*/
    if(isset($_POST['submit-btn']))
    {
        require_once ('../include/MyDB.php');
        $DB     = new MyDB();
        $email  = $_POST['email'];

        //verification du mail
        if(empty($_POST['email'])  && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = htmlspecialchars($_POST['email']);
        }
        
        //on enleve les autres elements qui sont dans la variable posto
        unset($_POST['submit-btn']);
        
        /**
         * @var array va contenir les elements que l'on va ajouter à la BD
         */
        $data = array();

        //TODO:Faire les verifs avec regex s'il y a le temps
        /**
         * on parcour le tableau $_POST ensuite si
         * une valeur est passé alors on la stoque dans $data
         * ensuite l'ajoute dans la BD
         */
        foreach ($_POST as $key => $value) {
            if($value) {
                $data[$key] = htmlspecialchars($value);
            }
        }

        if(isset($data['nom'])){
            $DB->query('UPDATE  client SET nom=:nom WHERE email = :email', array('email'=> $email, 'nom' => $data['nom']));
        }

        if(isset($data['prenom'])){
            $DB->query('UPDATE  client SET prenom=:prenom WHERE email = :email', array('email'=> $email, 'prenom' => $data['prenom']));
        }

        if(isset($data['adresse'])){
            $DB->query('UPDATE  client SET adresse=:adresse WHERE email = :email', array('email'=> $email, 'adresse' => $data['adresse']));
        }

        $DB->closeDB();

        //je redirigire le client vers la page mesInformations.php
        header('Location: ../sessions/client/mesInformations.php');

    }
?>