<?php 
    require_once('allErrors.php');

    //on verifie ce qui est passé dans l'url
    if(isset($_GET['verif_email'])) {
        getConfirmationMailError();
    }

    if(isset($_GET['donnees_saisie'])){
        getLoginError();
    }

    if(isset($_GET['panier'])){
        getEmptyCartError();
    }
?>