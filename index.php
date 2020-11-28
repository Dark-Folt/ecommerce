<?php
//affichage des articles qui sont dans la BD

require('vendor/autoload.php');
use  App\DataBase\MyDB;
use  App\Models\Article;

$DB = new MyDB();
$articlesBDD = $DB->query('SELECT * FROM article')->fetchAll(\PDO::FETCH_ASSOC);
$articles = array();
foreach($articlesBDD as $article)
{
    array_push($articles, new Article($article));
}

$DB->closeDB();

?>
<!DOCTYPE  html>
<html>
    <head>
       <title>Accueil</title>
       <link rel="stylesheet" type="text/css" href="assets/css/index.css">
       <?php include("include/head.php");?>
    </head>
    <body>
        <?php require("include/header.php"); ?>
        <div class="container-article ">
        <?php foreach($articles as $article):?>
            <div class="div-article">
                <div class="img-container">
                    <span class="article-prix"><?=$article->getPrix()?> €</span>
                    <img src="<?= $article->getImage()?>" class="article-img" alt="">
                </div>
                <div class="article-body">
                    <h5 class="article-titre"><?=$article->getNom()?></h5>
                    <p class="article-description"><?=substr($article->getDescription(),0,25)?></p>
                    <a href="controllers/articleController.php?articleId=<?=$article->getId()?>" class="btn btn-primary">Afficher plus de détails...</a>
                </div>
            </div>
        <?php endforeach ?>
        </div>
        <footer></footer>
    </body>
</html>
