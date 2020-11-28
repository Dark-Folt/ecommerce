<?php
require '../vendor/autoload.php';
use  App\DataBase\MyDB;
use  App\Models\Article;

/**On verifie si l'id de l'article a etait bien passé dans l'URL */
if(isset($_GET['articleId']))
{
    $articleId = $_GET['articleId'];
    $DB = new MyDB();
    $resBDD = $DB->query("SELECT * FROM article WHERE id=$articleId")->fetch(\PDO::FETCH_ASSOC);

    $article = new Article($resBDD);
    // echo $article->getNom();
    // var_dump($article);

    $DB->closeDB();
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../assets/css/index.css">
       <?php include("../include/head.php");?>
    </head>
<form class="user-form">
    <div id="container">
        <div class="form-header">
            <a href="/"> 
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                </svg>
            </a>
            <h3 class="legend"><?=$article->getNom()?></h3>
        </div>
        <div id="detail-contaier" style="">
            <div id="img-container" style="">
                <img src="<?= $article->getImage()?>" alt="" style="max-width: 400px; max-height: 400px; border-radius: 5px">
                <p>Marque: <?= $article->getMarque()?></p>
                <p>Description: <?= $article->getDescription()?></p>
                <p style="">Prix: <?=$article->getPrix()?> €</p>
            </div>
            <a href="../sessions/panier" id="" class="" style="height: 50px; text-decoration: none; border-radius: 8px; padding: 10px; background-color: #1eba71; color: #fff;">
                <!-- ICON DU PANIER -->
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
                <span>Ajouter au panier</span>
            </a>
        </div>
    </div>
</form>
</html>