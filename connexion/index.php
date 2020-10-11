<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Connexion</title>
        <!-- include contient le head general avec touts les links-->
        <link rel="stylesheet" type="text/css" href="../assets/css/accueil.css">
        <?php include('../include/head.php');?>
    </head>
    <body>
        <form method="post" action="../controllers/connexionController.php" class="user-form">
            <div id="container">
                <div class="form-header">
                    <a href="../"> <!-- ca m'amene directement dans la page d'acceuil-->
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                        </svg>
                    </a>
                    <h3 class="legend">Connectez-vous</h3>
                </div>
                <div class="input-container">
                    <input type="email" placeholder="Email" name="email" class="form-control" autocomplete="off">
                </div>
                <div class="input-container">
                    <input type="password" placeholder="Password" name="password" class="form-control">
                </div>
                <div class="bt-container">
                    <!-- <button type="submit" class="btn btn-success btn-lg">Se connecter</button> -->
                    <input type="submit" class="btn btn-success btn-lg" name="submit-btn">
                    <a href="../inscription"><button type="button" class="btn btn-outline-success btn-lg bt-user-form">Créer un compte</button></a>
                </div>
            </div>
        </form>
    </body>
</html>