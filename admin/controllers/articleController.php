<?php
//on inclue le fichier qui permet d'utiliser la classe MyDB
require_once('../../include/MyDB.php');
$DB = new MyDB();

/**
 * --------------------------------Processus pour l'ajout des articles
 */

 /**
  * si le client envoie les données grace au bouton
  * on verifie si le bouton est appuyé 
  * 
  */
 if(isset($_POST['submit-btn']))
 {
    $nomArticle     = htmlspecialchars($_POST['nom']);
    $marque         = htmlspecialchars($_POST['marque']);
    $prix           = htmlspecialchars($_POST['prix']);
    $description    = htmlspecialchars($_POST['description']);


    
    /**
     * Dans ce scope on vérifie si le select catégorie est passé
     * categorie nous permet de determiner la où l'image 
     * envoyé par admin sera stokée.
     * Les images sontt classées aussi catégories et non pas dans 
     * un seule fichier.
     * 
     * On classe alors les images celon leur catégories
     * grace à la variable $target
     * 
     */
    if(isset($_POST['categorie'])) {
        $target = "../../articles/img/";

        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        
        if (isset($_FILES['nom-img']['name']) AND $_FILES['nom-img']['error'] == 0)
        {
            $categValue = $_POST['categorie'];
            switch ($categValue) {
                case 'telephonie':
                    $target .= "telephonie";
                    break;
                
                case 'document':
                    $target .= "documents";
                    break;
                
                default:
                    break;
            }

            //basename nous renvoie juste le nom du fichier et non son chemin
            $target .= '/'.basename($_FILES['nom-img']['name']) ;

            /**
             * Dans ce scope on upload le fichier 
             * premierement on copie vers la destination $target
             * ensuite on stoke l'img dans la BD
             */
            if(move_uploaded_file($_FILES['nom-img']['tmp_name'],$target))
            {
                $data = array(
                    'nom'           => $nomArticle,
                    'marque'        => $marque,
                    'prix'          => $prix,
                    'image'         => '/ecommerce/articles/img/'.$categValue.'/'.$_FILES['nom-img']['name'],
                    'description'   => $description,
                    'categorie'     => $categValue
                );
                $DB->query('INSERT INTO article(nom, marque, prix, image, description, categorie) VALUES(:nom, :marque, :prix, :image, :description, :categorie)', $data);
            }

        }
    }
    
 }

$DB->closeDB();
//TODO:animations pour revenir 
header("Location: ../");
?>