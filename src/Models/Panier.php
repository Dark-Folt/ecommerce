<?php
/**
 * Represente le panier à ouverture de session d'un client
 * Pour gener le panier on utilise la variable de session
 * Inspirer de graficart youtubeur
 */

 namespace App\Models;
class Panier
{

    public function __construct()
    {
        if(!isset($_SESSION['panier']))
        {
            $_SESSION['panier'] = array();
        }
    }


    public function ajouterDansPanier($articleID)
    {
        $_SESSION['panier'][$articleID] = 1;
    }

    public function supprimerDansPanier($articleID)
    {
        unset($_SESSION['panier'][$articleID]);
    }
}
?>