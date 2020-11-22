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

<div id="detail-contaier" style="">
    <div id="img-container" style="width: 500px; margin: 0 auto; position:relative">
        <h5 style="text-align: center; font-size: 24px;"><?= $article->getNom()?></h5>
        <img src="<?= $article->getImage()?>" alt="" style="max-width: 500px">
        <p>Marque: <?= $article->getMarque()?></p>
        <p>Description: <?= $article->getDescription()?></p>
        <p style="position: absolute; right: 0px;">Prix: <?=$article->getPrix()?></p>
    </div>
</div>
