<?php
    /*si on a appuyé sur le bouton valider on entre dans le if*/
    if(isset($_POST['submit-btn']))
    {
        include('../include/connexionDB.php');
        include('../models/Client.php');//j'inclue la classe Client

        //TODO: faire verification en js

        // $infos = [];
        // unset($_POST['submit-btn']);
        // unset($_POST['password-confirm']);

        // foreach($_POST as $key => $value) {
        //     $infos[$key] = htmlspecialchars($value);
        // }
        
        //on va enregistrer les infos du client dans la bd
        $req = $pdo->prepare('INSERT INTO client(email, password) VALUES(:email, :password)');
        $req->execute(array(
            'email'=> htmlspecialchars($_POST['email']),
            'password' => password_hash($_POST['password'],PASSWORD_BCRYPT)
        ));

    }else{
        header("Location: ../inscription/");
    }

?>