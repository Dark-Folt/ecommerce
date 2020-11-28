<?php
session_start();

/*
 *
 * On verifie si le client est deja connecter
*/

if(!isset($_SESSION['connect'])){
    header('Location: ../../include/errors/pageDErreur.php?panier=vide');
}

//TODO:faire le panier
/**connexion a la BD */
// require 'vendor/autoload.php';
// use App\DataBase\MyDB;
// use App\Models\Article;

// $DB = new MyDB();
// $articlesBDD = $DB->query('SELECT * FROM article')->fetchAll(\PDO::FETCH_ASSOC);
// $articles = array();
// foreach($articlesBDD as $article)
// {
//     array_push($articles, new Article($article));
// }

// $DB->closeDB();

?>
<!DOCTYPE  html>
<html>
    <head>
       <title>Mon panier</title>
       <link rel="stylesheet" type="text/css" href="../../assets/css/index.css">
    </head>
    <body>
    	<form class="user-form"><!-- fleme de mettre un div puis ensuite refaire le style on laisse le form -->
            <div id="container">
                <div class="form-header">
                    <a href="..">
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
            		<li class="menu">
            		</li>
            	</ul>
            </nav>
            <a href="/sessions/paiement/" id="" class="" style="height: 50px; text-decoration: none; border-radius: 8px; padding: 10px; background-color: #1eba71; color: #fff;">
                <!-- ICON DU PANIER -->
                <svg width="1em" height="1em" viewBox="0 -3 16 16" class="bi bi-credit-card-2-back" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14 3H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                    <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zM1 9h14v2H1V9z"/>
                </svg>
                <span>Passer au paiment</span>
            </a>
        </form>
        <footer></footer>
    </body>
</html>