<?php
require 'vendor/autoload.php';
include('controllers/articleController.php');
    
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
                    <p class="article-description"><?=$article->getDescription()?></p>
                    <a href="/school/ecommerce/controllers/articleController.php" class="btn btn-primary">Afficher plus de détails...</a>
                </div>
            </div>
        <?php endforeach ?>
        </div>
        <footer></footer>
    </body>
</html>
