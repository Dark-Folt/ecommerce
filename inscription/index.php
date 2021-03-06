<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Inscription</title>

        <!-- include contient le head general avec touts les links-->
        <link rel="stylesheet" type="text/css" href="../assets/css/index.css">
        <?php include ("../include/head.php");?>
    </head>
    <body>
        <form  method="post" action="../controllers/inscriptionController.php" class="user-form">
            <div id="container">
                <div class="form-header">
                    <a href="../connexion/" id="a-retour">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                        </svg>
                    </a>
                    <h3 class="legend">Inscrivez-vous</h3>
                </div>
                <div class="input-container">
                    <input type="email" placeholder="Email" name="email" class="form-control" autocomplete="off" require>
                </div>
                <div class="input-container">
                    <input type="password" placeholder="Mot de passe" name="password" class="form-control" require>
                </div>
                <div class="input-container">
                    <input type="password" placeholder="Confimer le mot de passe" name="password-confirm" class="form-control" require>
                </div>
                <div class="bt-container">
                    <!-- <button type="submit" class="btn btn-outline-success btn-lg bt-user-form" name="valider">Créer mon compte</button> -->
                    <input type="submit" name="submit-btn" class="submit-input" id="register-input" value="Créer mon compte">
                </div>
            </div>
        </form>
    </body>
</html>
