<?php
session_start();
require_once('../../include/MyDB.php');
require_once('../../models/Client.php');

$DB = new MyDB();
/**
 * pour recuperer les informations 
 * on utilise le mail du client qui est deja dans la variable de session
 */
if(isset($_SESSION['email']))
{
    $email = $_SESSION['email'];
    /**
     * creation d'un objet client à partir des donnes recu par la requete
     * fetch(PDO::FETCH_ASSOC) permet d'avoir les données sous forme d'array()
     */
    $client = new Client($DB->query('SELECT * FROM client WHERE email = ?', array($email))->fetch(PDO::FETCH_ASSOC));
}
$DB->closeDB();

?>

<!DOCTYPE  html>
<html>
    <head>
       <title>Mes Informations</title>
       <link rel="stylesheet" type="text/css" href="../../assets/css/index.css">
        <?php include('../../include/head.php');?>
    </head>
    <body>
    	<form method="post" action="../../controllers/mesInformationsController.php" class="user-form">
            <div id="container">
                <div class="form-header">
                    <a href="../client/espaceClient.php"> 
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                        </svg>
                    </a>
                    <h3 class="legend">Mes Informations</h3>
                </div>
                <div class="input-container">
                    <label for="nom">Nom:</label>
                    <input type="text" placeholder="Nom" name="nom" value = "<?= $client->getNom() ?>" class="form-control" autocomplete="off" require>
                </div>
                <div class="input-container">
                <label>Prénom:</label>
                    <input type="text" placeholder="Prénom" name="prenom" value = "<?= $client->getPrenom() ?>" class="form-control" autocomplete="off" require>
                </div>
                <div class="input-container">
                    <label>Adresse:</label>
                    <input type="text" placeholder="Adresse" name="adresse" value = "<?= $client->getAdresse() ?>" class="form-control" autocomplete="off" require>
                </div>
                <div class="input-container">
                    <label>Email:</label>
                    <input type="email" placeholder="Email" name="email" value = "<?= $client->getEmail() ?>" class="form-control" autocomplete="off" require>
                </div>
                <!--
                <div class="input-container">
                    <input type="password" placeholder="Mot de passe" name="password" class="form-control" require>
                </div>
                <div class="input-container">
                    <input type="password" placeholder="Confirmer mot de passe" name="password" class="form-control" require>
                </div>
                -->
                <div class="bt-container">
                    <input type="submit" class="submit-input" id="connect-input" name="submit-btn" value="Mettre à jour">
                </div>
            </div>
        </form>
        <footer></footer>
    </body>
</html>