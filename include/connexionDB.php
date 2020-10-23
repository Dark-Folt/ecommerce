<?php
    /*
        Dans ce fichier il y'a la connexion vers la base de donné
        nous allons à chaque fois l'inclure lorsqu'on en aura besoin
    */
    $db="ecommerce";//nom de notre bd
    $dbhost="localhost";//127.0.0.1
    $dbport=3306; //port qu'on utilise avec MAMP
    $dbuser="root";
    $dbpasswd="";
     
    try {
        $pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*
            L'orque l'on recupere des informations dans une table 
            le logiciel nous renvoie les informations dans un tableau associatif
            mais dans notre cas nous ne voulons pas cela.
            on va demander au logiciel de nous renvoyer les informations comme des objets 
            donc au lieu d'utilier $donnees['nom'] => $donnees->nom;
        */
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die('Erreur: '.$e->getMessage());
    }
?>

