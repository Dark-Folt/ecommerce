<?php
   $db="ecommerce";
    $dbhost="localhost";
    $dbport=3306;
    $dbuser="root";
    $dbpasswd="root";
     
    try {
        //code...
        $pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Erreur: '.$e->getMessage());
    }
?>

