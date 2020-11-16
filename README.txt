 que j'ai fait avec le Pc de Mr Benoit
j'ai modifié le nom de l'hote pour la connexion à la BD
dans include/SendMail.php je vais le recreer car je ne l'avez pas push
avant que le pc tombe en panne
~                                                                                                                                                                                                     
~                                  

        <?php foreach($articles as $article):?>
            <div class="div-article">
                <div class="img-container">
                    <span class="article-prix"><?$article->getPrix()?>$</span>
                    <img src="<?$article->getImage()?>" class="article-img" alt="">
                </div>
                <div class="article-body">
                    <h5 class="article-titre"><?$article->getNom()?></h5>
                    <p class="article-description"><?$article->getDescription()?></p>
                    <a href="" class="btn btn-primary">Afficher plus de détails...</a>
                </div>
            </div>
        <?php endforeach ?>