<?php

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