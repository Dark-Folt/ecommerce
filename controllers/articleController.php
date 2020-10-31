<?php
require_once('include/MyDB.php');
require_once('models/Article.php');

$DB = new MyDB();
$articlesBDD = $DB->query('SELECT * FROM article')->fetchAll(PDO::FETCH_ASSOC);
$articles = array();
foreach($articlesBDD as $article)
{
    array_push($articles, new Article($article));
}
?>