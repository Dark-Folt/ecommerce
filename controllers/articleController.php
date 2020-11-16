<?php
include('include/MyDB.php');
include('models/Article.php');
// require_once('include/MyDB.php');
// require_once('models/Articles.php');

// if(file_exists("models/Article.php"))
// {
//     echo "ok";
// }else{
//     echo "no";
// }


// if(file_exists("include/MyDB.php"))
// {
//     echo "ok";
// }else{
//     echo "no";
// }

$DB = new MyDB();
$articlesBDD = $DB->query('SELECT * FROM article')->fetchAll(PDO::FETCH_ASSOC);
$articles = array();
foreach($articlesBDD as $article)
{
    array_push($articles, new Article($article));
}

$DB->closeDB();
?>