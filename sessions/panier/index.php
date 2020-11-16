<?php
session_start();

/*
 *
 * On verifie si le client est deja connecter
*/

if(!isset($_SESSION['connect'])){
    header('Location: ../../include/errors/pageDErreur.php?panier=vide');
}
?>