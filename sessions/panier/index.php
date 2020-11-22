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
                    <a href="../../"> <!-- ca m'amene directement dans la page d'acceuil-->
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
		            	<a>
							<p class="nom-menu">Mes informations</p>
		            	</a>
            		</li>
            	</ul>
            </nav>
        </form>
        <footer></footer>
    </body>
</html>