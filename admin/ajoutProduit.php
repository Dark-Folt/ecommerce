<html>
    <head>
        <title>Administration</title>
        <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
        <?php include("../include/head.php");?>
    </head>
    <form  method="post" action="controllers/articleController.php?ajout=true" class="user-form" enctype="multipart/form-data">
        <div id="container">
                    <div class="form-header">
                        <a href="/admin" id="a-retour">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                            </svg>
                        </a>
                        <h3 class="legend">Ajout d'article</h3>
                    </div>
                    <div class="input-container">
                        <input type="text" placeholder="nom de l'article" name="nom" class="form-control" autocomplete="off" require>
                    </div>
                    <div class="input-container">
                        <input type="text" placeholder="marque de l'article" name="marque" class="form-control" require>
                    </div>
                    <div class="input-container">
                      <label for="categorie">Catégorie:</label>
                        <select name="categorie">
                            <option value="telephonie">Télephonie</option>
                            <option value="documents">Document</option>
                            <option value="jeux-video">Jeux-Vidéos</option>
                       </select>
                    </div>
                    <div class="input-container">
                        <input type="number" placehold="prix de l'article" name="prix" min="0" max="4000" class="form-control" placeholder="Prix" require>
                    </div>
                    <div class="input-container">
                        <textarea name="description" id="" cols="30" rows="10" placeholder="Description de l'article"></textarea>
                    </div>
                    <div class="input-container">
                        <label for="nom-img"></label>
                        <input type="file" name="nom-img"  class="" value="Choisir une image" accept="image/png, image/jpeg" require>
                    </div>
                    </div>
                    <div class="bt-container">
                        <!-- <button type="submit" class="btn btn-outline-success btn-lg bt-user-form" name="valider">Créer mon compte</button> -->
                        <input type="submit" name="submit-btn" class="" id="" value="Ajouter l'article">
                    </div>
                </div>
    </form>
</html>