<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Connexion</title>

        <!-- include contient le head general avec touts les links-->
        <?php include "../include/head.html";?>
    </head>
    <body id="body_connexion">
        <!--<fieldset style="border: 1px solid blue;" id="fieldset_ins">
            <legend>Connectez-vous</legend>
            <form methode="post" action="inscription.php">
                <div>
                    <label for="">E-mail</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp">
                </div>
                <div>
                    <label for="">Mot de passe:</label>
                    <input type="password" class="form-control">
                </div>
            </form>
        </fieldset>-->
        <form methode="post" action="/action_page.php" id="connexion_form">
            <div id="container">
                <legend>Identifiez-vous</legend>
                <div class="input-container">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                    </svg>
                    <input type="email" placeholder="Email" name="email" autofocus>
                </div>
                <div class="input-container">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-lock2-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM7 6a1 1 0 0 1 2 0v1H7V6zm3 0v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V8.3c0-.627.46-1.058 1-1.224V6a2 2 0 1 1 4 0z"/>
                    </svg>
                    <input type="password" placeholder="Password" name="psw">
                </div>
                <div id="bt-container">
                    <button type="button" class="btn btn-success btn-lg">Se connecter</button>
                    <button type="button" class="btn btn-outline-success btn-lg" id="bt-ccompte">Créer un compte</button>
                </div>
            </div>
        </form>
    </body>
</html>