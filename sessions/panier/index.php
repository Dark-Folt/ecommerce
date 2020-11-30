<?php
session_start();

/*
 *
 * On verifie si le client est deja connecter
 * sinon on le redirige vers la page d'erreur
*/
if(!isset($_SESSION['connect'])){
    header('Location: ../../include/errors/pageDErreur.php?panier=vide');
}

/**
 * Importation des models utils
 */
require '../../vendor/autoload.php';
use  App\DataBase\MyDB;
use  App\Models\Article;
use  App\Models\Panier;
use  App\Inc\MailSender;

$panier = new Panier();

/**
 * Une fois qu'on a verifier que le client est bien connecté
 * On peut arriver dans la page du panier dans deux cas:
 *  1-) Premier cas:
 *          - A  partir de la page d'acceuil cad index.php
 *  2-) Deuxieme cas:
 *          - Lorqu'on a appuiyé sur le boutton ajouter au panier dans la page detail de l'article
 * 
 *  Si nous sommes dans le premier cas alors ce la veut dire qu'on affiche juste le contenu 
 *  du panier grace a la variable de sessions $_SESSION['panier']
 * 
 *  Si nous sommes dans le deuxieme cas alors ce la veut dire qu'on ajoute le produit dans la panier
 *  via son id qui est passé dans l'url exemple: http://localhost:8000/sessions/panier?articleID=8
 */


/**
 * Gestion du deuxieme cas lorqu'on a appuiyé sur le boutton ajouter au panier
 * On verifie si l'ID de l'article est passé dans l'url
 * si ok alors on l'ajoute dans la variable de sessions $_SESSION['panier'];
*/
if(isset($_GET['articleID'])) {
    $articleId = $_GET['articleID'];
    $panier->ajouterDansPanier($articleId); 
}else if(isset($_GET['del']))
{
    $panier->supprimerDansPanier($_GET['del']);
}

/**
 * Gestion du deuxieme cas:
 * on parcours le tableau $_SESSION['panier']
 * pour chaque Id on fait une requete vers la BD qui va nous renvoyé un tableau assoc
 * contenant les informations d'un produit
 * On creer un objet de type Article que l'on va ajouter dans le tableau $articles
 * On parcours le tableau $articles en affichant les produit en HTML
*/
$DB = new MyDB();

$articles = array(); //tableau qui va contenir tout les articles qui sont dans le panier

/**
 * Parcour de la variable de sessions $_SESSION['panier']
 * pour chaque ^$IDkey on fait une requete vers la BD pour recuperer
 * les informations sur l'objet 
 * ensuite on ajoute l'objet dans le tebleau article
*/


if(isset($_SESSION['panier']))
{

$IDKeys = array_keys($_SESSION['panier']);

foreach($IDKeys as $IDKey)
{
    $resBDD = $DB->query('SELECT * FROM article WHERE id = ?',array($IDKey))->fetch(\PDO::FETCH_ASSOC);
    array_push($articles, new Article($resBDD));
}


//calcultu prix total des produits qui sont dans le panier
$total = 0;
foreach($articles as $article)
{
    $total += $article->getPrix();
}


}


/**
 * Traitement et envoie du mail de confirmation de la commande
* On verifie si la variable paiment est passée dans l'url
* Lorqu'on valide un paiment nous sommes rediriger vers le 
* panier
* On recupere le mail de l'utilisateur grace a la variable de session userID
*/

if(isset($_GET['paiment']) && $_GET['paiment'] == true)
{
    $mailer = new MailSender();
    $userID = $_SESSION['userID'];
    $email  = $DB->query("SELECT email FROM client WHERE id = ?",array($userID))->fetch(\PDO::FETCH_ASSOC)['email'];
    $message = "";
    foreach($articles as $article)
    {
        $message .= '<p>'.$article->getNom().' au prix de '.$article->getPrix().' € </p>';
    }
    $message .= '<p>'.'Prix total de la commande: '.$total.' € </p>';

    $mailer->envoyerMessage($email, $message);

    /** 
     * Une fois que le mail a ete envoyer je vide le panier
     * 
    */
    //TODO:: vider le panier
}


//je teste si la vartiable est vide ou pas pourvoir fermer la BD
//sinon si je ne teste pas il y'a une erreur
if(!empty($_SESSION['panier']))
    $DB->closeDB();


?>
<!DOCTYPE  html>
<html>
    <head>
       <title>Mon panier</title>
       <link rel="stylesheet" type="text/css" href="../../assets/css/index.css">
       <?php include("../../include/head.php");?>
    </head>
    <body>
    	<form class="user-form" style="position: float;"><!-- fleme de mettre un div puis ensuite refaire le style on laisse le form -->
            <div id="container">
                <div class="form-header">
                    <a href="/">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                        </svg>
                    </a>
                    <h3 class="legend">Mon panier</h3>
                </div>
            </div>
            <nav>
            	<ul>
                <?php foreach($articles as $article):?>
                <li style="margin: 0px">
                    <div style="position: relative; margin: 5px;">
                        <div style="">
                            <img src="<?= $article->getImage()?>" alt="" style="height: 100px; width: 100px; display: inline; margin: 0px;">
                            <p class="nom-menu" style="display: inline;"><?= $article->getNom()?></p>
                            <p style="display: inline;"><?=$article->getPrix()?> €</p>
                        </div>
                        <div style="width: 400px; position: absolute; top: 20px; right: 0px; width: 50px;">
                            <a href="?del=<?=$article->getId()?>" style="">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </li>
                <?php endforeach ?>
            	</ul>
            </nav>
            <div style="margin: 0px; padding: 10px; display: flex; justify-content: center; position: relative;">
                <a href="/sessions/paiement/?prixTotal=<?=$total?>" id="" class="" style="height: 30px; text-decoration: none; border-radius: 5px; padding: 10px; background-color: #1eba71; color: #fff;">
                    <!-- ICON DU PANIER -->
                    <svg width="1em" height="1em" viewBox="0 -3 16 16" class="bi bi-credit-card-2-back" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 3H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                        <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zM1 9h14v2H1V9z"/>
                    </svg>
                    <span>Passer au paiment</span>
                </a>
                <p style="position: absolute; right: 0px; text-align: right;">Prix TOTAL: <?=$total?> €</p>
            </div>
        </form>
        <footer></footer>
    </body>
</html>